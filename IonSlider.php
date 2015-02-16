<?php

namespace yii2mod\slider;

use yii\base\InvalidConfigException;
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
     * @var array the HTML attributes for the input tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /**
     * @var array plugin options
     */
    public $pluginOptions = [];

    /**
     * Slider type - single, double
     * @var string
     */
    public $type = 'single';

    /**
     * Initializes the object.
     * This method is invoked at the end of the constructor after the object is initialized with the
     * given configuration.
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Render range slider
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
        $js = '$("#' . $this->getInputId() . '").ionRangeSlider(' . $this->getPluginOptions() . ');';
        $view->registerJs($js, $view::POS_END);
    }

    /**
     * Return plugin options in json format
     * @return string
     */
    public function getPluginOptions()
    {
        $this->pluginOptions['type'] = $this->type;

        return Json::encode($this->pluginOptions);
    }

    /**
     * Return select id
     * @return mixed
     * @throws InvalidConfigException
     */
    public function getInputId()
    {
        return $this->options['id'];
    }
}
