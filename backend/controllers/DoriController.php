<?php

namespace backend\controllers;

use Yii;
use common\models\Dori;
use backend\models\DoriSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * DoriController implements the CRUD actions for Dori model.
 */
class DoriController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Dori models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DoriSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dori model.
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
     * Creates a new Dori model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dori();

        if ($model->load(Yii::$app->request->post())) {
            $fayl = UploadedFile::getInstance($model,'foto');
            if($fayl!=null){
                $fayl->saveAs('../web/image/'.$fayl->baseName.".".$fayl->extension);
                $model->foto=$fayl->baseName.".".$fayl->extension;     
            }
            $model->save();
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $fayl = UploadedFile::getInstance($model,'foto');
            if($fayl!=null){
                $fayl->saveAs('../web/image/'.$fayl->baseName.".".$fayl->extension);
                $model->foto=$fayl->baseName.".".$fayl->extension;     
            }
            $model->save();
            return $this->redirect('index');
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dori model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dori the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dori::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
