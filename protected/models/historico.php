<?php

/**
 * This is the model class for table "historico".
 *
 * The followings are the available columns in table 'historico':
 * @property integer $id_preventa
 * @property integer $id_historico
 * @property string $fecha
 * @property integer $id_estado
 * @property string $observaciones
 * @property string $fecha_agendado
 * @property string $fecha_prueba
 */
class historico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'historico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_preventa, id_historico, fecha, id_estado, observaciones, fecha_agendado, fecha_prueba', 'required'),
			array('id_preventa, id_historico, id_estado', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_preventa, id_historico, fecha, id_estado, observaciones, fecha_agendado, fecha_prueba', 'safe', 'on'=>'search'),
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
			'id_historico' => 'Id Historico',
			'fecha' => 'Fecha',
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

		$criteria->compare('id_preventa',$this->id_preventa);

		$criteria->compare('id_historico',$this->id_historico);

		$criteria->compare('fecha',$this->fecha,true);

		$criteria->compare('id_estado',$this->id_estado);

		$criteria->compare('observaciones',$this->observaciones,true);

		$criteria->compare('fecha_agendado',$this->fecha_agendado,true);

		$criteria->compare('fecha_prueba',$this->fecha_prueba,true);

		return new CActiveDataProvider('historico', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return historico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}