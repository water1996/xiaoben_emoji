<?php

/**
 * Plugin Name:       Xiaoben_Emoji
 * Plugin URI:        https://www.zhouxiaoben.info
 * Description:       这是一个方便写文章时添加表情的小插件！
 * Version:           1.0.0
 * Author:            小笨
 * Author URI:        https://www.zhouxiaoben.info
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

require plugin_dir_path(__FILE__) . 'includes/class-xiaoben-emoji.php';

function run_xiaoben_emoji()
{
    $plugin = new Xiaoben_Emoji();

    $plugin->run();

}
run_xiaoben_emoji();



