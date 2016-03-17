<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
$gridDataProvider->pagination = false;
?>

<div class="row-fluid">
    <div class="offset1 span10">
            <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title'=>'<span class="icon-search"></span>Search',
                    'titleCssClass'=>''
                ));
            ?>
            <div class="span9">
                <?php echo CHtml::beginForm(array(''), 'get', array('class'=>'form')); ?>
                    <?php 
                        //autocomplete for listid available to current user
                        $listIdModels = AssignedAllowedListId::getAllAssignedList(Yii::app()->user->id);
                        /*collection list id*/
                        $finalCollection = [];
                        foreach ($listIdModels as $key => $value) {
                            $finalCollection[] = $value->list->list_id_value;
                        }
                        $finalCollection = array_combine($finalCollection, $finalCollection);
                        echo CHtml::dropDownList('searchListId', 'something', $finalCollection, array('style'=>"margin: 20px",'prompt'=>"Search list"));
                    ?>
                <?php echo CHtml::button('Submit', array('type'=>'submit','class'=>'btn btn-primary')); ?>
                <?php echo CHtml::endForm(); ?>
            </div>
            <div class="span3">
                <h2>
                    &pound; <?php echo $totalRevenue ?>
                    <br>
                    <small>
                        Total Revenue
                    </small>
                </h2>
            </div>
            <div class="clearfix">
            </div>
            <?php $this->endWidget(); ?>
    </div>
</div>

<div class="row-fluid">
    <div class="offset1 span3">
      <?php
          $this->beginWidget('zii.widgets.CPortlet', array(
              'title'=>'IP Address',
          ));
      ?>
        <h3>
            <?php 
                echo Yii::app()->request->userHostAddress
            ?>
            <small>Your Public IP Address</small>
        </h3>      
      <?php
          $this->endWidget();
      ?>

      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-list"></span>Leads and status',
            'titleCssClass'=>''
        ));
        ?>
        <?php 
            $this->widget('zii.widgets.grid.CGridView', array(
                    /*'type'=>'striped bordered condensed',*/
                    'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
                    'dataProvider'=>$gridDataProvider,
                    'template'=>"{items}",
                    'columns'=>array(
                        array('name'=>'status', 'header'=>'Status'),
                        array('name'=>'lead', 'header'=>'lead'),
                    ),
                )); 
        ?>

        <?php $this->endWidget(); ?>
    </div>
    <div class="span7">

        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span> Leads Report Chart',
            'titleCssClass'=>''
        ));
        ?>
        
       <?php
            $this->widget(
                'yiiwheels.widgets.highcharts.WhHighCharts',
                array(
                    'pluginOptions' => array(
                            "chart"=>array(
                                    "type"=>'pie'
                                ),
                            "title"=>"Leads and status report",
                            "pie"=>array(
                                    "allowPointSelect"=>true,
                                    "cursor"=>'pointer',
                                    "dataLabels"=>array(
                                            'enabled'=> false,
                                            // 'format'=> '<b>{point.name}</b>: {point.percentage:.1f} %',
                                            // 'style'=> array(
                                            //     'color'=> "(Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'"
                                            // )                               
                                        ),
                                    "showInLegend"=>true
                                ),
                            "series"=>array(
                                    array(
                                            "Name"=>"Brands",
                                            "colorByPoint"=>true,
                                            "data"=>$chartDataProvider
                                        )
                                )
                        ),
                )
            );
        ?>
        
        <?php $this->endWidget(); ?>

        
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