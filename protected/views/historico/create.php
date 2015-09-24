<?php
$this->breadcrumbs=array(
	'Historicos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List historico', 'url'=>array('index')),
	array('label'=>'Manage historico', 'url'=>array('admin')),
);
?>

<h1>Create historico</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>