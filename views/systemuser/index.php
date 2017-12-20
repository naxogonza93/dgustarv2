<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SystemuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Systemusers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="systemuser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Systemuser', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'phone_number',
            'username',
            // 'email:email',
            // 'password',
            // 'authKey',
            // 'user_level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
