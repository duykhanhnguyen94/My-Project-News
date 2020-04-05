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
            'active' => ['name' => 'Kích hoạt', 'class' => 'btn-success'],
            'inactive' => ['name' => 'Chưa kích hoạt', 'class' => 'btn-success'],
            'block' => ['name' => 'Bị khóa', 'class' => 'btn-success'],
            'default' => ['name' => 'Chưa xác định', 'class' => 'btn-success'],
        ]
    ]
];