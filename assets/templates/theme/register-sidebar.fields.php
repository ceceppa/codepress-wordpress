<?php
$fn = function( $url ) {
  $fields = array();
  $domainpath = '';

  for( $i = 1; $i <= 5; ++$i ) {
    $fields[] = [
      'id' => $i - 1,
      'label' => 'Sidebar ' . $i,
      'fields' => [
        [
          'name' => 'sidebarName' . $i,
          'label' => __( 'Name' ),
          'type' => 'text',
          'required' => false,
          'default' => '',
          'minLength' => '',
          'placeholder' => sprintf( __('Sidebar %d'), $i ),
          'p' => __( 'Sidebar name.'),
        ],
        [
          'name' => 'sidebarId' . $i,
          'label' => __( 'ID' ),
          'type' => 'text',
          'required' => $i == 1,
          'default' => '',
          'minLength' => '',
          'placeholder' => sprintf( __( 'sidebar-%d' ), $i ),
          'sanitize' => true,
          'p' => __( 'Sidebar id.'),
        ],
        [
          'name' => 'sidebarDescription' . $i,
          'label' => __( 'Description' ),
          'type' => 'text',
          'required' => false,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'p' => __( ' Text description of what/where the sidebar is. Shown on widget management screen'),
        ],
        [
          'name' => 'sidebarClass' . $i,
          'label' => sprintf( __( 'Class' ), $i ),
          'type' => 'text',
          'required' => false,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'p' => __( 'CSS class to assign to the Sidebar in the Appearance -> Widget admin page. This class will only appear in the source of the WordPress Widget admin page. It will not be included in the frontend of your website. Note: The value "sidebar" will be prepended to the class value. For example, a class of "tal" will result in a class value of "sidebar-tal".' ),
        ],
        [
          'name' => 'sidebarBeforeWidget' . $i,
          'label' => __( 'Before Widget' ),
          'type' => 'text',
          'required' => false,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'p' => __( 'HTML to place before every widget(default: <li id="%1$s" class="widget %2$s">)<br><i>Note: uses sprintf for variable substitution</i>' ),
        ],
        [
          'name' => 'sidebarAfterWidget' . $i,
          'label' => __( 'After Widget' ),
          'type' => 'text',
          'required' => false,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'p' => __( 'HTML to place after every widget <i>(default: </li>\n)</i>' ),
        ],
        [
          'name' => 'sidebarBeforeTitle' . $i,
          'label' => __( 'Before Title' ),
          'type' => 'text',
          'required' => false,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'p' => __( 'HTML to place before every title <i>(default: <h2 class="widgettitle">)</i>' ),
        ],
        [
          'name' => 'sidebarAfterTitle' . $i,
          'label' => __( 'After Title' ),
          'type' => 'text',
          'required' => false,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'p' => __( 'HTML to place after every title <i>(default: </h2>\n)</i>' ),
        ],
      ]
    ];
  }

  return [
    'tabLayout' => 1,
    'fields' => $fields,
    'functionName' => 'custom_sidebars',
    'textDomain' => 'theme-slug',
    'description' => 'Register custom dynamic sidebars'
  ];
};
