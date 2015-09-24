<?php
$this->breadcrumbs=array(
	'Historicos',
);

$this->menu=array(
	array('label'=>'Create historico', 'url'=>array('create')),
	array('label'=>'Manage historico', 'url'=>array('admin')),
);
?>

<h1>Historicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
