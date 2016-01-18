<?php
/* @var $this StartingDateRevenueLogController */
/* @var $data StartingDateRevenueLog */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('revert_date')); ?>:</b>
	<?php echo CHtml::encode($data->revert_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_inserted')); ?>:</b>
	<?php echo CHtml::encode($data->date_inserted); ?>
	<br />


</div>