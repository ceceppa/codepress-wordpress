# WordPress generator for CodePress

CodePress addon helping you to easily generate custom and high quality code for your WordPress project using the latest WordPress coding standards and API's.

## Installation

Before install the plugin need to install the CodePress theme first.

- To install the addon just download/clone it in the **wp-config/plugins** folder.
- Activate the *WordPress for CodePress* plugin through the **Plugins** menu in WordPress.

## Development

- (Angular 1.5.8)[https://angularjs.org/]
- (Angular Material)[https://material.angularjs.org/latest/]
- (Angular Material Icons)[https://klarsys.github.io/angular-material-icons/]

### Coding style

JavaScript: [Airbnb JavaScript Style Guide()](https://github.com/airbnb/javascript)

### Setup

```
npm install
```

- install all npm dependencies.

### Watch files

```
gulp watch
```

- all SCSS/JavaScript will be watched for changes and compiled.

### Build production version

```
gulp build
```

this will process following tasks:
- compile SASS files.
- build app.bundle.min.js using babel and minify

### Templates

To add a new generator please have a look to [link here]
