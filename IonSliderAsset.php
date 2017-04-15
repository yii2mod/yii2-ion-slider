<?php

namespace yii2mod\slider;

use yii\web\AssetBundle;

/**
 * Class IonSliderAsset
 *
 * @package yii2mod\slider
 */
class IonSliderAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/ionrangeslider';

    /**
     * @var array
     */
    public $css = [
        'css/normalize.css',
        'css/ion.rangeSlider.css',
        'css/ion.rangeSlider.skinHTML5.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'js/ion.rangeSlider.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
