<?php

/**
 * This is the model class for table "preventa".
 *
 * The followings are the available columns in table 'preventa':
 * @property string $id
 * @property string $vendedor
 * @property string $email_vendedor
 * @property string $telefono_vendedor
 * @property string $cliente
 * @property string $telefono_cliente
 * @property string $email_cliente
 * @property string $id_estado
 * @property string $observaciones
 * @property string $fecha_agendado
 * @property string $fecha_prueba
 */
class preventa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'preventa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vendedor, email_vendedor, telefono_vendedor, cliente, telefono_cliente, email_cliente, id_estado, observaciones, fecha_agendado, fecha_prueba', 'required'),
			array('vendedor, cliente', 'length', 'max'=>60),
			array('email_vendedor, email_cliente', 'length', 'max'=>45),
			array('telefono_vendedor, telefono_cliente', 'length', 'max'=>20),
			array('id_estado', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, vendedor, email_vendedor, telefono_vendedor, cliente, telefono_cliente, email_cliente, id_estado, observaciones, fecha_agendado, fecha_prueba', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
      
                    'estado' => array(self::BELONGS_TO, 'estados', 'id_estado'),
    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'vendedor' => 'Vendedor',
			'email_vendedor' => 'Email Vendedor',
			'telefono_vendedor' => 'Telefono Vendedor',
			'cliente' => 'Cliente',
			'telefono_cliente' => 'Telefono Cliente',
			'email_cliente' => 'Email Cliente',
			'id_estado' => 'Id Estado',
			'observaciones' => 'Observaciones',
			'fecha_agendado' => 'Fecha Agendado',
			'fecha_prueba' => 'Fecha Prueba',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('vendedor',$this->vendedor,true);

		$criteria->compare('email_vendedor',$this->email_vendedor,true);

		$criteria->compare('telefono_vendedor',$this->telefono_vendedor,true);

		$criteria->compare('cliente',$this->cliente,true);

		$criteria->compare('telefono_cliente',$this->telefono_cliente,true);

		$criteria->compare('email_cliente',$this->email_cliente,true);

		$criteria->compare('id_estado',$this->id_estado,true);

		$criteria->compare('observaciones',$this->observaciones,true);

		$criteria->compare('fecha_agendado',$this->fecha_agendado,true);

		$criteria->compare('fecha_prueba',$this->fecha_prueba,true);

		return new CActiveDataProvider('preventa', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return preventa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}