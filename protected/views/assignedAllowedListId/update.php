<?php
/* @var $this AssignedAllowedListIdController */
/* @var $model AssignedAllowedListId */

$this->breadcrumbs=array(
	'Assigned Allowed List Ids'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AssignedAllowedListId', 'url'=>array('index')),
	array('label'=>'Create AssignedAllowedListId', 'url'=>array('create')),
	array('label'=>'View AssignedAllowedListId', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AssignedAllowedListId', 'url'=>array('admin')),
);
?>

<h1>Update AssignedAllowedListId <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>