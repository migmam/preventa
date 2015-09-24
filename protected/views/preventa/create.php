<?php
$this->breadcrumbs=array(
	'Preventas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List preventa', 'url'=>array('index')),
	array('label'=>'Manage preventa', 'url'=>array('admin')),
);
?>

<h1>Create preventa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>