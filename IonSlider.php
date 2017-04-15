<?php

namespace yii2mod\slider;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * Class IonSlider
 *
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
     * @return string
     */
    public function run()
    {
        $this->registerAssets();

        if ($this->hasModel()) {
            return Html::activeTextInput($this->model, $this->attribute, $this->options);
        }

        return Html::textInput($this->name, $this->value, $this->options);
    }

    /**
     * Register client assets
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        IonSliderAsset::register($view);
        $view->registerJs('$("#' . $this->options['id'] . '").ionRangeSlider(' . $this->getPluginOptions() . ');');
    }

    /**
     * Return plugin options in json format
     *
     * @return string
     */
    protected function getPluginOptions()
    {
        $this->pluginOptions['type'] = ArrayHelper::getValue($this->pluginOptions, 'type', $this->type);

        return Json::encode($this->pluginOptions);
    }
}
