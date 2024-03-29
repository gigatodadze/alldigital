<?php
return [
    'backend' => [
        'frontName' => 'incurring'
    ],
    'cache' => [
        'graphql' => [
            'id_salt' => 'CUgvbpQM240xkK9S8sNNvDIGpNOA8uqS'
        ],
        'frontend' => [
            'default' => [
                'id_prefix' => '69d_',
                'backend' => 'Magento\\Framework\\Cache\\Backend\\Redis',
                'backend_options' => [
                    'server' => '127.0.0.1',
                    'database' => '0',
                    'port' => '6379',
                    'password' => '',
                    'compress_data' => '1',
                    'compression_lib' => ''
                ]
            ],
            'page_cache' => [
                'id_prefix' => '69d_',
                'backend' => 'Magento\\Framework\\Cache\\Backend\\Redis',
                'backend_options' => [
                    'server' => '127.0.0.1',
                    'database' => '1',
                    'port' => '6379',
                    'password' => '',
                    'compress_data' => '0',
                    'compression_lib' => ''
                ]
            ]
        ],
        'allow_parallel_generation' => false
    ],
    'remote_storage' => [
        'driver' => 'file'
    ],
    'queue' => [
        'consumers_wait_for_messages' => 1
    ],
    'crypt' => [
        'key' => 'cadce329575e67cfe6429a020a52197a'
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'localhost:3306',
                'dbname' => 'magento',
                'username' => 'magento',
                'password' => 'fa846feea29d99b73757c1235395faa7c1a4d1f4d0f33f51',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'initStatements' => 'SET NAMES utf8; SET SESSION sql_require_primary_key = 0;',
                'active' => '1',
                'driver_options' => [
                    1014 => false
                ]
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'production',
    'session' => [
        'save' => 'redis',
        'redis' => [
            'host' => '127.0.0.1',
            'port' => '6379',
            'password' => '',
            'timeout' => '5',
            'persistent_identifier' => '',
            'database' => '10',
            'compression_threshold' => '2048',
            'compression_library' => 'gzip',
            'log_level' => '1',
            'max_concurrency' => '30',
            'break_after_frontend' => '10',
            'break_after_adminhtml' => '30',
            'first_lifetime' => '600',
            'bot_first_lifetime' => '60',
            'bot_lifetime' => '7200',
            'disable_locking' => '1',
            'min_lifetime' => '60',
            'max_lifetime' => '2592000',
            'sentinel_master' => '',
            'sentinel_servers' => '',
            'sentinel_connect_retries' => '5',
            'sentinel_verify_master' => '0'
        ]
    ],
    'lock' => [
        'provider' => 'db'
    ],
    'directories' => [
        'document_root_is_pub' => true
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'full_page' => 1,
        'config_webservice' => 1,
        'translate' => 1
    ],
    'install' => [
        'date' => 'Tue, 19 Mar 2024 15:28:35 +0000'
    ],
    'http_cache_hosts' => [
        [
            'host' => '127.0.0.1',
            'port' => '80'
        ]
    ],
    'cron_consumers_runner' => [
        'cron_run' => true,
        'max_messages' => 10000,
        'consumers' => [
            'codegeneratorProcessor'
        ]
    ]
];
