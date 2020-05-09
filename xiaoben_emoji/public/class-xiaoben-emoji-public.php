<?php

/**
 * @since      1.0.0
 * @package    小笨Emoji
 * @author     小笨
 */
if (!class_exists('Xiaoben_Emoji_Public')) {
    class Xiaoben_Emoji_Public
    {

        private $plugin_name;

        private $version;

        public function __construct($plugin_name, $version)
        {

            $this->plugin_name = $plugin_name;
            $this->version = $version;

        }

        //加载css
        public function enqueue_styles()
        {

            wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/xiaoben-emoji-public.css', array(), $this->version, 'all');

        }

        //加载js
        public function enqueue_scripts()
        {

            wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/xiaoben-emoji-public.js', array('jquery'), $this->version, true);

        }


    }
}




