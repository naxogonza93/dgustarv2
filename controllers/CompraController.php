<?php

namespace app\controllers;

use Yii;
use app\models\Compra;
use app\models\DetalleCompra;
use app\models\DetalleCompraSearch;
use app\models\CompraSearch;
use app\models\Producto;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Systemuser;

/**
 * CompraController implements the CRUD actions for Compra model.
 */
class CompraController extends Controller
{
    /**
     * @inheritdoc
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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'update','create','view','delete'],
                'rules' => [
                   [
                        'allow' => true,
                        'actions' => ['index','view'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Systemuser::isUserAdmin(Yii::$app->user->identity->username);
                        }
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','view','update','create','delete'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Systemuser::isUserSuperAdmin(Yii::$app->user->identity->username);
                        }
                    ],
                    
                ],
        ],
        ];
    }
    public function actionReportes(){
        $productos=Producto::find()->select('nombre')->all();
       $data = []; 
        foreach($productos as $pd){
             $data[] = [
                 'categories' => $pd['nombre']
        ];
        }
       // print_r($data);
        //die();
        $prod=\yii\helpers\Json::encode($data);
       // print_r($prod);
        //
        return $this->render('grafica',[
            'productos' => $prod,
            
        ]);
    }
    public function actionResumen(){
        //muestra el resumen de venta diaria..
        //obtenemos la fecha de hoy...
        $searchModel = new CompraSearch();
        $searchModel->fecha=date('Y-m-d');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('vtasDiarias', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
    }
    /**
     * Lists all Compra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Compra model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new DetallecompraSearch();
        $searchModel->id_de_compra=$id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel2' => $searchModel,
            'dataProvider2' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Compra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){
    
        $model = new Compra();
        $model->fecha=date("y-m-d");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_compra]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Compra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_compra]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Compra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Compra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Compra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Compra::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
