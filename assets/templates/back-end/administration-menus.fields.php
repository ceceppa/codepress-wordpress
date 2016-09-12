<?php
require_once CodePressWPPath . '/dashicons.php';

$fn = function( $url ) {
  $domainpath = '';

  $fields = [
    [
      'label' => __( 'Add menu page', 'cp-wordpress' ),
      /**
       * The HTML parameter split the tab in 2 pieces. The firstone will be
       * used to generate the form, the second one I'm gonna use to create a
       * sort of "preview" of the parameters, in order to show how the fields
       * are rendered by WordPress.
       */
      'html' => $url . 'administration-menus.preview-menu.html',
      'fields' => [
        [
          'name' => 'pageTitle',
          'label' => __( 'Page title', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'placeholder' => 'My page',
          /**
           * When the field has focus, want to highlight the respective field
           * inside the browser preview
           */
          'highlight' => 'span.pageTitle',
          'p' => __( 'The text to be displayed in the title tags of the page when the menu is selected.', 'cp-wordpress' ),
        ],
        [
          'name' => 'menuTitle',
          'label' => __( 'Menu title', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'flex' => 66,
          'placeholder' => 'Menu Title',
          'highlight' => 'span.menuTitle',
          'p' => __( 'The text to be used for the menu.', 'cp-wordpress' ),
        ],
        [
          'name' => 'role',
          'label' => __( 'Role', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'Administrator',
          'minLength' => '',
          'placeholder' => 'Administrator',
          'sanitize' => false,
          'cssClass' => 'full-width',
          'flex' => 33,
          'options' => [
            'Super Admin',
            'Administrator',
            'Editor',
            'Author',
            'Contributor',
            'Subscriber',
          ],
        ],

        // Super Admin
        [
          'name' => 'capability',
          'label' => __( 'Capability', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'manage_network',
          'minLength' => '',
          'placeholder' => 'manage_network',
          'sanitize' => false,
          'cssClass' => '',
          'ifField' => 'role',
          'ifEqual' => 'Super Admin',
          'flex' => 66,
          'options' => [
            'manage_network',
            'manage_sites',
            'manage_network_users',
            'manage_network_plugins',
            'manage_network_themes',
            'manage_network_options'
          ],
        ],

        // Administrator
        [
          'name' => 'capability',
          'label' => __( 'Capability', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'manage_options',
          'minLength' => '',
          'placeholder' => 'Administrator',
          'sanitize' => false,
          'cssClass' => '',
          'ifField' => 'role',
          'ifEqual' => 'Administrator',
          'flex' => 66,
          'options' => ['activate_plugins',
            'create_users',
            'delete_plugins',
            'delete_themes',
            'delete_users',
            'edit_files',
            'edit_plugins',
            'edit_theme_options',
            'edit_themes',
            'edit_users',
            'export',
            'import',
            'install_plugins',
            'install_themes',
            'list_users',
            'manage_options',
            'promote_users',
            'remove_users',
            'switch_themes',
            'update_core',
            'update_plugins',
            'update_themes',
            'edit_dashboard'
          ],
        ],

        // Editor
        [
          'name' => 'capability',
          'label' => __( 'Capability', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'moderate_comments',
          'minLength' => '',
          'placeholder' => 'Editor',
          'sanitize' => false,
          'cssClass' => '',
          'ifField' => 'role',
          'ifEqual' => 'Editor',
          'flex' => 66,
          'options' => [
            'moderate_comments',
            'manage_categories',
            'manage_links',
            'edit_others_posts',
            'edit_pages',
            'edit_others_pages',
            'edit_published_pages',
            'publish_pages',
            'delete_pages',
            'delete_others_pages',
            'delete_published_pages',
            'delete_others_posts',
            'delete_private_posts',
            'edit_private_posts',
            'read_private_posts',
            'delete_private_pages',
            'edit_private_pages',
            'read_private_pages',
            'unfiltered_html'
          ],
        ],

        // Author
        [
          'name' => 'capability',
          'label' => __( 'Capability', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'edit_published_posts',
          'minLength' => '',
          'placeholder' => 'Author',
          'sanitize' => false,
          'cssClass' => '',
          'ifField' => 'role',
          'ifEqual' => 'Author',
          'flex' => 66,
          'options' => [
            'edit_published_posts',
            'upload_files',
            'publish_posts',
            'delete_published_posts'
          ],
        ],

        // Contributor
        [
          'name' => 'capability',
          'label' => __( 'Capability', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'edit_posts',
          'minLength' => '',
          'placeholder' => 'Contributor',
          'sanitize' => false,
          'cssClass' => '',
          'ifField' => 'role',
          'ifEqual' => 'Contributor',
          'flex' => 66,
          'options' => [
            'edit_posts',
            'delete_posts'
          ],
        ],

        [
          // Subscriber
          'name' => 'capability',
          'label' => __( 'Capability', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'read',
          'minLength' => '',
          'placeholder' => 'Subscriber',
          'sanitize' => false,
          'cssClass' => '',
          'ifField' => 'role',
          'ifEqual' => 'Subscriber',
          'flex' => 66,
          'options' => [
            'read',
          ],
        ],

        // $menu_slug
        [
          'name' => 'menuSlug',
          'label' => __( 'Menu slug', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => true,
          'highlight' => 'span.menuSlug',
          'p' => __( 'The slug name to refer to this menu by (should be unique for this menu.', 'cp-wordpress' ),
        ],

        // $function
        [
          'name' => 'function',
          'label' => __( 'Function', 'cp-wordpress' ),
          'type' => 'text',
          'required' => false,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => true,
          'flex' => 66,
          'cssClass' => 'full-width',
          'p' => __( 'The function to be called to output the content for this page.', 'cp-wordpress' ),
        ],

        // $icon_url
        [
          'name' => 'iconUrl',
          'label' => __( 'Icon url', 'cp-wordpress' ),
          'type' => 'select',
          'required' => false,
          'default' => 'none',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => false,
          'flex' => 33,
          'keepSpace' => true,
          'options' => [
            'custom',
            'base64',
            'dashicon',
            'none'
          ],
          'highlight' => 'span.menuIcon',
          'p' => __( 'The URL to the icon to be used for this menu. <br> <span class="help-li">Pass a base64-encoded SVG using a data URI, which will be colored to match the color scheme. This should begin with \'data:image/svg+xml;base64,\'.</span> <span class="help-li">Pass the name of a Dashicons helper class to use a font icon.</span> <span class="help-li">Pass \'none\' to leave div.wp-menu-image empty so an icon can be added via CSS.</span>', 'cp-wordpress' ),
        ],

        // $icon_url: custom string
        [
          'name' => 'iconUrlValue',
          'label' => __( 'Custom url', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => true,
          'ifField' => 'iconUrl',
          'ifEqual' => 'custom',
          'flex' => 66,
        ],

        // $icon_url: base64
        [
          'name' => 'iconUrlEncoded',
          'label' => __( 'base64 encoded string', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => true,
          'ifField' => 'iconUrl',
          'ifEqual' => 'base64',
          'cssClass' => 'full-width',
          'flex' => 66,
          'p' => __( 'Pass a base64-encoded SVG using a data URI, which will be colored to match the color scheme. This should begin with \'data:image/svg+xml;base64,\'.', 'cp-wordpress' ),
        ],

        // $icon_url: dashicons
        [
          'name' => 'iconUrlDashicon',
          'label' => __( 'Seach icon', 'cp-wordpress' ),
          'type' => 'dashicons',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => true,
          'ifField' => 'iconUrl',
          'ifEqual' => 'dashicon',
          'cssClass' => 'full-width wp--dashicons',
          'containerClass' => 'wp--dashicons__list',
          'options' => bp_get_dashicons(),
          'flex' => 66,
        ],

        // $position
        [
          'name' => 'position',
          'label' => __( 'Position', 'cp-wordpress' ),
          'type' => 'text',
          'required' => false,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => true,
          'flex' => 33,
          'p' => __( 'The position in the menu order this one should appear.<br><strong>Important Note:</strong> If two menu items use the same position, only one of them will be displayed. Risk of conflict can be reduced by using strings values instead of integers, e.g. ‘63.3’ (string) instead of 63 (integer).', 'cp-wordpress' ),
        ],
      ],
    ],
    [
      'label' => __( 'Add submenu page', 'cp-wordpress' ),
      'html' => $url . 'administration-menus.preview-submenu.html',
      'fields' => [
        [
          'name' => 'parentSlug',
          'label' => __( 'Parent slug', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => false,
          'cssClass' => 'full-width',
          'hasLabels' => true,
          'highlight' => 'span.parentSlug',
          'options' => [
            //If the user fill the "ADD MENU PAGE" slug, gonna show it as option
            '@' => 'menuSlug',
            'index.php' => 'Dashboard',
            'jetpack' => 'Jetpack',
            'edit.php' => 'Posts',
            'upload.php' => 'Media',
            'edit.php?post_type=page' => 'Pages',
            'edit-comments.php' => 'Comments',
            'themes.php' => 'Appearance',
            'plugins.php' => 'Plugins',
            'users.php' => 'Users',
            'tools.php' => 'Tools',
            'options-general.php' => 'Settings',
            '_custom_' => 'custom',
          ],
          'p' => __( 'The slug name for the parent menu (or the file name of a standard WordPress admin page).', 'cp-wordpress' ),
        ],
        [
          'name' => 'parentSlugCustom',
          'label' => __( 'Parent slug', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => true,
          'ifField' => 'parentSlug',
          'ifEqual' => '_custom_',
          'flex' => 66,
          //Want to preserve the layout flow, when the element is not "rendered". So, gonna create an empty div
          'keepSpace' => true,
          'p' => __( 'The slug name for the parent menu (or the file name of a standard WordPress admin page).', 'cp-wordpress' ),
        ],
        [
          'name' => 'subpageTitle',
          'label' => __( 'Page title', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => false,
          'highlight' => 'span.subpageTitle',
          'p' => __( 'The text to be displayed in the title tags of the page when the menu is selected', 'cp-wordpress' ),
        ],
        [
          'name' => 'submenuTitle',
          'label' => __( 'Menu title', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => false,
          'highlight' => 'span.submenuTitle',
          'flex' => 66,
          'p' => __( 'The text to be used for the menu.', 'cp-wordpress' ),
        ],
        [
          'name' => 'subRole',
          'label' => __( 'Role', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'Administrator',
          'minLength' => '',
          'placeholder' => 'Administrator',
          'sanitize' => false,
          'cssClass' => 'full-width',
          'flex' => 33,
          'options' => [
            'Super Admin',
            'Administrator',
            'Editor',
            'Author',
            'Contributor',
            'Subscriber',
          ],
        ],

        // Super Admin
        [
          'name' => 'subCapability',
          'label' => __( 'Capability', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'manage_network',
          'minLength' => '',
          'placeholder' => 'manage_network',
          'sanitize' => false,
          'cssClass' => '',
          'ifField' => 'role',
          'ifEqual' => 'Super Admin',
          'flex' => 66,
          'options' => [
            'manage_network',
            'manage_sites',
            'manage_network_users',
            'manage_network_plugins',
            'manage_network_themes',
            'manage_network_options'
          ],
        ],

        // Administrator
        [
          'name' => 'subCapability',
          'label' => __( 'Capability', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'manage_options',
          'minLength' => '',
          'placeholder' => 'Administrator',
          'sanitize' => false,
          'cssClass' => '',
          'ifField' => 'role',
          'ifEqual' => 'Administrator',
          'flex' => 66,
          'options' => ['activate_plugins',
            'create_users',
            'delete_plugins',
            'delete_themes',
            'delete_users',
            'edit_files',
            'edit_plugins',
            'edit_theme_options',
            'edit_themes',
            'edit_users',
            'export',
            'import',
            'install_plugins',
            'install_themes',
            'list_users',
            'manage_options',
            'promote_users',
            'remove_users',
            'switch_themes',
            'update_core',
            'update_plugins',
            'update_themes',
            'edit_dashboard'
          ],
        ],

        // Editor
        [
          'name' => 'subCapability',
          'label' => __( 'Capability', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'moderate_comments',
          'minLength' => '',
          'placeholder' => 'Editor',
          'sanitize' => false,
          'cssClass' => '',
          'ifField' => 'role',
          'ifEqual' => 'Editor',
          'flex' => 66,
          'options' => [
            'moderate_comments',
            'manage_categories',
            'manage_links',
            'edit_others_posts',
            'edit_pages',
            'edit_others_pages',
            'edit_published_pages',
            'publish_pages',
            'delete_pages',
            'delete_others_pages',
            'delete_published_pages',
            'delete_others_posts',
            'delete_private_posts',
            'edit_private_posts',
            'read_private_posts',
            'delete_private_pages',
            'edit_private_pages',
            'read_private_pages',
            'unfiltered_html'
          ],
        ],

        // Author
        [
          'name' => 'subCapability',
          'label' => __( 'Capability', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'edit_published_posts',
          'minLength' => '',
          'placeholder' => 'Author',
          'sanitize' => false,
          'cssClass' => '',
          'ifField' => 'role',
          'ifEqual' => 'Author',
          'flex' => 66,
          'options' => [
            'edit_published_posts',
            'upload_files',
            'publish_posts',
            'delete_published_posts'
          ],
        ],

        // Contributor
        [
          'name' => 'subCapability',
          'label' => __( 'Capability', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'edit_posts',
          'minLength' => '',
          'placeholder' => 'Contributor',
          'sanitize' => false,
          'cssClass' => '',
          'ifField' => 'role',
          'ifEqual' => 'Contributor',
          'flex' => 66,
          'options' => [
            'edit_posts',
            'delete_posts'
          ],
        ],

        // Subscriber
        [
          'name' => 'subCapability',
          'label' => __( 'Capability', 'cp-wordpress' ),
          'type' => 'select',
          'required' => true,
          'default' => 'read',
          'minLength' => '',
          'placeholder' => 'Subscriber',
          'sanitize' => false,
          'cssClass' => '',
          'ifField' => 'role',
          'ifEqual' => 'Subscriber',
          'flex' => 66,
          'options' => [
            'read',
          ],
        ],
        // $menu_slug
        [
          'name' => 'submenuSlug',
          'label' => __( 'Menu slug', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => true,
          'highlight' => 'span.submenuSlug',
          'p' => __( 'The slug name to refer to this menu by (should be unique for this menu.', 'cp-wordpress' ),
        ],

        [
          'name' => 'subFunction',
          'label' => __( 'Function', 'cp-wordpress' ),
          'type' => 'text',
          'required' => false,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => true,
          'flex' => 33,
          'cssClass' => 'full-width',
          'p' => __( 'The function to be called to output the content for this page', 'cp-wordpress' )
        ]
      ],
    ],
    [
      'label' => __( 'Remove menu page', 'cp-wordpress' ),
      'fields' => [
        [
          'name' => 'removeMenu',
          'label' => __( 'Menu slug', 'cp-wordpress' ),
          'type' => 'select',
          'required' => false,
          'default' => 'none',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => false,
          'flex' => 33,
          'hasLabels' => true,
          'cssClass' => 'full-width',
          'options' => [
            '' => 'none',
            'index.php' => 'Dashboard',
            'jetpack' => 'Jetpack',
            'edit.php' => 'Posts',
            'upload.php' => 'Media',
            'edit.php?post_type=page' => 'Pages',
            'edit-comments.php' => 'Comments',
            'themes.php' => 'Appearance',
            'plugins.php' => 'Plugins',
            'users.php' => 'Users',
            'tools.php' => 'Tools',
            'options-general.php' => 'Settings',
            '_custom_' => 'custom',
          ],
          'p' => __( 'The URL to the icon to be used for this menu. <br> <span class="help-li">Pass a base64-encoded SVG using a data URI, which will be colored to match the color scheme. This should begin with \'data:image/svg+xml;base64,\'.</span> <span class="help-li">Pass the name of a Dashicons helper class to use a font icon.</span> <span class="help-li">Pass \'none\' to leave div.wp-menu-image empty so an icon can be added via CSS.</span>', 'cp-wordpress' ),
        ],
        [
          'name' => 'removeCustom',
          'label' => __( 'Custom menu', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => true,
          'cssClass' => 'full-width',
          'flex' => 33,
          'ifField' => 'removeMenu',
          'ifEqual' => '_custom_',
          'p' => __( 'The slug of the menu (typically the name of the PHP script for the built in menu items; example: edit-comments.php).', 'cp-wordpress' ),
        ],
      ],
    ],
    [
      'label' => __( 'Remove submenu page', 'cp-wordpress' ),
      'fields' => [
        [
          'name' => 'removeMenuSlug',
          'label' => __( 'Menu slug', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => true,
          'cssClass' => 'full-width',
          'flex' => 33,
          'p' => __( 'The slug for the parent menu.', 'cp-wordpress' ),
        ],
        [
          'name' => 'removeSubmenuSlug',
          'label' => __( 'Submenu slug', 'cp-wordpress' ),
          'type' => 'text',
          'required' => true,
          'default' => '',
          'minLength' => '',
          'placeholder' => '',
          'sanitize' => true,
          'cssClass' => 'full-width',
          'flex' => 33,
          'p' => __( 'The slug of the submenu.', 'cp-wordpress' ),
        ],
      ],
    ],
  ];

  return [
    'tabLayout' => 1,
    'fields' => $fields,
    'functionName' => 'register_my_custom_menu',
    'textDomain' => 'theme-slug',
    'layoutType' => 'column',
    /* If false the template.html doesn't show the "The form contain errors...."
    *  message, but is the .code.html that have to take care to hide/show the code
    * This allow me to generate code in according to the selected tab.
    */
    'formCheck' => false,
    'description' => 'Add new menu items to WordPres Admin Panel',
  ];
};
