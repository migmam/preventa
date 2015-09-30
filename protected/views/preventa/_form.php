<div class="form">

<?php 
    //$estados = $model->estados;
    $estados = estados::model()->findAll();
    $mi_lectura = "true";
    $mi_style ="background-color: #D8D8D8;";
   
    //print_r($estados); exit;
   
    
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'preventa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'vendedor'); ?>
 		<?php echo $form->textField($model,'vendedor',array('size'=>60,'maxlength'=>60,'readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
		<?php echo $form->error($model,'vendedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_vendedor'); ?>
 		<?php echo $form->textField($model,'email_vendedor',array('size'=>45,'maxlength'=>45,'readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
		<?php echo $form->error($model,'email_vendedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono_vendedor'); ?>
            
		<?php echo $form->textField($model,'telefono_vendedor',array('size'=>20,'maxlength'=>20,'readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
		<?php echo $form->error($model,'telefono_vendedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cliente'); ?>
		<?php echo $form->textField($model,'cliente',array('size'=>60,'maxlength'=>60,'readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
		<?php echo $form->error($model,'cliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono_cliente'); ?>
		<?php echo $form->textField($model,'telefono_cliente',array('size'=>20,'maxlength'=>20,'readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
		<?php echo $form->error($model,'telefono_cliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_cliente'); ?>
		<?php echo $form->textField($model,'email_cliente',array('size'=>45,'maxlength'=>45,'readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
		<?php echo $form->error($model,'email_cliente'); ?>
	</div>
        
         <div class="row">
            <?php echo $form->labelEx($model, 'id_estado'); ?>
            <?php echo $form->dropDownList($model,'id_estado', CHtml::listData(estados::model()->findAll(),'id','estado')) ?>
            <?php echo $form->error($model, 'id_estado'); ?>
        </div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha',array('readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
                <?php echo $form->error($model,'fecha'); ?>
	</div>

	<!--div class="row">
		<?php echo $form->labelEx($model,'id_estado'); ?>
		<?php echo $form->textField($model,'id_estado',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_estado'); ?>
	</div-->

	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_agendado'); ?>
		<?php //echo $form->textField($model,'fecha_agendado',array('readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
                <?php     
                    $this->widget('ext.YiiDateTimePicker.jqueryDateTime', array(
                    'model' => $model,
                    'attribute' => 'fecha_agendado',
                    'options' => array(), //DateTimePicker options
                    'htmlOptions' => array(),
                    ));
                ?>
		<?php echo $form->error($model,'fecha_agendado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_prueba'); ?>
		<?php //echo $form->textField($model,'fecha_prueba',array('readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
		<?php     
                    $this->widget('ext.YiiDateTimePicker.jqueryDateTime', array(
                    'model' => $model,
                    'attribute' => 'fecha_prueba',
                    'options' => array(), //DateTimePicker options
                    'htmlOptions' => array(),
                    ));
                ?>
                <?php echo $form->error($model,'fecha_prueba'); ?>
            </div>
    

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->