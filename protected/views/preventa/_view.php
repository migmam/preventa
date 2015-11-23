<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
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
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('gestor')); ?>:</b>
	<?php echo CHtml::encode($data->vendedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_gestor')); ?>:</b>
	<?php echo CHtml::encode($data->email_vendedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_gestor')); ?>:</b>
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

	<?php /*
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

	*/ ?>

</div>
<?php
 if(file_exists('./cuestionarios/cuestionario_'.$model->id.'.doc'))
        echo "<p>".CHtml::link('Descargar cuestionario','cuestionario_'.$model->id.'.doc')."</p>";   
 ?>