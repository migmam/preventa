<div class="view">
    

	<!--b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /-->
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />
           
	<b><?php echo 'Estado'; ?>:</b>
	<?php echo CHtml::encode($data->relestados->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_agendado')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_agendado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_prueba')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_prueba); ?>
	<br />

	

</div>