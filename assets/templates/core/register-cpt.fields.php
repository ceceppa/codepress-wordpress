<?php
require_once CodePressWPPath . '/dashicons.php';

$fn = function( $url ) {
  $fields = array();
  $domainpath = '';

  //Settings
  $settings = array();
  $archive = array();
  $visibility = array();

  $visibility[] = array(
    'name' => 'cptIsPublic',
    'label' => 'Public',
    'type' => 'checkbox',
    'required' => false,
    'checked' => true,
    'minLength' => '',
    'p' => "Controls how the type is visible to authors (show_in_nav_menus, show_ui) and readers (exclude_from_search, publicly_queryable).<br><i>Default: false</i><br><br><span class=\"help-li\"><strong>'true'</strong> - Implies exclude_from_search: false, publicly_queryable, show_in_nav_menus, and show_ui. The built-in types attachment, page, and post are similar to this.</span><span class=\"help-li\"><strong>'false'</strong> - Implies exclude_from_search: true, publicly_queryable: false, show_in_nav_menus: false, and show_ui: false. The built-in types nav_menu_item and revision are similar to this. Best used if you'll provide your own editing and viewing interfaces (or none at all).</span>If no value is specified for exclude_from_search, publicly_queryable, show_in_nav_menus, or show_ui, they inherit their values from public.",
  );

  $visibility[] = array(
    'name' => 'cptShowUi',
    'label' => 'Show UI',
    'type' => 'checkbox',
    'required' => false,
    'checked' => true,
    'minLength' => '',
    'default' => 'cptIsPublic',
    'p' => "Whether to generate a default UI for managing this post type in the admin",
  );

  $visibility[] = array(
    'name' => 'cptShowInNavMenu',
    'label' => "Show in nav menu",
    'type' => 'checkbox',
    'required' => false,
    'checked' => true,
    'minLength' => '',
    'default' => 'cptIsPublic',
    'p' => "Whether post_type is available for selection in navigation menus.",
  );

  $visibility[] = array(
    'name' => 'cptShowInAdminBar',
    'label' => "Show in admin bar",
    'type' => 'checkbox',
    'required' => false,
    'checked' => true,
    'minLength' => '',
    'default' => 'cptShowInNavMenu',
    'p' => "Whether to make this post type available in the WordPress admin bar.",
  );

  $archive[] = array(
    'name' => 'cptHasArchive',
    'label' => 'has_archive',
    'type' => 'checkbox',
    'required' => false,
    'checked' => false,
    'minLength' => '',
    'p' => 'Enables post type archives. Will use $post_type as archive slug by default.',
  );

  $archive[] = array(
    'name' => 'cptArchiveSlug',
    'label' => 'Archive slug',
    'type' => 'text',
    'required' => false,
    'checked' => false,
    'minLength' => '',
    'ifField' => 'cptHasArchive',
    'ifEqual' => true,
    'p' => 'This string will be used to generate the archive URL.<br><br>Default: Post type',
  );

  $settings[] = array(
    'name' => 'cptHierarchical',
    'label' => 'Hierarchical',
    'type' => 'checkbox',
    'required' => false,
    'checked' => false,
    'minLength' => '',
    'p' => "Whether the post type is hierarchical (e.g. page). Allows Parent to be specified. The 'supports' parameter should contain 'page-attributes' to show the parent select box on the editor page.<br><br><i>Default: false</i><br><br><strong>Note:</strong> this parameter was planned for Pages. Be careful, when choosing it for your custom post type - if you are planning to have many entries (say - over 100), you will run into memory issue. With this parameter set to true WordPress will fetch all entries of that particular post type, together with all meta data, on each administration page load for your post type.",
  );

  $settings[] = array(
    'name' => 'cptExcludeFromSearch',
    'label' => 'Exclude from search',
    'type' => 'checkbox',
    'required' => false,
    'checked' => false,
    'minLength' => '',
    'default' => '!cptIsPublic',
    'p' => "Whether to exclude posts with this post type from front end search results.<br><i>Default: value of the <strong>opposite</strong> of public argument</i><br><span class=\"help-li\"><strong>'true'</strong> - site/?s=search-term will not include posts of this post type.</span><span class=\"help-li\"><strong>'false'</strong> - site/?s=search-term will include posts of this post type.</span><br><br><strong>Note:</strong> If you want to show the posts's list that are associated to taxonomy's terms, you must set exclude_from_search to false (ie : for call site_domaine/?taxonomy_slug=term_slug or site_domaine/taxonomy_slug/term_slug). If you set to true, on the taxonomy page (ex: taxonomy.php) WordPress will not find your posts and/or pagination will make 404 error...",
  );

  $settings[] = array(
    'name' => 'cptPubliclyQueryable',
    'label' => 'Publicly Queryable',
    'type' => 'checkbox',
    'required' => false,
    'checked' => true,
    'minLength' => '',
    'default' => 'cptIsPublic',
    'p' => "Whether queries can be performed on the front end as part of parse_request().<br><i>Default: value of public argument</i><br><br><strong>Note:</strong> The queries affected include the following (also initiated when rewrites are handled)<br><span class=\"help-li\">?post_type={post_type_key}</span><span class=\"help-li\">?{post_type_key}={single_post_slug}</span><span class=\"help-li\">?{post_type_query_var}={single_post_slug}</span><br><strong>Note:</strong> If query_var is empty, null, or a boolean FALSE, WordPress will still attempt to interpret it (4.2.2) and previews/views of your custom post will return 404s.",
  );

  $settings[] = array(
    'name' => 'cptQueryVar',
    'label' => 'query_var',
    'type' => 'checkbox',
    'required' => false,
    'checked' => true,
    'minLength' => '',
    'p' => "Sets the query_var key for this post type.<br><i>Default: true - set to \$post_type</i><br><span class=\"help-li\">'false' - Disables query_var key use. A post type cannot be loaded at /?{query_var}={single_post_slug}</span><span class=\"help-li\">'string' - /?{query_var_string}={single_post_slug} will work as intended.</li><br><br><strong>Note:</strong> The query_var parameter has no effect if the 'publicly_queryable' parameter is set to false. query_var adds the custom post type’s query var to the built-in query_vars array so that WordPress will recognize it. WordPress removes any query var not included in that array.<br> If set to true it allow you to request a custom posts type (book) using this: example.com/?book=life-of-pi<br>If set to a string rather than true (for example ‘publication’), you can do: example.com/?publication=life-of-pi",
  );

  $settings[] = array(
    'name' => 'cptCanExport',
    'label' => 'can_export',
    'type' => 'checkbox',
    'required' => false,
    'checked' => true,
    'minLength' => '',
    'p' => "Can this post_type be exported.",
  );

  $icon = [
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
          'dashicon',
          'default'
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
        'p' => __( 'Example<br> get_template_directory_uri() . "/images/cutom-posttype-icon.png" (Use a image located in the current theme)', 'cp-wordpress' ),
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
        'containerClass' => 'wp--dashicons__list wp--dashicons__list--cpt',
        'options' => bp_get_dashicons(),
        'flex' => 66,
      ],
    ];

  // Lables
  $labels = array();

  $labels[] = array(
    'name' => 'cptAllItems',
    'label' => 'All Items',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'All Posts',
    'p' => "The all items text used in the menu.",
  );

  $labels[] = array(
    'name' => 'cptAddNew',
    'label' => 'Add New',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'Add New',
    'p' => "The add new text. The default is <i>Add New</i> for both hierarchical and non-hierarchical post types.",
  );

  $labels[] = array(
    'name' => 'cptAddNewItem',
    'label' => 'Add New Item',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => "Add New Item",
    'p' => "the add new item text. Default is Add New Post/Add New Page",
  );

  $labels[] = array(
    'name' => 'cptEditItem',
    'label' => 'Edit Item',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'Edit Post',
    'p' => "the edit item text. In the UI, this label is used as the main header on the post's editing panel. The default is <strong>Edit</strong>.",
  );

  $labels[] = array(
    'name' => 'cptNewItem',
    'label' => 'New Item',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'New Post',
    'p' => "the new item text. Default is <strong>New Post</strong> for non-hierarchical and <strong>New Page</strong> for hierarchical post types.",
  );

  $labels[] = array(
    'name' => 'cptViewItem',
    'label' => 'View Item',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'View Post',
    'p' => "the view item text. Default is View Post/View Page.",
  );

  $labels[] = array(
    'name' => 'cptSearchItems',
    'label' => 'Search Items',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'Search Post',
    'p' => "the search items text. Default is Search Posts/Search Pages.",
  );

  $labels[] = array(
    'name' => 'cptNotFound',
    'label' => 'Not Found',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'No Post found',
    'p' => "the not found text. Default is No posts found/No pages found.",
  );

  $labels[] = array(
    'name' => 'cptNotFoundInTrash',
    'label' => 'Not Found in Trash',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'No Post found in Trash',
    'p' => "the not found in trash text. Default is No posts found in Trash/No pages found in Trash.",
  );

  $labels[] = array(
    'name' => 'cptParentItemColon',
    'label' => 'Parent item colon',
    'type' => 'text',
    'required' => false,
    'value' => ':',
    'minLength' => '',
    'placeholder' => 'Parent Page',
    'p' => "the parent text. This string is used only in hierarchical post types. Default is <strong>Parent Page</strong>.",
  );

  $supports = array();

  $supports[] = array(
    'key' => 'Title',
    'label' => 'Title',
    'checked' => true,
    'value' => 'title'
  );

  $supports[] = array(
    'key' => 'Editor',
    'label' => 'Editor',
    'checked' => true,
    'value' => 'editor'
  );

  $supports[] = array(
    'key' => 'Author',
    'label' => 'Author',
    'value' => 'author'
  );

  $supports[] = array(
    'key' => 'Thumbnail',
    'label' => 'Thumbnail',
    'value' => 'thumbnail'
  );

  $supports[] = array(
    'key' => 'Excerpt',
    'label' => 'Excerpt',
    'value' => 'excerpt'
  );

  $supports[] = array(
    'key' => 'Trackbacks',
    'label' => 'Trackbacks',
    'value' => 'trackbacks'
  );

  $supports[] = array(
    'key' => 'Custom fields',
    'label' => 'Custom fields',
    'value' => 'custom-fields'
  );

  $supports[] = array(
    'key' => 'Comments',
    'label' => 'Comments',
    'value' => 'comments'
  );

  $supports[] = array(
    'key' => 'Revisions',
    'label' => 'Revisions',
    'value' => 'revisions'
  );

  $supports[] = array(
    'key' => 'Page Attributes',
    'label' => 'Page Attributes',
    'value' => 'page-attributes'
  );

  $supports[] = array(
    'key' => 'Post Formats',
    'label' => 'Post formats',
    'value' => 'post-formats'
  );

  // Capabilities
  $capabilities = [
    'createPosts' => 'Create {slug}s',
    'editPost' => 'Edit {slug}',
    'editPosts' => 'Edit {slug}s',
    'editOthersPosts' => 'Edit Others {slug}s',
    'editPrivatePosts' => 'Edit Private {slug}s',
    'editPublishedPosts' => 'Edit Published {slug}s',
    'deletePost' => 'Delete {slug}',
    'deletePosts' => 'Delete {slug}s',
    'deletePrivatePosts' => 'Delete Private {slug}s',
    'deletePublishedPosts' => 'Delete Published {slug}s',
    'deleteOthersPosts' => 'Delete Others {slug}s',
    'publishPosts' => 'Publish {slug}s',
    'readPost' => 'Read {slug}',
    'readPrivatePosts' => 'Read Private {slug}s',
    'read' => 'Read',
  ];

  $cap_labels = [
    "createPosts" => "Create Posts",
    "editPost" => "Edit Post",
    "editPosts" => "Edit Posts",
    "editOthersPosts" => "Edit Others Posts",
    "editPrivatePosts" => "Edit Private Posts",
    "editPublishedPosts" => "Edit Published Posts",
    "deletePost" => "Delete Post",
    "deletePosts" => "Delete Posts",
    "deletePrivatePosts" => "Delete Private Posts",
    "deletePublishedPosts" => "Delete Published Posts",
    "deleteOthersPosts" => "Delete Others Posts",
    "publishPosts" => "Publish Posts",
    "readPost" => "Read Post",
    "readPrivatePosts" => "Read Private Posts",
    "read" => "Read",
  ];

  $capability = [];
  foreach( $capabilities as $key => $c ) {
    $capability[] = [
      'name' => 'cptCap' . str_replace( ' ', '', $c ),
      'label' => $cap_labels[$key],
      'placeholder' => $c,
    ];
  }

  //Rewrite
  $rewrite = [
    [
      'label' => 'with_front',
      'help' => "Should the permalink structure be prepended with the front base. (example: if your permalink structure is /blog/, then your links will be: <span class=\"help-li\">false-&gt;/news/</span><span class=\"help-li\">true-&gt;/blog/news/</span>",
      'key' => 'withFront',
      'checked' => true,
    ],
    [
      'label' => 'Feeds',
      'help' => 'Should a feed permalink structure be built for this post type. Defaults to has_archive value.',
      'key' => 'feeds',
      'checked' => false,
    ],
    [
      'label' => 'with_front',
      'help' => 'Should the permalink structure provide for pagination. Defaults to true',
      'key' => 'pages',
      'checked' => true,
    ],
  ];

  $rewrites = [];
  foreach( $rewrite as $r ) {
    $rewrites[] = [
      'key' => $r['key'],
      'label' => $r['label'],
      'help' => $r['help'],
      'checked' => $r['checked'],
    ];
  }

  //EpMask
  $epMask = [
    'EP_NONE',
    'EP_PERMALINK',
    'EP_ATTACHMENT',
    'EP_DATE',
    'EP_YEAR',
    'EP_MONTH',
    'EP_DAY',
    'EP_ROOT',
    'EP_COMMENTS',
    'EP_SEARCH',
    'EP_CATEGORIES',
    'EP_TAGS',
    'EP_AUTHORS',
    'EP_PAGES',
    'EP_ALL_ARCHIVES',
    'EP_ALL',
  ];

  return [
    'labels' => $labels,
    'supports' => $supports,
    'settings' => $settings,
    'archive' => $archive,
    'visibility' => array_merge( $visibility, $icon ),
    'capabilities' => $capability,
    'rewrite' => $rewrites,
    'epmask' =>  $epMask,
    'preview' => $url . 'register-cpt.preview.html',
    'functionName' => 'custom_post_type',
    'textDomain' => 'my-textdomain',
    'title' => 'Register Custom Post Type',
    'description' => 'Register custom post type',
  ];
};
