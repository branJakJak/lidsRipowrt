<?php
/* @var $this ListIdController */
/* @var $model ListId */

$this->breadcrumbs=array(
	'List Ids'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ListId', 'url'=>array('index')),
	array('label'=>'Create ListId', 'url'=>array('create')),
	array('label'=>'View ListId', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ListId', 'url'=>array('admin')),
);
?>

<h1>Update ListId <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>