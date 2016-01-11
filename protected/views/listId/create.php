<?php
/* @var $this ListIdController */
/* @var $model ListId */

$this->breadcrumbs=array(
	'List Ids'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ListId', 'url'=>array('index')),
	array('label'=>'Manage ListId', 'url'=>array('admin')),
);
?>

<h1>Create ListId</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>