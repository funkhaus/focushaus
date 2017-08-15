import setupOverlay from './setupOverlay'

const init = () => {
  wp.media.view.Modal.prototype.on('open', () => {
    setupOverlay()
  })
}

window.addEventListener('load', evt => { init() })
