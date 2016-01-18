<?php
/* @var $this StartingDateRevenueLogController */
/* @var $model StartingDateRevenueLog */

$this->breadcrumbs=array(
	'Starting Date Revenue Logs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StartingDateRevenueLog', 'url'=>array('index')),
	array('label'=>'Create StartingDateRevenueLog', 'url'=>array('create')),
	array('label'=>'View StartingDateRevenueLog', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StartingDateRevenueLog', 'url'=>array('admin')),
);
?>

<h1>Update StartingDateRevenueLog <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>