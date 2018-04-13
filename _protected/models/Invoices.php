<?php
	namespace app\models;

	use yii\db\ActiveRecord;

	class Invoices extends ActiveRecord
	{
		private $no_resi;
		private $received_name;
		private $dest_name;
		private $status;

		public function rules() {
			return[
				[['no_resi', 'received_name', 'dest_name', 'status'], 'required']
			];
		}
	}
?>