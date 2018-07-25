<template>

    <div class="preview" :class="{ shifted: shiftDown }">
        <div class="instructions">Resize the preview with the handle on the lower right hand corner.<br/>Hold ⌘ to click through the preview and edit the focal point.</div>
        <button @click="$emit('previewToggled')">Close</button>
        <div
            class="resizable"
            :style="cmpStyle">
        </div>
    </div>

</template>

<script>
export default {
    props: ["image-src", "offset"],
    data() {
        return {
            shiftDown: false
        };
    },
    computed: {
        cmpStyle() {
            return {
                "background-image": `url(${this.imageSrc})`,
                "background-position": `${this.offset.x}% ${this.offset.y}%`
            };
        }
    },
    methods: {
        onKeyDown(evt) {
            if (evt.keyCode === 27) {
                this.$emit("previewToggled");
                evt.preventDefault();
            }
            if (evt.keyCode === 91) {
                this.shiftDown = true;
            }
        },
        onKeyUp(evt) {
            if (evt.keyCode === 91) {
                this.shiftDown = false;
            }
        }
    },
    activated() {
        window.addEventListener("keydown", this.onKeyDown);
        window.addEventListener("keyup", this.onKeyUp);
    },
    deactivated() {
        window.removeEventListener("keydown", this.onKeyDown);
        window.removeEventListener("keyup", this.onKeyUp);
    }
};
</script>

<style scoped>
.preview {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1005;
    background-color: rgba(0, 0, 0, 0.4);

    display: flex;
    align-items: center;
    justify-content: center;

    transition: transform 0.4s, opacity 0.4s;
}
.preview.shifted {
    opacity: 0.7;
    transform: translateY(100px);
    pointer-events: none;
}
.instructions {
    color: #fff;
    font-weight: 700;
    font-size: 18px;
    position: absolute;
    top: 10px;
    text-align: center;
    line-height: 1.3;
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
