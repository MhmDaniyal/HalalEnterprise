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
        $sql = "SELECT * FROM province";
        
        // !!! ให้ Yii ไปดึง connectiondatabase และ คิวรี่ เก็บในตัวแปร $rawData
        $rawData = \yii::$app->db->createCommand($sql)->queryAll();
        //print_r($rawData);
        $searchModel = new ProSearch();
        $dataProvider1 = $searchModel->search(Yii::$app->request->queryParams);
        //ดัก กรณี SQL ERROR
        try {
            $rawData = \yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        // $rawData ให้เป็น $dataProvider
        $dataProvider =new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
            'pagination' => ['pagesize'=>15]
        ]);
        // สั่ง render ไปที่ไฟล์ report1 และส่งตัวแปร $dataProviderไปแสดงผล
        return $this->render('report1', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
        
    }
    
     public function actionReport2() {
        // !!! Query Database
        $sql = "SELECT * FROM district";
        
        // !!! ให้ Yii ไปดึง connectiondatabase และ คิวรี่ เก็บในตัวแปร $rawData
        $rawData = \yii::$app->db->createCommand($sql)->queryAll();
        //print_r($rawData);
        
        //ดัก กรณี SQL ERROR
        try {
            $rawData = \yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        // $rawData ให้เป็น $dataProvider
        $dataProvider =new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
            'pagination' => ['pagesize'=>15],
        ]);
        // สั่ง render ไปที่ไฟล์ report1 และส่งตัวแปร $dataProviderไปแสดงผล
        return $this->render('report2', [
            'dataProvider' => $dataProvider
        ]);
        
    }
    
    public function actionReport3() {
        // !!! Query Database
        $sql = "SELECT * FROM geography";
        
        // !!! ให้ Yii ไปดึง connectiondatabase และ คิวรี่ เก็บในตัวแปร $rawData
        $rawData = \yii::$app->db->createCommand($sql)->queryAll();
        //print_r($rawData);
        
        //ดัก กรณี SQL ERROR
        try {
            
            $rawData = \yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        // $rawData ให้เป็น $dataProvider
        $dataProvider =new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
            'pagination' => ['pagesize'=>15],
        ]);
        // สั่ง render ไปที่ไฟล์ report1 และส่งตัวแปร $dataProviderไปแสดงผล
        return $this->render('report3', [
            'dataProvider' => $dataProvider
        ]);
        
    }
    
    public function actionReport4($PROVINCE_ID) {
        
        //$sql = "SELECT PROVINCE_ID,PROVINCE_CODE,PROVINCE_NAME,GEO_ID FROM province WHERE PROVINCE_CODE=$PROVINCE_CODE";
        $sql = "SELECT * FROM `district` WHERE PROVINCE_ID=$PROVINCE_ID";
        
        $namepro = "SELECT PROVINCE_NAME FROM `province` WHERE PROVINCE_ID=$PROVINCE_ID";
        $rawData1 = \yii::$app->db->createCommand($namepro)->queryOne();        
        //print_r($rawData1);
        
        try {         
            $rawData = \yii::$app->db->createCommand($sql)->queryAll();         
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        // $rawData ให้เป็น $dataProvider
        $dataProvider =new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,        
            'pagination' => ['pagesize'=>15],
        ]);
        // สั่ง render ไปที่ไฟล์ report1 และส่งตัวแปร $dataProviderไปแสดงผล
        return $this->render('report4', [
            'dataProvider' => $dataProvider,
            'sql' => $sql
        ]);
    }
}
