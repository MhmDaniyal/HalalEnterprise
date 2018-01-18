<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'ระบบผู้ประกอบการ';
?>

<?php
    $route1 = Yii::$app->urlManager->createUrl('test/test1');
?>
<a href="<?=$route1?>"> ไปที่ test1 </a>

<br>

<?php
    $route2 = Yii::$app->urlManager->createUrl('test/test2');
?>
<a href="<?=$route2?>"> ไปที่ test2 </a>
<br>

<?=
Html::a('link3',['test/test1']);
?>

<?php
Yii::$app->db->open();
?>