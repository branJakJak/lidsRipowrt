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
				'actions'=>array('view','removeAssignedList','assignNewList'),
				'roles'=>array('administrator'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionView($username)
	{
		$this->layout = "column1";
		/*find the user with username provided*/
		$assignedListIdCollection = [];
		$unAssignedListId = [];
		$userModel = User::model()->findByAttributes(array('username'=>$username,'superuser'=>0));
		$unAssignedListIdObjCollection = ListId::getUnassignedListId($userModel->id);
		foreach ($unAssignedListIdObjCollection as $key => $value) {
			$unAssignedListId[] = $value->list_id_value;
		}
		if (!$userModel) {
			throw new CHttpException(404,"Sorry Username $username doesn't exists in the database");
		}
		$assignedAllowedListId = AssignedAllowedListId::getAllAssignedList($userModel->id);
		foreach ($assignedAllowedListId as $key => $currentAssignedLIstId) {
			$assignedListIdCollection[] = $currentAssignedLIstId->list;
		}

		//using user id find the assigned
		$this->render(
			'view',
			array(
				"model"=>$userModel,
				"assignedListIdCollection"=>$assignedListIdCollection,
				"user_id"=>$userModel->id,
				"username"=>$_GET['username'],
				"unassigned_list_ids"=>$unAssignedListId,
			)
		);
	}
	public function actionAssignNewList($user_id , $new_list_id)
	{
		/*check if exists*/
		$listIdModel = ListId::model()->findByAttributes(array('list_id_value'=>$new_list_id));
		$currentUserModel = User::model()->findByAttributes(array('id'=>$user_id));

		if (!$listIdModel) {
			throw new CHttpException(404,"We can't find this $new_list_id in the database. ");
		}
		$criteria = new CDbCriteria;
		$criteria->compare('list_id', $listIdModel->id);
		$criteria->compare('user_id', $user_id);
		if (!AssignedAllowedListId::model()->exists($criteria)) {
			/*create new assignment id*/
			$newassignment = new AssignedAllowedListId();
			$newassignment->list_id = $listIdModel->id;
			$newassignment->user_id = $user_id;
			$newassignment->save();
		}
		Yii::app()->user->setFlash("success","Success : Assignment saved");
		$this->redirect(array('/assigned/view','username'=>$currentUserModel->username));
	}
	public function actionRemoveAssignedList($user_id,$assigned_list_id)
	{
		$listIdMdl = ListId::model()->findByAttributes(array('list_id_value'=>$assigned_list_id));
		if (!$listIdMdl) {
			throw new CHttpException(404,"We can't this $assigned_list_id in the database. Either the record has been deleted or the record doesn't exists at all.");
		}
		$assignedListIdMode = AssignedAllowedListId::model()->findByAttributes(array('user_id'=>$user_id , "list_id"=>$listIdMdl->id));
		if (!$assignedListIdMode) {
			throw new CHttpException(404,"We can't this record in the database. Either the record has been deleted or the record doesn't at all. ");
		}else{
			$assignedListIdMode->delete();
			$currentUserModel = User::model()->findByAttributes(array('id'=>$user_id));
			Yii::app()->user->setFlash("success","Success : Assignment has been removed");
			$this->redirect(array('/assigned/view','username'=>$currentUserModel->username));
		}
		
	}

}