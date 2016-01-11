<?php
/* @var $this AssignedAllowedListIdController */
/* @var $model AssignedAllowedListId */

$this->breadcrumbs=array(
	'Assigned Allowed List Ids'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AssignedAllowedListId', 'url'=>array('index')),
	array('label'=>'Create AssignedAllowedListId', 'url'=>array('create')),
	array('label'=>'Update AssignedAllowedListId', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AssignedAllowedListId', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AssignedAllowedListId', 'url'=>array('admin')),
);
?>

<h1>View AssignedAllowedListId #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'list_id',
		'user_id',
	),
)); ?>
