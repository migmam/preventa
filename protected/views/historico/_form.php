<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'historico-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_preventa'); ?>
		<?php echo $form->textField($model,'id_preventa'); ?>
		<?php echo $form->error($model,'id_preventa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_estado'); ?>
		<?php echo $form->textField($model,'id_estado'); ?>
		<?php echo $form->error($model,'id_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_agendado'); ?>
		<?php echo $form->textField($model,'fecha_agendado'); ?>
		<?php echo $form->error($model,'fecha_agendado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_prueba'); ?>
		<?php echo $form->textField($model,'fecha_prueba'); ?>
		<?php echo $form->error($model,'fecha_prueba'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->