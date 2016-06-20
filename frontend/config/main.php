<?php
$params = array_merge(
    // тут хран€тьс€ кастомные параметры, дл€ их использовани€ в любой части проекта
    // через конструкцию Yii:$app->params['adminEmail']:
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    // название проекту:
    'id' => 'app-frontend',
    // базовый путь
    'basePath' => dirname(__DIR__),
    // бутстрап классы дл€ предварительной загрузки
    'bootstrap' => ['log'],
    // дл€ работы автолоадинга в Yii. “о есть дл€ поиска контроллеров беретс€ неймспейс frontend\controllers
    'controllerNamespace' => 'frontend\controllers',
    // компоненты приложени€ (расширени€, библиотеки)
    'components' => [
        // дл€ работы авторизации
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        // дл€ логировани€
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    // логироване в файлах:
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    // существуют различные компоненты логировани€: в Ѕƒ, по email, в memcache, redis
                ],
            ],
        ],
        // используетс€, когда возникает кака€ нибудь ошибка. Ќапример, в коде делаем ошибку и
        // выходит сообщение с типом ошибки, в чем конкретно ошибка, трейс
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
