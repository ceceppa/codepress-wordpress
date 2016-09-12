<?php
$fn = function( $url ) {
  $domainpath = '';

  $fields = [
    [
      'label' => __( 'Meta box', 'cp-wordpress' ),
      'fields' => [
        [
          'name' => 'id',
          'label' => __( 'ID', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'sanitize' => true,
          'placeholder' => 'my-id',
          'p' => __( "Meta box ID (used in the 'id' attribute for the meta box).", 'cp-wordpress' ),
        ],
        [
          'name' => 'title',
          'label' => __( 'Title', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'sanitize' => false,
          'placeholder' => __( 'My Title', 'cp-wordpress' ),
          'p' => __( 'Title of the meta box.', 'cp-wordpress' ),
        ],
        [
          'name' => 'description',
          'label' => __( 'Description', 'cp-wordpress' ),
          'type' => 'text',
          'required' => false,
          'default' => '',
          'minLength' => '',
          'sanitize' => false,
          'placeholder' => '',
          'flex' => 33,
          'p' => __( 'Description to display inside the metabox.', 'cp-wordpress' ),
        ],
        [
          'name' => 'callback',
          'label' => __( 'Callback', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'flex' => 50,
          'placeholder' => 'my_callback',
          'sanitize' => true,
          'cssClass' => 'full-width',
          'p' => __( 'Function that fills the box with the desired content. The function should echo its output.', 'cp-wordpress' ),
        ],
        [
          'name' => 'callbackArgs',
          'label' => __( 'Callback arguments', 'cp-wordpress' ),
          'type' => 'text',
          'required' => false,
          'default' => '',
          'minLength' => '',
          'flex' => 50,
          'placeholder' => "array( 'foo' => 1, 'bar' => 2 )",
          'sanitize' => false,
          'cssClass' => 'full-width',
          'p' => __( 'Data that should be set as the $args property of the box array (which is the second parameter passed to your callback).', 'cp-wordpress' ),
        ],
        [
          'label' => __( 'Screen', 'cp-wordpress' ),
          'name' => 'screen',
          'type' => 'label',
          'flex' => 100,
          'cssClass' => 'padding-top padding-bottom cursor-help',
          'p' => __( "The screen or screens on which to show the box (such as a post type, 'link', or 'comment'). Accepts a single screen ID, WP_Screen object, or array of screen IDs. Default is the current screen.", 'cp-wordpress' ),
        ],
        [
          'id' => 'post',
          'name' => 'screen',
          'label' => __( 'Post', 'cp-wordpress' ),
          'type' => 'checkbox',
          'checked' => true,
          'flex' => 33,
        ],
        [
          'id' => 'page',
          'name' => 'screen',
          'label' => __( 'Page', 'cp-wordpress' ),
          'type' => 'checkbox',
          'flex' => 33,
        ],
        [
          'id' => 'dashboard',
          'name' => 'screen',
          'label' => __( 'Dashboard', 'cp-wordpress' ),
          'type' => 'checkbox',
          'flex' => 33,
        ],
        [
          'id' => 'link',
          'name' => 'screen',
          'label' => __( 'Link', 'cp-wordpress' ),
          'type' => 'checkbox',
          'flex' => 33,
        ],
        [
          'id' => 'attachment',
          'name' => 'screen',
          'label' => __( 'Attachment', 'cp-wordpress' ),
          'type' => 'checkbox',
          'flex' => 33,
        ],
        [
          'id' => 'comment',
          'name' => 'screen',
          'label' => __( 'Comment', 'cp-wordpress' ),
          'type' => 'checkbox',
          'flex' => 33,
        ],
        [
          'name' => 'customSlugs',
          'label' => __( 'Custom', 'cp-wordpress' ),
          'type' => 'text',
          'flex' => 100,
          'sanitize' => true,
          'default' => '',
          'p' => __( "Custom post type/page slug(s). This field can be used to show the meta box in a custom page. If so, use the following code:<br/><strong>do_meta_boxes( '[your_custom_slug]', 'advanced', null ); </strong>", 'cp-wordpress' ),
        ],
        [
          'label' => __( 'Display', 'cp-wordpress' ),
          'name' => 'screen',
          'type' => 'label',
          'flex' => 100,
          'cssClass' => 'padding-top padding-bottom',
        ],
        [
          'name' => 'context',
          'label' => __( 'Context', 'cp-wordpress' ),
          'type' => 'select',
          'cssClass' => 'full-width',
          'default' => 'Advanced',
          'options' => [
            'Normal',
            'Advanced',
            'Side'
          ],
          'p' => __( "The context within the screen where the boxes should display. Available contexts vary from screen to screen. Post edit screen contexts include 'normal', 'side', and 'advanced'. Comments screen contexts include 'normal' and 'side'. Menus meta boxes (accordion sections) all use the 'side' context.", 'cp-wordpress' ),
        ],
        [
          'name' => 'priority',
          'label' => __( 'Priority', 'cp-wordpress' ),
          'type' => 'select',
          'cssClass' => 'full-width',
          'default' => 'Default',
          'options' => [
            'High',
            'Core',
            'Default',
            'Low',
          ],
          'p' => __( "The priority within the context where the boxes should show ('high', 'low').", 'cp-wordpress' ),
        ],
      ],
    ],
    [
      'label' => __( 'Fields', 'cp-wordpress' ),
      'html' => $url . 'meta-box-generator.preview.html',
      'fields' => [
      ],
    ],
  ];

  return [
    'tabLayout' => 1,
    'fields' => $fields,
    'functionName' => 'bp_add_meta_boxes',
    'textDomain' => 'theme-slug',
    'layoutType' => 'column',
    'dynamicFields' => [
      [
        'name' => 'title',
        'label' => 'Title',
        'type' => 'text',
        'required' => false,
        'default' => 'New title',
        'minLength' => '',
        'placeholder' => 'default value',
        'titleModel' => 'widgetField0Title',
        'selectModel' => 'widgetField0Select',
        'showSettings' => false,
        'options' => [],
      ],
    ],
    'fieldTypes' => [
      'Checkbox',
      'Color',
      'Date',
      'Email',
      'Number',
      'Password',
      'Radio',
      'Range',
      'Select',
      'Text',
    ],
    'css' => [
      admin_url( 'css/color-picker.css' ),
    ],
    'description' => 'Create custom WordPress meta boxes',
  ];
};