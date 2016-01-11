<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

	<div class="row">
		<legend>Account Credential</legend>
		<div class="span3">
			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
		<div class="span3">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
		<div class="span3">
			<?php echo $form->labelEx($model,'email'); ?>	
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
			<?php echo $form->error($model,'email'); ?>			
		</div>
	</div>
	<div class="row hidden">
		<legend>Profile Information</legend>
		<?php 
			$profileFields=$profile->getFields();
			if ($profileFields) {
				foreach($profileFields as $field) {
				?>
		<div class="row">
			<?php echo $form->labelEx($profile,$field->varname); ?>
			<?php 
			if ($widgetEdit = $field->widgetEdit($profile)) {
				echo $widgetEdit;
			} elseif ($field->range) {
				echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
			} elseif ($field->field_type=="TEXT") {
				echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
			} else {
				echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
			}
			 ?>
			<?php echo $form->error($profile,$field->varname); ?>
		</div>
				<?php
				}
			}
			?>		
	</div>
	<div class="row">
		<legend>Allowed List</legend>
		<?php 
			$data= CHtml::listData(ListId::model()->findAll(), 'list_id_label', 'list_id_value');
			$this->widget('yiiwheels.widgets.select2.WhSelect2', array(
			'data'=>$data,
			'asDropDownList' => false,
			'name' => 'assignedListId',
			'pluginOptions' => array(
			    'tags' => array_values($data),
			    'placeholder' => 'List of listid',
			    'width' => '40%',
			    'tokenSeparators' => array(',', ' ')
			)));
		?>
	</div>
	<div class="row">
		<hr>
		<?php echo CHtml::submitButton('Save',array('class'=>'btn btn-primary')); ?>
	</div>
	<br>
	<br>
	<br>

<?php $this->endWidget(); ?>

</div><!-- form -->