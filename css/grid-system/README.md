# Grid System
In this version of Basis there are also grid systems built in. These will be moved to the `layout` module when basis is out of beta.

Both of these define the same classes, but they use different styles to create page layouts. When basis is out of beta it will detect if the browser can support flexbox, and if it cannot it will load the float grid system.

Optionally you'll be able to set that you'd rather default to float and avoid flexbox.

## Grid system classes
All classes are prefaced with an `l-`. This is to namespace them so they aren't confused for components, and to make them easily recognizable.

For clarity when referring to a column in the grid system, we use the term 'grid-column', when referring to a column in the page layout (which may take up multiple grid-columns) simply use the word 'column'.

The theme should **never** extend any of the grid system classes:
* `l-grid-container` and `l-grid-container-static`
* `l-row`
* `l-col-*`
* `l-push-*`
* `l-pull-*`
* `l-offset-*`
* `l-order-*`

The grid system is heavily based on Bootstrap 4's grid system, with a few exceptions.
1. All classes are prefixed with `l-`
2. The flexbox based grid has added the `l-order-`classes (See below)
3. The breakpoints are slightly different, but will behave the same on popular device sizes

As it's based on Bootstrap's grid, our grid system:
* Is based on a 12 column grid system. This means the available width is divided into 12 equal 'grid-columns'.
* [Is based on all layout elements having this style `box-sizing: border-box`](http://v4-alpha.getbootstrap.com/getting-started/introduction/#box-sizing)
* Has predefined breakpoints, which are all in `em` units for accessibility reasons. Listed pixel equivalents are based on a `16px` browser default font-size, which could be changed by the user.
	* `xs` Extra small: width of 0 and up
	* `sm` Small: width of ~`560px` (`35em`) and up
	* `md` Medium: width of ~`720px` (`45em`) and up
	* `lg` Large: width of ~`960px` (60em) and up
	* `xl` Extra Large: width of ~`1200px` (`75em`) and up
* All columns have default padding of `0.5rem` on either side, which can be overridden with CSS whenever desired.
* Column widths and breakpoints should not be changed unless the grid system is being replaced entirely, however, additional breakpoints may be added in sub-themes if they're needed.

### Class naming convention
The following classes follow the same naming convention, but will apply different effects.

The convention looks something like:
`l-gridproperty-bp-gc`
* `l-` 
  prefix of all layout classes
* `gridproperty-`
  The style name
* `bp-`
  The breakpoint where the style should start applying
* `gc`
  Number of grid columns for the change

Grid system is mobile first, any class with a breakpoint name in it will apply to that size **and up**, unless a class with a larger breakpoint overrides it (see example classes below.)

**The available grid properties are:** 

`l-col-**-**`
Determines how wide the column is in grid-columns

`l-offset-**-**`
Moves a column left by specified amount of grid-columns, and leaves that much white space on the left side.

`l-push-**-**`
`l-pull-**-**`
Moves a column 'as-is' the specified number of grid-columns. Push moves to the right, pull to the left. This is using `position: relative`, so the space the column was taking up will still be reserved, and this may cause overlapping columns if surrounding columns are not also pushed/pulled to get out of the way. 

`l-order-**-**`
This feature only works with flexbox grid, it applies a 'weight' to the column that will change the order in which the columns appear, 'heavier' columns appear last. 

**Example classes**
* `l-col-sm-6 l-col-lg-3`
  * This column will be full-width (12 grid-columns) on `xs` screens (because that is the default)
  * Half width (6 grid-columns / 12) on `sm` and `md` screens
  * Quarter width (3 grid-columns / 12) at `lg` and `xl` screens
* `l-offset-sm-2 l-offset-lg-6`
  * This column will be offset by 2 grid-columns on `sm` and `md` screens
  * It will be offset 6 columns at `lg` and `xl` screens
  * It will not be offset at all on `xs` screens (because this is the default)
* `l-col-md-6`
  * This column will be full width on `xs` and `sm` screens
  * It will be 6 grid columns on `md`, `lg` and `xl` screens

### Source Order
A layout must have a `l-layout` or `l-grid-container` wrapping the page somewhere. This is typically taken care of by the outermost wrapper of the layout having the `l-layout` class.

All `l-col-**-**` elements should be wrapped by a `l-row` element. Usually each row in the layout will have a `l-row` wrapper, but in some cases multiple rows in the layout may only have one `l-row` wrapper.

For instance a grid of thumbnails may have an unknown quantity of thumbnails in it. Fifty thumbnails could make up 12 rows in the layout but only have one wrapper, they will 'wrap' and layout if they have one `l-row` wrapper.

The other grid layout classes should only be applied to elements that also have a `l-col-**-**` class:
* `l-push-*`
* `l-pull-*`
* `l-offset-*`
* `l-order-*`

**See `basis/templates/layout/*` for examples.**