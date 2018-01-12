# vue-draggable
[![npm version](https://badge.fury.io/js/%40atomic-nyc%2Fvue-draggable.svg)](https://badge.fury.io/js/%40atomic-nyc%2Fvue-draggable)

An easy-to-use draggable component for [Vue.js](https://vuejs.org/) powered by [Atomic NYC](http://atomicsoftware.com).

## Installation
```
$ npm install @atomic-nyc/vue-draggable --save
```

### Browser
Include the script file then install the component with `Vue.use(VueDraggable);`

```html
<script type="text/javascript" src="/node_modules/vue/dist/vue.min.js"></script>
<script type="text/javascript" src="node_modules/@atomic-nyc/vue-draggable/dist/vue-draggable.min.js"></script>
<script type="text/javascript">
    Vue.use(VueDraggable);
</script>
```

### Module
```js
import VueDraggable from '@atomic-nyc/vue-draggable';
```

## Usage
Once installed, use it in a [Vue template](https://vuejs.org/v2/guide/syntax.html) as follows:


```html
<vue-draggable>
    <div>This div is draggable.</div>
</vue-draggable>
```

Images even become draggable:
```html
<vue-draggable>
    <img src="./assets/draggable-logo.png">
</vue-draggable>
```

### Props
#### styles
Type: `Object`  
Required: `false`

Custom styling applied to the outer div of the `vue-draggable`

##### Example
```html
<vue-draggable :styles="{ backgroundColor: 'red'}">
    <img src="./assets/draggable-logo.png">
</vue-draggable>
```

### Events
#### mouseDown
Custom function emitted when user clicks mouse button on the draggable component.

#### mouseMove
Custom function emitted when user moves the draggable component.

#### mouseUp
Custom function emitted when user releases mouse button from the draggable component.

##### Example
Assume the `handleMouseDown` function is defined in [`methods`](https://vuejs.org/v2/guide/events.html#Method-Event-Handlers).
```html
<vue-draggable @mouseDown="handleMouseDown">
    <img src="./assets/draggable-logo.png">
</vue-draggable>
```

This package is compatible with [Vue.js Server-Side Rendering](https://ssr.vuejs.org/en/).