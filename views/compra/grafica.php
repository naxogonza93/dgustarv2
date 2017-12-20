<?=
\dosamigos\highcharts\HighCharts::widget([
    'clientOptions' => [
        'chart' => [
                'type' => 'column'
        ],
        'title' => [
             'text' => 'Monthly Report'
             ],
        'xAxis' => [
            'categories' => $productos
        ],

        'yAxis' => [
            'title' => [
                'text' => 'Number of Person'
            ]
        ],
        'series' => [
            ['name' => 'Captured','data' => [100,220,411,123,123,123,123,123,213,123,123,123]], //this should be data from database.
            ['name' => 'Killed', 'data' => [51,71,31,155,166,133,14,12,12,11,11,13]], //this should be data from database.
            ['name' => 'Surrendered', 'data' => [500,7,3,200,2,2,2,2,2,2,2,0]] //this should be data from database.
        ]
    ]
]);
