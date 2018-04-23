<?php

return [
    'client' => [
        'hosts' => [
            env('SCOUT_ELASTIC_HOST', '54.89.213.69:9200')
        ]
    ],
    'update_mapping' => env('SCOUT_ELASTIC_UPDATE_MAPPING', true),
    'indexer' => env('SCOUT_ELASTIC_INDEXER', 'single'),
    'document_refresh' => env('SCOUT_ELASTIC_DOCUMENT_REFRESH')
];
