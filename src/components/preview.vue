<template>

  <div class="preview" :class="{ shifted: shiftDown }">
    <button @click="$emit('previewToggled')">Close</button>
    <div
      class="resizable"
      :style="{ 'background-image': `url(${imageSrc})`, 'background-position': `${offset.x}% ${offset.y}%` }">
    </div>
  </div>

</template>

<script>

export default {
  props: ['image-src', 'offset'],
  data(){
    return {
      shiftDown: false
    }
  },
  methods: {
    tryActivateShift(evt){
      if (evt.keyCode === 91) {
        this.shiftDown = true
      }
    },
    tryDeactivateShift(evt){
      if (evt.keyCode === 91) {
        this.shiftDown = false
      }
    }
  },
  activated(){
    window.addEventListener('keydown', this.tryActivateShift)
    window.addEventListener('keyup', this.tryDeactivateShift)
  },
  deactivated(){
    window.removeEventListener('keydown', this.tryActivateShift)
    window.removeEventListener('keyup', this.tryDeactivateShift)
  }
}

</script>

<style scoped>

.preview {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  margin: auto;
  width: 40%;
  height: 40%;
  z-index: 5;
  background-color: rgba(0, 0, 0, 0.4);
  resize: both;
  overflow: auto;

  display: flex;
  align-items: center;
  justify-content: center;

  transition: transform 0.4s, opacity 0.4s;
}
.preview.shifted {
  opacity: 0.7;
  transform: translateY(100px) scale(0.9);
  pointer-events: none;
}
button {
  position: absolute;
  top: 10px;
  right: 10px;
}
.resizable {
  resize: both;
  overflow: auto;
  border: 3px solid #fff;
  border-radius: 3px;
  width: 300px;
  height: 300px;
  background-size: cover;
}

</style>
