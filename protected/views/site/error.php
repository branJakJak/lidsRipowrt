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
		<small><?php echo date("Y-m-d H:i:s") ?></small>
	</div>
</div>
