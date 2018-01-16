<template>
  <div
    @mousedown.prevent="handleMouseDown"
    :style="[{ transform: `translate(${this.x}px, ${this.y}px)` }, styles]"
  >
    <slot />
  </div>
</template>

<script>
  export default {
    data() {
      return {
        x: 0,
        y: 0,
      };
    },
    props: ['styles'],
    beforeDestroy() {
      window.removeEventListener('mousemove', this.handleMouseMove);
      window.removeEventListener('mouseup', this.handleMouseUp);
    },
    mounted() {
      window.addEventListener('mousemove', this.handleMouseMove);
      window.addEventListener('mouseup', this.handleMouseUp);
    },
    methods: {
      handleMouseDown(e) {
        this.initialDraggablePosition = {
          x: this.x,
          y: this.y,
        };
        this.isMouseDown = true;
        this.initialGesturePosition = {
          x: e.clientX,
          y: e.clientY,
        };
        this.shouldRequestAnimationFrame = true;
        this.$emit('mouseDown', e);
      },
      handleMouseMove(e) {
        e.preventDefault();
        if (this.isMouseDown) {
          this.delta = {
            x: (e.clientX - this.initialGesturePosition.x),
            y: (e.clientY - this.initialGesturePosition.y),
          };

          if (this.shouldRequestAnimationFrame) {
            this.shouldRequestAnimationFrame = false; // needed to avoid continually requesting animation frame
            requestAnimationFrame(this.update);
          }
          this.$emit('mouseMove', e);
        }
      },
      handleMouseUp(e) {
        e.preventDefault();

        if (this.isMouseDown) this.$emit('mouseUp', e);

        this.isMouseDown = false;
      },
      update() {
        this.shouldRequestAnimationFrame = true; // after this update, ready to request a new animation frame
        this.x = this.delta.x + this.initialDraggablePosition.x;
        this.y = this.delta.y + this.initialDraggablePosition.y;
      },
    },
  };
</script>

<style scoped>
  div {
    cursor: pointer;
    display: inline-block;
  }
</style>
