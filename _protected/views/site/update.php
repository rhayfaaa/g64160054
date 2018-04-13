<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Add Invoice | MOR Express';
?>
<div class="site-index">

    <h1>UPDATE INVOICE</h1>
    
    <div class="body-content">
    	<?php
    		$form = ActiveForm::begin()?>
        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?= $form->field($invoice, 'no_resi');?>
            	</div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?= $form->field($invoice, 'received_name');?>
            	</div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?= $form->field($invoice, 'dest_name');?>
            	</div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?php $items = ['Pending'=>'Pending', 'On Process'=>'On Process', 'Received'=>'Received']; ?>
            		<?= $form->field($invoice, 'status')->dropDownList($items, ['prompt' => 'Select']);?>
            	</div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<div class="col-lg-3">
            			<?= Html::submitButton('Update Invoice', ['class'=>'btn btn-primary']);?>
            		</div>
            		<div class="col-lg-2">
            			<a href=<?php echo yii::$app->homeUrl;?> class=" btn btn-primary">Back</a>
            		</div>
            	</div>
            </div>
        </div>

        <?php ActiveForm::end() ?>
    </div>
</div>
