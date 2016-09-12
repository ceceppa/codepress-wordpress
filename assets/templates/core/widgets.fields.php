<?php
$fn = function( $url ) {
  $fields = array();

  $fields = [
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
  ];

  $field_types = [
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
  ];

  return [
    'preview' => $url . 'widgets.preview.html',
    'title' => 'Widget',
    'functionNameLabel' => __( 'Widget class name', 'cp-wordpress' ),
    'functionName' => 'My_Widget',
    'textDomain' => 'theme-slug',
    'dynamicFields' => $fields,
    'newFieldBaseId' => 'widgetField',
    'fieldTypes' => $field_types,
    'description' => 'Create a new WordPress Widget',
    'css' => [
      home_url( '/wp-includes/css/dashicons.css' ),
      admin_url( 'css/color-picker.css' ),
    ],
  ];
};
