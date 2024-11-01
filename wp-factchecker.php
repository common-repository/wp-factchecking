<?php
/**
 * @package WP-Factchecker
 * @author Michele Pinassi
 * @version 0.0.1
 */
/*
Plugin Name: WP-Factchecker
Plugin URI: http://www.zerozone.it
Description: This plugin allows to submit news for checking to italian fact-checker service http://factchecking.civiclinks.it
Author: Michele Pinassi
Version: 0.0.1
Author URI: http://www.zerozone.it
License: GPL3
*/

define ('FACT_CHECKER_PATH', plugin_dir_path (__FILE__));
define ('FACT_CHECKER_URL', plugin_dir_url (__FILE__));

add_filter( 'the_content', 'fact_checker_link', 20 );

function fact_checker_link( $content ) {
    if(is_single()) {
        // Add image to the beginning of each page
        $content = sprintf(
            '<a href="http://factchecking.civiclinks.it/m/push/?url=%s"><img class="fact-icon" src="%s/images/fact_icon.png" alt="Verifica questa notizia !" title="Verifica questa notizia !"/></a>%s',
	    urlencode(get_permalink()),
            FACT_CHECKER_URL,
            $content
        );
    }
    // Returns the content.
    return $content;
}
