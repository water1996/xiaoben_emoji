<?php

class xiaoben_include
{
    public function get_system_emoji($settings)
    {
        $arr = [];
      $path = str_replace("\\", "/", plugin_dir_path(__FILE__)) . "public/image/emoji";
        $webPath = plugins_url() . "/xiaoben_emoji/public/image/emoji/";
        $list = scandir($path);
        foreach ($list as $val) {
            if ($val != "." && $val != "..") {
                array_push($arr, $webPath . $val);

            }

        }
        /*while (($filename = readdir($handler)) !== false) {

            if ($filename != "." && $filename != "..") {
                array_push($arr, $webPath.$filename);
            }
        }*/
        echo '<script>window.xiaoben_emoji_json=' . json_encode($arr) . '</script>';
        return $settings;
    }
}




