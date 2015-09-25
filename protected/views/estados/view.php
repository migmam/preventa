<?php
$this->breadcrumbs=array(
	'Estadoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List estados', 'url'=>array('index')),
	array('label'=>'Create estados', 'url'=>array('create')),
	array('label'=>'Update estados', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete estados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage estados', 'url'=>array('admin')),
);
?>

<h1>View estados #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'estado',
	),
)); ?>
