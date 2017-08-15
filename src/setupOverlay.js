import Vue from 'vue'
import fhWrap from './components/wrap.vue'
import fhOverlay from './components/overlay.vue'
import fhPreview from './components/preview.vue'

const refresh = () => {

  // Remove existing overlay
  jQuery('#focushaus-overlay').remove()

  // Wrap image
  jQuery('.thumbnail-image img').wrap('<div class="fh-image-wrap" style="position: relative;"></div>')

  // Prepend element
  jQuery('.fh-image-wrap').prepend('<div id="focushaus" style="position: absolute; width: 100%; height: 100%;"><focushaus-wrap/></div>')

  // Setup Vue
  Vue.component('fh-overlay', fhOverlay)
  Vue.component('fh-preview', fhPreview)
  new Vue({
    el: '#focushaus',
    components: {
      'focushaus-wrap': fhWrap,
    }
  })


}

export default () => {
  refresh()
}
