<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableDefaultLanguageUrlCode' => true,
            'enableLanguagePersistence' => true,
            'languages' => array_keys($params["languages"]),
            'class' => 'codemix\localeurls\UrlManager',
            'rules' => [
                '/' => 'site/index',
                'page/<id:\d+>' => 'site/view-page',
                'contact' => 'site/contact',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            ]
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceLanguage' => 'en',
                    'sourceMessageTable' => 'TranslationSourceMessage',
                    'messageTable' => 'TranslationMessage',
                    'forceTranslation' => true
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
