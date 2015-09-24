<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'preventa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'vendedor'); ?>
		<?php echo $form->textField($model,'vendedor',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'vendedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_vendedor'); ?>
		<?php echo $form->textField($model,'email_vendedor',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email_vendedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono_vendedor'); ?>
		<?php echo $form->textField($model,'telefono_vendedor',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'telefono_vendedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cliente'); ?>
		<?php echo $form->textField($model,'cliente',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'cliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono_cliente'); ?>
		<?php echo $form->textField($model,'telefono_cliente',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'telefono_cliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_cliente'); ?>
		<?php echo $form->textField($model,'email_cliente',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email_cliente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->