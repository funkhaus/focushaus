import Vue from 'vue'
import FocusHaus from './components/focus-haus.vue'

const refresh = () => {

  // Remove existing overlay
  jQuery('#focushaus-overlay').remove()

  // Prepend element
  jQuery('.thumbnail-image').prepend('<div id="focushaus-overlay"><focus-haus/></div>')

  // Setup Vue
  new Vue({
    el: '#focushaus-overlay',
    components: {
      'focus-haus': FocusHaus
    }
  })


}

export default () => {
  refresh()
}
