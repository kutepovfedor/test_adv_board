<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AdvSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все объявления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adv-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            [
                'attribute' => 'user_id',
                'label' => 'Владелец',
                'value' => function($model){return $model->user->username;},
                'filter' => ArrayHelper::map(User::find()->all(), 'id', 'username'),
            ],
            // 'content:ntext',
            'create_at',
            'update_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return '/adv/view?id='.$model->id;
                }
            ],
        ],
    ]); ?>
</div>
