<?php
$this->breadcrumbs=array(
	'Cambia_estado',
);

$this->menu=array(
	array('label'=>'Create estados', 'url'=>array('create')),
	array('label'=>'Manage estados', 'url'=>array('admin')),
);
?>

<h1>Estadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
