<?php
/**
 * Plugin Name: Simple Domain Redirect
 * Plugin URI: http://www.jonathanbriehl.com
 * Description: Redirects to the domain of the home url if the site loads with a different domain
 * Version: 1.0.1
 * Author: Jonathan Briehl
 * Author URI: http://www.jonathanbriehl.com
 * License: GPL2
 */

/**  Copyright 2015  Jonathan Briehl  (url : jonathanbriehl.com)
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License, version 2, as
 *  published by the Free Software Foundation.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


if (!function_exists('jb_simple_domain_redirect')) {
    function jb_simple_domain_redirect()
    {
        ($_SERVER['HTTPS']) ? $http = "https://" : $http = "http://";

        $wordpress_url = get_site_url();
        // $http_array = array("http://", "https://");
        // $wordpress_url = str_replace($http_array, "", $wordpress_url);
        $url_domain = $_SERVER['HTTP_HOST'];
        $url_directory = $_SERVER['REQUEST_URI'];

        if ($wordpress_url != $http . $url_domain) {
            Header("HTTP/1.1 301 Moved Permanently");
            Header("Location: " . $wordpress_url . $url_directory);
            die();
        } else {
            // Do nothing
        }
    }

    add_action('init', 'jb_simple_domain_redirect');
}

/* Check For Plugin Updates - host hashed for privacy */
require plugin_dir_path(__FILE__) . '/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://code.jonathanbriehl.com/wordpress-plugins/jb-simple-redirect/update.php?domain=' . md5($_SERVER['HTTP_HOST']),
    __FILE__, //Full path to the main plugin file or functions.php.
    'jb-simple-redirect'
);