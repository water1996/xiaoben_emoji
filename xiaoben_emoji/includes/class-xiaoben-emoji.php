<?php


/**
 * @since      1.0.0
 * @package    Xiaoben_Emoji
 * @subpackage Xiaoben_Emoji
 * @author     小笨
 */
if (!class_exists('Xiaoben_Emoji')) {
    class Xiaoben_Emoji
    {

        protected $loader;
        protected $plugin_name;
        protected $version;


        public function __construct()
        {
            if (defined('PLUGIN_NAME_VERSION')) {
                $this->version = PLUGIN_NAME_VERSION;
            } else {
                $this->version = '1.0.0';
            }
            $this->plugin_name = 'Xiaoben_Emoji';

            $this->load_dependencies();
            $this->define_public_hooks();
        }

        private function load_dependencies()
        {


            require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-xiaoben-emoji-loader.php';

            require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-xiaoben-emoji-public.php';

            $this->loader = new Xiaoben_Emoji_Loader();

        }

        public function define_public_hooks()
        {
            require_once plugin_dir_path(dirname(__FILE__))."index.php";
            $include =new xiaoben_include();
            $plugin_public = new Xiaoben_Emoji_Public($this->get_plugin_name(), $this->get_version());

            $this->loader->add_action('admin_enqueue_scripts', $plugin_public, 'enqueue_styles');
            $this->loader->add_action("tiny_mce_before_init",$include,"get_system_emoji");
            $this->loader->add_filter('mce_external_plugins', $this, 'xiaoben_emoji_js');
            $this->loader->add_filter('mce_buttons', $this,'xiaoben_emoji_button');
        }

        public function run()
        {


            $this->loader->run();
        }

        public function get_plugin_name()
        {
            return $this->plugin_name;
        }

        public function xiaoben_emoji_js($plugin_array)
        {

            $plugin_array['xiaoben_emoji_button'] =plugins_url() ."/xiaoben_emoji/public/js/xiaoben-emoji-public.js";
            return $plugin_array;
        }

        public function xiaoben_emoji_button($buttons)
        {
            array_push($buttons, 'xiaoben_emoji_button');
            return $buttons;
        }




        public function get_version()
        {
            return $this->version;
        }

        public function get_loader()
        {
            return $this->loader;
        }

    }

}
