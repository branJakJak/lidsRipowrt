<?php
/* @var $this StartingDateRevenueLogController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Starting Date Revenue Logs',
);

$this->menu=array(
	array('label'=>'Create StartingDateRevenueLog', 'url'=>array('create')),
	array('label'=>'Manage StartingDateRevenueLog', 'url'=>array('admin')),
);
?>

<h1>Starting Date Revenue Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
