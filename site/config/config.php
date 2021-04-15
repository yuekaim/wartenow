<?php

return [

    'debug' => true,

    'thumbs' => [
		'autoOrient' => false,
		'quality' => 80,

		'presets' => [
			'mini' => 	['width' => 60],
			's' => 		['width' => 420],
			'm' => 		['width' => 660],
			'l' => 		['width' => 1020],
			'xl' => 	['width' => 1440],
			'xxl' => 	['width' => 1920],
			'xxxl' => 	['width' => 2400],

			'landscape' => ['width' => 420,  'height' => 280,  'crop' => true],
			'portrait' => ['width' => 420,  'height' => 630,  'crop' => true],
		],

		'srcsets' => [

			'mini' => 	[60],
			's' => 		[360, 420, 660],
			'm' => 		[420, 660, 1020, 1440],
			'l' => 		[420, 660, 1020, 1440],
			'xl' => 	[420, 660, 1020, 1440, 1920],
			'xxl' => 	[420, 660, 1020, 1440, 1920],
			'xxxl' => 	[420, 660, 1020, 1440, 1920, 2400],

			'landscape' => [
				['width' => 420,  'height' => 280,  'crop' => true],
				['width' => 660,  'height' => 440,  'crop' => true],
				['width' => 1020, 'height' => 680,  'crop' => true],
				['width' => 1440, 'height' => 960,  'crop' => true],
				['width' => 1920, 'height' => 1280, 'crop' => true],
				['width' => 2400, 'height' => 1600, 'crop' => true],
			],

			'portrait' => [
				['width' => 420,  'height' => 630,  'crop' => true],
				['width' => 660,  'height' => 990,  'crop' => true],
				['width' => 1020, 'height' => 1530, 'crop' => true],
				['width' => 1440, 'height' => 2160, 'crop' => true],
				['width' => 1920, 'height' => 2880, 'crop' => true],
			],

		]

	],
];
