<?php
/* @var $this ListIdController */
/* @var $model ListId */

$this->breadcrumbs=array(
	'List Ids'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ListId', 'url'=>array('index')),
	array('label'=>'Create ListId', 'url'=>array('create')),
	array('label'=>'Update ListId', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ListId', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ListId', 'url'=>array('admin')),
);
?>

<h1>View ListId #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'list_id_label',
		'list_id_value',
	),
)); ?>
