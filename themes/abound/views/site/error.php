<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div class="row-fluid">
	<div class="offset2">
		<h2>Error <?php echo $code; ?></h2>
		<div class="error">
		<?php echo CHtml::encode($message); ?>
		</div>
	</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>