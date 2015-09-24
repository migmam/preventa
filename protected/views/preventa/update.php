<?php
$this->breadcrumbs=array(
	'Preventas'=>array('index'),
	$model->id_preventa=>array('view','id'=>$model->id_preventa),
	'Update',
);

$this->menu=array(
	array('label'=>'List preventa', 'url'=>array('index')),
	array('label'=>'Create preventa', 'url'=>array('create')),
	array('label'=>'View preventa', 'url'=>array('view', 'id'=>$model->id_preventa)),
	array('label'=>'Manage preventa', 'url'=>array('admin')),
);
?>

<h1>Update preventa <?php echo $model->id_preventa; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>