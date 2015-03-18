Ion Range Slider Widget for Yii 2
=========
- Widget based on Ion.RangeSlider extension http://ionden.com/a/plugins/ion.rangeSlider/en.html

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
echo $form->field($model, "attribute")->widget(IonSlider::className(), [
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
echo IonSlider::widget([
        'name' => "slider",
        'pluginOptions' => [
           'min' => 0,
           'max' => 20,
           'step' => 1,
           'hide_min_max' => true,
           'hide_from_to' => true
        ]
]);
                                
```
- For change slider skin, you have to configure the assetManager array in your application configuration: 
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
You can find them on the [options page](http://ionden.com/a/plugins/ion.rangeSlider/en.html)
