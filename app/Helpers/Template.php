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
    public static function showButtonStatus($id, $controllerName, $statusValue){
        $xhtml = null;
        // $tmplStatus = [
        //     'active' => ['name' => 'Kích hoạt', 'class' => 'btn-success'],
        //     'inactive' => ['name' => 'Chưa kích hoạt', 'class' => 'btn-success'],
        //     'block' => ['name' => 'Bị khóa', 'class' => 'btn-success'],
        //     'default' => ['name' => 'Chưa xác định', 'class' => 'btn-success'],
        // ];
        $tmplStatus = config('myConfig.template.status');
        $statusValue = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';
        $currentTemplateStatus = $tmplStatus[$statusValue];
        // echo '<pre style="color:red">';
        // print_r($currentTemplateStatus);
        // echo '</pre>';
        // die('<p style="color:red">************** DIE HERE **************</p>');
        $link = route($controllerName . '/status', ['id' => $id, 'status' => $statusValue]);
        $xhtml = sprintf('<a href="%s" type="button" class="btn btn-round %s">%s</a>', $link, $currentTemplateStatus['class'], $currentTemplateStatus['name']);
        return $xhtml;
    }
    // <a href="http://proj_news.xyz/admin123/slider/change-status-active/3" type="button" class="btn btn-round btn-success">active</a>
}