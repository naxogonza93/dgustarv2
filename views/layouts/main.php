<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'D-GUSTAR',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar bg-success',
        ],
    ]);
    if(Yii::$app->user->isGuest){
         echo Nav::widget([
        'options' => ['class' => 'nav-pills navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Login', 'url' => ['/site/login']]
    
        ],
    ]);
    }else{
        if(Yii::$app->user->identity->userLevel == "SuperAdmin"){
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Productos', 'url' => ['/compra'], 'items' => [
                        ['label' => 'Ingresar Producto', 'url' => ['producto/create']],
                        ['label' => 'Administrar Productos', 'url' => ['producto/index']],
                        ]
                    ],
                    ['label' => 'Clientes', 'url' => ['/cliente'], 'items' => [
                        ['label' => 'Crear Cliente', 'url' => ['cliente/create']],
                        ['label' => 'Administrar Cliente', 'url' => ['cliente/index']],
                        ]
                    ],
                    ['label' => 'Ventas', 'url' => ['/compra'], 'items' => [
                        ['label' => 'Realizar Venta', 'url' => ['compra/create']],
                        ['label' => 'Ventas diarias', 'url' => ['compra/resumen']],
                        ['label' => 'Administrar Ventas', 'url' => ['compra/index']],
                        ]
                    ],



                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'

                ],
            ]);
            
        }else{
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Producto', 'url' => ['/producto']],
                    ['label' => 'Cliente', 'url' => ['/cliente']],
                    ['label' => 'VENTAS', 'url' => ['/compra'], 'items' => [
                        ['label' => 'Ventas diarias', 'url' => ['compra/ventasdiarias']],
                        
                        ]
                    ],
                    ['label' => 'MAESTROS', 'url' => ['/'], 'items' => [
                        ['label' => 'Usuarios', 'url' => ['systemuser/index']],

                        ]
                    ],

                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'

                ],
            ]);
        }
    }
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy;Universidad Del BioBio<?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
