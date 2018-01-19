<?php

use kartik\grid\GridView;
use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['reportuser/index']];
$this->params['breadcrumbs'][] = 'รายงานจังหวัด';

echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'before' => 'รายงานจังหวัด',
            'after' => 'ประมวลผล ณ '.date('Y-m-d H:i:s')
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'PROVINCE_CODE',
                'header' => 'รหัสจังหวัด',
            ],
            [
                'attribute' => 'PROVINCE_NAME',
                'format' => 'raw',
                'value' => function($model) {
                    $PROVINCE_ID = $model['PROVINCE_ID'];
                    $PROVINCE_NAME = $model['PROVINCE_NAME'];
                    return Html::a(Html::encode($PROVINCE_NAME),['reportuser/report4','PROVINCE_ID'=>$PROVINCE_ID]);
                }
            ],
                    [
                        'attribute' => 'GEO_ID',
                        'header' => 'รหัสภูมิภาค'
                    ]],
       
        /**'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'U_name',     
            'U_surname',
            'Username',
            'Status',
            'Telephone',
          
            ['class' => 'yii\grid\ActionColumn'],
        ],**/
    
    
    ]);       
        
?>