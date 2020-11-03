<?php

namespace app\controllers;

use Yii;
use app\models\Population;
use app\models\search\PopulationSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\City;
use app\models\TownBlock;
use yii\web\UploadedFile;
use app\components\AdminController;
use kartik\mpdf\Pdf;

/**
 * PopulationController implements the CRUD actions for Population model.
 */
class PopulationController extends AdminController
{

    /**
     * Lists all Population models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PopulationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Population model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionReport($id, $active = false) {
        $model = $this->findModel($id);

        //faqat 1- marta pdf generate qilishda ishlashi k.k
        if($active){
            $model->status = 1;
            $model->save(false);
        }
        // renderga jo'natiladigan fayl nomi
        $content = $this->renderPartial('_pdf', [
            'model' => $model,
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_BLANK,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:16px}',
            // 'cssInline' => '.kv-heading-1{font-family:"Times New Roman"}',
            // set mPDF properties on the fly
            'options' => ['title' => $model->first_name.' '.$model->second_name.' '.$model->middle_name],
            // call mPDF methods on the fly
            // 'methods' => [
            //     // 'SetHeader'=>[$model->townBlock->name],
            //     'SetFooter'=>['{PAGENO}'],
            // ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    /**
     * Creates a new Population model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Population();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                       
            if($file = UploadedFile::getInstance($model,'image')){
                $model->image = $model->upload(strtolower(Yii::$app->controller->id).'ss',$file);
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Population model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        
            if($file = UploadedFile::getInstance($model,'image')){
                $model->image = $model->upload(strtolower(Yii::$app->controller->id).'ss',$file);
                if(file_exists($model->getOldAttribute('image')))
                    unlink($model->getOldAttribute('image'));
            }else{
                $model->image = $model->getOldAttribute('image');
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Population model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
                      
        if(file_exists($model->image)) {
            unlink($model->image);
        }      
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Population model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Population the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Population::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('yii', 'The requested page does not exist.'));
    }

    public function actionCity($id)
    {
        $cities = City::find()
            ->where(['region_id' => $id])
            ->all();


            echo "<option>".Yii::t('yii','Туман ёки Шаҳарни танланг')."</option>";

            foreach($cities as $item){
                echo "<option value='".$item->id."'>".$item->name."</option>";
            }
    }
    
    public function actionTownBlock($id)
    {
        $town_block = TownBlock::find()
            ->where(['city_id' => $id])
            ->all();


            echo "<option>".Yii::t('yii','Маҳаллани танланг')."</option>";

            foreach($town_block as $item){
                echo "<option value='".$item->id."'>".$item->name."</option>";
            }
    }
}
