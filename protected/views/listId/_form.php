<?php
/* @var $this ListIdController */
/* @var $model ListId */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'list-id-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'list_id_label'); ?>
		<?php echo $form->textField($model,'list_id_label',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'list_id_label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'list_id_value'); ?>
		<?php echo $form->textField($model,'list_id_value',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'list_id_value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->