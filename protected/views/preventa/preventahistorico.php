<?php
$this->breadcrumbs=array(
	'Preventas',"Historico"
);

$this->menu=array(
	array('label'=>'Create preventa', 'url'=>array('create')),
	array('label'=>'Manage preventa', 'url'=>array('admin')),
);
?>

<h1>Historico</h1>

<!--h1>View preventa #<?php //echo $model->id; ?></h1-->

<?php //$estado = $model->estado->estado; ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_preventahistorico'
)); ?>
