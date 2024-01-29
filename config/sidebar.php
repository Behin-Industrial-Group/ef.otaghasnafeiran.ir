<?php

return [
    'menu' =>[
        
        'dashboard' => [
            'fa_name' => 'داشبرد',
            'submenu' => [
                'dashboard' => [ 'fa_name' => 'داشبرد', 'route-name' => '', 'route-url' => 'dashboard' ],
            ]
        ],
        'namayeshgah-info' => [
            'fa_name' => 'اطلاعات نمایشگاه ها',
            'submenu' => [
                'dashboard' => [ 'fa_name' => 'همه', 'route-name' => 'namayeshgahInfo.form.list', 'route-url' => '' ],
            ]
        ],
        'users' => [
            'fa_name' => 'کاربران',
            'submenu' => [
                'dashboard' => [ 'fa_name' => 'همه', 'route-name' => 'user.listForm', 'route-url' => 'admin/user/all' ],
                'role' => [ 'fa_name' => 'نقش ها', 'route-name' => 'role.listForm', 'route-url' => '' ],
            ]
        ],
        'tickets' => [
            'fa_name' => 'تیکت پشتیبانی',
            'submenu' => [
                'create' => [ 'fa_name' => 'ایجاد', 'route-name' => 'ATRoutes.index', 'route-url' => '' ],
                'show' => [ 'fa_name' => 'مشاهده', 'route-name' => 'ATRoutes.show.listForm', 'route-url' => '' ],
            ]
        ],

    ]
];