<?php
/* @var $this ListIdController */
/* @var $model ListId */

$this->breadcrumbs=array(
	'List Ids'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ListId', 'url'=>array('index')),
	array('label'=>'Create ListId', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#list-id-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row-fluid">
	<div class="offset2 span8">
	<h1>Manage List </h1>

	<?php 
	$dataProvider  =$model->search();
	$dataProvider->pagination = false;
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'list-id-grid',
		'dataProvider'=>$dataProvider,
		'filter'=>$model,
		'columns'=>array(
			// 'id',
			// 'list_id_label',
	         array(
	             'header'=>'List',
	             'name'=>'list_id_value',
	             'value'=>'$data->list_id_value',
	         ),
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); ?>

	</div>
</div>
