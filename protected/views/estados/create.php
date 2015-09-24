<?php
$this->breadcrumbs=array(
	'Estadoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List estados', 'url'=>array('index')),
	array('label'=>'Manage estados', 'url'=>array('admin')),
);
?>

<h1>Create estados</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>