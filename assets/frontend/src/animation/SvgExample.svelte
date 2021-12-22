<script>

  import { animation } from './SvgExample.js';

</script>

<div class="canvas" use:animation></div>

<style lang="scss">

  .canvas {
    z-index: 0;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    pointer-events: none;
  }

</style>
