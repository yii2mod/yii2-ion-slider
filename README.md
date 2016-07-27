Ion.RangeSlider Widget for Yii 2
=========
Widget based on Ion.RangeSlider extension http://ionden.com/a/plugins/ion.rangeSlider/en.html

[![Latest Stable Version](https://poser.pugx.org/yii2mod/yii2-ion-slider/v/stable)](https://packagist.org/packages/yii2mod/yii2-ion-slider) 
[![Total Downloads](https://poser.pugx.org/yii2mod/yii2-ion-slider/downloads)](https://packagist.org/packages/yii2mod/yii2-ion-slider) 
[![License](https://poser.pugx.org/yii2mod/yii2-ion-slider/license)](https://packagist.org/packages/yii2mod/yii2-ion-slider)
[![Build Status](https://travis-ci.org/yii2mod/yii2-ion-slider.svg?branch=master)](https://travis-ci.org/yii2mod/yii2-ion-slider)

Installation 
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yii2mod/yii2-ion-slider "*"
```

or add

```json
"yii2mod/yii2-ion-slider": "*"
```

to the require section of your composer.json.

Usage
------------
Once the extension is installed, simply add widget to your page as follows:

1) Usage with ActiveForm and model
```php
echo $form->field($model, "attribute")->widget(\yii2mod\slider\IonSlider::className(), [
        'pluginOptions' => [
           'min' => 0,
           'max' => 1,
           'step' => 1,
           'onChange' => new \yii\web\JsExpression('
                function(data) {
                     console.log(data);
                }
           ')
         ]
]); 
```
2) Usage without ActiveForm and model
```php
echo \yii2mod\slider\IonSlider::widget([
    'name' => 'slider',
    'type' => \yii2mod\slider\IonSlider::TYPE_DOUBLE,
    'pluginOptions' => [
        'min' => 0,
        'max' => 20,
        'from' => 2,
        'to' => 18,
        'step' => 1,
        'hide_min_max' => true,
        'hide_from_to' => true
    ]
]);
                                
```
**To change the slider skin, you can configure the assetManager array in your application configuration:** 
```php
'assetManager' => [
            'bundles' => [
                'yii2mod\slider\IonSliderAsset' => [
                    'css' => [
                        'css/normalize.css',
                        'css/ion.rangeSlider.css',
                        'css/ion.rangeSlider.skinFlat.css'
                     ]
                ],
            ],
        ]
```

Slider Options 
----------------
You can customize the slider using `pluginOptions`, using one of the plugin [options](http://ionden.com/a/plugins/ion.rangeSlider/en.html).
Note that the `type` option should be configured on its own, and is not part of the `pluginOptions` array.
