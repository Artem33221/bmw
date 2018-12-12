<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ЗАказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1>Заказы</h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at',
            'qty',
            'sum',
            [
                    'attribute'=>'status',
                    'value'=>function($data){
        return !$data->status ? '<span class="text-danger">Активен</span>' : '<span class="text-success">Завершен</span>';

                    },
                            'format'=>'raw'
                          ],
            //'status',
            //'name',
            //'phone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
