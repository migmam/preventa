<?php

//Pasa de formato español a formato mysql
function changeDateToSQL($date)
{
    if($date!="")
        $date_temp = substr($date, 6,4)."-".substr($date, 3,2)."-".substr($date, 0,2);
    
    if(strlen($date)>10) //viene también hora
        $date_temp  .= substr($date,10);
    
    return $date_temp;
}



//Pasa de formato mysql a formato español
function changeDateToSpanish($date)
{
    $date_temp = substr($date, 8,2)."/".substr($date, 5,2)."/".substr($date, 0,4);
    if(strlen($date)>10) //viene también hora
        $date_temp  .= substr($date,10);
    return $date_temp;
}

//Obtienen la ip publica del servidor
function get_own_public_ip() {
     $ipaddress = '';
     $ipaddress = file_get_contents('http://api.externalip.net/ip');
     return $ipaddress; 
}

//Obtiene la ip pública del cliente
function get_client_ip() {
    $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                // trim for safety measures
                $ip = trim($ip);
                // attempt to validate IP
                if (validate_ip($ip)) {
                    return $ip;
                }
            }
        }
    }
 
    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
}


 
 
/**
 * Ensures an ip address is both a valid IP and does not fall within
 * a private network range.
 */
function validate_ip($ip)
{
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}

?>
