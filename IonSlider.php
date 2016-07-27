<?php

namespace yii2mod\slider;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * Class IonSlider
 * @package yii2mod\slider
 */
class IonSlider extends InputWidget
{
    /**
     * Single type of the slider
     */
    const TYPE_SINGLE = 'single';

    /**
     * Double type of the slider
     */
    const TYPE_DOUBLE = 'double';

    /**
     * @var string the type of the slider. Defaults to `TYPE_SINGLE`
     */
    public $type = self::TYPE_SINGLE;

    /**
     * @var array plugin options
     */
    public $pluginOptions = [];

    /**
     * Render range slider
     *
     * @return string|void
     */
    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textInput($this->name, $this->value, $this->options);
        }

        $this->registerAssets();
    }

    /**
     * Register client assets
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        IonSliderAsset::register($view);
        $js = '$("#' . $this->options['id'] . '").ionRangeSlider(' . $this->getPluginOptions() . ');';
        $view->registerJs($js, $view::POS_END);
    }

    /**
     * Return plugin options in json format
     *
     * @return string
     */
    public function getPluginOptions()
    {
        $this->pluginOptions['type'] = ArrayHelper::getValue($this->pluginOptions, 'type', $this->type);

        return Json::encode($this->pluginOptions);
    }
}