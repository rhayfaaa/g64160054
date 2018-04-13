<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'View Invoice | MOR Express';
?>
<div class="site-index">

    <h1>VIEW INVOICE</h1>
    
    <div class="body-content">
    	<div class="list-group">
		  <a href="#" class="list-group-item list-group-item-action active">
		  	<?php echo $invoice->no_resi; ?>
		  </a>
		  <a href="#" class="list-group-item list-group-item-action disabled">
		  	<?php echo $invoice->received_name; ?>
		  </a>
		  <a href="#" class="list-group-item list-group-item-action disabled">
		  	<?php echo $invoice->dest_name; ?>
		  </a>
		  <a href="#" class="list-group-item list-group-item-action disabled">
		  	<?php echo $invoice->status; ?>
		  </a>
		</div>

		<div class="row">
			<a href=<?php echo yii::$app->homeUrl;?> class=" btn btn-primary">Back</a>
		</div>
    </div>
</div>
