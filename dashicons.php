<?php
/**
 * The available dashicons are parsed from the wp-include/css/dashicons.css.
 * But, as the parsing process is not fast at all, I'm gonna do it only the first time
 * and store the result in a json file.
 * Also, gonna store the stat of the original file, as in case of update need to
 * parse it for new icons.
 */
function bp_get_dashicons() {
  $json_file = trailingslashit( dirname( __FILE__ ) ) . 'dashicons.jsonp';

  if( file_exists( $json_file ) ) {
    $content = file_get_contents( $json_file );
    $icons = json_decode( $content );
  } else {
    $icons = bp_get_dashicons_from_wp();

    file_put_contents( $json_file, json_encode( $icons, JSON_PRETTY_PRINT ) );
  }

  return $icons;
}

/**
 * Pase the wp-include/css/dashicons.css file to retrieve the list of available dashicons
 */
function bp_get_dashicons_from_wp() {
  $css = file_get_contents( ABSPATH . '/wp-includes/css/dashicons.css');
  $results = [];
  $icons = [];

  //Break css
  preg_match_all('/(.+?)\s?\{\s?(.+?)\s?\}/', $css, $matches);
  foreach($matches[0] AS $i=> $original) {
    foreach(explode(';', $matches[2][$i]) AS $attr) {
        if (strlen(trim($attr)) > 0) // for missing semicolon on last element, which is legal
        {
            list($name, $value) = explode(':', $attr);
            $results[$matches[1][$i]][trim($name)] = trim($value);
        }
    }
  }

  // error_log( print_r( $matches, true ) );

  foreach( $results as $dashicon => $content ) {
    preg_match('/\.(.*):/', $dashicon, $out );

    $icons[] = $out[1];
  }

  return $icons;
}
