<?
namespace frontend\assets;


use yii\web\AssetBundle;
use yii\web\View;

class MainAsset extends AssetBundle {

    public $basePath = '@webroot'; // ������ �����: �������� �������� ����
    public $baseUrl = '@web'; // ������ �����: ���� � ��������

    // � ������ $css ������ ��� �����
    public $css = [
        'source/style.css',
        'source/owl-carousel/owl.carousel.css',
        'source/owl-carousel/owl.theme.css',
        'source/slitslider/css/style.css',
        'source/slitslider/css/custom.css'
    ];

    // � ������ $js ������ ��� �������
    public $js = [
        'source/script.js',
        'source/owl-carousel/owl.carousel.js',
        'source/slitslider/js/modernizr.custom.79639.js',
        'source/slitslider/js/jquery.ba-cond.min.js',
        'source/slitslider/js/jquery.slitslider.js',
        'source/js/google_analytics_auto.js'
    ];

    // ����������� (�� ���� ������).  ����� ��� ����� ���������� �������������� ����� � �������
    public $depends = [
        // yii.js (���� ������� ��� ���������. ���� �����, ��������, ����� ��� ������� �� ������ �����������
        // �� GET, � POST ������. ������������� ��������� ����� � ����������), jquery.js
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset', // bootstrap.css
        'yii\bootstrap\BootstrapPluginAsset' // bootstrap.js - ������������ � ������� ��� ���������
    ];

    // �������������� ������ ��� ��������
    public $jsOptions = [
        // ������� ����������� js ��������. ��-��������� - ����� ��������
        // POS_HEAD - ��������� ��������
        // POS_BEGIN - ������ body
        // POS_END - ����� body (������������ ��-���������)
        // POS_READY - ������������ � jQuery(document).ready()
        // POS_LOAD - ������������ � jQuery(window).load()

      'position' =>  View::POS_HEAD,
    ];


}