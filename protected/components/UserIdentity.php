<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_role;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
            /*
            
		$users=array(
			// username => password
			'axtel'=>'axtel',
                        'vc'=>'vc',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
             */
             
                    //Autenticación con ldap
                    $options = Yii::app()->params['ldap'];
                    $dc_string = "dc=" . implode(",dc=",$options['dc']);

                    $connection = ldap_connect($options['host']);
                    ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
                    ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);

                    if($connection)
                    {
                        //echo "connecion ok"; exit;
                        // Note: in general it is bad to hide errors, however we're checking for an error below
                        //$bind = ldap_bind($connection, "uid={$this->username},ou={$options['ou']},{$dc_string}", $this->password);
                        //active directory
                        //$bind = ldap_bind($connection, 'PRUEBA'."\\".$this->username, $this->password);
                        //$bind=ldap_bind($connection, $this->username.'@PRUEBA', $this->password);
                         //$bind= ldap_bind($connect, "PRUEBA\\$dn" . "$basedn", $password);
                        $bind = @ldap_bind($connection, $this->username,$this->password);

                        if(!$bind)
                        {
                            $this->errorCode = self::ERROR_PASSWORD_INVALID;
                            //print_r($bind); exit;
                            
                        }else{ 
                            $this->errorCode = self::ERROR_NONE;
                            $this->_role = "vc";
                        }
                        
                    }else{
                        //echo "no connection";exit;
                    }
                     $this->setState('role', $this->_role); //Definimos la nueva propiedad
                    return !$this->errorCode;
                }

}