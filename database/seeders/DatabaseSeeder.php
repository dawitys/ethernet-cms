<?php

use App\Post;
use App\Footer;
use App\Image;
use App\Page;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        $user->username = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('admin');
        $user->token = 'initial';

        $user->save();

        
        $user = new User;

        $user->username = 'admin2';
        $user->email = 'admin2@admin.com';
        $user->password = Hash::make('admin2');
        $user->token = 'initial';

        $user->save();
        $posts_list = [
            [
                'title'         => 'We provide solutions for your business!',
                'type'          => 'hero',
                'data'          => json_encode([
                    'cta' => [
                        'target'    => '_self',
                        'title'     => 'Contact us',
                        'url'       => '/contact'
                    ],
                    'image' => [
                        "id"        => 12,
                        "title"     => "Lorem ipsum title",
                        "alt"       => "Lorem ipsum alt",
                        "path"      => "hero-1-1.svg"
                    ]
                ]),
            ],
            [
                'title'         => 'About Us',
                'type'          => 'text',
                'data'          => json_encode([
                    'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                    "color" => "#fff"
                ]),
            ],
            [
                'title'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'type'          => 'two_columns',
                'data'          => json_encode([
                    'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                    'image' => [
                        "id"        => 1,
                        "title"     => "Lorem ipsum title",
                        "alt"       => "Lorem ipsum alt",
                        "path"      => "2-columns_1-1-1.svg"
                    ]
                ]),
            ],
            [
                'title'         => 'Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.',
                'type'          => 'two_columns',
                'data'          => json_encode([
                    'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                    'image' => [
                        "id"        => 2,
                        "title"     => "Lorem ipsum title",
                        "alt"       => "Lorem ipsum alt",
                        "path"      => "2-columns_2-1-1.svg"
                    ]
                ]),
            ],
            [
                'title'         => 'Neque saepe temporibus repellat ea ipsum et. Id vel et quia tempora facere reprehenderit.',
                'type'          => 'two_columns',
                'data'          => json_encode([
                    'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                    'image' => [
                        "id"        => 3,
                        "title"     => "Lorem ipsum title",
                        "alt"       => "Lorem ipsum alt",
                        "path"      => "2-columns_3-1-1.svg"
                    ]
                ]),
            ],
            [
                'title'         => 'About Us',
                'type'          => 'text',
                'data'          => json_encode([
                    'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                    "color" => "#ecf5ff"
                ]),
            ],
            [
                'title'         => 'Services',
                'type'          => 'services',
                'data'          => json_encode([
                    "services"  => [
                        [
                            "title"     => "Lorem Ipsum",
                            "body"      => "Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident",
                        ],
                        [
                            "title"     => "Dolor Sitema",
                            "body"      => "Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata",
                        ],
                        [
                            "title"     => "Sed ut perspiciatis",
                            "body"      => "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur",
                        ],
                        [
                            "title"     => "Magni Dolores",
                            "body"      => "Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
                        ],
                        [
                            "title"     => "Nemo Enim",
                            "body"      => "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque",
                        ],
                        [
                            "title"     => "Eiusmod Tempor",
                            "body"      => "Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi",
                        ],
                    ],
                ]),
            ],
            [
                'title'         => 'Our Clients',
                'type'          => 'text',
                'data'          => json_encode([
                    'body' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque dere santome nida.",
                    "color" => "#ecf5ff"
                ]),
            ],
            [
                'title'         => 'Partners',
                'type'          => 'partners',
                'data'          => json_encode([
                    "partners"  => [
                        [
                            "image" => [
                                "id"            => 4,
                                'path'          => 'client-1-1-1.png',
                                'title'         => 'Lorem ipsum title',
                                'alt'           => 'Lorem ipsum alt',
                            ],
                        ],
                        [
                            "image" => [
                                "id"            => 5,
                                'path'          => 'client-2-1-1.png',
                                'title'         => 'Lorem ipsum title',
                                'alt'           => 'Lorem ipsum alt',
                            ],
                        ],
                        [
                            "image" => [
                                "id"            => 6,
                                'path'          => 'client-3-1-1.png',
                                'title'         => 'Lorem ipsum title',
                                'alt'           => 'Lorem ipsum alt',
                            ],
                        ],
                        [
                            "image" => [
                                "id"            => 7,
                                'path'          => 'client-4-1-1.png',
                                'title'         => 'Lorem ipsum title',
                                'alt'           => 'Lorem ipsum alt',
                            ],
                        ],
                        [
                            "image" => [
                                "id"            => 8,
                                'path'          => 'client-5-1-1.png',
                                'title'         => 'Lorem ipsum title',
                                'alt'           => 'Lorem ipsum alt',
                            ],
                        ],
                        [
                            "image" => [
                                "id"            => 9,
                                'path'          => 'client-6-1-1.png',
                                'title'         => 'Lorem ipsum title',
                                'alt'           => 'Lorem ipsum alt',
                            ],
                        ],
                        [
                            "image" => [
                                "id"            => 10,
                                'path'          => 'client-7-1-1.png',
                                'title'         => 'Lorem ipsum title',
                                'alt'           => 'Lorem ipsum alt',
                            ],
                        ],
                        [
                            "image" => [
                                "id"            => 11,
                                'path'          => 'client-8-1-1.png',
                                'title'         => 'Lorem ipsum title',
                                'alt'           => 'Lorem ipsum alt',
                            ],
                        ]
                    ],
                ]),
            ],
        ];



        foreach ($posts_list as $post) {
            Post::create($post);
        }


        $pages_list = [
            [
                'slug'  => '/',
                'title' => 'Homepage',
                'posts_order'  => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
            ],
            [
                'slug'  => '/partners',
                'title' => 'Partners',
                'posts_order'  => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
            ],
            [
                'slug'  => '/about-us',
                'title' => 'About us',
                'posts_order'  => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
            ],
        ];

        foreach ($pages_list as $page) {
            Page::create($page);
        }

        DB::table('page_post')->insert([
            [
                'page_id'   => 1,
                'post_id'  =>  1
            ],
            [
                'page_id'   => 1,
                'post_id'  =>  2
            ],
            [
                'page_id'   => 1,
                'post_id'  =>  3
            ],
            [
                'page_id'   => 1,
                'post_id'  =>  4
            ],
            [
                'page_id'   => 1,
                'post_id'  =>  5
            ],
            [
                'page_id'   => 1,
                'post_id'  =>  6
            ],
            [
                'page_id'   => 1,
                'post_id'  =>  7
            ],
            [
                'page_id'   => 1,
                'post_id'  =>  8
            ],
            [
                'page_id'   => 1,
                'post_id'  =>  9
            ],
        ]);


        $image_list = [
            // 1
            [
                'path'          => '2-columns_1-1-1.svg',
                'title'         => 'Lorem ipsum title',
                'alt'           => 'Lorem ipsum alt',
            ],
            // 2
            [
                'path'          => '2-columns_2-1-1.svg',
                'title'         => 'Lorem ipsum title',
                'alt'           => 'Lorem ipsum alt',
            ],
            // 3
            [
                'path'          => '2-columns_3-1-1.svg',
                'title'         => 'Lorem ipsum title',
                'alt'           => 'Lorem ipsum alt',
            ],
            // 4
            [
                'path'          => 'client-1-1-1.png',
                'title'         => 'Lorem ipsum title',
                'alt'           => 'Lorem ipsum alt',
            ],
            // 5
            [
                'path'          => 'client-2-1-1.png',
                'title'         => 'Lorem ipsum title',
                'alt'           => 'Lorem ipsum alt',
            ],
            // 6
            [
                'path'          => 'client-3-1-1.png',
                'title'         => 'Lorem ipsum title',
                'alt'           => 'Lorem ipsum alt',
            ],
            // 7
            [
                'path'          => 'client-4-1.png',
                'title'         => 'Lorem ipsum title',
                'alt'           => 'Lorem ipsum alt',
            ],
            // 8
            [
                'path'          => 'client-5-1-1.png',
                'title'         => 'Lorem ipsum title',
                'alt'           => 'Lorem ipsum alt',
            ],
            // 9
            [
                'path'          => 'client-6-1-1.png',
                'title'         => 'Lorem ipsum title',
                'alt'           => 'Lorem ipsum alt',
            ],
            // 10
            [
                'path'          => 'client-7-1-1.png',
                'title'         => 'Lorem ipsum title',
                'alt'           => 'Lorem ipsum alt',
            ],
            // 11
            [
                'path'          => 'client-8-1-1.png',
                'title'         => 'Lorem ipsum title',
                'alt'           => 'Lorem ipsum alt',
            ],
            // 12
            [
                'path'          => 'hero-1-1.svg',
                'title'         => 'Get started',
                'alt'           => 'Get started',
            ],
        ];

        foreach ($image_list as $key => $image) {
            $image['title']  = $image['title'] . $key;
            $image['alt']  = $image['alt'] . $key;

            Image::create($image);
        }

        Footer::create(['text' => "© Copyright NewBiz. All Rights Reserved Designed by BootstrapMade"]);
    }
}
