<?php
$fn = function( $url ) {
  $fields = array();
  $domainpath = '';

  for( $i = 1; $i <= 5; ++$i ) {
    $required = $i == 1;
    $fields[] = [
      'id' => $i - 1,
      'label' => 'Menu ' . $i,
      'fields' => [
        [
          'name' => 'menuName' . $i,
          'label' => sprintf( __( 'Menu %d Name' ), $i ),
          'type' => 'text',
          'required' => $required,
          'default' => '',
          'minLength' => '',
          'placeholder' => sprintf( __( 'menu_%d' ), $i ),
          'sanitize' => true,
          'p' => __( 'Menu location identifier, like a slug.'),
        ],
        [
          'name' => 'menuDescription' . $i,
          'label' => sprintf( __( 'Menu %d Description' ), $i ),
          'type' => 'text',
          'required' => $required,
          'default' => '',
          'minLength' => '',
          'placeholder' => sprintf( __( 'Menu description' ), $i ),
          'p' => __( ' Menu description - for identifying the menu in the dashboard.'),
          'layoutClass' => 'layout-flex',
          'cssClass' => 'full-width',
        ],
      ]
    ];
  }

  return [
    'tabLayout' => 1,
    'fields' => $fields,
    'title' => 'Navigation menus',
    'functionName' => 'register_my_menu',
    'textDomain' => 'theme-slug',
    'description' => 'Add a selectable menu location option in your admin dashboard under Appearance &gt; Menus',
  ];
};
