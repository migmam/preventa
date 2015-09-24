<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_historico')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_historico), array('view', 'id'=>$data->id_historico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_preventa')); ?>:</b>
	<?php echo CHtml::encode($data->id_preventa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estado')); ?>:</b>
	<?php echo CHtml::encode($data->id_estado); ?>
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