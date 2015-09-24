<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_preventa'); ?>
		<?php echo $form->textField($model,'id_preventa',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vendedor'); ?>
		<?php echo $form->textField($model,'vendedor',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_vendedor'); ?>
		<?php echo $form->textField($model,'email_vendedor',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono_vendedor'); ?>
		<?php echo $form->textField($model,'telefono_vendedor',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cliente'); ?>
		<?php echo $form->textField($model,'cliente',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono_cliente'); ?>
		<?php echo $form->textField($model,'telefono_cliente',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_cliente'); ?>
		<?php echo $form->textField($model,'email_cliente',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->