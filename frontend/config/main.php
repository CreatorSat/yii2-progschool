<?php
$params = array_merge(
    // ��� ��������� ��������� ���������, ��� �� ������������� � ����� ����� �������
    // ����� ����������� Yii:$app->params['adminEmail']:
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

Yii::setAlias('@test', '@frontend/test');

return [
    // �������� �������:
    'id' => 'app-frontend',
    // ������� ����
    'basePath' => dirname(__DIR__),
    // �������� ������ ��� ��������������� ��������
    'bootstrap' => ['log'],
    // ��� ������ ������������ � Yii. �� ���� ��� ������ ������������ ������� ��������� frontend\controllers
    'controllerNamespace' => 'frontend\controllers',
    // ������
    'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
    ],
    // ���������� ���������� (����������, ����������)
    'components' => [
        // zyx-phpmailer. Yii2 ����������
        'mail' => [
            'class'            => 'zyx\phpmailer\Mailer',
            'viewPath'         => '@common/mail', // ������ ����� � common
            'useFileTransport' => false,
            'config'           => [
                'mailer'     => 'smtp',
                'host'       => 'smtp.yandex.ru',
                'port'       => '465',
                'smtpsecure' => 'ssl',
                'smtpauth'   => true,
                'username'   => '', // ��������� �����
                'password'   => '', // ��������� ������
            ],
        ],
        // ��� ������ �����������
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        // ��� �����������
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    // ���������� � ������:
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    // ���������� ��������� ���������� �����������: � ��, �� email, � memcache, redis
                ],
            ],
        ],
        // ������������, ����� ��������� ����� ������ ������. ��������, � ���� ������ ������ �
        // ������� ��������� � ����� ������, � ��� ��������� ������, �����
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
