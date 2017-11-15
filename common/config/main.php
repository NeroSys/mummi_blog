<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
//        '@upload' => realpath(dirname(__FILE__).'/../../../upload/'),
//            '@storage_base' => '/storage/',
//            '@doc_root' => $_SERVER['DOCUMENT_ROOT']
],

    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
