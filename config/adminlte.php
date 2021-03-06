<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'logo' => '<b>Lazy</b>BADGER',
    'logo_img' => 'vendor/img/logo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'usermenu_enabled' => false,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => '/',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'menu' => [
//        [
//            'text' => 'search',
//            'search' => true,
//            'topnav' => true,
//        ],
//        [
//            'text'        => 'pages',
//            'url'         => 'admin/pages',
//            'icon'        => 'far fa-fw fa-file',
//            'label'       => 4,
//            'label_color' => 'success',
//        ],
        ['header' => 'Контент', 'key' => 'content'],
        [
            'key' => 'content_slider',
            'text' => 'Слайдер',
            'route'  => 'admin.content.slider-frames.index',
            'icon' => 'fas fa-fw fa-images',
            'active' => ['content/slider-frames/*']
        ],
        [
            'key' => 'content_about-us',
            'text'    => 'О нас',
            'icon'    => 'fas fa-fw fa-newspaper',
            'active' => ['content/about-us/*'],
            'submenu' => [
                [
                    'key' => 'content_about-us_articles',
                    'text' => 'Статьи',
                    'route'  => 'admin.content.about-us.articles.index',
                    'icon' => 'fas fa-fw fa-list',
                    'active' => ['content/about-us/articles/*']
                ],
                [
                    'key' => 'content_about-us_results',
                    'text' => 'Результаты работы',
                    'route'  => 'admin.content.about-us.results.index',
                    'icon' => 'fas fa-fw fa-poll',
                    'active' => ['content/about-us/results/*']
                ],
            ],
        ],
        [
            'key' => 'content_for-patients',
            'text'    => 'Пациентам',
            'icon'    => 'fas fa-fw fa-hospital-user',
            'active' => ['content/for-patients/*'],
            'submenu' => [
                [
                    'key' => 'content_for-patients_articles',
                    'text' => 'Статьи',
                    'route'  => 'admin.content.for-patients.articles.index',
                    'icon' => 'fas fa-fw fa-list',
                    'active' => ['content/for-patients/articles/*']
                ],
                [
                    'key' => 'content_for-patients_services',
                    'text' => 'Услуги',
                    'route'  => 'admin.content.for-patients.services.index',
                    'icon' => 'fas fa-fw fa-briefcase-medical',
                    'active' => ['content/for-patients/services/*']
                ],
            ],
        ],
        [
            'key' => 'content_out-team',
            'text'    => 'Наша команда',
            'icon'    => 'fas fa-fw fa-user-friends',
            'active' => ['content/our-team/*'],
            'submenu' => [
                [
                    'key' => 'content_out-team_articles',
                    'text' => 'Статьи',
                    'route'  => 'admin.content.our-team.articles.index',
                    'icon' => 'fas fa-fw fa-list',
                    'active' => ['content/out-team/articles/*']
                ],
                [
                    'key' => 'content_out-team_employees',
                    'text' => 'Сотрудники',
                    'route'  => 'admin.content.our-team.employees.index',
                    'icon' => 'fas fa-fw fa-users',
                    'active' => ['content/our-team/employees/*']
                ],
            ],
        ],
        [
            'key' => 'content_prices',
            'text'    => 'Цены',
            'icon'    => 'fas fa-fw fa-money-bill-wave',
            'active' => ['content/prices/*'],
            'submenu' => [
                [
                    'key' => 'content_prices_sections',
                    'text' => 'Разделы каталога цен',
                    'route'  => 'admin.content.prices.price-sections.index',
                    'icon' => 'fas fa-fw fa-list',
                    'active' => ['content/prices/price-sections/*']
                ],
                [
                    'key' => 'content_positions',
                    'text' => 'Позиции каталога цен',
                    'route'  => 'admin.content.prices.price-positions.index',
                    'icon' => 'fas fa-fw fa-list',
                    'active' => ['content/prices/price-positions/*']
                ],
            ],
        ],
        ['header' => 'Настройки', 'key' => 'settings'],
        [
            'key' => 'settings_languages',
            'text' => 'Языки',
            'route'  => 'admin.settings.languages',
            'icon' => 'fas fa-fw fa-globe-europe',
        ],
        ['header' => 'Оповещения', 'key' => 'notifications'],
        // Appointments - dynamically from App\Providers\Admin\MenuServiceProvider

//        ['header' => 'labels'],
//        [
//            'text'       => 'important',
//            'icon_color' => 'red',
//            'url'        => '#',
//        ],
//        [
//            'text'       => 'warning',
//            'icon_color' => 'yellow',
//            'url'        => '#',
//        ],
//        [
//            'text'       => 'information',
//            'icon_color' => 'cyan',
//            'url'        => '#',
//        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'JsValidation' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/vendor/jsvalidation/js/jsvalidation.min.js',
                ],
            ],
        ],
        'FileUploader' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/vendor/file-uploader/js/fileinput.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/vendor/file-uploader/js/locales/ru.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '/vendor/file-uploader/css/fileinput.min.css',
                ],
            ],
        ],
        'JqueryConfirm' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '/vendor/jquery-confirm/jquery-confirm.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/vendor/jquery-confirm/jquery-confirm.min.js',
                ],
            ],
        ],
        'SummerNote' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '/vendor/summernote/summernote-bs4.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/vendor/summernote/summernote-bs4.min.js',
                ],
            ],
        ],
        'Switcher' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/vendor/bootstrap-switch/bootstrap-switch.min.js',
                ],
            ],
        ],
        'jQueryValidate' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/vendor/jquery-validate/jquery.validate.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/vendor/jquery-validate/additional-methods.min.js',
                ],
            ],
        ],
        'FlatIcons' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '/vendor/flat-icons/flaticon.css',
                ],
            ],
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    */

    'livewire' => false,
];
