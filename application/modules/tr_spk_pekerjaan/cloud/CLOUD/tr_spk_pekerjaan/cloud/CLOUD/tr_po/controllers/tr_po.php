<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPCLASS;

class Tr_po extends App {
	
	public function __construct() {
		parent::__construct();
			
		$this->load->model('tr_po_model');
		$this->load->library('datatables');
		$this->load->library('dateUtils');
	}

	public function index() {
		$data = array();
		$data['idmenu'] = 'po-table';
		$data['content'] = '../../tr_po/views/table';
		$data['js'] = '../../tr_po/views/table_js';
		$data['btnurl'] = base_url().'index.php/tr_po/form';
		$this->buildView($data);
	}
	
	public function form($id = FALSE) {
		$data = array();
		$data['idmenu'] 		= 'po-form';
		$data['content'] 		= '../../tr_po/views/form';
		$data['datacontent'] 	= $this->tr_po_model->get_optional();
		$data['js'] 			= '../../tr_po/views/form_js';
		if($id!==FALSE) {
			$data['datajs'] 	= $this->tr_po_model->get_po_and_detail($id);
		}
		$this->buildView($data);
	}
	
	public function save() {
		$data = $this->input->post();
		$data['tanggal'] = $this->dateutils->dateStr_to_mysql($data['tanggal']);
		// $data['volume'] = str_replace(',', '', $data['volume']);
		// $data['harga_satuan'] = str_replace(',', '', $data['harga_satuan']);
		if($this->input->post('id')==='') {
			return $this->tr_po_model->_insert($data);
		} else {
			return $this->tr_po_model->_update($data, $this->input->post('id'));
		}
	}
	
	public function delete($id) {
		$res = $this->tr_po_model->_delete($id);
		if($res) {
			$out = array(
				'response'=>'1',
				'msg'=>'Success'
			);
		} else {
			$out = array(
				'response'=>'0',
				'msg'=>'Failed'
			);
		}
		$this->output->set_content_type('application/json');
		echo json_encode($out);
	}
	
	public function genDT() {
		// $this->output->enable_profiler(TRUE);
		$this->datatables->select('po.id, DATE_FORMAT(po.tanggal,"%d/%m/%Y") as tanggal, po.no_po, po.kode_spk, po.kode_bpdp, '.
				'po.no_unit', FALSE)
			->from('tr_po po')
			->unset_column('po.id')
			->where(array('kode_entity'=>$this->session->userdata('kode_entity')))
			->add_column('action', '<a href="javascript:action(\'edit\',\'$1\')" class="row-edit" data-id="$1">'.
				'<span class="glyphicons glyphicons-edit"></span></a>&nbsp;&nbsp'.
				'<a href="javascript:action(\'delete\',\'$1\')" class="row-delete" data-id="$1">'.
				'<span class="glyphicons glyphicons-bin"></span></a>', 'po.id');
		echo $this->datatables->generate();
	}
	
}