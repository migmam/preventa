<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_preventa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_preventa), array('view', 'id'=>$data->id_preventa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendedor')); ?>:</b>
	<?php echo CHtml::encode($data->vendedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_vendedor')); ?>:</b>
	<?php echo CHtml::encode($data->email_vendedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_vendedor')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_vendedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cliente')); ?>:</b>
	<?php echo CHtml::encode($data->cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->email_cliente); ?>
	<br />


</div>