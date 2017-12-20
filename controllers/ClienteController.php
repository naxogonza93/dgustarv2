<?php

namespace app\controllers;

use Yii;
use app\models\Cliente;
use app\models\ClienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class ClienteController extends Controller
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
        ];
    }

   
    
    /**
     * Lists all Cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cliente model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionGenerarpdf(){
        
        $clientes= Cliente::find()->all();
        $vista=$this->renderPartial('reportePDF', [
                'clientes' => $clientes,
         
            ]); 
        $pdf = new Pdf([
        'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
        'content' => $vista,
        'options' => [
            'title' => 'Privacy Policy - Krajee.com',
            'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
        ],
        'methods' => [
            'SetHeader' => ['D-GUSTAR||Generado: ' . date("d-m-Y")],
            'SetFooter' => ['|P&aacute;gina {PAGENO}|'],
        ]
    ]);
    return $pdf->render();
	}
    
   
    /**
     * Search a new client...
     * 
     * @return mixed
     */
    
     public function actionBuscacliente()
     {
         if (Yii::$app->request->post()){
        //request is post
          $request = Yii::$app->request;
          $rut = $request->post('rut');
         // print_r("el rut: ".$rut);
        //  die();
         return $this->render('view', [
            'model' => $this->findModel($rut),
        ]);
              
         }else{
        //request is not post
             return $this->render('buscaCliente', [
               // 'searchModel' => $searchModel,
            //    'dataProvider' => $dataProvider,
            ]); 
         }
        
     }
    
       public function actionBuscaclientepornombre()
     {
         
        //request is post
          $request = Yii::$app->request;
          $nombre = $request->post('nombre');
         // print_r("el rut: ".$rut);
        //  die();
            $resultado = Cliente::find()->andFilterWhere(['like', 'nombre', $nombre])->all();
           
         return $this->render('view', [
            'model' => $resultado,
        ]);
              
        
        
     }
        /**
     * Creates a new Cliente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate()
    {
        $model = new Cliente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rut_cliente]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cliente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rut_cliente]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cliente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cliente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Cliente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cliente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}