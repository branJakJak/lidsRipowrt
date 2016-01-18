<?php 

/**
* ResetRevenueController
*/		
class ResetRevenueController extends Controller
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
				'actions'=>array('index','undo'),
				'roles'=>array('superadmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex($username)
	{
		$userModel = User::model()->findByAttributes(array('username'=>$username));
		if (!$userModel) {
			throw new CHttpException(404,"Can't find username $username");
		}
		$newStartingLog = new StartingDateRevenueLog();
		$newStartingLog->revert_date = date("Y-m-d H:i:s");
		$newStartingLog->user_id = $userModel->id;
		$newStartingLog->date_inserted = date("Y-m-d H:i:s");
		if ($newStartingLog->save()) {
			$undoIcon = CHtml::image(Yii::app()->theme->baseUrl.'/img/Undo-icon.png', 'Undo action');
			$undoButton = CHtml::link('Undo action', array('/resetRevenue/undo','username'=>$username),array('class'=>'btn btn-default'));
			Yii::app()->user->setFlash("success","<strong>Success :</strong> Reset complete for user <b>$username. </b> If you are not sure about that action $undoButton");
		}else{
			$errorSummary =CHtml::errorSummary($newStartingLog);
			Yii::app()->user->setFlash("error","<strong>Error :</strong> $errorSummary");
		}
		$this->redirect(Yii::app()->request->urlReferrer);
	}
	public function actionUndo($username)
	{
		/*get user model by username*/
		$userModel = User::model()->findByAttributes(array('username'=>$username));
		if (!$userModel) {
			throw new CHttpException(404,"User doesn't exists");
		}else{
			/*get the log from startingdaterevenue table and delete*/
			$criteria = new CDbCriteria;
			$criteria->compare("user_id",$userModel->id);
			$criteria->order = "user_id DESC";
			$model = StartingDateRevenueLog::model()->find($criteria);
			if ($model) {
				$model->delete();
			}
			Yii::app()->user->setFlash("success","<strong>Success : </strong> Past action has been nullified.");
			$this->redirect(array('/manageUser'));
		}
	}

}