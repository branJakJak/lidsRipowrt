<?php

class AssignedController extends Controller
{

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', 
		);
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('view'),
				'roles'=>array('administrator'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionView($username)
	{
		/*find the user with username provided*/
		$userModel = User::model()->findByAttributes(array('username'=>$username,'superuser'=>0));
		if (!$userModel) {
			throw new CHttpException(404,"Sorry Username $username doesn't exists in the database");
		}
		$assignedListIdCollection = AssignedAllowedListId::getAllAssignedList(Yii::app()->user->id);

		//using user id find the assigned
		$this->render(
			'view',
			array(
				"model"=>$userModel,
			)
		);
	}
	public function actionRemoveAssignedList($username,$assignedListId)
	{
		
	}

}