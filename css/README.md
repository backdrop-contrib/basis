# CSS Guidelines

[See Backdrop's CSS Standards](https://api.backdropcms.org/css-standards)

## Files
* The types of CSS files in the theme are:
	* Base/Normalize - Using a normalize stylesheet to ensure consistent rendering
	* Fonts - `@font-face` rules
	* Layout - Component (not page) layout, page layout should be handled in a `layout` extension
	* Component - CSS files that 
	* State - Styles for interactivity that override defaults set in component
	* Skin - The colors, fonts and aesthetic CSS

Differences from current Backdrop:
* Adding fonts level because who wants that cluttering up their proper stylesheets
* Changing Theme to Skin, feel that Skin is more specific and doesn't carry Drupal baggage that could cause confusion

## Grid System
In this version of Basis there are also grid systems built in. These will be moved to the `layout` module when basis is out of beta.

Both of these define the same classes, but they use different styles to create page layouts. When basis is out of beta it will detect if the browser can support flexbox, and if it cannot it will load the float grid system.

Optionally you'll be able to set that you'd rather default to float and avoid flexbox.

### Grid system classes
All classes are prefaced with an `l-`. This is to namespace them so they aren't confused for components, and to make them easily recognizable.

The theme should **never** extend any of the grid system classes:
* `l-grid-container*`
* `l-col-*`
* `l-push-*`
* `l-pull-*`
* `l-offset-*`
* `l-order-*`

The grid system is heavily based on Bootstrap 4's grid system, with a few exceptions.
1. All classes are prefixed with `l-`
2. The flexbox based grid has added the `l-order-`classes
3. The breakpoints are slightly different

As it's based on Bootstrap's grid, the grid system:
* [is based on `box-sizing: border-box`](http://v4-alpha.getbootstrap.com/getting-started/introduction/#box-sizing)
* Has predefined breakpoints