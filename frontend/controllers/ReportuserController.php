<?php


namespace frontend\controllers;
use yii;

class ReportuserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionReport1() {
        // !!! Query Database
        $sql = "SELECT * FROM user";
        
        // !!! ให้ Yii ไปดึง connectiondatabase และ คิวรี่ เก็บในตัวแปร $rawData
        $rawData = \yii::$app->db->createCommand($sql)->queryAll();
        
        print_r($rawData);
        
    }
}
