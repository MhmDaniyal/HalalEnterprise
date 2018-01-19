<?php

use kartik\grid\GridView;

$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['reportuser/index']];
$this->params['breadcrumbs'][] = 'รายงานภูมิภาค';

echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel' => [
            'before' => 'รายงานภูมิภาค',
            'after' => 'ประมวลผล ณ '.date('Y-m-d H:i:s')
        ]
        
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