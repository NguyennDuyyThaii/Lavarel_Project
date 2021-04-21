<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.sidebar', function ($view) {
            $menus = [
                [
                    "url" => route('auth'),
                    'text' => "Dashboard",
                    "hasChild" => false,
                    "icon" => "nav-icon fas fa-tachometer-alt"
                ],
                // [
                //     "text" => "Danh mục",
                //     "hasChild" => true,
                //     "icon" => "nav-icon fas fa-list",
                //     "childs" => [
                //         [
                //             "text" => "Danh sách",
                //             "url" => route('cate.index')
                //         ],
                //         [
                //             "text" => "Tạo mới",
                //             "url" => route('cate.add')
                //         ]
                //     ]
                // ],
                [
                    "text" => "Users",
                    "hasChild" => true,
                    "icon" => "nav-icon fas fa-user",
                    "childs" => [
                        [
                            "text" => "List User",
                            "url" => route('user.index')
                        ],

                    ]
                ],
                [
                    "text" => "Category",
                    "hasChild" => true,
                    "icon" => "nav-icon fas fa-truck",
                    "childs" => [
                        [
                            "text" => "List Category",
                            "url" => route('category.index')
                        ],
                        [
                            "text" => "Add Category",
                            "url" => route('category.add')
                        ]
                    ]
                ],
                [
                    "text" => "Post",
                    "hasChild" => true,
                    "icon" => "nav-icon fas fa-newspaper",
                    "childs" => [
                        [
                            "text" => "List Post",
                            "url" => route('post.index')
                        ],
                        [
                            "text" => "Add Post",
                            "url" => route('post.add')
                        ]
                    ]
                ],
                [
                    "text" => "CRAWL VOV",
                    "hasChild" => true,
                    "icon" => "nav-icon fas fa-newspaper",
                    "childs" => [
                        [
                            "text" => "List VOV POST",
                            "url" => route('vov.index')
                        ]
                        ,
                        [
                            "text" => "Add VOV POST",
                            "url" => route('vov.add')
                        ]
                    ]
                ]
            ];
            $view->with('menus', $menus);
        });
    }
}
