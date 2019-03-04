<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Adv */

$this->title = 'Создание объявления';
$this->params['breadcrumbs'][] = ['label' => 'Мои объявления', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
