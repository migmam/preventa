<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" /> 

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
                    <table border='0' style='margin-bottom: 0px' width='100%'>
                        <tr>
                            <td width='33%' align='left'><?php echo CHtml::image(Yii::app()->request->baseUrl."/images/Axtel.png",'',array("width"=>"200px","height"=>"53px"));?></td>
                            <td width='33%' style="text-align: center"><?php echo CHtml::encode(Yii::app()->name);?></td>
                            <td width='33%' align='right'><?php echo CHtml::image(Yii::app()->request->baseUrl."/images/vc.png",'', array(
    'align'=>"right",
)); ?></td>
                        </tr>
                    </table>
                </div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Entrar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Preventas', 'url'=>array('/preventa/admin'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Eventos', 'url'=>array('/preventa/eventos'), 'visible'=>!Yii::app()->user->isGuest),
                               // array('label'=>'Historico', 'url'=>array('/historico/index'), 'visible'=>!Yii::app()->user->isGuest),
                               // array('label'=>'Estados', 'url'=>array('/estados/index'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> VIRTUAL CARE GLOBAL SERVICES SL<br/>
		All Rights Reserved.<br/>
		<?php// echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
