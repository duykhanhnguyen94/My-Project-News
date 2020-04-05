<?php

namespace App\Helpers;
class Template{

    public static function showItemsHistory($by, $time){
        $xhtml = null;
        $xhtml = sprintf('<p><i class="fa fa-user"></i> %s</p>
                        <p><i class="fa fa-clock-o"></i> %s</p>', $by, date(config('myConfig.format.long_time'), strtotime($time)));
        return $xhtml;
    }
    // <p><i class="fa fa-user"></i> admin</p>
    // <p><i class="fa fa-clock-o"></i> 24/04/2019</p>
    public static function showItemsThumb($thumbName, $thumbAlt){
        $xhtml = null;
        $xhtml = sprintf('<img src="%s" alt="%s" class="zvn-thumb">', asset("images/slider/$thumbName"), $thumbAlt);
        return $xhtml;
    }
    // <img src="http://proj_news.xyz/images/slider/LWi6hINpXz.jpeg" alt="Ưu đãi học phí" class="zvn-thumb">
    public static function showButtonStatus($status){
        $xhtml = null;
        $xhtml = sprintf('<a href="#" type="button" class="btn btn-round btn-success">%s</a>', $status);
        return $xhtml;
    }
    // <a href="http://proj_news.xyz/admin123/slider/change-status-active/3" type="button" class="btn btn-round btn-success">active</a>
}