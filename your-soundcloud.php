<?php
/*
Plugin Name: Your Soundcloud
Plugin URI: http://nhanhoasolutions.com/your-soundcloud-wordpress-plugin
Description: <strong><a href="http://nhanhoasolutions.com/your-soundcloud-wordpress-plugin">Your Soundcloud</a></strong> 
integrates perfectly into wordpress. Browse through your soundcloud tracks and manage (add, edit, delete) them. Browse your friends track sets and favorites from the "friend's tracks" tab with the post's 'upload media' popup window. 
Select, set and add track, sets or favorites to your post using the soundcloud player. Live Preview, easy, smart and straightforward. You can set default settings in the option page, choose your defaut soundcloud player 
(Mini, Standard, Artwork, html5), its width, extra classes for you CSS lovers and 
your favorite colors. You'll still be able to set players to different settings 
before adding to your post if you fancy a one off change. 
Now with Html5 player and Widget!
Version: 1.0
Author: Nguyen Doan Duc Nha
Author URI: http://nhanhoasolutions.com/about-me
License: GPL2 or Later
*/
define ('YSC_PLUGIN_DIR', WP_PLUGIN_DIR.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) );
define ('YSC_PLUGIN_URL', WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) );
if(!class_exists('YourSoundcloud')) 
{
    class YourSoundcloud 
    {
        
        function __construct() {
			add_action( 'init', array( &$this, 'init' ) );
			add_action( 'admin_init', array( &$this, 'admin_init' ) );
			add_action( 'admin_menu', array( &$this, 'admin_menu' ) );
		}
        function init(){
            
        }
        function admin_init(){
            
        }
        function admin_menu() {
            $scu_admin_page = add_menu_page('Your SC', 'Your SC', 'manage_options', 'ysc', array(&$this, 'ysc_pages'), YSC_PLUGIN_URL.'images/soundcloud-icon.png');
        }
        function ysc_pages() {
            include YSC_PLUGIN_DIR . 'includes/tabs.php';
            $sub_page_id = isset($_GET['sub_page_id'])?$_GET['sub_page_id']:'settings';
            switch($sub_page_id) {
                case 'settings':
                    include YSC_PLUGIN_DIR . 'includes/settings.php';
                    break;
                case 'your-tracks':
                    include YSC_PLUGIN_DIR . 'includes/your-tracks.php';
                    break;
                case 'friends-s-tracks':
                    include YSC_PLUGIN_DIR . 'includes/friends-s-tracks.php';
                    break;
                case 'templates':
                    include YSC_PLUGIN_DIR . 'includes/templates.php';
                    break;
                case 'tutorial':
                    include YSC_PLUGIN_DIR . 'includes/tutorial.php';
                    break;
                default:
                    include YSC_PLUGIN_DIR . 'includes/settings.php';
                    break; 
            }
            exit;
        }
    }
}
$your_soundcloud = new YourSoundcloud();