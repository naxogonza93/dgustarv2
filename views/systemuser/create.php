<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Systemuser */

$this->title = 'Create Systemuser';
$this->params['breadcrumbs'][] = ['label' => 'Systemusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="systemuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
