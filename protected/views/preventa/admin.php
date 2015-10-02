<?php
$this->breadcrumbs=array(
	//'Preventas'=>array('index'),
	'Manage',
);

//$this->menu=array(
//	array('label'=>'List preventa', 'url'=>array('index')),
//	array('label'=>'Create preventa', 'url'=>array('create')),
//        array('label'=>'Entrar', 'url'=>array('view','id'=>'2')),
//);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#preventa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Preventas</h1>

<!--p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p-->

<?php //echo"ID: ".Yii::app()->user->getId(); // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); 

if(Yii::app()->user->role=="axtel")
    $mi_controller = "view";
else
    $mi_controller =  "update";
?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));


?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'preventa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl($mi_controller).'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'columns'=>array(
		//'id',
		'vendedor',
		'email_vendedor',
		'telefono_vendedor',
		'cliente',
		'telefono_cliente',
                'email_cliente',
                array(  'name'=>'id_estado',
                        'header' =>'Estado',
                        'value'=>'$data->estado->estado',//valor del campo relacionado...no de id_estado
                        'filter'=>CHtml::listData(estados::model()->findAll(),'id','estado' ) //modelo estados
   
                 ),
		/*
		
		'id_estado',
		'observaciones',
		'fecha_agendado',
		'fecha_prueba',
		*/
               // 'fecha',
		//array(
		//	'class'=>'CButtonColumn',
		//),
	),
)); ?>
