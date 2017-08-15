<template>

  <div class="overlay-wrap">
    <div class="overlay" @mousemove="mousemove" @mousedown="mousedown" @mouseup="mouseup" >
      <div class="x axis" :style="{ top: `${offset.y}%` }"></div>
      <div class="y axis" :style="{ left: `${offset.x}%` }"></div>
    </div>

    <div class="controls">
      <button>Show Preview</button>
    </div>
  </div>

</template>

<script>

export default {
  props: ['fh-width', 'fh-height', 'offset'],
  computed: {
    aspectRatio(){
      return (this.fhHeight / this.fhWidth) * 100
    }
  },
  methods: {
    mousemove(evt){
      if( !this.mouseDown ) return

      const rect = evt.target.getBoundingClientRect()
      const x = (evt.offsetX / rect.width) * 100
      const y = (evt.offsetY / rect.height) * 100

      this.$emit('offsetChanged', { x, y })
    },
    mousedown(evt){
      this.mouseDown = true

      const rect = evt.target.getBoundingClientRect()
      const x = (evt.offsetX / rect.width) * 100
      const y = (evt.offsetY / rect.height) * 100

      this.$emit('offsetChanged', { x, y })
    },
    mouseup(){
      this.mouseDown = false
    }
  }
}


</script>

<style scoped>

  .overlay-wrap {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
  }
  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
  .axis {
    position: absolute;
    background-color: #000;
    border: 1px solid #fff;
    pointer-events: none;
  }
  .x.axis {
    left: -5px;
    right: -5px;
  }
  .y.axis {
    top: -5px;
    bottom: -5px;
  }
  .controls {
    position: absolute;
  }


</style>
