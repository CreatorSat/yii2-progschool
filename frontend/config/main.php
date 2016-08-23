<?php
$params = array_merge(
    // тут храняться кастомные параметры, для их использования в любой части проекта
    // через конструкцию Yii:$app->params['adminEmail']:
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

Yii::setAlias('@test', '@frontend/test');

return [
    // название проекту:
    'id' => 'app-frontend',
    // базовый путь
    'basePath' => dirname(__DIR__),
    // бутстрап классы для предварительной загрузки
    'bootstrap' => ['log'],
    // для работы автолоадинга в Yii. То есть для поиска контроллеров берется неймспейс frontend\controllers
    'controllerNamespace' => 'frontend\controllers',
    // модули
    'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
    ],
    // компоненты приложения (расширения, библиотеки)
    'components' => [
        // zyx-phpmailer. Yii2 расширение
        'mail' => [
            'class'            => 'zyx\phpmailer\Mailer',
            'viewPath'         => '@common/mail', // шаблон лежит в common
            'useFileTransport' => false,
            'config'           => [
                'mailer'     => 'smtp',
                'host'       => 'smtp.yandex.ru',
                'port'       => '465',
                'smtpsecure' => 'ssl',
                'smtpauth'   => true,
                'username'   => '', // прописать логин
                'password'   => '', // прописать пароль
            ],
        ],
        // для работы авторизации
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        // для логирования
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    // логироване в файлах:
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    // существуют различные компоненты логирования: в БД, по email, в memcache, redis
                ],
            ],
        ],
        // используется, когда возникает какая нибудь ошибка. Например, в коде делаем ошибку и
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
