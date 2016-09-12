<?php
$fn = function( $url ) {
  $domainpath = '';

  $fields = [
    // [
    //   'label' => __( 'Database', 'cp-wordpress' ),
    //   'fields' => [
    //     [
    //       'name' => 'dbName',
    //       'label' => __( 'Name', 'cp-wordpress' ),
    //       'type' => 'text',
    //       'required' => true,
    //       'default' => '',
    //       'minLength' => '',
    //       'sanitize' => true,
    //       'placeholder' => '',
    //       'p' => __( 'The name of the database for WordPress.', 'cp-wordpress' ),
    //     ],
    //     [
    //       'name' => 'dbUser',
    //       'label' => __( 'Username', 'cp-wordpress' ),
    //       'type' => 'text',
    //       'required' => true,
    //       'default' => '',
    //       'minLength' => '',
    //       'flex' => 66,
    //       'placeholder' => '',
    //       'sanitize' => true,
    //       'p' => __( 'MySQL database username.', 'cp-wordpress' ),
    //     ],
    //     [
    //       'name' => 'dbPassword',
    //       'label' => __( 'Password', 'cp-wordpress' ),
    //       'type' => 'password',
    //       'required' => true,
    //       'default' => '',
    //       'minLength' => '',
    //       'placeholder' => '',
    //       'sanitize' => true,
    //       'p' => __( 'MySQL database password.', 'cp-wordpress' ),
    //     ],
    //     [
    //       'name' => 'dbHosr',
    //       'label' => __( 'Hostname', 'cp-wordpress' ),
    //       'type' => 'text',
    //       'required' => true,
    //       'default' => '',
    //       'minLength' => '',
    //       'flex' => 66,
    //       'placeholder' => '',
    //       'sanitize' => true,
    //       'p' => __( 'MySQL hostname.', 'cp-wordpress' ),
    //     ],
    //   ],
    // ],
    [
      'label' => 'Address',
      'fields' => [
        [
          'name' => 'wpHome',
          'label' => __( 'WP_HOME', 'cp-wordpress' ),
          'type' => 'url',
          'placeholder' => 'http://example.com',
          'required' => false,
          'flex' => 33,
          'sanitize' => true,
          'p' => '',
        ],
        [
          'name' => 'wpSiteurl',
          'label' => __( 'WP_SITEURL', 'cp-wordpress' ),
          'type' => 'url',
          'placeholder' => 'http://example.com',
          'required' => false,
          'flex' => 33,
          'sanitize' => true,
          'p' => '',
        ],
      ],
    ],
    [
      'label' => 'Debug',
      'fields' => [
        [
          'name' => 'debug',
          'label' => __( 'Debug', 'cp-wordpress' ),
          'type' => 'switch',
          'required' => false,
          'flex' => 100,
          'p' => __( 'Enabling WP_DEBUG will cause all PHP errors, notices and warnings to be displayed. This is likely to modify the default behavior of PHP which only displays fatal errors and/or shows a white screen of death when errors are reached.', 'cp-wordpress' ),
        ],
        [
          'id' => 'log',
          'name' => 'log',
          'label' => __( 'Log', 'cp-wordpress' ),
          'type' => 'checkbox',
          'p' => __( 'causes all errors to also be saved to a debug.log log file inside the /wp-content/ directory. This is useful if you want to review all notices later or need to view notices generated off-screen (e.g. during an AJAX request or wp-cron run).', 'cp-wordpress' ),
          'ifField' => 'debug',
          'ifEqual' => true,
          'flex' => 33,
          'checked' => true,
          'cssClass' => 'padding-top',
        ],
        [
          'id' => 'display',
          'name' => 'display',
          'label' => __( 'Display', 'cp-wordpress' ),
          'type' => 'checkbox',
          'p' => __( "WP_DEBUG_DISPLAY is another companion to WP_DEBUG that controls whether debug messages are shown inside the HTML of pages or not. The default is 'true' which shows errors and warnings as they are generated. Setting this to false will hide all errors. This should be used in conjunction with WP_DEBUG_LOG so that errors can be reviewed later.", 'cp-wordpress' ),
          'ifField' => 'debug',
          'ifEqual' => true,
          'flex' => 33,
          'checked' => false,
          'cssClass' => 'padding-top',
        ],
        [
          'id' => 'script',
          'name' => 'script',
          'label' => __( 'Script', 'cp-wordpress' ),
          'type' => 'checkbox',
          'p' => __( 'SCRIPT_DEBUG is a related constant that will force WordPress to use the "dev" versions of core CSS and JavaScript files rather than the minified versions that are normally loaded. This is useful when you are testing modifications to any built-in .js or .css files. Default is false.', 'cp-wordpress' ),
          'ifField' => 'debug',
          'ifEqual' => true,
          'flex' => 33,
          'checked' => true,
          'cssClass' => 'padding-top',
        ],
      ],
    ],
  ];

  return [
    'tabLayout' => 1,
    'fields' => $fields,
    // 'functionName' => 'register_my_custom_menu',
    // 'textDomain' => 'theme-slug',
    'layoutType' => 'column',
    /* If false the template.html doesn't show the "The form contain errors...."
    *  message, but is the .code.html that have to take care to hide/show the code
    * This allow me to generate code in according to the selected tab.
    */
    'formCheck' => false,
    'description' => 'Create custom configuration settings for wp-config.php file',
  ];
};
