<?php
$this->breadcrumbs=array(
	'Preventas',"Histórico"
);

$this->menu=array(
	//array('label'=>'Create preventa', 'url'=>array('create')),
	array('label'=>'Listado preventas', 'url'=>array('admin')),
);
?>

<h1>Histórico</h1>

<!--h1>View preventa #<?php //echo $model->id; ?></h1-->

<?php //$estado = $model->estado->estado; ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_preventahistorico'
)); ?>
