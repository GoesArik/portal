<?php
/* @var $this Cms_admin_info_bidangController */
/* @var $model InfoBidangCms */

$this->breadcrumbs=array(
	'Info Bidang Cms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List InfoBidangCms', 'url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#info-bidang-cms-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Info Bidang Cms</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'info-bidang-cms-grid',
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
		'UserBidang.nama',
		'Bidang.nama_bidang',
		/*
		'stts',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
