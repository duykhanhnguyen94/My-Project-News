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
    public static function showButtonAction($id, $controllerName){
        // $tmplButton = [
        //     'edit' => ['class'=>'btn-warning','title'=>'Edit','icon'=>'fa-pencil','route-name'=>'slider/form'],
        //     'delete' => ['class'=>'btn-danger','title'=>'Delete','icon'=>'fa-trash','route-name'=>'slider/delete'],
        //     'view' => ['class'=>'btn-info','title'=>'View','icon'=>'fa-eye','route-name'=>'slider/view'],
        // ];
        $tmplButton = config('myConfig.button');
        // $buttonInAera = [
            // 'slider'  => ['edit', 'delete', 'view'],
            // 'slider'  => ['edit', 'delete'],
            // 'default' => ['edit', 'delete'],
        // ];
        $buttonInAera = config('myConfig.config.button');
        $controllerName = array_key_exists($controllerName, $buttonInAera) ? $controllerName : 'default';
        $listButton = $buttonInAera[$controllerName];   // ['edit', delete]

        $xhtml = '<div class="zvn-box-btn-filter">';
        foreach($listButton as $btn){   // $btn = edit, delete, view
            $currentButton = $tmplButton[$btn];  // ['class'=>'btn-warning','title'=>'Edit','icon'=>'fa-pencil','route-name'=>'slider/form']
            // echo '<pre style="color:red">';
            // print_r($currentButton);
            // echo '</pre>';
            $link = route($controllerName . $currentButton['route-name'], ['id'=>$id]);
            $xhtml .= sprintf(' <a href="%s" type="button" class="btn btn-icon %s" data-toggle="tooltip" data-placement="top" data-original-title="%s">
            <i class="fa %s"></i></a>', $link, $currentButton['class'], $currentButton['title'], $currentButton['icon']);
        }
        $xhtml .= '</div>';
        return $xhtml;
    }
    // <div class="zvn-box-btn-filter">
        // <a href="http://proj_news.xyz/admin123/slider/form/3" type="button" class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Edit">
        //     <i class="fa fa-pencil"></i>
        // </a>
    //     <a href="http://proj_news.xyz/admin123/slider/delete/3" type="button" class="btn btn-icon btn-danger btn-delete" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
    //         <i class="fa fa-trash"></i>
    //     </a>
    // </div>
    
    public static function showButtonFilter($countItemnsStatus, $controllerName, $currentFilterStatus){
        $xhtml = null;
        $tmplStatus = config('myConfig.template.status');
        if(count($countItemnsStatus) > 0){
            # Cách 1
            // $all['count'] = 12;
            // $all['status'] = 'All';
            // array_unshift($countByStatus, $all); // Hàm thêm 1 phần tử vào đầu mảng 
            # Cách 2
            array_unshift($countItemnsStatus, [
                'count'  => array_sum(array_column($countItemnsStatus, 'count')),
                'status' => 'all',
            ]);
            foreach($countItemnsStatus as $item){
                $statusValue = $item['status']; // active inactive block
                $statusValue = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';
                $currentTemplateStatus = $tmplStatus[$statusValue];
                $link = route($controllerName) . '?filter_status=' . $statusValue;
                $class = ($currentFilterStatus == $statusValue) ? 'btn-danger' : 'btn-success';

                $xhtml .= sprintf('<a href="%s" type="button" class="btn %s">%s<span class="badge bg-white">%s</span></a>', $link, $class, $currentTemplateStatus['name'], $item['count']);
            }
        }
        return $xhtml;
    }
    // <a href="?filter_status=all" type="button"
    //     class="btn btn-primary">
    // All <span class="badge bg-white">4</span>
    // </a>
    // <a href="?filter_status=active"
    //     type="button" class="btn btn-success">
    //     Active <span class="badge bg-white">2</span>
    // </a>
    // <a href="?filter_status=inactive"
    //     type="button" class="btn btn-success">
    //     Inactive <span class="badge bg-white">2</span>
    // </a>
}