<?php
$this->breadcrumbs=array(
	'Preventas'=>array('admin'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List preventa', 'url'=>array('index')),
	//array('label'=>'Create preventa', 'url'=>array('create')),
	//array('label'=>'Update preventa', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete preventa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Listado Preventas', 'url'=>array('admin')),
        //array('label'=>'Cambiar estado', 'url'=>array('cambia_estado')),
        //array('label'=>'Agendar contacto', 'url'=>array('admin')),
        //array('label'=>'Agendar prueba', 'url'=>array('admin')),
        array('label'=>'Ver histórico', 'url'=>array('preventahistorico', 'id'=>$model->id)),
);
?>

<!--h1>View preventa #<?php echo $model->id; ?></h1-->

<?php //$estado = $model->estado->estado; ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'vendedor',
		'email_vendedor',
		'telefono_vendedor',
                'gestor',
		'email_gestor',
		'telefono_gestor',
                'codigo_contrato',
                'producto_existente',
		'cliente',
		'telefono_cliente',
		'email_cliente',
                array(
                    'label'=>'Tipo',
                    'value'=>$model->tipo->tipo,
                ),
                array(
                    'label'=>'Estado',
                    'value'=>$model->estado->estado,
                ),
                array(
                    'label'=>'Solución',
                    'value'=>$model->solucion->solucion,
                ),
                array(
                    'label'=>'Oferta',
                    'value'=>$model->oferta->oferta,
                ),
                array(
                    'label'=>'Complejidad',
                    'value'=>$model->complejidad->complejidad,
                ),
               //array(
               //     'label'=>'Estado',
               //     'type'=>'raw',
               //     'value'=>CHtml::dropDownList('id_estado',$model->id_estado, 
               //      CHtml::listData(estados::model()->findAll(),'id','estado'),
               //         array(
               //         //    'submit'=>['Site/Index'],
               //         //    // 'onchange'=>'js:something'.  // You can trigger some javascript here instead of the submit - but it's more hassle if you ask me.
               //         //    'prompt'=>'-- You\'ll need a prompt' // Because onchange wont fire for the initially selected item.
               //         )
               //     )
               // ),
                //array(
                //        'label'=>'',
                //        'type'=>'raw',
                //        'value'=> CHtml::button("Grabar",array("onclick"=>"document.location.href=".Yii::app()->controller->createUrl("controller/action",array("id"=>$model->id))."")),
                //        ),                              
                       
		//'id_estado',
		'observaciones',
		'fecha_agendado',
		'fecha_prueba',
                'fecha',
	),
)); ?>
<?php

 if(file_exists('./cuestionarios/cuestionario_'.$model->id.'.doc'))
        echo "<p>".CHtml::link('Descargar cuestionario','./cuestionarios/cuestionario_'.$model->id.'.doc')."</p>";   
 ?>
