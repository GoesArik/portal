<?php
/* @var $this Cms_admin_info_bidangController */
/* @var $model InfoBidangCms */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-bidang-cms-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textField($model,'judul',array('size'=>90,'maxlength'=>150,'placeholder'=>"Ketikkan judul",'class'=>'span8')); ?>
		<?php echo $form->error($model,'judul'); ?>
	</div>
	<br>
	<div class="row">
		<?php $this->widget('ext.redactorjs.ERedactorWidget',array(
		    'model'=>$model,
		    'attribute'=>"isi",
		    'options'=>array(
		        'fileUpload'=>Yii::app()->createUrl('post/fileUpload',array(
		            'attr'=>"isi"
		        )),
		        'fileUploadErrorCallback'=>new CJavaScriptExpression(
		            'function(obj,json) { alert(json.error); }'
		        ),
		        'imageUpload'=>Yii::app()->createUrl('post/imageUpload',array(
		            'attr'=>"isi"
		        )),
		        'imageGetJson'=>Yii::app()->createUrl('post/imageList',array(
		            'attr'=>"isi"
		        )),
		        'imageUploadErrorCallback'=>new CJavaScriptExpression(
		            'function(obj,json) { alert(json.error); }'
		        ),
		    ),
		)); ?>
		<?php echo $form->error($model,'isi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->