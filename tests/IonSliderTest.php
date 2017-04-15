<?php

namespace yii2mod\slider\tests;

use yii\base\DynamicModel;
use yii\helpers\Html;
use yii2mod\slider\IonSlider;

/**
 * Class IonSliderTest
 *
 * @package yii2mod\slider\tests
 */
class IonSliderTest extends TestCase
{
    public function testRenderSliderWithModel()
    {
        $model = new DynamicModel(['price' => 0]);

        $widget = IonSlider::widget([
            'model' => $model,
            'attribute' => 'price',
            'pluginOptions' => [
                'min' => 0,
                'max' => 20,
                'from' => 2,
                'to' => 18,
                'step' => 1,
                'hide_min_max' => true,
                'hide_from_to' => true,
            ],
        ]);

        $this->assertEquals(Html::activeTextInput($model, 'price'), $widget);
    }

    public function testRenderSliderWithoutModel()
    {
        $widget = IonSlider::widget([
            'name' => 'price',
            'type' => IonSlider::TYPE_DOUBLE,
            'pluginOptions' => [
                'min' => 0,
                'max' => 20,
                'from' => 2,
                'to' => 18,
                'step' => 1,
            ],
        ]);

        $this->assertEquals(Html::textInput('price', null, ['id' => 'w0']), $widget);
    }
}
