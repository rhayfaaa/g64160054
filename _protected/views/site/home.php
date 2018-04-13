<?php
use yii\helpers\html;
/* @var $this yii\web\View */

$this->title = 'MOR Express';
?>
<div class="site-index">
<?php if(yii::$app->session->hasFlash('message')):?>
	<div class="alert alert-dismissible alert-success">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <?php echo yii::$app->session->getFlash('message');?>
	</div>
<?php endif;?> 

    <div class="jumbotron">
        <h1 style="color:#337ab7;">MOR Express</h1>

        <p class="lead">See your invoice here.</p>

        <p><a class="btn btn-lg btn-success" href="http://from-morf.blogspot.com">Mochamad Rhayfa - G64160054</a></p>
    </div>
    <div class="row">
    	<span style="margin-bottom: 20px;"><?= Html::a('Create', ['/site/create'], ['class' => 'btn btn-primary'])?></span>
    </div>
    <div class="body-content">

        <div class="row">
            <table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">No. Resi</th>
			      <th scope="col">Nama Penerima</th>
			      <th scope="col">Tujuan</th>
			      <th scope="col">Status</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php if(count($invoices) > 0):?>
			  		<?php foreach($invoices as $invoice): ?>
			    <tr class="table-active">
			      <th scope="row"><?php echo $invoice->no_resi;?></th>
			      <td><?php echo $invoice->received_name;?></td>
			      <td><?php echo $invoice->dest_name;?></td>
			      <td><?php echo $invoice->status;?></td>
			      <td>
			      	<span><?= Html::a('View', ['view', 'id' => $invoice->no_resi], ['class' => 'label label-info']) ?></span>
			      	<span><?= Html::a('Update', ['update', 'id' => $invoice->no_resi], ['class' => 'label label-success']) ?></span>
			      	<span><?= Html::a('Delete', ['delete', 'id' => $invoice->no_resi], ['class' => 'label label-danger']) ?></span>
			      </td>
			    </tr>
					<?php endforeach; ?>
			    <?php else: ?>
			    	<tr>
			    		<td>No Records Found!</td>
			    	</tr>
			    <?php endif; ?>
			  </tbody>
			</table> 
        </div>

    </div>
</div>
