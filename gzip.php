<?php
if ( ! ini_get('zlib.output_compression') ) {
    http_response_code(503);
    exit;
}

$allowed = ['css', 'js'];

if ( isset($_GET['file'], $_GET['type']) ) {
    $filename = basename($_GET['file']);
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if ( ! in_array($ext, $allowed) || $_GET['type'] !== $ext ) {
        http_response_code(403);
        exit;
    }

    $filepath = __DIR__ . '/' . $filename;

    if ( ! file_exists($filepath) || ! is_readable($filepath) ) {
        http_response_code(404);
        exit;
    }

    $data = file_get_contents($filepath);
    $etag = '"' . md5($data) . '"';

    header('ETag: ' . $etag);
    header('Cache-Control: max-age=300, must-revalidate');
    header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 3600) . ' GMT');

    switch ($ext) {
        case 'css':
            header('Content-Type: text/css; charset=UTF-8');
            break;
        case 'js':
            header('Content-Type: text/javascript; charset=UTF-8');
            break;
    }

    if ( isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] === $etag ) {
        header('HTTP/1.1 304 Not Modified');
        header('Content-Length: 0');
        exit;
    }

    header('Content-Length: ' . strlen($data));
    echo $data;
}
?>
