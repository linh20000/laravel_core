<?php

return [
    [
        'label' => 'Home Main',
    ],
    [
        'text' => 'Home',
        'icon' => 'fa fa-dashboard',
        'route' => 'home.index',
    ],
    [
        'text' => 'Users',
        'icon' => 'fa fa-users',
        'children' => [
            [
                'text' => 'List Users',
                'route' => 'user.index',
                'icon' => 'fa fa-hand-o-right',
//                'permissions' => ['list users'],
            ],
            [
                'text' => 'Create User',
                'route' => 'user.create',
                'icon' => 'fa fa-hand-o-right',
//                'permissions' => ['list users'],
            ],
            [
                'text' => 'RolePermission User',
                'route' => 'rolepermission.index',
                'icon' => 'fa fa-hand-o-right',
//                'permissions' => ['list users'],
            ],
        ],
    ],
    [
        'text' => 'Banners',
        'icon' => 'fa fa-sliders',
        'children' => [
            [
                'text' => 'List Banners',
                'route' => 'banner.index',
                'icon' => 'fa fa-hand-o-right',
//                'permissions' => ['list posts'],
            ],

        ],
    ],
    [
        'label' => 'POST CONTENT',
    ],
    [
        'text' => 'Posts',
        'icon' => 'fa fa-pencil',
        'children' => [
            [
                'text' => 'List categorypost',
                'route' => 'categorypost.index',
                'icon' => 'fa fa-hand-o-right',
//                'permissions' => ['list posts'],
            ],
            [
                'text' => 'List Posts',
                'route' => 'post.index',
                'icon' => 'fa fa-hand-o-right',
//                'permissions' => ['list posts'],
            ],
            [
                'text' => 'List postcomment',
                'route' => 'postcomment.index',
                'icon' => 'fa fa-hand-o-right',
//                'permissions' => ['list posts'],
            ],
        ],
    ],
    [
        'text' => 'Demo',
        'icon' => 'fa fa-book',
        'children' => [
            [
                'text' => 'List Demo',
                'route' => 'demo.index',
                'icon' => 'fa fa-hand-o-right',
//                'permissions' => ['list posts'],
            ],
            [
                'text' => 'Create Demo',
                'route' => 'demo.create',
                'icon' => 'fa fa-hand-o-right',
//                'permissions' => ['list posts'],
            ],
        ],
    ],
    [
        'text' => 'Menu',
        'icon' => 'fa fa-bars',
        'children' => [
            [
                'text' => 'List menu',
                'route' => 'menu.index',
                'icon' => 'fa fa-hand-o-right',
//                'permissions' => ['list posts'],
            ],
            [
                'text' => 'Create menu',
                'route' => 'menu.create',
                'icon' => 'fa fa-hand-o-right',
//                'permissions' => ['list posts'],
            ],
        ],
    ],
    [
        'text' => 'Seo',
        'icon' => 'fa fa-google',
        'children' => [
            [
                'text' => 'Seo',
                'route' => 'seo.index',
                'icon' => 'fa fa-hand-o-right',
//                'permissions' => ['list posts'],
            ],
        ],
    ],
    [
        'text' => 'Contact',
        'icon' => 'fa fa-envelope-open-o',
        'children' => [
            [
                'text' => 'List contact',
                'route' => 'contact.index',
                'icon' => 'fa fa-hand-o-right',
//                'permissions' => ['list posts'],
            ],
        ],
    ],
    [
        'text' => 'Redirect link',
        'icon' => 'fa fa-fast-forward',
        'route' => 'redirect.index',
    ],
    [
        'text' => 'Log',
        'icon' => 'fa fa-database',
        'route' => 'log.index',
    ],
    [
        'text' => 'Configures',
        'icon' => 'fa fa-cogs',
        'route' => 'configure.index',
    ],
    [
        'text' => 'Translate language',
        'icon' => 'fa fa-language',
        'route' => 'langcustom.index',
    ],
    [
        'text' => 'Terminal',
        'icon' => 'fa fa-terminal',
        'route' => 'terminal.index',
        // 'permissions' => ['list posts'],
    ],
    // Thêm các mục menu khác tương tự
];
