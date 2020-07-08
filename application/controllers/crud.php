<!-- <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class crud extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
		$this->load->helper('url');
	}

	function index(){
		$data['user']=$this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
	}

	function tambah(){
		$this->load->view('v_input');
	}

	function tambah_aksi(){
		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$status = $this->input->post('status');
		$nohp = $this->input->post('nohp');
		$fakultas = $this->input->post('fakultas');

		$data = array(
			'nama' => $nama,
			'nim' => $nim,
			'status' => $status,
			'nohp' => $nohp,
			'fakultas' => $fakultas );
		$this->m_data->input_data($data,'user');
		redirect('crud/index');
	}
}
 ?> -->