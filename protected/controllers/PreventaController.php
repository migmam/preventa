<?php

class PreventaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','preventahistorico','eventos'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('admin'),
			),
                        array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new preventa;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['preventa']))
		{
			$model->attributes=$_POST['preventa'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
                
                $old_estado = $model->id_estado;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $email_enviado = $model->email_enviado;

		if(isset($_POST['preventa']))
		{
                    //print_r($_FILES); 
                    //echo count($_FILES); exit;
                    //exit;
                        //Si ha subido un fichero entonces lo grabamos
                        if($_FILES['document']['tmp_name'][0]!="")  
                        {
                            if (is_uploaded_file($_FILES['document']['tmp_name'][0])) 
                            {
                                if(move_uploaded_file($_FILES['document']['tmp_name'][0], './cuestionarios/cuestionario_'.$_GET['id'].'.doc')) 
                                {
                                    echo "El fichero es válido y se subió con éxito.\n"; 
                                } else {
                                    echo "¡Posible ataque de subida de ficheros!\n"; exit;
                                }
                            }else{
                                   echo "¡Posible ataque de subida de ficheros!\n"; exit;
                            }
                            //$_FILES['document']['tmp_name'][0]
                        }
                       // print_r($_POST['preventa']);
                        //echo "</br>";
                        //print_r($model->attributes);//exit;
                        $datos_enviados = $_POST['preventa'];
                        
			$model->attributes=$_POST['preventa'];
                           echo "</br>";
                        //print_r($model->attributes);exit;
                        $model->fecha=null;
                        //$model->email_enviado = 1;
                        //$model->fecha_agendado = $datos_enviados["fecha_agendado"];
                        //$model->fecha_prueba = $datos_enviados["fecha_prueba"];
                       
                        
			if($model->save())
                        {
                               //echo $model->email_enviado; exit;
                           
                                
                                $model_historico = new historico();
                                $model_historico->setIsNewRecord(true);
                                $model_historico->id_preventa = $_GET['id'];
                                $model_historico->id = null;
                                if(isset($_POST['preventa']['fecha_agendado']))
                                    $model_historico->fecha_agendado = $_POST['preventa']['fecha_agendado'];
                                $model_historico->fecha_prueba   = $_POST['preventa']['fecha_prueba'];
                                $model_historico->observaciones  = $_POST['preventa']['observaciones'];
                                $model_historico->id_estado      = $_POST['preventa']['id_estado'];
                                //$model_historico->fecha = 0;
                                //$model->email = $_GET['email'];
                                if ($model_historico->validate())
                                {
                                    $model_historico->save();
                                } else {
                                    print_r($model_historico->errors);
                                    exit;
                                }
                               // print_r(Yii::app()->params['_d:CMap:private']);
                                //echo $_POST['preventa']['id_estado'].'=='.Yii::app()->params['estado_para_informar'];exit;
                                //
                                //if($_POST['preventa']['id_estado'] == Yii::app()->params['estado_para_informar'])
                                //{
                                //    if($_POST['preventa']["email_enviado"] != 1)
                                //    {
                                if($_POST['preventa']['id_estado'] != $old_estado)
                                {
                                    if($_POST['preventa']['id_estado'] <8)
                                    {
                                            $cuerpo = Yii::app()->params['email_template_preventa'];
                                            
                                    }else{
                                            $cuerpo = Yii::app()->params['email_template_entrega'];
                                            
                                   
                                    }     
                                    
                                    $cuerpo = str_replace('#estado#',$model->estado->estado,$cuerpo);
                                    $cuerpo = str_replace('#preventa#',$_POST['preventa']['cliente'],$cuerpo);
                                    $cuerpo = str_replace('#email#',$_POST['preventa']['email_cliente'],$cuerpo);
                                    $cuerpo = str_replace('#telefono#',$_POST['preventa']['telefono_cliente'],$cuerpo);
                                    $cuerpo = str_replace('#observaciones#',$_POST['preventa']['observaciones'],$cuerpo);
                                            
                                        Controller::mailsend($model->email_vendedor,"notreply@virtualcarecorp.com","Preventa app",$cuerpo);
                                        $model=$this->loadModel();
                                        $model->email_enviado = 1;
                                        $model ->save();
                                }
                                        
                                //    }
                                    
                                //}
				$this->redirect(array('update','id'=>$model->id));
                        }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('preventa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
            
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
                $this->layout='//layouts/column3';
		$model=new preventa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['preventa']))
			$model->attributes=$_GET['preventa'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        /**
	 * Manages all models.
	 */
	public function actionEventos()
	{
           // echo "hola"; exit;
            $model=new preventa('search');
		$model->unsetAttributes();  // clear any default values
		//$this->render('eventos',array(
		//	'model'=>$this->loadModel(),
		//));
                $this->render('eventos',array(
			'model'=>$model));
            
	}
        
          /**
	 * Manages all models.
	 */
	public function actionPreventahistorico()
	{
            
			
		$dataProvider=new CActiveDataProvider('historico', array(
                    'sort'=>array(
                             'defaultOrder'=>'fecha DESC',
                        ),
                    'criteria'=>array(
                       // 'select'=>array('t.id','t.id_estado','t.observaciones','o'),
                        'condition'=>'id_preventa='.filter_input(INPUT_GET,'id', FILTER_SANITIZE_SPECIAL_CHARS),
                        //'join' => 'LEFT JOIN estados ON estados.id = t.id_estado'
                        'with'=>array('relestados'),
                        
                        
                    )
                ));
                
		$this->render('preventahistorico',array(
			'dataProvider'=>$dataProvider,
		));
	
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=preventa::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='preventa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
