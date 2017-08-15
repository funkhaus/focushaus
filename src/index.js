import setupOverlay from './setupOverlay'
import Vue from 'vue'

const init = () => {
  wp.media.view.Modal.prototype.on('open', () => {
    setupOverlay()
  })
}

window.addEventListener('load', evt => { init() })
