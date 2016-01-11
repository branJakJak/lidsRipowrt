<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Add user'),
);
$this->menu=array(
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
);
?>
<style type="text/css">
	.error {
		color :red;
	}
	.errorSummary {
		background-color:red;
		color:white;
		padding: 20px;
		margin: 3px;
		padding-left: 5px;
	}

</style>

<div class="row-fluid">
	<div class="offset2">
		<h1><?php echo UserModule::t("Add User"); ?></h1>
		<?php
			echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
		?>		
	</div>
</div>
