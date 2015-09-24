<?php

/**
 * This is the model class for table "preventa".
 *
 * The followings are the available columns in table 'preventa':
 * @property string $id_preventa
 * @property string $vendedor
 * @property string $email_vendedor
 * @property string $telefono_vendedor
 * @property string $cliente
 * @property string $telefono_cliente
 * @property string $email_cliente
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
			array('vendedor, email_vendedor, telefono_vendedor, cliente, telefono_cliente, email_cliente', 'required'),
			array('vendedor, cliente', 'length', 'max'=>60),
			array('email_vendedor, email_cliente', 'length', 'max'=>45),
			array('telefono_vendedor, telefono_cliente', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_preventa, vendedor, email_vendedor, telefono_vendedor, cliente, telefono_cliente, email_cliente', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_preventa' => 'Id Preventa',
			'vendedor' => 'Vendedor',
			'email_vendedor' => 'Email Vendedor',
			'telefono_vendedor' => 'Telefono Vendedor',
			'cliente' => 'Cliente',
			'telefono_cliente' => 'Telefono Cliente',
			'email_cliente' => 'Email Cliente',
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

		$criteria->compare('id_preventa',$this->id_preventa,true);

		$criteria->compare('vendedor',$this->vendedor,true);

		$criteria->compare('email_vendedor',$this->email_vendedor,true);

		$criteria->compare('telefono_vendedor',$this->telefono_vendedor,true);

		$criteria->compare('cliente',$this->cliente,true);

		$criteria->compare('telefono_cliente',$this->telefono_cliente,true);

		$criteria->compare('email_cliente',$this->email_cliente,true);

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