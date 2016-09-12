<?php
$fn = function( $url ) {
  $fields = array();
  $domainpath = '';

  $fields[] = array(
    'name' => 'pluginName',
    'label' => __( 'Plugin Name' ),
    'type' => 'text',
    'required' => true,
    'default' => '',
    'minLength' => '',
    'placeholder' => __( 'Plugin name', 'bpg-wordpres' ),
    'p' => __( 'Check out Plugins and the other repositories it refers to, to verify that your name is unique; you might also do a Google search on your proposed name. <br />Most Plugin developers choose to use names that somewhat describe what the Plugin does; for instance, a weather-related Plugin would probably have the word "weather" in the name. The name can be multiple words.', 'bpg-wordpres' ),
  );

  $fields[] = array(
    'name' => 'pluginUri',
    'label' => __( 'Plugin Uri' ),
    'type' => 'url',
    'required' => false,
    'default' => '',
    'minLength' => '',
    'placeholder' => 'http://URI_Of_Page_Describing_Plugin_and_Updates',
    'flex' => 66,
    'cssClass' => 'full-width',
    'p' => __( 'Put here the URL that describe your plugin, like your portfolio page.', 'bpg-wordpres' )
  );

  $fields[] = array(
    'name' => 'pluginVersion',
    'label' => __( 'Version' ),
    'type' => 'text',
    'required' => false,
    'default' => '',
    'minLength' => '',
    'placeholder' => '1.0',
    'p' => __( "The plugin's version number.<br />Example: 1.0.0", 'bpg-wordpres' )
  );

  $fields[] = array(
    'name' => 'pluginDescription',
    'label' => __( 'Description' ),
    'type' => 'text',
    'required' => false,
    'default' => '',
    'minLength' => '',
    'placeholder' => 'Description',
    'cssClass' => 'full-width',
    'flex' => 66,
    'p' => __( 'Your plugin description.', 'bpg-wordpres' )
  );

  $fields[] = array(
    'name' => 'pluginAuthor',
    'label' => __( 'Author' ),
    'type' => 'text',
    'required' => false,
    'default' => '',
    'minLength' => '',
    'placeholder' => __( 'Name of the plugin author', 'bpg-wordpres'  ),
    'p' => __( "Name of the plugin author", 'bpg-wordpres' )
  );

  $fields[] = array(
    'name' => 'pluginAuthorUri',
    'label' => __( 'Author URI' ),
    'type' => 'url',
    'required' => false,
    'default' => '',
    'minLength' => '',
    'placeholder' => __( 'http://URI_Of_The_Plugin_Author' ),
    'flex' => 66,
    'p' => __( "Author's personal website", 'bpg-wordpres' )
  );

  $fields[] = array(
    'name' => 'pluginTextdomain',
    'label' => __( 'Text Domain' ),
    'type' => 'text',
    'required' => false,
    'default' => '',
    'minLength' => '',
    'placeholder' => __( 'my-text-domain', 'bpg-wordpres' ),
    'p' => __( "Plugin's text domain for localization.<br />Example: mytextdomain<br />Must be a unique identifier for translation and the same as the one used in load_plugin_textdomain().", 'bpg-wordpres')
  );

  $fields[] = array(
    'name' => 'pluginDomainpath',
    'label' => __( 'Domain Path' ),
    'type' => 'path',
    'required' => false,
    'default' => $domainpath,
    'minLength' => '',
    'placeholder' => '/languages/',
    'flex' => 66,
    'p' => __( "Plugin's relative directory path to .mo files.<br />Example:/ languages/<br />Specify a path if the translations are located in a folder above the plugin's base path. <br />Example: if .mo files are located in the locale folder then Domain Path will be/ languages/ and must have the first slash. If not added, defaults to the base folder the plugin is located in.")
  );

  $fields[] = array(
    'name' => 'pluginNetwork',
    'label' => __( 'Network' ),
    'type' => 'checkbox',
    'required' => false,
    'default' => 0,
    'value' => 1,
    'minLength' => '',
    'p' => __( "Whether the plugin can only be activated network wide<br />Specify true to require that a plugin is activated across all sites in an installation. This will prevent a plugin from being activated on a single site when Multisite is enabled. You don't need to add this line if the plugin can be activated in network-wide mode and single site mode.")
  );

  $fields[] = array(
    'name' => 'pluginLicense',
    'label' => __( 'License' ),
    'type' => 'text',
    'required' => false,
    'default' => '',
    'minLength' => '',
    'placeholder' => __( 'GPL2' ),
    'p' => __( "A short license name. <br />Example: GPL2<br />Is not read by WordPress but is meant to be a simple way of being explicit about the license of the code. The slug should be a short common identifier for the license the plugin is under.")
  );

  return [
    'fields' => $fields,
    'description' => 'Generate plugin header information',
  ];
};
