<div class="calender">
<h2 style="text-align:center;"><?php echo $this->title; ?></h2>

<?php 
$this->storePreviousLink = CHtml::link("<< Mes anterior  ", array(Yii::app()->controller->id."/".Yii::app()->controller->action->id,	'month'=>$this->previousMonth, 'year'=>$this->yearPreviousMonth));

$this->storeNextLink = CHtml::link("  Mes siguiente >>", array(Yii::app()->controller->id."/".Yii::app()->controller->action->id, 'month'=>$this->nextMonth, 'year'=>$this->yearNextMonth));
echo $this->printStartForm();
echo $this->storePreviousLink;

echo $this->printControlMenu();

?>
<?php 
	
	

	//echo CHtml::ajaxButton(
        //			Yii::t('month','Get By Month'),
        //			Yii::app()->createAbsoluteUrl($this->ajaxRouteString),
        //			array(
        //			'data'=>'js:jQuery("#calForm").serialize()',
        //			'success'=>'function(data) {
          //              $(".calender").html($(data).find(".calender"));
	//				}')
	//				); 
?>

<?php
echo $this->storeNextLink;
echo $this->printCloseForm();
echo $this->printCalendar();
?>
</div>