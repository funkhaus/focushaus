import setupOverlay from './setupOverlay'

const init = () => {
    wp.media.view.Modal.prototype.on('open', () => {
        // timeout removes requirement for hard reload after one usage
        setTimeout(() => {
            setupOverlay()
        }, 100)
    })
}

window.addEventListener('load', evt => {
    init()
})
