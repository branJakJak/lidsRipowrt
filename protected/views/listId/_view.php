<?php
/* @var $this ListIdController */
/* @var $data ListId */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('list_id_label')); ?>:</b>
	<?php echo CHtml::encode($data->list_id_label); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('list_id_value')); ?>:</b>
	<?php echo CHtml::encode($data->list_id_value); ?>
	<br />


</div>