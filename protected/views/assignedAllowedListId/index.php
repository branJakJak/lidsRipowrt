<?php
/* @var $this AssignedAllowedListIdController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Assigned Allowed List Ids',
);

$this->menu=array(
	array('label'=>'Create AssignedAllowedListId', 'url'=>array('create')),
	array('label'=>'Manage AssignedAllowedListId', 'url'=>array('admin')),
);
?>

<h1>Assigned Allowed List Ids</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
