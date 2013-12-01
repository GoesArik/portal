<?php
/* @var $this Dashboard_info_bidangController */
/* @var $model InfoBidang */

$this->breadcrumbs=array(
	'Info Bidangs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List InfoBidang', 'url'=>array('index')),
	array('label'=>'Create InfoBidang', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#info-bidang-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Info Bidang</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'info-bidang-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'pager' => array('cssFile' => Yii::app()->theme->baseUrl.'/css/gridViewAdmin.css'),
	'columns'=>array(
	     array(
	      'header'=>'No',
	      'type'=>'raw',
	      'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
	      ),
		'judul',
		'tanggal',
		'Bidang.nama_bidang',
		/*
		'stts',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
