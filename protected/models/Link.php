<?php

/**
 * This is the model class for table "{{Link}}".
 *
 * The followings are the available columns in table '{{Link}}':
 * @property string $id
 * @property string $title
 * @property string $url
 * @property string $logo
 * @property integer $sort_order
 * @property string $status
 */
class Link extends CActiveRecord
{
    const STATUS_SHOW = 'Y';  //显示
    const STATUS_HIDE = 'N';  //隐藏
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{link}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sort_order', 'numerical', 'integerOnly'=>true),
			array('title, url', 'length', 'max'=>100),
			array('logo', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, url, logo, sort_order, status', 'safe', 'on'=>'search'),
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
			'id'         => Yii::t('model','LinkId'),
			'title'      => Yii::t('model','LinkTitle'),
			'url'        => Yii::t('model','LinkUrl'),
			'logo'       => Yii::t('model','LinkLogo'),
			'sort_order' => Yii::t('model','LinkSortOrder'),
			'status'     => Yii::t('model','LinkStatus'),
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

		$criteria->compare('title',$this->title,true);

		$criteria->compare('url',$this->url,true);

		$criteria->compare('logo',$this->logo,true);

		$criteria->compare('sort_order',$this->sort_order);

		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider('Link', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Link the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}