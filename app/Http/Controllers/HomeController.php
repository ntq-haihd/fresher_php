<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome(){
        return view('home');
    }
    public function chooseVar(Request $request)
	{
		$data = $request->all();
		$var = [
			'purple' => [
				'price' => 23,
				'orders' => 2000,
				'revenue' => 789798,
				'images' => 0,
				'size' => [
					's' => [
						'stocks' => 5,
						'price' => 24,
					],
					'm' => [
						'stocks' => 5,
					],
					'l' => [
						'stocks' => 5,
					],
				]
			],
			'blue' => [
				'price' => 22,
				'orders' => 2030,
				'revenue' => 55555,
				'images' => 1,
				'size' => [
					's' => [
						'stocks' => 5,
                        'price' => 30

					],
					'm' => [
						'stocks' => 5

					],
					'l' => [
						'stocks' => 5,
						'price' => 24,
					],
				]
                ],
                'green' => [
                    'price' => 27,
                    'orders' => 3000,
                    'revenue' => 999955,
                    'images' => 2,
                    'size' => [
                        's' => [
                            'stocks' => 10,
                            'price' => 35

                        ],
                        'm' => [
                            'stocks' => 5

                        ],
                        'l' => [
                            'stocks' => 5,
                            'price' => 28,
                        ],
                    ]
                    ],
                    'light' => [
                        'price' => 22,
                        'orders' => 2030,
                        'revenue' => 55555,
                        'images' => 1,
                        'size' => [
                            's' => [
                                'stocks' => 5,
                                'price' => 30

                            ],
                            'm' => [
                                'stocks' => 5

                            ],
                            'l' => [
                                'stocks' => 5,
                                'price' => 24,
                            ],
                        ]
                    ]
		];

		$response = array_merge([
			'price' => 0,
			'orders' => 0,
			'revenue' => 0,
			'images' => 0,
			'stocks' => 0
		], $var[strtolower($data['color'])] ?? []);

		$size = !empty($var[strtolower($data['color'])]['size'][strtolower($data['size'])]) ? $var[strtolower($data['color'])]['size'][strtolower($data['size'])] : [];
		$response = array_merge($response, $size);  
		unset($response['size']);
		return $response;

	}


}
