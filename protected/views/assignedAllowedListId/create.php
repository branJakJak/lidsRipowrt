<?php
/* @var $this AssignedAllowedListIdController */
/* @var $model AssignedAllowedListId */

$this->breadcrumbs=array(
	'Assigned Allowed List Ids'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AssignedAllowedListId', 'url'=>array('index')),
	array('label'=>'Manage AssignedAllowedListId', 'url'=>array('admin')),
);
?>

<h1>Create AssignedAllowedListId</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>