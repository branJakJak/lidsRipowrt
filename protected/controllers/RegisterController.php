<?php 


/**
* RegisterController
*/
class RegisterController extends Controller
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
				'actions'=>array('index','view'),
				'roles'=>array('administrator'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex()
	{
		$model=new User;
		$model->superuser = 0;//not super user
		$model->status = User::STATUS_ACTIVE;
		$profile=new Profile;
		$this->performAjaxValidation(array($model,$profile));
		$assignedListId = "";
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->activkey=Yii::app()->getModule("user")->encrypting(microtime().$model->password);
			$profile->attributes=$_POST['Profile'];
			$profile->user_id=0;
			if($model->validate() && $profile->validate()) {
				$model->password=Yii::app()->getModule("user")->encrypting($model->password);
				if($model->save()) {
					$profile->user_id=$model->id;
					$profile->save();
					// To prevent having empty id for object model
					// Save the  assigned listid*/
					$listOfListId = explode(",", $_POST['assignedListId']);
					foreach ($listOfListId as $key => $value) {
						$listidModel = ListId::model()->findByAttributes(array('list_id_value'=>$value));
						if ($listidModel) {
							$newAssignment = new AssignedAllowedListId();
							$newAssignment->list_id = $listidModel->id;
							$newAssignment->user_id = $model->id;
							$newAssignment->save();
						}
					}
				}
				$assignedListId = $_POST['assignedListId'];
				Yii::app()->user->setFlash("success","Success! New user created ");
				$this->redirect(array('/ManageUser'));
			} else{
				$profile->validate();	
			} 
		}
		$this->render('create',array(
			'model'=>$model,
			'profile'=>$profile,
			'selectedAllowedId'=>$assignedListId
		));		
	}
	
	/**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($validate)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
        {
            echo CActiveForm::validate($validate);
            Yii::app()->end();
        }
    }

}