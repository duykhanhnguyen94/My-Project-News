<?php

namespace App\Helpers;
class Template{

    public static function showItemsHistory($by, $time){
        $xhtml = null;
        $xhtml = sprintf('<p><i class="fa fa-user"></i> %s</p>
                        <p><i class="fa fa-clock-o"></i> %s</p>', $by, $time);
        return $xhtml;
    }
    // <p><i class="fa fa-user"></i> admin</p>
    // <p><i class="fa fa-clock-o"></i> 24/04/2019</p>

}