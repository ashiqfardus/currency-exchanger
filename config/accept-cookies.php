<?php

return [
    'sessionName' => 'accept-cookies',

    'route' => [
        'middleware' => [],
        'prefix' => 'accept-cookies',
        'name' => 'accept-cookies.',
        'route' => [
            'name' => 'accept',
            'url' => '/accept'
        ]
    ],

    'backgroundColor' => 'bg-dark',
    'text' => 'We use cookies and similar technologies to offer you a better experience on our platform, improve performance, analyze your interactions on our site and personalize content. To learn more, see our Privacy Policy.',

    'linkMoreInfoUrl' => env('COOKIE_URL'),
    'linkMoreInfoTarget' => '_blank',
    'linkMoreInfoText' => 'More info',
    'linkMoreInfoCollor' => 'text-primary',

    'btnAcceptText' => 'Accept',
    'btnAcceptColor' => 'text-success',

    'btnRefuseText' => 'Decline',
    'btnRefuseColor' => 'text-danger',
];
