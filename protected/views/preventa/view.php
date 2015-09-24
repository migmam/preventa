<?php
$this->breadcrumbs=array(
	'Preventas'=>array('index'),
	$model->id_preventa,
);

$this->menu=array(
	array('label'=>'List preventa', 'url'=>array('index')),
	array('label'=>'Create preventa', 'url'=>array('create')),
	array('label'=>'Update preventa', 'url'=>array('update', 'id'=>$model->id_preventa)),
	array('label'=>'Delete preventa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_preventa),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage preventa', 'url'=>array('admin')),
);
?>

<h1>View preventa #<?php echo $model->id_preventa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_preventa',
		'vendedor',
		'email_vendedor',
		'telefono_vendedor',
		'cliente',
		'telefono_cliente',
		'email_cliente',
	),
)); ?>
