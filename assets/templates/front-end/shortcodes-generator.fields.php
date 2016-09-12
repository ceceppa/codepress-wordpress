<?php
$fn = function( $url ) {
  $domainpath = '';

  $fields = [
    [
      'name' => 'tag',
      'label' => __( 'Tag', 'cp-wordpress' ),
      'type' => 'text',
      'required' => true,
      'default' => '',
      'minLength' => '',
      'sanitize' => true,
      'placeholder' => 'tag',
      'p' => __( "Shortcode tag to be searched in post content.", 'cp-wordpress' ),
    ],
    [
      'name' => 'shortcode',
      'label' => __( 'Shortcode', 'cp-wordpress' ),
      'type' => 'select',
      'required' => false,
      'default' => '',
      'minLength' => '',
      'sanitize' => false,
      'placeholder' => '',
      'hasLabels' => true,
      'options' => [
        '' => __( 'None', 'cp-wordpress' ),
        'tag' => __( 'Tag name', 'cp-wordpress' ),
        'custom' => __( 'Custom name', 'cp-wordpress' ),
      ],
      'p' => __( "The name of the shortcode, provided for context to enable filtering.", 'cp-wordpress' ),
    ],
    [
      'name' => 'customName',
      'label' => __( 'Custom name', 'cp-wordpress' ),
      'type' => 'text',
      'required' => false,
      'default' => '',
      'sanitize' => true,
      'placeholder' => 'my_custom_name',
      'ifField' => 'shortcode',
      'ifEqual' => 'custom',
      'keepSpace' => true,
      'p' => __( "The name of the shortcode, provided for context to enable filtering.", 'cp-wordpress' ),
    ],
    [
      'label' => __( 'Attributes', 'cp-wordpress' ),
      'name' => 'screen',
      'type' => 'label',
      'flex' => 100,
      'cssClass' => 'padding-top padding-bottom',
      'p' => __( "Shortcode attributes.", 'cp-wordpress' ),
    ],

    // Attributes
    [
      'name' => 'attrName1',
      'label' => __( 'Attribute name', 'cp-wordpress' ),
      'type' => 'text',
      'required' => false,
      'default' => '',
      'sanitize' => true,
      'placeholder' => 'attr_name',
      'flex' => 50,
      'p' => __( "The attribute name.", 'cp-wordpress' ),
    ],
    [
      'name' => 'attrValue1',
      'label' => __( 'Attribute value', 'cp-wordpress' ),
      'type' => 'text',
      'required' => false,
      'default' => '',
      'sanitize' => false,
      'placeholder' => 'my value',
      'flex' => 50,
      'p' => __( "The attribute value.", 'cp-wordpress' ),
    ],
    [
      'name' => 'attrName2',
      'label' => __( 'Attribute name', 'cp-wordpress' ),
      'type' => 'text',
      'required' => false,
      'default' => '',
      'sanitize' => true,
      'placeholder' => 'attr_name',
      'flex' => 50,
      'p' => __( "The attribute name.", 'cp-wordpress' ),
    ],
    [
      'name' => 'attrValue2',
      'label' => __( 'Attribute value', 'cp-wordpress' ),
      'type' => 'text',
      'required' => false,
      'default' => '',
      'sanitize' => false,
      'placeholder' => 'my value',
      'flex' => 50,
      'p' => __( "The attribute value.", 'cp-wordpress' ),
    ],
    [
      'name' => 'attrName3',
      'label' => __( 'Attribute name', 'cp-wordpress' ),
      'type' => 'text',
      'required' => false,
      'default' => '',
      'sanitize' => true,
      'placeholder' => 'attr_name',
      'flex' => 50,
      'p' => __( "The attribute name.", 'cp-wordpress' ),
    ],
    [
      'name' => 'attrValue3',
      'label' => __( 'Attribute value', 'cp-wordpress' ),
      'type' => 'text',
      'required' => false,
      'default' => '',
      'sanitize' => false,
      'placeholder' => 'my value',
      'flex' => 50,
      'p' => __( "The attribute value.", 'cp-wordpress' ),
    ],
    [
      'name' => 'attrName4',
      'label' => __( 'Attribute name', 'cp-wordpress' ),
      'type' => 'text',
      'required' => false,
      'default' => '',
      'sanitize' => true,
      'placeholder' => 'attr_name',
      'flex' => 50,
      'p' => __( "The attribute name.", 'cp-wordpress' ),
    ],
    [
      'name' => 'attrValue4',
      'label' => __( 'Attribute value', 'cp-wordpress' ),
      'type' => 'text',
      'required' => false,
      'default' => '',
      'sanitize' => false,
      'placeholder' => 'my value',
      'flex' => 50,
      'p' => __( "The attribute value.", 'cp-wordpress' ),
    ],
    [
      'name' => 'attrName5',
      'label' => __( 'Attribute name', 'cp-wordpress' ),
      'type' => 'text',
      'required' => false,
      'default' => '',
      'sanitize' => true,
      'placeholder' => 'attr_name',
      'flex' => 50,
      'p' => __( "The attribute name.", 'cp-wordpress' ),
    ],
    [
      'name' => 'attrValue5',
      'label' => __( 'Attribute value', 'cp-wordpress' ),
      'type' => 'text',
      'required' => false,
      'default' => '',
      'sanitize' => false,
      'placeholder' => 'my value',
      'flex' => 50,
      'p' => __( "The attribute value.", 'cp-wordpress' ),
    ],
  ];

  return [
    'fields' => $fields,
    'functionName' => 'bp_custom_shortcode',
    'textDomain' => 'theme-slug',
    'layoutType' => 'column',
    'description' => 'Create custom shortcode',
  ];
};