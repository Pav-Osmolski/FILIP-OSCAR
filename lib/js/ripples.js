"use strict";

// Bounded analytic water waves: no jQuery, floating-point framebuffer extension,
// readbacks, or continuous idle animation. The original image is always underneath.
(() => {
  const motion = matchMedia("(prefers-reduced-motion: reduce)");
  const vertexSource = `
    attribute vec2 position;
    varying vec2 uv;
    void main() {
      uv = position * 0.5 + 0.5;
      gl_Position = vec4(position, 0.0, 1.0);
    }
  `;
  const fragmentSource = `
    precision mediump float;
    varying vec2 uv;
    uniform sampler2D artwork;
    uniform vec4 drops[8];
    uniform float time;
    void main() {
      vec2 displacement = vec2(0.0);
      float light = 0.0;
      for (int i = 0; i < 8; i++) {
        float age = time - drops[i].z;
        if (age >= 0.0 && age < 2.8 && drops[i].w > 0.0) {
          vec2 delta = uv - drops[i].xy;
          float distance = length(delta);
          float ring = distance - age * 0.32;
          float envelope = exp(-ring * ring * 180.0) * exp(-age * 1.65);
          float wave = sin(ring * 95.0) * envelope * drops[i].w;
          displacement += delta / max(distance, 0.001) * wave * 0.012;
          light += wave * 0.025;
        }
      }
      vec3 colour = texture2D(artwork, clamp(uv + displacement, 0.001, 0.999)).rgb;
      gl_FragColor = vec4(colour + light, 1.0);
    }
  `;

  class ArtworkRipple {
    constructor(host) {
      this.host = host;
      this.image = host.querySelector("img");
      this.canvas = document.createElement("canvas");
      this.canvas.className = "ripple-canvas";
      this.canvas.setAttribute("aria-hidden", "true");
      this.canvas.hidden = true;
      this.drops = new Float32Array(32);
      this.visible = false;
      this.suspended = false;
      this.frame = 0;
      this.lastDrop = 0;
      this.nextDrop = 0;
      this.failed = false;
      host.append(this.canvas);

      this.canvas.addEventListener("webglcontextlost", event => {
        event.preventDefault();
        this.stop();
        this.canvas.hidden = true;
        this.gl = null;
      });
      this.canvas.addEventListener("webglcontextrestored", () => {
        this.failed = false;
        this.initialise();
      });
      host.addEventListener("ripple-suspend", () => {
        this.suspended = true;
        this.stop();
        this.canvas.hidden = true;
      });
      host.addEventListener("ripple-resume", () => {
        this.suspended = false;
        this.reset();
      });
      host.addEventListener("pointermove", event => {
        // Touch scrolling stays native; a touch-down creates one ripple.
        if (event.pointerType !== "touch") this.drop(event, 0.5, 65);
      }, { passive: true });
      host.addEventListener("pointerdown", event => this.drop(event, 1.3, 0), { passive: true });
      this.resizeObserver = new ResizeObserver(() => this.reset());
      this.resizeObserver.observe(host);
      this.intersectionObserver = new IntersectionObserver(entries => {
        this.visible = entries[0].isIntersecting;
        if (this.visible) this.initialise();
        this.reset();
      });
      this.intersectionObserver.observe(host);
      document.addEventListener("visibilitychange", () => this.reset());
      motion.addEventListener("change", () => {
        if (!motion.matches) this.initialise();
        this.reset();
      });
    }

    initialise() {
      if (this.gl || this.failed || motion.matches || this.suspended) return;
      if (!this.image.complete) {
        if (!this.waitingForImage) {
          this.waitingForImage = true;
          this.image.addEventListener("load", () => this.initialise(), { once: true });
        }
        return;
      }
      if (!this.image.naturalWidth) return;
      const gl = this.canvas.getContext("webgl", {
        antialias: false, depth: false, stencil: false, powerPreference: "low-power"
      });
      if (!gl) { this.failed = true; return; }
      const shaders = [];
      let program, buffer, texture;
      try {
        for (const [type, source] of [[gl.VERTEX_SHADER, vertexSource], [gl.FRAGMENT_SHADER, fragmentSource]]) {
          const shader = gl.createShader(type);
          shaders.push(shader);
          gl.shaderSource(shader, source);
          gl.compileShader(shader);
        }
        program = gl.createProgram();
        shaders.forEach(shader => gl.attachShader(program, shader));
        gl.linkProgram(program);
        if (!gl.getProgramParameter(program, gl.LINK_STATUS)) throw new Error("Ripple shader unavailable");
        gl.useProgram(program);
        buffer = gl.createBuffer();
        gl.bindBuffer(gl.ARRAY_BUFFER, buffer);
        gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1, -1, 1, -1, -1, 1, 1, 1]), gl.STATIC_DRAW);
        const position = gl.getAttribLocation(program, "position");
        gl.enableVertexAttribArray(position);
        gl.vertexAttribPointer(position, 2, gl.FLOAT, false, 0, 0);
        texture = gl.createTexture();
        gl.bindTexture(gl.TEXTURE_2D, texture);
        gl.pixelStorei(gl.UNPACK_FLIP_Y_WEBGL, true);
        gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_MIN_FILTER, gl.LINEAR);
        gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_MAG_FILTER, gl.LINEAR);
        gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_S, gl.CLAMP_TO_EDGE);
        gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_T, gl.CLAMP_TO_EDGE);
        gl.texImage2D(gl.TEXTURE_2D, 0, gl.RGBA, gl.RGBA, gl.UNSIGNED_BYTE, this.image);
        gl.uniform1i(gl.getUniformLocation(program, "artwork"), 0);
        this.timeLocation = gl.getUniformLocation(program, "time");
        this.dropsLocation = gl.getUniformLocation(program, "drops[0]");
        this.gl = gl;
        this.reset();
      } catch {
        this.failed = true;
        this.canvas.hidden = true;
        if (texture) gl.deleteTexture(texture);
        if (buffer) gl.deleteBuffer(buffer);
        if (program) gl.deleteProgram(program);
      } finally {
        shaders.forEach(shader => gl.deleteShader(shader));
      }
    }

    enabled() {
      return this.gl && this.visible && !this.suspended && !motion.matches && !document.hidden;
    }

    stop() {
      cancelAnimationFrame(this.frame);
      this.frame = 0;
    }

    reset() {
      this.stop();
      this.drops.fill(0);
      this.canvas.hidden = true;
      // Resting art is the original image, so an idle/offscreen effect uses no GPU.
    }

    drop(event, strength, interval) {
      if (!this.enabled() || event.target.closest("button, a")) return;
      const now = performance.now();
      if (now - this.lastDrop < interval) return;
      const rect = this.image.getBoundingClientRect();
      if (!rect.width || !rect.height) return;
      if (!this.frame) this.epoch = now;
      const offset = (this.nextDrop++ % 8) * 4;
      this.drops.set([
        (event.clientX - rect.left) / rect.width,
        1 - (event.clientY - rect.top) / rect.height,
        (now - this.epoch) / 1000, strength
      ], offset);
      this.lastDrop = now;
      if (!this.frame) this.render(now);
    }

    render(now) {
      this.frame = 0;
      if (!this.enabled()) { this.reset(); return; }
      const time = (now - this.epoch) / 1000;
      const active = this.drops.some((value, index) => index % 4 === 3 && value > 0 && time - this.drops[index - 1] < 2.8);
      if (!active) { this.reset(); return; }
      const gl = this.gl;
      // Both artwork displays are square. Bound pixel density and total canvas size.
      const size = Math.min(1024, Math.max(1, Math.round(this.image.clientWidth * Math.min(devicePixelRatio || 1, 1.5))));
      if (this.canvas.width !== size || this.canvas.height !== size) {
        this.canvas.width = size;
        this.canvas.height = size;
        gl.viewport(0, 0, size, size);
      }
      gl.uniform1f(this.timeLocation, time);
      gl.uniform4fv(this.dropsLocation, this.drops);
      gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);
      this.canvas.hidden = false;
      this.frame = requestAnimationFrame(timestamp => this.render(timestamp));
    }
  }

  document.querySelectorAll("[data-ripple]").forEach(host => new ArtworkRipple(host));
})();
