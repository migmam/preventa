<script type='text/javascript'>
    function resetea(dato)
    {
        elemento =document.getElementById(dato);
        elemento.value = '0000-00-00 00:00:00';
    }
</script>

<?php
$this->breadcrumbs=array(
	'Preventas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List preventa', 'url'=>array('index')),
	//array('label'=>'Create preventa', 'url'=>array('create')),
	//array('label'=>'View preventa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listar preventas', 'url'=>array('admin')),
        array('label'=>'Ver histórico', 'url'=>array('preventahistorico', 'id'=>$model->id)),
);
?>

<h1>Ficha preventa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>