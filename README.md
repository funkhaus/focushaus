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

## API

All functions accepting a `$target` parameter can accept either an attachment ID/object or a post ID/object. Passing a post  will look for a featured image on that post.

### `get_custom_background_position( $target )`

> `target` (int | WP_Post) (optional, default null)

Returns a string representing the image's focal point. Example return value: `25% 75%`. Default `50% 50%`.

### `get_offset_x( $target )`

> `target` (int | WP_Post) (optional, default null)

Returns a number representing an image's focal point X position in percentage points. Default `50` if none set.

### `get_offset_y( $target )`

> `target` (int | WP_Post) (optional, default null)

Returns a number representing an image's focal point Y position in percentage points. Default `50` if none set.

### `the_custom_background_position( $target )`

> `target` (int | WP_Post) (optional, default null)

Echoes the result of `get_custom_background_position( $target )`.

## TODO:
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

* 1.0.2 - Documented convenience functions, made input fields readonly
* 1.0.1 - Added `get_offset_x` and `get_offset_y` convenience functions, placed these in main function
