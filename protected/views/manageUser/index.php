<?php
/* @var $this ManageUserController */

$this->breadcrumbs=array(
	'Manage User',
);
?>
<style type="text/css">
	#yw0 > div.summary {
		padding: 20px;
	}
	#yw1_c0{
	    padding: 16px;
    	font-size: 24px !important;
	}
</style>

<div class="row-fluid">
	<div class="offset2 span8">
		<?php 
		$this->widget('bootstrap.widgets.TbAlert', array(
		    'block'=>true, // display a larger alert block?
		    'fade'=>true, // use transitions?
		    'closeText'=>'×', // close link text - if set to false, no close link is displayed
		    'alerts'=>array( // configurations per alert type
			    'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
			    'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
			    'danger'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
		    ),
		)); ?>
		<h1>
			<img src="//icons.iconarchive.com/icons/custom-icon-design/pretty-office-8/128/Users-icon.png">
			<?php echo UserModule::t(" User Manager"); ?>
		</h1>
		<?php echo CHtml::link('<i class="icon-plus icon-white"></i> Add User', array('/register'), array('class'=>'btn btn-primary')); ?>
		<hr>
		<br>
        <?php 
            $this->widget('zii.widgets.grid.CGridView', array(
                    /*'type'=>'striped bordered condensed',*/
                    'htmlOptions'=>array('class'=>'table table-striped table-bordered'),
                    'dataProvider'=>$dataProvider,
                    'template'=>"{items}\n{pager}",
					'columns'=>array(
						array(
							'header' => 'Username',
							'name' => 'username',
							'type'=>'raw',
							'value' => 'CHtml::link(CHtml::tag("h6", array("style"=>"padding:10px"), $data->username.CHtml::image(Yii::app()->theme->baseUrl.\'/img/1452295888_icon-ios7-arrow-forward.png\', \'View assigned list\', array("style"=>"height: 27px;float:right"))),array("/assigned/view","username"=>$data->username),array("class"=>""))',
						),
						array(
							'header' => 'Reset',
							'type'=>'raw',
							'value' => 'CHtml::link(CHtml::tag("h6", array("style"=>"padding:10px"), CHtml::image(Yii::app()->theme->baseUrl.\'/img/reset-counter.png\', \'Clear list\', array("style"=>"height: 27px;float:left"))),array("/resetRevenue/index","username"=>$data->username),array("confirm"=>"Are you sure you want to reset the revenue value?"))',
							'htmlOptions' => array('style' => 'width: 100px;'),
							'visible'=>!Yii::app()->user->checkAccess("client")
						),
						// Yii::app()->theme->baseUrl.'/img/1452295888_icon-ios7-arrow-forward.png';
						// CHtml::image(Yii::app()->theme->baseUrl.'/img/1452295888_icon-ios7-arrow-forward.png', 'View assigned list', array());
						// array(
						// 	'header' => 'View Assigned List',
						// 	'type'=>'raw',
						// 	'value' => 'CHtml::link("<i class=\'icon-search\'></i>",array("/assigned/view","username"=>$data->username),array("class"=>""))',
						// ),
					),
                )); 

        ?>

	</div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>