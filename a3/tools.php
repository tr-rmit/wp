<?php
  session_start();

  $moviesObject = [
    'ACT' => [/* Put structured Action movie details here */],
    'DRM' => [
      'title' => 'Napoleon',
      'rating' => 'PG-15',
      'genre' => 'Action, Adventure',
      'summary' => 'An epic that details the checkered rise and fall of French Emperor Napoleon Bonaparte and his relentless journey to power through the prism of his addictive, volatile relationship with his wife, Josephine.',
      'plot' => 'Napoleon is a spectacle-filled action epic that details the checkered rise and fall of the iconic French Emperor Napoleon Bonaparte, played by Oscar®-winner Joaquin Phoenix. Against a stunning backdrop of large-scale filmmaking orchestrated by legendary director Ridley Scott, the film captures Bonapartes relentless journey to power through the prism of his addictive, volatile relationship with his one true love, Josephine, showcasing his visionary military and political tactics against some of the most dynamic practical battle sequences ever filmed.',
      'imdb' => 'tt13287846',
      'screening-summary' => 'Monday - Tuesday: 9pm, Wednesday - Friday: 9pm, Saturday - Sunday: 6pm',
      'screenings' => [
        'MON' => [
          'time' => '9pm',
          'rate' => 'DISC'
        ],
        'TUE' => [
          'time' => '9pm',
          'rate' => 'FULL'
        ],
        'WED' => [
          'time' => '9pm',
          'rate' => 'FULL'
        ],
        'THU' => [
          'time' => '9pm',
          'rate' => 'FULL'
        ],
        'FRI' => [
          'time' => '9pm',
          'rate' => 'FULL'
        ],
        'SAT' => [
          'time' => '6pm',
          'rate' => 'FULL'
        ],
        'SUN' => [
          'time' => '6pm',
          'rate' => 'FULL'
        ]
      ]
    ],
    'RMT' => [/* Put structured Romantic Thriller movie details here */],
    'FAM' => [/* Put structured Family movie details here */]
    
  ];

/* Put your PHP functions and modules here.
   Many will be provided in the teaching materials,
   keep a look out for them!
*/

?>
