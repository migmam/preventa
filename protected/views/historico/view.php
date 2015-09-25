<?php
$this->breadcrumbs=array(
	'Historicos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List historico', 'url'=>array('index')),
	array('label'=>'Create historico', 'url'=>array('create')),
	array('label'=>'Update historico', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete historico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage historico', 'url'=>array('admin')),
);
?>

<h1>View historico #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_preventa',
		'id',
		'fecha',
		'id_estado',
		'observaciones',
		'fecha_agendado',
		'fecha_prueba',
	),
)); ?>
