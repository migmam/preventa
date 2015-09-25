<?php
$this->breadcrumbs=array(
	'Historicos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List historico', 'url'=>array('index')),
	array('label'=>'Create historico', 'url'=>array('create')),
	array('label'=>'View historico', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage historico', 'url'=>array('admin')),
);
?>

<h1>Update historico <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>