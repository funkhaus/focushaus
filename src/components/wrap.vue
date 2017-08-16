<template>

  <div class="focushaus-wrap">

    <fh-overlay
      :fh-width="dimensions.width"
      :fh-height="dimensions.height"
      :offset="offset"
      @offsetChanged="updateOffset"
      @previewToggled="showPreview = !showPreview"/>

    <transition name="slide">
      <keep-alive>
        <fh-preview
          class="preview"
          v-if="showPreview"
          :image-src="imageSrc"
          :offset="offset"
          @previewToggled="showPreview = !showPreview"/>
      </keep-alive>
    </transition>

  </div>

</template>

<script>
import Vue from 'vue'

export default {
  data(){
    return {
      dimensions: { width: 0, height: 0 },
      offset: { x: 50, y: 50 },
      mouseDown: false,
      showPreview: false,
      imgElement: false
    }
  },
  mounted(){
    // Save image dimensions when we mount this instance
    const img = new Image()
    img.onload = () => {
      this.dimensions.width = img.width
      this.dimensions.height = img.height
    }

    img.src = this.imageSrc

    // Set starting value according to metadata
    const x = document.querySelector('.focushaus-offset.x').getAttribute('value')
    const y = document.querySelector('.focushaus-offset.y').getAttribute('value')
    this.updateOffset({ x, y })
  },
  methods: {
    updateOffset: function(newOffset) {
      Vue.set(this.offset, 'x', newOffset.x)
      Vue.set(this.offset, 'y', newOffset.y)
    }
  },
  computed: {
    imageSrc(){
      return document.querySelector('#focushaus + img').getAttribute('src')
    },
    podStyle(){
      return {
        'background-image': `url(${this.imageSrc})`,
        'background-position': `${this.offset.x}% ${this.offset.y}%`
      }
    },
    imageElement(){
      return document.querySelector('#focushaus + img')
    }
  }
}

</script>

<style scoped>

.focushaus-wrap {
  position: absolute;
  width: 100%;
  height: 100%;
}
.slide-enter-active, .slide-leave-active {
  transition: opacity 0.4s, transform 0.4s;
}
.slide-enter, .slide-leave-to {
  transform: scale(0.9);
  opacity: 0;
}

</style>
