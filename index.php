<?php

require __DIR__ . '/dom.php';

$clients = [
    'Felipe',
    'Karolaine',
    'Maria',
    'Julia'
];

$layout = '';

foreach( $clients as $index => $client ) {

    $layout .= createHtmlTag('li', [
        'attributes' => [
            'id'              => "user-{$index}",
            'class'           => 'user-item',
            'title'           => $client,
            'data-user-index' => $index,
            'onclick'         => "exampe('{$client}')",
            'style'           => 'cursor: pointer'
        ],

        'inner' => [
            $client,
            createHtmlTag('img', [
                'selfClose'  => true,
                'attributes' => [
                    'src'    => 'https://via.placeholder.com/150',
                    'alt'    => 'example'
                ]
            ])
        ]
    ]);
}

echo view('clients', ['clients' => $layout]);