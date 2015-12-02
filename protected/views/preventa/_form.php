<div class="form">

<?php 
global $permite_escribir;
   
    $estados = estados::model()->findAll();
    
    //echo Yii::app()->user->role != 'vc';
        
    //$permite_escribir = true;
    if(Yii::app()->controller->action->id == "create")
    {
        //$mi_lectura = "0";
        //$mi_style ="background-color: white;color: black";
        
    }else{
       // $mi_lectura = "1";
       // $mi_style ="background-color: #D8D8D8;color: black";
    }
    
    if(Yii::app()->user->role != 'vc' && Yii::app()->controller->action->id != "create")
    {
        $sololectura = true;
        $permiso = array("disabled"=>"true");
        
        $mi_lectura = "1";
        $mi_style ="background-color: #D8D8D8;color: black";
        
        
        
    }else{ 
        $permiso = array();
        $sololectura = false;
        
        $mi_lectura = "0";
        $mi_style ="background-color: white;color: black";
    }
         
   
   
  
    
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'preventa-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con  <span class="required">*</span> son obligatorios.</p>

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
         <?php
        if(Yii::app()->controller->action->id != "create" )
        {
                           
        ?>
        <div class="row">
		<?php echo $form->labelEx($model,'gestor'); ?>
 		<?php echo $form->textField($model,'gestor',array('size'=>60,'maxlength'=>60,'readonly'=>0, 'style' =>'background-color: white;color: black')); ?>
		<?php echo $form->error($model,'gestor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_gestor'); ?>
 		<?php echo $form->textField($model,'email_gestor',array('size'=>45,'maxlength'=>45,'readonly'=>0, 'style' =>'background-color: white;color: black')); ?>
		<?php echo $form->error($model,'email_gestor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono_gestor'); ?>
		<?php echo $form->textField($model,'telefono_gestor',array('size'=>20,'maxlength'=>20,'readonly'=>0, 'style' =>'background-color: white;color: black')); ?>
		<?php echo $form->error($model,'telefono_gestor'); ?>
	</div>
         <?php
        }  
        ?>
        
       	<div class="row">
		<?php echo $form->labelEx($model,'codigo_contrato'); ?>
		<?php echo $form->textField($model,'codigo_contrato',array('size'=>20,'maxlength'=>20,'readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
		<?php echo $form->error($model,'codigo_contrato'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'producto_existente'); ?>
		<?php echo $form->textField($model,'producto_existente',array('size'=>50,'maxlength'=>50,'readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
		<?php echo $form->error($model,'producto_existente'); ?>
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
            <?php echo $form->labelEx($model, 'id_tipo'); ?>
            <?php echo $form->dropDownList($model,'id_tipo', CHtml::listData(tipos::model()->findAll(),'id','tipo'),$permiso) ?>
            <?php echo $form->error($model, 'id_tipo'); ?>
        </div>

         <div class="row">
            <?php echo $form->labelEx($model, 'id_solucion'); ?>
            <?php echo $form->dropDownList($model,'id_solucion', CHtml::listData(soluciones::model()->findAll(),'id','solucion'),$permiso) ?>
            <?php echo $form->error($model, 'id_solucion'); ?>
        </div>
        
         <div class="row">
            <?php echo $form->labelEx($model, 'id_oferta'); ?>
            <?php echo $form->dropDownList($model,'id_oferta', CHtml::listData(ofertas::model()->findAll(),'id','oferta'),$permiso) ?>
            <?php echo $form->error($model, 'id_oferta'); ?>
        </div>
        
         <div class="row">
            <?php echo $form->labelEx($model, 'id_complejidad'); ?>
            <?php echo $form->dropDownList($model,'id_complejidad', CHtml::listData(complejidades::model()->findAll(),'id','complejidad'),$permiso) ?>
            <?php echo $form->error($model, 'id_complejidad'); ?>
        </div>
        
         <div class="row">
            <?php echo $form->labelEx($model, 'id_estado'); ?>
            <?php echo $form->dropDownList($model,'id_estado', CHtml::listData(estados::model()->findAll(),'id','estado')) ?>
            <?php echo $form->error($model, 'id_estado'); ?>
        </div>
        <?php
        if(Yii::app()->controller->action->id != "create")
        {
         /*   
        ?>
         <div class="row">
            <?php echo $form->labelEx($model, 'email_enviado'); ?>
            <?php echo $form->checkBox($model,'email_enviado'); //,  array('checked'=>'checked') ?>
            <?php echo $form->error($model, 'email_enviado'); ?>
        </div>
          * 
          */?>
        
        
    
        <div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo CHtml::textField('Fecha', changeDatetoSpanish($model->fecha), array('disabled'=>'disabled','style'=>$mi_style)); 
                
                //echo $form->textField($model,'fecha',array('readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
                <?php echo $form->error($model,'fecha'); ?>
	</div>

	<!--div class="row">
		<?php echo $form->labelEx($model,'id_estado'); ?>
		<?php echo $form->textField($model,'id_estado',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_estado'); ?>
	</div-->
         <?php
        }
            
        ?>

	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>

        <?php
        if(Yii::app()->controller->action->id != "create")
        {
            
        ?>
	<div class="row">
		<?php echo $form->labelEx($model,'fecha_agendado'); ?>
		<?php //echo $form->textField($model,'fecha_agendado',array('readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
                <?php     
                    //$model->fecha_agendado=changeDateToSpanish($model->fecha_agendado);
                    $this->widget('ext.YiiDateTimePicker.jqueryDateTime', array(
                    'model' => $model,
                   // 'value' => changeDateToSpanish($model->fecha_agendado),
                   // 'name' => 'fecha_agendado',
                    //'mode'=> 'datetime',
                    'attribute' => 'fecha_agendado',
                    //'options' => array('options'=>array("dateFormat"=>'d/m/Y')), //DateTimePicker options
                    'htmlOptions' => $permiso,
                    ));
                ?>
		<?php echo $form->error($model,'fecha_agendado'); ?>
                <?php 
                IF(!$sololectura)
                    echo CHtml::button("Reset",array("onclick"=>"resetea('preventa_fecha_agendado')"));?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_prueba'); ?>
		<?php //echo $form->textField($model,'fecha_prueba',array('readonly'=>$mi_lectura, 'style' =>$mi_style)); ?>
		<?php     
                    //$model->fecha_prueba=changeDateToSpanish($model->fecha_prueba);
                    $this->widget('ext.YiiDateTimePicker.jqueryDateTime', array(
                    'model' => $model,
                    //'mode'=> 'datetime',
                    'attribute' => 'fecha_prueba',
                   // 'options' => array("dateFormat"=>'dd/mm/yyyy'), //DateTimePicker options
                    'htmlOptions' => array(),
                    ));
                ?>
                <?php echo $form->error($model,'fecha_prueba'); ?>
             <?php echo CHtml::button("Reset",array("onclick"=>"resetea('preventa_fecha_prueba')"));?>
            </div>
        <?php
        }
        if(Yii::app()->controller->action->id != "create")
        {    
        ?>
        <div class="row buttons">
       
        	<?php
					$this->widget('CMultiFileUpload', array(
						'name' => 'document',
						'accept' => 'doc|docx', 
						'duplicate' => 'Duplicate file', 
						'denied' => 'Invalid file type', 
					));
					
				?>

        </div>
        <?php  
        }
          
        if(Yii::app()->controller->action->id != "create")
        {
            if(file_exists('./cuestionarios/cuestionario_'.$model->id.'.doc'))
                echo "<div class='row buttons'><p>".CHtml::link('Descargar cuestionario','./cuestionarios/cuestionario_'.$model->id.'.doc')."</p></div>";  
        }
       
       ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>
 <?php 
            $this->endWidget(); ?>
     

</div><!-- form -->