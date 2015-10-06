<?php
$this->breadcrumbs=array(
	'Preventas'=>array('eventos')
);


$this->menu=array(
	//array('label'=>'List preventa', 'url'=>array('index')),
	//array('label'=>'Create preventa', 'url'=>array('create')),
	//array('label'=>'Update preventa', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete preventa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Listado Preventas', 'url'=>array('admin')),
        //array('label'=>'Cambiar estado', 'url'=>array('cambia_estado')),
        //array('label'=>'Agendar contacto', 'url'=>array('admin')),
        //array('label'=>'Agendar prueba', 'url'=>array('admin')),
        //array('label'=>'Ver histórico', 'url'=>array('preventahistorico', 'id'=>$model->id)),
);





$allevents = preventa::model()->findAllBySql('select id, id_estado, cliente, fecha_agendado, fecha_prueba from preventa where (year(fecha_agendado)=YEAR(NOW()) and month(fecha_agendado)=month(now()))
or (year(fecha_prueba)=YEAR(NOW()) and month(fecha_prueba)=month(now())) and id_estado=3');


//configuración del calendario
$month = date("m");
$year = date("Y");
$events = Array();

//iteramos sobre los distintos eventos
foreach ($allevents as $item)
{
    if(empty($item->fecha_agendado))
    {
        $date = new DateTime($item->fecha_prueba);
        $fecha = $date->getTimestamp();
        $fecha_ok = $item->fecha_prueba;
    }else{
        $date = new DateTime($item->fecha_agendado);
        $fecha = $date->getTimestamp();
        $fecha_ok = $item->fecha_agendado;
    }
    
    if(Yii::app()->user->role=="axtel")
    {
        $enlace = CHtml::link(CHtml::encode($item->cliente), array('preventa/view', 'id'=>$item->id));
        
        
    }else{
        $enlace = CHtml::link(CHtml::encode($item->cliente), array('preventa/update', 'id'=>$item->id));
    }
    
    
    
    //creamos los elementos del array para el calendario
    $elementos = array(
        "rdate" => $fecha,
        "html" => $enlace, //$item->cliente,
        "url"=>"http://".$item->id,
    );
    array_push($events, $elementos);
    
    
    //creamos los elementos del array para los eventos de hoy
    if(substr($fecha_ok,0,10) == date("Y-m-d"))
        $eventos_hoy[substr($fecha_ok,10)] =  array(
                                                "cliente"=>$item->cliente,
                                                "id"=>$item->id,
                                                "enlace"=>$enlace);
        
    
    
    
    
    //echo $item->id;
    //echo $item->timestampa;
//print_r($item); 
}



        

ksort($eventos_hoy);
//Mostramos la tabla con los eventos de hoy
echo "<table class='calendar'>";
echo "<tr class='calendar-row'><td class='calendar-day-head'>Hora</td><td class='calendar-day-head'>Cliente</td></tr>";
foreach($eventos_hoy as $item_hoy_key=>$item_value)
{
    //if(Yii::app()->user->role=="axtel")
    //{
    //    $enlace = CHtml::link(CHtml::encode($item_value['cliente']), array('preventa/view', 'id'=>$item_value['id']));
    //}else{
    //    $enlace = CHtml::link(CHtml::encode($item_value['cliente']), array('preventa/update', 'id'=>$item_value['id']));
    //}

    echo "<tr class='calendar-row'><td class='calendar-day-np'>".$item_hoy_key."</td><td class='calendar-day-np'>".$item_value['enlace']."</td></tr>";
}
echo "</table>";






/*

$event1 = Array
        (
            "rdate" => '1444136203',
            "html" => "01 February, Friday",
            "url"=>"http://www.elmundo.es"
        );
$event2 = Array 
        (
            "rdate" => '1359916200',
            "html" => '04 February, Monday'
        );
array_push($events, $event1);
array_push($events, $event2);

*/

//print_r($events); exit;
//$this->widget('ext.calendar-advance.AdvanceCalendarWidget');
        
$this->widget('ext.calendar-advance.AdvanceCalendarWidget',array('month'=>$month, 'year'=>$year, 'events'=>$events));

?>
