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
echo $form->field($model, "option")->widget(IonSlider::className(), [
                        'pluginOptions' => [
                            'min' => 0,
                            'max' => 1,
                            'step' => 1,
                            'onChange' => new \yii\web\JsExpression('
                                function(data) {
                                    console.log(data);
                                }
                            '),
                        ],
                    ]); 
```

Slider Options 
----------------
You can find them on the [options page](http://ionden.com/a/plugins/ion.rangeSlider/en.html)
