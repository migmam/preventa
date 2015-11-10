<?php
$this->breadcrumbs=array(
	'Preventas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listado Preventas', 'url'=>array('admin')),
);




?>

<h1>Crear preventa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>