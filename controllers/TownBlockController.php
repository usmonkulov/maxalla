<?php

namespace app\controllers;

use Yii;
use app\models\TownBlock;
use app\models\TownBlockSearch;
use yii\web\NotFoundHttpException;
use app\models\City;
use app\components\AdminController;

/**
 * TownBlockController implements the CRUD actions for TownBlock model.
 */
class TownBlockController extends AdminController
{
    /**
     * Lists all TownBlock models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TownBlockSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TownBlock model.
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

    /**
     * Creates a new TownBlock model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TownBlock();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
            // return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TownBlock model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TownBlock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TownBlock model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TownBlock the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TownBlock::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
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

}
