<?php
/* @var $this ListIdController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'List Ids',
);

$this->menu=array(
	array('label'=>'Create ListId', 'url'=>array('create')),
	array('label'=>'Manage ListId', 'url'=>array('admin')),
);
?>

<h1>List Ids</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
