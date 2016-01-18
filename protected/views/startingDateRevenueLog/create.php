<?php
/* @var $this StartingDateRevenueLogController */
/* @var $model StartingDateRevenueLog */

$this->breadcrumbs=array(
	'Starting Date Revenue Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StartingDateRevenueLog', 'url'=>array('index')),
	array('label'=>'Manage StartingDateRevenueLog', 'url'=>array('admin')),
);
?>

<h1>Create StartingDateRevenueLog</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>