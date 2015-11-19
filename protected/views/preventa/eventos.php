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





//$allevents = preventa::model()->findAllBySql('select id, id_estado, cliente, fecha_agendado as fecha, 1 as tipo from preventa where (year(fecha_agendado)=YEAR(NOW()) and month(fecha_agendado)=month(now()))
//union
//select id, id_estado, cliente, fecha_prueba as fecha, 2 as tipo from preventa where (year(fecha_prueba)=YEAR(NOW()) and month(fecha_prueba)=month(now()) )or (year(fecha_prueba)=YEAR(NOW()) and month(fecha_prueba)=month(now()))');
$allevents_a =  Yii::app()->db->createCommand('select id, id_estado, cliente, fecha_agendado, fecha_prueba, 1 as tipo from preventa where (year(fecha_agendado)=YEAR(NOW()) and month(fecha_agendado)=month(now()))
union
select id, id_estado, cliente, fecha_agendado, fecha_prueba, 2 as tipo from preventa where (year(fecha_prueba)=YEAR(NOW()) and month(fecha_prueba)=month(now()) )
order by tipo,fecha_agendado,fecha_prueba')->queryAll();
    
//Si se quiere ordenado global (no por tipos):
//select id, id_estado, cliente, fecha_agendado, fecha_prueba, 1 as tipo, fecha_agendado as fecha from preventa where (year(fecha_agendado)=YEAR(NOW()) and month(fecha_agendado)=month(now()))
//union
//select id, id_estado, cliente, fecha_agendado, fecha_prueba, 2 as tipo, fecha_prueba as fecha from preventa where (year(fecha_prueba)=YEAR(NOW()) and month(fecha_prueba)=month(now()) ) 
//order by fecha
        
        
//select id, id_estado, cliente, fecha_agendado, fecha_prueba from preventa where (year(fecha_agendado)=YEAR(NOW()) and month(fecha_agendado)=month(now()) )
// and (id_estado=4 or id_estado=9)

//configuración del calendario
$month = date("m");
$year = date("Y");
$events = Array();

//print_r($allevents); exit;



$allevents = (object) $allevents_a;
//print_r($allevents); 



//iteramos sobre los distintos eventos
foreach ($allevents as $item_a)
{   
    $item = (object) $item_a;
    //print_r($item);//exit;
    
    
    
    if($item->tipo ==1 && !empty($item->fecha_agendado) && $item->fecha_agendado!='0000-00-00 00:00:00' )
    {
        $date = new DateTime($item->fecha_agendado);
        $fecha = $date->getTimestamp();
        $fecha_ok = $item->fecha_agendado;
        $hora_ok = substr($fecha_ok, 11,5);
        $color = 'color: green;';
    }
    if($item->tipo ==2 && !empty($item->fecha_prueba) && $item->fecha_prueba!='0000-00-00 00:00:00' )
    {
        $date = new DateTime($item->fecha_prueba);
        $fecha = $date->getTimestamp();
        $fecha_ok = $item->fecha_prueba;
        $hora_ok = substr($fecha_ok, 11,5);
        $color = 'color: orange;';
    }
       

    
    if(Yii::app()->user->role=="axtel")
    {
        $enlace = CHtml::link(CHtml::encode($item->cliente."(".$hora_ok.")"), array('preventa/view', 'id'=>$item->id)
                , array('style'=>$color)
                )."<hr/>";
        
        
    }else{
        $enlace = CHtml::link(CHtml::encode($item->cliente."(".$hora_ok.")"), array('preventa/update', 'id'=>$item->id)
                , array('style'=>$color)
                )."<hr/>";
    }
    
    
    
    //creamos los elementos del array para el calendario
    $elementos = array(
        "rdate" => $fecha,
        "html" => $enlace, //$item->cliente,
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
    unset($item);
}



        
if(isset($eventos_hoy)){
   // ksort($eventos_hoy);
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
}else{
    echo "No hay eventos planificados para hoy";
}






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
//ksort($events);
//print_r($events);// exit;
//$this->widget('ext.calendar-advance.AdvanceCalendarWidget');
        
$this->widget('ext.calendar-advance.AdvanceCalendarWidget',array('month'=>$month, 'year'=>$year, 'events'=>$events));

?>
