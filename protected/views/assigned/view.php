<?php
/* @var $this AssignedController */

$this->breadcrumbs=array(
	'Assigned'=>array('/assigned'),
	'View',
);
?>

<div class="row-fluid">
	<div class="offset2 span8">
		<h3>
			Allowed list for user : <small style="font-size: 30px"><?php echo CHtml::encode($username); ?></small>
		</h3>
		<?php
		$this->widget('bootstrap.widgets.TbAlert', array(
		    'block'=>true,
		    'fade'=>true,
		    'closeText'=>'×',
		    'alerts'=>array(
			    'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'),
			    'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'),
			    'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'),
		    ),
		)); ?>
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
					'title'=>'Assigned List',
			));
		?>
		<?php echo CHtml::beginForm(array('/assigned/assignNewList'), 'get', array('class'=>'form','style'=>"padding: 20px")); ?>
			<?php echo CHtml::hiddenField('user_id', $user_id); ?>
			<?php 
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				    'name'=>'new_list_id',
				    'source'=>$unassigned_list_ids,
				    'htmlOptions'=>array(
				    		'class'=>'span5',
				    		'placeholder'=>'Search list',
				    	)
				));			
			?>
			<br>
		    <button type="submit" class="btn btn-primary">
		      <i class="icon-plus icon-white"></i>
		      Add new list
		    </button>

		<?php echo CHtml::endForm(); ?>
		<hr>
		<table class="table table-hover table-bordered">
			<tbody>
				<?php foreach ($assignedListIdCollection as $key => $value): ?>
				<tr>
					<td>
						<strong style='margin: 30px 20px;'><?php echo $value->list_id_value ?></strong>
						<?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/img/1452295485_cancel.png', 'Remove item', array('style'=>'height: 20px')  ), array('/assigned/removeAssignedList', 'user_id'=>$user_id,"assigned_list_id"=>$value->list_id_value), array('class'=>'pull-right')); ?>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>

		<?php
			$this->endWidget();
		?>
	</div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>