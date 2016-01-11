<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
	<div class="row-fluid">
		<div class="offset1">
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
	            'links'=>$this->breadcrumbs,
				'homeLink'=>CHtml::link('Dashboard'),
				'htmlOptions'=>array('class'=>'breadcrumb')
	        )); ?><!-- breadcrumbs -->
	    <?php endif?>			
		</div>
	</div>

    
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>