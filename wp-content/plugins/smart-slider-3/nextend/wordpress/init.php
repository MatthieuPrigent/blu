<?php
define('N2WORDPRESS', 1);
define('N2JOOMLA', 0);
define('N2MAGENTO', 0);
define('N2NATIVE', 0);

class N2Wordpress
{

    public static $nextend_head = '', $nextend_wp_head = false, $nextend_wp_footer = false;

    public static function init() {

        add_action('after_setup_theme', 'N2Wordpress::afterSetupTheme');

        if (is_admin()) {
            add_action('admin_init', 'N2Wordpress::outputStart', 3000);
            add_action('vc_admin_inline_editor', 'N2Wordpress::outputStart'); // Visual composer inline editor fix
        } else if (N2Settings::get('safemode')) {
            add_action('wp', 'N2Wordpress::outputStart', 30000);
        } else {
            add_action('wp_head', 'N2Wordpress::outputStart');
        }
    }

    public static function afterSetupTheme() {
        if (class_exists('HeadwayDisplay', false)) {
            add_action('headway_html_close', 'N2Wordpress::afterOutputEnd');
        } else {
            add_action('wp_footer', 'N2Wordpress::afterOutputEnd');
        }
        add_action('admin_footer', 'N2Wordpress::afterOutputEnd');
    }

    public static function outputStart() {
        self::$nextend_wp_head = true;

        if (N2Settings::get('safemode') != 1) {
            ob_start("N2Wordpress::platformRenderEnd");
            ob_start();
        }
    }

    public static function afterOutputEnd() {
        self::$nextend_wp_footer = true;

        if (defined('N2LIBRARY')) {
            ob_start();

            do_action('nextend_css');
            do_action('nextend_js');
            if (class_exists('N2AssetsManager')) {
                echo N2AssetsManager::getCSS();
                echo N2AssetsManager::getJs();
            }
            self::$nextend_head = ob_get_clean();

        }
        if (N2Settings::get('safemode') == 1) echo self::$nextend_head;
        return true;
    }

    public static function platformRenderEnd($buffer) {
        if (self::$nextend_head != '') {
            return preg_replace('/<\/head>/', self::$nextend_head . '</head>', $buffer, 1);
        }
        return $buffer;
    }
}

N2Wordpress::init();

do_action('nextend_loaded');