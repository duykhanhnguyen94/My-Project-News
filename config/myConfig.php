<?php

return [
    'url' => [
        'prefixAdmin' => 'admin123',
        'prefixFrontend' => '',
    ],
    'format' => [
        'short_time' => 'd/m/Y',
        'long_time'  => 'H:i:s d/m/Y',
    ], 
    'template' => [
        'status' => [
            'active'   => ['name' => 'Kích hoạt',      'class' => 'btn-success'],
            'inactive' => ['name' => 'Chưa kích hoạt', 'class' => 'btn-success'],
            'block'    => ['name' => 'Bị khóa',        'class' => 'btn-success'],
            'default'  => ['name' => 'Chưa xác định',  'class' => 'btn-success'],
            'all'      => ['name' => 'Tất cả',         'class' => 'btn-success'],
        ],
        'search'       => [
            'all'           => ['name'=> 'Tìm kiếm tất cả'],
            'id'            => ['name'=> 'Tìm kiếm theo ID'],
            'name'          => ['name'=> 'Tìm kiếm theo Tên'],
            'username'      => ['name'=> 'Tìm kiếm theo Tài khoản'],
            'fullname'      => ['name'=> 'Tìm kiếm theo Tên đầy đủ'],
            'email'         => ['name'=> 'Tìm kiếm theo Email'],
            'description'   => ['name'=> 'Tìm kiếm theo Mô tả'],
            'link'          => ['name'=> 'Tìm kiếm theo Đường dẫn'],
            'content'       => ['name'=> 'Tìm kiếm theo Nội dung'],
        ],
    ],
    'config' => [
        'button' => [
            'slider'  => ['edit', 'delete'],
            'default' => ['edit', 'delete'],
        ],
        'search' => [
            'default' => ['all', 'id', 'fullname'],
            'slider'  => ['all', 'id', 'description', 'link'],
        ]
    ], 
    'button' => [
        'edit'   => ['class' =>'btn-warning','title'=>'Edit',  'icon'=>'fa-pencil','route-name'=>'/form'],
        'delete' => ['class' =>'btn-danger', 'title'=>'Delete','icon'=>'fa-trash', 'route-name'=>'/delete'],
        'view'   => ['class' =>'btn-info',   'title'=>'View',  'icon'=>'fa-eye',   'route-name'=>'/view'],
    ], 
    
];