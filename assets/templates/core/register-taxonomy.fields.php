<?php
$fn = function( $url ) {
  $fields = array();
  $domainpath = '';

  //Settings
  $settings = array();

  $settings[] = array(
    'name' => 'ctIsPublic',
    'label' => 'Public',
    'type' => 'checkbox',
    'required' => false,
    'checked' => true,
    'minLength' => '',
    'p' => "Controls how the type is visible to authors (show_in_nav_menus, show_ui) and readers (exclude_from_search, publicly_queryable).<br><i>Default: false</i><br><br><span class=\"help-li\"><strong>'true'</strong> - Implies exclude_from_search: false, publicly_queryable, show_in_nav_menus, and show_ui. The built-in types attachment, page, and post are similar to this.</span><span class=\"help-li\"><strong>'false'</strong> - Implies exclude_from_search: true, publicly_queryable: false, show_in_nav_menus: false, and show_ui: false. The built-in types nav_menu_item and revision are similar to this. Best used if you'll provide your own editing and viewing interfaces (or none at all).</span>If no value is specified for exclude_from_search, publicly_queryable, show_in_nav_menus, or show_ui, they inherit their values from public.",
  );

  $settings[] = array(
    'name' => 'ctShowUi',
    'label' => 'Show UI',
    'type' => 'checkbox',
    'required' => false,
    'checked' => true,
    'minLength' => '',
    'default' => 'ctIsPublic',
    'p' => "Whether to generate a default UI for managing this post type in the admin",
  );

  $settings[] = array(
    'name' => 'ctShowInMenu',
    'label' => 'Show in menu',
    'type' => 'checkbox',
    'required' => false,
    'checked' => true,
    'minLength' => '',
    'default' => 'ctShowUi',
    'p' => "Where to show the taxonomy in the admin menu. show_ui must be true.<br><i class=\"indent\">Default: value of show_ui argument</i><br><br><span class=\"help-li\">'false' - do not display in the admin menu</span><span class=\"help-li\">'true' - show as a submenu of associated object types</span>",
  );

  $settings[] = array(
    'name' => 'ctShowInNavMenu',
    'label' => 'Show in nav menu',
    'type' => 'checkbox',
    'required' => false,
    'checked' => true,
    'minLength' => '',
    'default' => 'ctIsPublic',
    'p' => "Where to show the taxonomy in the admin menu. show_ui must be true.<br><i class=\"indent\">Default: value of show_ui argument</i><br><br><span class=\"help-li\">'false' - do not display in the admin menu</span><span class=\"help-li\">'true' - show as a submenu of associated object types</span>",
  );

  $settings[] = array(
    'name' => 'ctShowTagCloud',
    'label' => 'Show tagcloud',
    'type' => 'checkbox',
    'required' => false,
    'checked' => true,
    'minLength' => '',
    'default' => 'ctShowUi',
    'p' => "Whether to allow the Tag Cloud widget to use this taxonomy.<br><i class=\"indent\">Default: if not set, defaults to value of show_ui argument</i>",
  );

  $settings[] = array(
    'name' => 'ctShowInQuickEdit',
    'label' => 'Show in quick edit',
    'type' => 'checkbox',
    'required' => false,
    'checked' => true,
    'minLength' => '',
    'default' => 'ctShowUi',
    'p' => "Whether to show the taxonomy in the quick/bulk edit panel. (Available since 4.2)<br><i class=\"indent\">Default: if not set, defaults to value of show_ui argument</i>",
  );

  $settings[] = array(
    'name' => 'ctShowAdminColumn',
    'label' => 'Show admin column',
    'type' => 'checkbox',
    'required' => false,
    'checked' => false,
    'minLength' => '',
    'p' => "Whether to allow automatic creation of taxonomy columns on associated post-types table. (Available since 3.5)<br><i class=\"indent\">Default: false</i>",
  );

  $settings[] = array(
    'name' => 'ctHierarchical',
    'label' => 'Hierarchical',
    'type' => 'checkbox',
    'required' => false,
    'checked' => false,
    'minLength' => '',
    'p' => "Whether the post type is hierarchical (e.g. page). Allows Parent to be specified. The 'supports' parameter should contain 'page-attributes' to show the parent select box on the editor page.<br><br><i>Default: false</i><br><br><strong>Note:</strong> this parameter was planned for Pages. Be careful, when choosing it for your custom post type - if you are planning to have many entries (say - over 100), you will run into memory issue. With this parameter set to true WordPress will fetch all entries of that particular post type, together with all meta data, on each administration page load for your post type.",
  );

  $settings[] = array(
    'name' => 'ctSort',
    'label' => 'Sort',
    'type' => 'checkbox',
    'required' => false,
    'checked' => false,
    'minLength' => '',
    'p' => "Whether this taxonomy should remember the order in which terms are added to objects.<br><i class=\"indent\">Default: None</i>",
  );

  // Lables
  $labels = array();

  $labels[] = array(
    'name' => 'ctName',     //field name
    'label' => 'Name',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'Post Tags',
    'placeholderCategory' => 'Categories',
    'p' => "general name for the taxonomy, usually plural. The same as and overridden by $tax->label.",
  );

  $labels[] = array(
    'name' => 'ctSingularName',
    'label' => 'Singular Name',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'Post Tag',
    'placeholderCategory' => 'Category',
    'p' => "name for one object of this taxonomy.",
  );

  $labels[] = array(
    'name' => 'ctMenuName',
    'label' => 'Menu name',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'defaultPlaceholder' => 'ctName',
    'placeholder' => 'Post Tags',
    'placeholderCategory' => 'Categories',
    'p' => "the menu name text. This string is the name to give menu items. If not set, defaults to value of name label.",
  );

  $labels[] = array(
    'name' => 'ctAllItems',
    'label' => 'All Items',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'All Tags',
    'placeholderCategory' => 'All Category',
    'p' => "the all items text.",
  );

  $labels[] = array(
    'name' => 'ctEditItem',
    'label' => 'Edit Item',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'Edit Tag / Edit Category',
    'placeholderCategory' => 'Edit Category',
    'p' => 'the edit item text.',
  );

  $labels[] = array(
    'name' => 'ctViewItem',
    'label' => 'View Item',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'View Tag',
    'placeholderCategory' => 'View Category',
    'p' => 'the view item text.',
  );

  $labels[] = array(
    'name' => 'ctUpdateItem',
    'label' => 'Update item',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'Update Tag',
    'placeholderCategory' => 'Update Category',
    'p' => 'the update item text.',
  );

  $labels[] = array(
    'name' => 'ctAddNewItem',
    'label' => 'Add New Item',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => "Add New Tag",
    'placeholderCategory' => 'Add New Category',
    'p' => 'the add new item text.',
  );

  $labels[] = array(
    'name' => 'ctNewItemName',
    'label' => 'New Item Name',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'New Tag Name',
    'placeholderCategory' => 'New Category Name',
    'p' => 'the new item name text.',
  );

  $labels[] = array(
    'name' => 'ctParentItem',
    'label' => 'Parent Item',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'Parent Category',
    'noHierarchical' => true, //Show only for hierarchical mode
    'p' => "the parent item text. This string is not used on non-hierarchical taxonomies such as post tags. <br><i class=\"indent\">Default is null or __( 'Parent Category' )</i>",
  );

  $labels[] = array(
    'name' => 'ctParentItemColon',
    'label' => 'Parent item colon',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'defaultPlaceholder' => 'ctParentItem',
    'placeholder' => 'Parent Category:',
    'noHierarchical' => true,
    'p' => "The same as parent_item, but with colon : in the end null",
  );

  $labels[] = array(
    'name' => 'ctSearchItems',
    'label' => 'Search Items',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'Search Post',
    'placeholderCategory' => 'Search Categories',
    'p' => 'the search items text.',
  );

  $labels[] = array(
    'name' => 'ctPopularItems',
    'label' => 'Populer Items',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'Popular Tags',
    'noHierarchical' => true, //hide for hierarchical mode
    'p' => "the popular items text. This string is not used on hierarchical taxonomies.<br><i class=\"indent\">Default is __( 'Popular Tags' ) or null</i>",
  );

  $labels[] = array(
    'name' => 'ctSeparateItems',
    'label' => 'Separate items with commas',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'Popular Tags',
    'noHierarchical' => true,
    'p' => "the separate item with commas text used in the taxonomy meta box. This string is not used on hierarchical taxonomies.",
  );

  $labels[] = array(
    'name' => 'ctAddRemove',
    'label' => 'Add or remove items',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'Popular Tags',
    'noHierarchical' => true,
    'p' => "the add or remove items text and used in the meta box when JavaScript is disabled.",
  );

  $labels[] = array(
    'name' => 'ctChooseFrom',
    'label' => 'Choose from most used',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'Popular Tags',
    'noHierarchical' => true,
    'p' => "the choose from most used text used in the taxonomy meta box.<br><i class=\"indent\">Default is __( 'Choose from the most used tags' )</i>",
  );

  $labels[] = array(
    'name' => 'ctNotFound',
    'label' => 'Not Found',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'minLength' => '',
    'placeholder' => 'No tags found',
    'placeholderCategory' => 'No categories found',
    'p' => "(3.6+) - the text displayed via clicking 'Choose from the most used tags' in the taxonomy meta box when no tags are available and (4.2+) - the text used in the terms list table when there are no items for a taxonomy.",
  );

  // Capabilities
  $capabilities = array(
    'manageTerms' => 'Manage categories',
    'editTerms' => 'Edit terms',
    'deleteTerms' => 'Delete terms',
    'assignTerms' => 'Assign terms',
  );

  $capability = [];
  foreach( $capabilities as $key => $c ) {
    $capability[] = [
      'name' => 'cptCap' . str_replace( ' ', '', $c ),
      'label' => $c,
      'placeholder' => $c,
    ];
  }

  //Callbacks
  $callbacks = array();

  $callbacks[] = array(
    'name' => 'ctMetaBoxCb',
    'label' => 'Meta box callback',
    'type' => 'text',
    'required' => false,
    'minLength' => '',
    'default' => '',
    'p' => "Provide a callback function name for the meta box display. (Available since 3.8)<br><i class=\"indent\">Default: null</i><br><br><strong>Note:</strong> Defaults to the categories meta box (post_categories_meta_box() in meta-boxes.php) for hierarchical taxonomies and the tags meta box (post_tags_meta_box()) for non-hierarchical taxonomies. No meta box is shown if set to false.",
  );

  $callbacks[] = array(
    'name' => 'ctUpdateCount',
    'label' => 'Update count callback',
    'type' => 'text',
    'required' => false,
    'minLength' => '',
    'default' => '',
    'p' => "A function name that will be called when the count of an associated $object_type, such as post, is updated. Works much like a hook.<br><i class=\"indent\">Default: None - but see Note, below.</i><br><br><strong>Note:</strong> While the default is '', when actually performing the count update in wp_update_term_count_now(), if the taxonomy is only attached to post types (as opposed to other WordPress objects, like user), the built-in _update_post_term_count() function will be used to count only published posts associated with that term, otherwise _update_generic_term_count() will be used instead, that does no such checking.<br><br>This is significant in the case of <strong>attachments</strong>. Because an attachment is a type of post, the default _update_post_term_count() will be used. However, this may be undesirable, because this will only count attachments that are actually attached to another post (like when you insert an image into a post). This means that attachments that you simply upload to WordPress using the Media Library, but do not actually attach to another post will not be counted. If your intention behind associating a taxonomy with attachments was to leverage the Media Library as a sort of Document Management solution, you are probably more interested in the counts of unattached Media items, than in those attached to posts. In this case, you should force the use of _update_generic_term_count() by setting '_update_generic_term_count' as the value for update_count_callback.",
  );

  //Rewrite
  $rewrite = [
    [
      'label' => 'with_front',
      'help' => "Should the permalink structure be prepended with the front base. (example: if your permalink structure is /blog/, then your links will be: <span class=\"help-li\">false-&gt;/news/</span><span class=\"help-li\">true-&gt;/blog/news/</span>",
      'key' => 'withFront',
      'checked' => true,
    ],
    [
      'label' => 'Hierarchical',
      'help' => 'true or false allow hierarchical urls (implemented in Version 3.1) - defaults to false.',
      'key' => 'hierarchical',
      'checked' => false,
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
    'capabilities' => $capability,
    'callbacks' => $callbacks,
    'rewrite' => $rewrites,
    'epmask' =>  $epMask,
    'preview' => $url . 'register-taxonomy.preview.html',
    'functionName' => 'create_custom_taxonomy',
    'textDomain' => 'my-textdomain',
    'description' => 'Register custom taxonomy',
  ];
};
