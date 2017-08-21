# focushaus

> Pick image focal points in Wordpress and preview the results.

## Usage
1. Head to the "Media" section of your site and click any image.
1. Click anywhere on the image to place the focal point at that location.
1. Click the "Show Preview" button (bottom right of the image) to view a resizable preview.
    * You can hold ⌘ to click through the preview and edit the focal point.
1. In your PHP:

```
<div style="background-image: url(<?php echo 'your-image-url'; ?>); background-position: <?php the_custom_background_position(); ?>;"></div>

```

That's it!

## TODO:
* Document convenience functions
* Make updating the input fields manually update the crosshair

## Dev Setup

``` bash
# install dependencies
npm install && npm install --only=dev

# build and watch dev version
npm run dev

# build for production with minification
npm run build
```

--------

__Focushaus__

http://funkhaus.us

Version: 1.0.1

* 1.0.1 - Added `get_offset_x` and `get_offset_y` convenience functions, placed these in main function
