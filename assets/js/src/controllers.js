/* eslint strict: ["error", "function"] */
/* eslint func-names: ["error", "never"] */
/* eslint-disable max-len */
/* eslint-env es6 */
/* eslint no-use-before-define: ["error", { "functions": false }] */
/* eslint no-underscore-dangle: ["error", { "allow": ["_lockSidebar", "_newFieldBaseId"] }] */
/* eslint arrow-body-style: ["error", "always"] */
/* global $mdSidenav */
(function () {
  // 'use strict';

  const WordPressController = function () {
    // Customise here, if needed
    // $scope.$on('wordpress-templates', (ignore, templates) => {
    // });
  };

  /*
   * Validate the form fields, and submit if the validation succeed
   */
   /* eslint strict: ["error", "function"] */
  const WordPressTemplateValidation = function ($scope, $log, $routeParams, $mdSidenav, codePressApp) {
    $scope.formFields = {};
    $scope.submitted = false;

    // Form layouts
    $scope.formSimpleLayout = `${codepress.addon.wordpress}assets/views/template.simple.html`;
    $scope.formTabLayout = `${codepress.addon.wordpress}assets/views/template.tablayout.html`;

    /* Set the sidebar layout */
    $scope.$emit('codepressui-layout-templates', `${codepress.addon.wordpress}assets/views/sidebar.html`);

    // Right sidebar
    $scope.toggleRight = buildToggler('right');

    // Lock the right sidebar?
    $scope._lockSidebar = !codePressApp.isEmbedded;

    // The template has been loaded
    $scope.$on('wordpress-template-loaded', (ignore, fields) => {
      /**
       * Can't use ! in the following code
       *
       * <md-content ng-if="! fields.tablayout" ng-include="formSimpleLayout"></md-content>
       *
       * as angular generate a javascript error.
       * Everything works fine, but I don't like errors in the console, so gonna set
       * the variable fields.simpleLayout as ! fields.tablayout
       */
      $scope.fields.simpleLayout = !$scope.fields.tabLayout;

      // The event remove all the extra css, so need to specify style.css as well.
      $scope.$emit('codepressui-add-css', `${codepress.home}/wp-includes/css/dashicons.css`);

      /**
       * Can't use ! in the following code
       *
       * <md-content ng-if="! fields.tablayout" ng-include="formSimpleLayout"></md-content>
       *
       * as angular generate a javascript error.
       * Everything works fine, but I don't like errors in the console, so gonna set
       * the variable fields.simpleLayout as ! fields.tablayout
       */
      $scope.fields.simpleLayout = !$scope.fields.tabLayout;

      $scope.codePressApp.template.preview = fields.preview;
      $scope.codePressApp.template.functionName = fields.functionName;
      $scope.codePressApp.template.textDomain = fields.textDomain;
      $scope.codePressApp.template.functionNameLabel = fields.functionNameLabel;
      $scope.codePressApp.template.formCheck = (fields.formCheck === undefined) ? true : fields.formCheck;

      // used for generate dynamic fields
      $scope._newFieldBaseId = fields.newFieldBaseId;

      // Extra css needed?
      $scope.$emit('codepressui-add-css', fields.css);
    });

    /**
     * Return the code template
     */
    $scope.template = () => {
      return $scope.codePressApp.template ? $scope.codePressApp.template.codeTemplate : '';
    };

    /**
     * Return the preview template
     */
    $scope.preview = () => {
      return $scope.codePressApp.template ? $scope.codePressApp.template.preview : '';
    };

    /**
     * Check if at least one field, with className, is not empty
     *
     * @param className ( string ) - input className
     */
    $scope.cptShowLabels = (className) => {
      const inputs = Array.from(document.querySelectorAll(`input.${className}`));

      for (let i = 0, l = inputs.length; i < l; ++i) {
        const input = inputs[i];

        if ($scope.formFields[input.name]) return true;
      }

      return false;
    };

    /**
     * Return the selected taxonomies to be included with the cpt
     *
     */
    $scope.cptTaxonomies = () => {
      let taxonomies = [];

      if ($scope.formFields.cptCategoriesSupport) taxonomies.push('category');
      if ($scope.formFields.cptTagSupport) taxonomies.push('post_tag');

      if ($scope.formFields.cptCustomTaxonomySupport) {
        const list = $scope.formFields.cptCustomTaxonomySupport.split(',');
        const items = [];

        // Ignore empty elements
        list.forEach((s) => {
          s = s.trim();
          if (s.length) items.push(s);
        });

        taxonomies = taxonomies.concat(items);
      }

      const join = taxonomies.join("','");
      return taxonomies.length ? `'${join}'` : null;
    };

    /**
     * Return the list of the cpt supported features
     */
    $scope.cptSupports = () => {
      const selected = [];
      let defaults = 0;
      const $fields = document.querySelectorAll('[name="cptSupports[]"][aria-checked="true"]');

      for (let i = 0, l = $fields.length; i < l; ++i) {
        const value = $fields[i].getAttribute('value');

        selected.push(value);

        if (value === 'title' || value === 'editor') defaults++;
      }

      if ($fields.length !== 2 || defaults !== 2) {
        const join = selected.join("', '");

        return `'${join}'`;
      }

      return '';
    };

    /**
     * CPT Rewrite.
     *
     * return the rewrite array values, if any
     */
    $scope.cptRewrite = () => {
      const rewrite = [];

      if ($scope.formFields.cptRewriteSlug &&
          $scope.formFields.cptRewriteSlug !== $scope.formFields.cptPostTypeKey) {
        const rewriteSlug = $scope.formFields.cptRewriteSlug;
        rewrite.push(`'slug' => '${rewriteSlug}'`);
      }

      if ($scope.formFields.withFront === false) {
        rewrite.push("'with_front' => false");
      }

      if ($scope.formFields.feeds !== $scope.formFields.cptHasArchive) {
        const feed = $scope.formFields.feeds.toString();
        rewrite.push(`'feeds' => ${feed}`);
      }

      if (!$scope.formFields.pages) {
        rewrite.push("'pages' => false");
      }

      if ($scope.formFields.cptRewriteEpMask !== 'EP_NONE') {
        const epMask = $scope.formFields.cptRewriteEpMask;
        rewrite.push(`'ep_mask' => '${epMask}'`);
      }

      return rewrite.length > 0 ? rewrite.join(', ') : null;
    };

    /**
     * CPT capabilities
     */
    $scope.cptCapabilities = () => {
      const inputs = document.querySelectorAll('input.field--capability');
      const capabilities = [];

      for (let i = 0, l = inputs.length; i < l; ++i) {
        const input = inputs[i];

        if (input.value) {
          capabilities.push(`'${input.placeholder}' => '${input.value}'`);
        }
      }

      return capabilities.length === 0 ? null : capabilities.join(',\n    ');
    };

    /**
     * Custom taxonomy Rewrite
     *
     * return the rewrite array values, if any
     */
    $scope.ctRewrite = () => {
      const rewrite = [];

      if ($scope.formFields.ctRewriteSlug &&
          $scope.formFields.ctRewriteSlug !== $scope.formFields.ctTaxonomy) {
        const rewriteSlug = $scope.formFields.ctRewriteSlug;
        rewrite.push(`'slug' => '${rewriteSlug}'`);
      }

      if ($scope.formFields.withFront === false) {
        rewrite.push("'with_front' => false");
      }

      if ($scope.formFields.hierarchical) {
        rewrite.push("'hierarchical' => true");
      }

      if ($scope.formFields.ctRewriteEpMask !== 'EP_NONE') {
        const epMask = $scope.formFields.ctRewriteEpMask;
        rewrite.push(`'ep_mask' => '${epMask}'`);
      }

      return rewrite.length > 0 ? rewrite.join(', ') : null;
    };

    /**
     * Some fields, if not explicitly set, assume the same value of another one.
     * As I want to maintain this funcionality, I'm gonna switch all the linked
     * controls that have not been touched/clicked yet.
     * So, every time I change an item state I'm gonna add the 'changed' class to
     * it. Because I need to "lose" this functionality.
     *
     * @param string changedName (optional) is the name tag of the item. This
     *         parameter is used from the function itself.
     *         This because I can have a situation like this:
     *
     *        [Public] =>
     *          [Show Ui] =>
     *            [Show In Menu]
     *
     *        So, as you can see the default value of "Show Ui" depends by "Public",
     *        while "Show In Menu" one by "Show Ui".
     *        So, whenever I change a status of a switch, I need to reflect it
     *        to all the linked fields.
     *
     *        All this functionality, because some fields are set by default
     *        by me.
     *
     * @param string add
     */
    $scope.changeDefaults = (changedName, add) => {
      const name = changedName || this.field.name;
          // inputs that have the same value of the selected one
      const inputs = document.querySelectorAll(`*[data-default="${name}"]:not(.changed)`);

          // input that have opposite value of the selected one
      const nots = document.querySelectorAll(`*[data-default="!${name}"]:not(.changed)`);
      const $this = document.querySelector(`*[name="${name}"]`);
      const checked = $scope.formFields[name];

      if (changedName === undefined || add) $this.classList.add('changed');

      for (let i = 0, l = inputs.length; i < l; ++i) {
        const input = inputs[i];
        const fieldName = input.getAttribute('name');

        $scope.formFields[fieldName] = checked;

        /**
         * Send the event to the switched items, in case there are others linked
         * to the current "input" one.
         */
        $scope.changeDefaults(fieldName);
      }

      for (let i = 0, l = nots.length; i < l; ++i) {
        const input = nots[i];
        const fieldName = input.getAttribute('name');

        $scope.formFields[fieldName] = !checked;

        /**
         * Send the event to the switched items, in case there are others linked
         * to the current "input" one.
         */
        $scope.changeDefaults(fieldName);
      }
    };


   /**
    * Update the dynamic field settings
    */
    $scope.updateFieldSettings = (fields, field) => {
      const index = fields.indexOf(field);

      fields[index].type = $scope.formFields[field.selectModel];
    };

    /**
     * Togggle field settings
     */
    $scope.toggleSettings = (field) => {
      field.showSettings = !field.showSettings;
    };


     /**
      * Check if the list of form fields are valid.
      *
      * This function is used when the "Code" template need to check if multiple
      * fields are set as $valid === true.
      * It's just an utility function to make the code simplier.
      *
      * @param string comma separated string containing all the field names to be checked.
      */
    $scope.areValids = (data) => {
      const fields = data.split(',');
      let valids = true;

      for (let i = 0, l = fields.length; i < l; ++i) {
        valids = (valids === true) && $scope.wordpress[fields[i].trim()] && $scope.wordpress[fields[i].trim()].$valid;
      }

      return valids;
    };

     /**
      * Some template can have a small "preview" view, that show the user how
      * the parameters are rendered by WordPress.
      * The main template is splitted in 2 main rows, the first one contains
      * the dynamic created form, the second one load the html file containing
      * the preview mode.
      *
      * For each parameter that has the property 'highlight' set, this function
      * take care of highlightiing, by adding the .highlighted class, to the
      * corrensponding preview item while the form field receive focus, or just
      * is hovered.
      *
      * @param {string} field css selector
      */
    $scope.highlight = (selector) => {
      if (selector === undefined) return;

      const field = document.querySelector(`${selector}.highlight`);
      if (field) field.classList.add('highlighted');
    };

     /**
      * The form fields has no longer the focus, so lets remove the highlighted
      * class
      *
      * @param {string} field css selector
      */
    $scope.removeHighlight = (selector) => {
      if (selector === undefined) return;

      const field = document.querySelector(`${selector}.highlight`);
      if (field) field.className = field.className.replace(/highlighted\b/, '');
    };

     /**
      * Checkboxes
      *
      * Toggle the checkbox checked state
      *
      * @param {string} groupName - is the key of the formFields object
      * @param {string} id of the field to toggle
      */
    $scope.toggleSelection = (groupName, id) => {
      const index = $scope.formFields[groupName].indexOf(id);

      if (index > -1) {
        $scope.formFields[groupName].splice(index, 1);
      } else {
        $scope.formFields[groupName].push(id);
      }
    };

     /**
      * Is used to set the initial state of the checkbox.
      * Also this function initialise the formFields[groupName] as array, if it
      * is undefined
      *
      * @param {string} groupName - is the key of the formFields object
      * @param {string} id of the field to toggle
      */
    $scope.setAsChecked = (groupName, id, isChecked) => {
      if ($scope.formFields[groupName] === undefined) {
        $scope.formFields[groupName] = [];
      } else {
        /*
         * If the group name is already defined, don't have to initialize the element again,
         * as it means that the element was already displayed before, and want to keep
         * the previous value, not set the default one..
         */
        return;
      }

      if (isChecked) {
        $scope.formFields[groupName].push(id);
      }
    };

     /**
      * Utility function that merge 2 arrays and join the result.
      * Before the join, the function remove empty elements from the array
      *
      * @param {string} key of the first array to merge
      * @param {string} key of the array to concat. If is a string, need to specify the 'split' argument
      * @param {separator} is used to join the final array
      * @param {string} (optional) split pattern to use for the second array
      */
    $scope.mergeAndJoin = (firstName, secondName, separator, split) => {
      const first = $scope.formFields[firstName] || [];
      let second = $scope.formFields[secondName] || '';

      if (typeof (second) === 'string') {
        second = second.split(split);
      }

      const array = first.concat(second).filter((n) => { return n !== ''; });

      return array.join(separator);
    };

    /**
     * Toggle the right sidebar lock state
     */
    $scope.toggleSidebarLock = () => {
      $scope._lockSidebar = !$scope._lockSidebar;
    };

    // Original code from https://material.angularjs.org/latest/demo/sidenav
    $scope.isOpenRight = () => {
      return $mdSidenav('right').isOpen();
    };

    function buildToggler(navID) {
      return () => {
        // Component lookup should always be available since we are not using `ng-if`
        $mdSidenav(navID)
          .toggle();
      };
    }

    /**
     * Remove spaces from the value
     */
    $scope.replaceSpace = (value) => {
      return (value) ? value.replace(/ /g, '_') : '';
    };

    /**
     * Remove an item from the (repeater) array
     */
    $scope.removeField = (items, item) => {
      const index = items.indexOf(item);

      items.splice(index, 1);
    };

    /**
     * Append an new item to the repeater
     */
    $scope.addField = (items) => {
      const field = {
        name: $scope._newFieldBaseId + items.length,
        label: 'New Field',
        type: 'text',
        required: false,
        placeholder: 'default value',
        titleModel: `${$scope._newFieldBaseId + items.length}Title`,
        defaultValue: `${$scope._newFieldBaseId + items.length}Value`,
        selectModel: `${$scope._newFieldBaseId + items.length}Select`,
        options: [],
      };

      items.push(field);
    };

    /**
     * Add a new "option" item
     */
    $scope.addOption = (items, name) => {
      if (!items) items = [];

      items.push({
        name: name + items.length,
      });

      return items;
    };

    /**
     * Check if at least 1 field contain the desired value
     */
    $scope.fieldsContain = (items, key, value) => {
      for (let i = 0, l = items.length; i < l; ++i) {
        if (items[i][key] === value) return true;
      }

      return false;
    };
  };

  WordPressController.$inject = ['$scope', '$log', '$mdSidenav', 'codePressApp'];
  WordPressTemplateValidation.$inject = ['$scope', '$log', '$routeParams', '$mdSidenav', 'codePressApp'];

  angular.module('codepress')
    .controller('WordPressController', WordPressController)
    .controller('WordPressTemplateValidation', WordPressTemplateValidation);
}());
