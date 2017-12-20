<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Systemuser */

$this->title = 'Update Systemuser: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Systemusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="systemuser-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
