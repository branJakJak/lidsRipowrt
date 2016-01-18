<?php
/* @var $this StartingDateRevenueLogController */
/* @var $model StartingDateRevenueLog */

$this->breadcrumbs=array(
	'Starting Date Revenue Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StartingDateRevenueLog', 'url'=>array('index')),
	array('label'=>'Create StartingDateRevenueLog', 'url'=>array('create')),
	array('label'=>'Update StartingDateRevenueLog', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StartingDateRevenueLog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StartingDateRevenueLog', 'url'=>array('admin')),
);
?>

<h1>View StartingDateRevenueLog #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'revert_date',
		'user_id',
		'date_inserted',
	),
)); ?>
