<?php

class ManageUserController extends Controller
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
                'actions' => array('index', 'view'),
                'roles' => array('administrator'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $usermodel = new User();
        $dataProvider = new CActiveDataProvider('User', array(
            'pagination' => array(
                'pageSize' => Yii::app()->getModule("user")->user_page_size,
            ),
        ));
        $this->render('index', array(
            'model' => $usermodel,
            'dataProvider' => $dataProvider,
        ));
    }

}