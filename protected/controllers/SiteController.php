<?php

class SiteController extends Controller
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
			array(
				'allow',
				'actions'=>array('error','login','logout'),
				'users'=>array('*'),
			),
			array(
				'allow',
				'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$gridDataProvider = new CArrayDataProvider(array(),array( 'keyField' => 'id' ,'id'=>"id"));
		$gridDataProvider->pagination = false;
		$chartDataProvider = array();
		$totalRevenue = number_format(0, 2);
		$cc001 = LiveRevD::getValue("cc001");
		$cc002 = LiveRevD::getValue("cc002");

        if (isset($_GET['searchListId'])) {
            /*check if user is allow to check this listid */
            $_GET['searchListId'] = intval($_GET['searchListId']);
            $listId = ListId::model()->findByAttributes(array("list_id_value"=>$_GET['searchListId']));
            if (!$listId) {
                throw new CHttpException(404, "This list doesn't exists");
            }

            $isAllowed = AssignedAllowedListId::model()->findByAttributes(array("list_id" => $listId->id  , "user_id" => Yii::app()->user->id));
            //test 1242015
            if (!$isAllowed) {
                throw new CHttpException(403, "You are not allowed to search this list");
            }
            /*search and return leads and reports*/
            $fetcher = new LeadDataFetcher();

            $leadDataCollection = $fetcher->getDataFromDialer($_GET['searchListId']);
            $startingDate =  null;
            /*get starting date log using user_id*/
            $criteria = new CDbCriteria;
            $criteria->compare("user_id",Yii::app()->user->id);
            $criteria->order = "id DESC";
            $startingDateMdl = StartingDateRevenueLog::model()->find($criteria);
        	/* if cant find any use date starting from 10 years ago*/
        	if (!$startingDateMdl) {
        		$startingDate = "2000-01-01";
        	}else{
				$startingDate = date("Y-m-d",strtotime($startingDateMdl->revert_date));
        	}
            $totalRevenue = sprintf("%2.2f",  $fetcher->getTotalRevenue($_GET['searchListId'] , $startingDate) );
            $leadRows = array();
            foreach ($leadDataCollection as $key => $value) {
                /* @var $value LeadData*/
                $leadRows[] = array(
                		'id'=>$key,
                		'status'=>$value->getLeadStatus(),
                		'lead'=>$value->getLeadValue(),
                	);
                $chartDataProvider[]  = array(
                			"name"=>$value->getLeadStatus(),
                			"y"=>$value->getLeadValue(),
                	);
            }
            //re initialize value
            $gridDataProvider = new CArrayDataProvider($leadRows,array( 'keyField' => 'id' ,'id'=>"id"));
            $gridDataProvider->pagination = false;
        }
        $gridDataProvider->pagination = false;
		$this->render('index',compact('gridDataProvider','chartDataProvider','totalRevenue','cc001','cc002'));
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->redirect(array('user/login'));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		$this->redirect(array('user/logout'));
	}
}