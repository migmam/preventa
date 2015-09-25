<?php
$this->breadcrumbs=array(
	'Estadoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List estados', 'url'=>array('index')),
	array('label'=>'Create estados', 'url'=>array('create')),
	array('label'=>'View estados', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage estados', 'url'=>array('admin')),
);
?>

<h1>Update estados <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>