<?php

/**
 * This is the model class for table "tbl_list_id".
 *
 * The followings are the available columns in table 'tbl_list_id':
 * @property integer $id
 * @property string $list_id_label
 * @property string $list_id_value
 *
 * The followings are the available model relations:
 * @property AssignedAllowedListId[] $assignedAllowedLists
 */
class ListId extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_list_id';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('list_id_label, list_id_value', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, list_id_label, list_id_value', 'safe', 'on'=>'search'),
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
			'assignedAllowedLists' => array(self::HAS_MANY, 'AssignedAllowedListId', 'list_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'list_id_label' => 'List Id Label',
			'list_id_value' => 'List Id Value',
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
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('list_id_label',$this->list_id_label,true);
		$criteria->compare('list_id_value',$this->list_id_value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ListId the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	 * Returns list of unassigned listid
	 * @param  integer $user_id The ID of user
	 * @return array          The unassigned listid
	 */
	public static function getUnassignedListId($user_id)
	{
		/*get all list id of current user */
		$assignedListId = AssignedAllowedListId::getAllAssignedList($user_id);
		$excludedCollection = [];
		foreach ($assignedListId as $key => $value) {
			/*compose list id to be exluded*/
			$excludedCollection[] = $value->list->list_id_value;
		}
		$criteria = new CDbCriteria;
		/*get all records not in excluded collection */
		$criteria->addNotInCondition("list_id_value",$excludedCollection);
		$unassignedListId =  ListId::model()->findAll($criteria);
		return $unassignedListId;/*return collection*/
	}

}
