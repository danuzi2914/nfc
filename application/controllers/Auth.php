<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
  * 
  */
 class Auth extends CI_Controller

 {
 	public function index()
 	{
 		
 		$data['title'] = 'IT HELPDESK';
 		$this->load->view('templates/auth_header', $data);
 		$this->load->view('auth/login');
 		$this->load->view('templates/auth_footer');
 
 	}
	public function registration()
	{
 		$this->load->library('form_validation');
 		$this->load->view('templates/header');
    	$this->load->view('templates/sidebar');
    	$this->load->view('templates/topbar');
    	$this->load->view('auth/registration');
    	$this->load->view('templates/footer');
    	

    	
 	} 

    private function proses_upload()
    {
        $config['upload_path']      = './assets/img/profile';
        $config['allowed_types']    = 'gif|jpg|png';
/*        $config['max_size']         = 2048;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;*/
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->proses_upload('image')) 
        {
            $data =$this->upload->data();

            $config['image_library']='gd2';
            $config['source_image']='./assets/img/profile/'.$data['file_name'];
            $config['create_thumb']='FALSE';
            $config['maintain_ratio']='FALSE';
            $config['quality']='60%';
            $config['width']='600';
            $config['height']='400';
            $config['new_image']='./assets/img/profile/'.$data['file_name'];
            $this->image_lib->resize();

            $image = $data['file_name'];
            
            $result= $this->m_data->save_upload($image);
            echo json_decode($result);
            /*$error = array('error' => $this->upload->display_errors());

            $this->load->view('auth/registration', $error);

        }

        else
        {
            $data['nama_image'] = $this->upload->data("file_name");
            $data['tipe_image'] = $this->upload->data('file_ext');
            $data['ukuran_image'] = $this->upload->data('file_size');
            $this->db->insert('nfcitb_login',$data);

            redirect ('auth/admin');*/
           /* $data = $this->upload->data();
            $name = $upload_data['file_name'];

            $insert = $this->m_data->insertimage($name);

            if ($insert) {
                redirect ('auth/registration');
            }else{
                echo "Gagal";*/
            }
        }


 	public function daftar()
 
 	{ 	
		$this->load->library('form_validation');
 		$this->form_validation->set_rules('name','Name','required');
 		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[nfcitb_login.email]',[
 			'is_unique' => 'This email has already registered!'
 		]);
 		$this->form_validation->set_rules('nohp','Nohp','required');
 		$this->form_validation->set_rules('password1','password','password salah');
 		$this->form_validation->set_rules('password1','Password','required|trim|min_length[5]|matches[password2]',
 			[
 			'matches' => 'Password dont match!',
 			'min_length' => 'Password too short!'
 		]);

 		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
 		if($this->form_validation->run($this) == false){
		$this->load->view('templates/header');
    	$this->load->view('templates/sidebar');
    	$this->load->view('templates/topbar');
    	$this->load->view('auth/registration');
    	$this->load->view('templates/footer');	
 	
 		} else {
		
		//$email =$this->input->post('email');
		//$count = $this->m_data->cek_email($email);
/*if ($count == 0){
masukeun fungsi penyimpanan ka databasena
}
else {
	notif sudah terdaftar kirim ka validasi form
}*/

 			$data = [
 				'name' => $this->input->post('name'),
 				'email' => $this->input->post('email'),
 				'nohp' => $this->input->post('nohp'),
 				'password' => md5($this->input->post('password1')),
 				'role_id' => 2,
 				'is_active' =>1,
 				'date_created' => time()
 				];

 				$this->m_data->input_data($data,'nfcitb_login');
 				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congratulation!Your account has been created. Please Login</div>');
		
 		redirect('auth/admin');
 		}

 	}


    public function deleteAdmin($id)
    {
        $getid['id'] = $this->uri->segment(3);
        $this->m_data->deleteAdmin($getid);

        redirect('auth/admin');
    }

	public function login()
 	{
 		$this->load->library('form_validation');	
		$this->load->view('templates/auth_header');
 		$this->load->view('auth/login');
 		$this->load->view('templates/auth_footer');	
 	}

public function masuk()
 
 	{ 	
		$this->load->library('form_validation');
		$email =$this->input->post('email');
		$password =$this->input->post('password');
		$y=$this->m_data->cekuser($email,$password);
			foreach ($y as $x) {
				$user=$x['counts'];

			}
		
 		if($this->form_validation->run($this) == false){
		$this->load->view('templates/auth_header');
 		$this->load->view('auth/login');
 		$this->load->view('templates/auth_footer');	
 		
 		}
		
if($user ==0 ) {
		 		 		
		 		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Username atau Password Salah </div>');
		
 		redirect('auth/login');

		 	

	} else {
			$this->session->set_flashdata('message','<div class="alert alert-primary" role="alert">Selamat Datang</div>');
		
 		redirect('auth/layanan');
 		}
 	}


        public function admin()
    {
        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');

        $dataadmin['data']=$this->m_data->admin();
        $this->load->view('auth/admin',$dataadmin);
        $this->load->view('templates/footer');
        

        
    }

     public function editadmin()
    {
        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('auth/editadmin');
        $this->load->view('templates/footer');
    }

    public function editA($id)
    {
        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
          $this->load->view('templates/topbar');
        /*$layananid = $this->uri->segment(3);
        */
        $WHERE = array('id' => $id);
        $data ['admin'] = $this->m_data->editA($WHERE,'nfcitb_login')->result();
        $this->load->view('auth/editadmin',$data);
        $this->load->view('templates/footer');
    }

    public function updateA()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $nohp  = $this->input->post('nohp');
        $password = $this->input->post('password');
        $image = $this->input->post('image');

        $data = array(
                'name'  => $name,
                'email'  => $email,
                'nohp' => $nohp,
                'password'  => $password,
                'image'  => $image
            );

        $where = array(
                'id' => $id
            );

        $proses=$this->m_data->updateA($where,$data,'nfcitb_login');

           if ($proses) {
            echo $proses;
        }else{
            echo "Gagal";
            echo "<br>";
            redirect('auth/admin');
        }
    }

 		public function layanan()
 	{
 		$this->load->library('form_validation');
 		$this->load->view('templates/header');
    	$this->load->view('templates/sidebar');
    	$this->load->view('templates/topbar');

         $datastatus=$this->m_data->dashboardstatus();
         foreach ($datastatus as $b ) {
            $s0 = $b['status0'];
            $s1 = $b['status1'];
            $s2 = $b['status2'];
            $s3 = $b['status3'];
        }
        $this->load->view('auth/layanan',array('s0'=>$s0,'s1'=>$s1,'s2'=>$s2,'s3'=>$s3));
    	$this->load->view('templates/footer');
 	}

 		public function statuslayanan()
 	{
 		$this->load->library('form_validation');
 		$this->load->view('templates/header');
    	$this->load->view('templates/sidebar');
    	$this->load->view('templates/topbar');

        $datastatus=$this->m_data->dashboardstatus();
         foreach ($datastatus as $b ) {
            $s0 = $b['status0'];
            $s1 = $b['status1'];
            $s2 = $b['status2'];
            $s3 = $b['status3'];
        }
        $this->load->view('auth/statuslayanan',array('s0'=>$s0,'s1'=>$s1,'s2'=>$s2,'s3'=>$s3));
        $this->load->view('templates/footer');

       
    	
 	}

 		public function statussoftware()
 	{
 		$this->load->library('form_validation');
 		$this->load->view('templates/header');
    	$this->load->view('templates/sidebar');
    	$this->load->view('templates/topbar');

           $datasoft=$this->m_data->dashboardsoft();
         foreach ($datasoft as $b ) {
            $l1 = $b['layanan1'];
            $l2 = $b['layanan2'];
            $l3 = $b['layanan3'];
            $l4 = $b['layanan4'];
            $l5 = $b['layanan5'];
            $l6 = $b['layanan6'];
            $l7 = $b['layanan7'];
        }
        $this->load->view('auth/statussoftware',array('l1'=>$l1,'l2'=>$l2,'l3'=>$l3,'l4'=>$l4,'l5'=>$l5,'l6'=>$l6,'l7'=>$l7));
        $this->load->view('templates/footer');
    	
 	}


 	 	public function tambahuser()
 	{
 		$this->load->library('form_validation');
 		$this->load->view('templates/header');
    	$this->load->view('templates/sidebar');
    	$this->load->view('templates/topbar');
    	$this->load->view('auth/tambahuser');
    	$this->load->view('templates/footer');
    	

    	
 	}

 		public function user()
 	{
 		$this->load->library('form_validation');
 		$this->load->view('templates/header');
    	$this->load->view('templates/sidebar');
    	$this->load->view('templates/topbar');
    	
    	$datauser['data']=$this->m_data->user();
    	$this->load->view('auth/user',$datauser);
    	$this->load->view('templates/footer');
    
   
 	}

 		public function adduser()
 
 	{ 	
		$this->load->library('form_validation');
 		$this->form_validation->set_rules('uid','Uid','required');
 		$this->form_validation->set_rules('nimnip','Nimnip','required');
 		$this->form_validation->set_rules('name','Name','required');
 		$this->form_validation->set_rules('nohp','Nohp','required');
 		$this->form_validation->set_rules('typeuser','Typeuser','required');

 		$this->form_validation->set_message('required','%s masih kosong, silahkan isi');

 		if ($this->form_validation->run() == FALSE) {
    	$this->template->load('template', 'auth/tambahuser');
 		} else {
 			$post = $this->input->post(null, TRUE);
 			/*$this->m_data->adduser($post);*/
 				$data = [
 				'uid' => $this->input->post('uid'),
 				'nimnip' => $this->input->post('nimnip'),
 				'name' => $this->input->post('name'),
 				'nohp' => $this->input->post('nohp'),
 				'typeuser' =>$this->input->post('typeuser'),
 				];

 				$this->m_data->input_data($data,'adduser');
 				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congratulation!Your account has been created.</div>');

 			if ($this->db->affected_rows() > 0 ) {

 				echo "<script>
 					alert('Data berhasil disimpan');</script>";
 			}

 			redirect ('auth/user');
 		}
	 }


    public function deleteUser($user_id)
    {

        $id['user_id'] = $this->uri->segment(3);
        $this->m_data->deleteUser($id);

        redirect('/auth/user');
    }

    public function edituser()
    {
        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('auth/edituser');
        $this->load->view('templates/footer');
    }

    public function editU($user_id)
    {
        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
          $this->load->view('templates/topbar');
        /*$layananid = $this->uri->segment(3);
        */
        $WHERE = array('user_id' => $user_id);
        $data ['user'] = $this->m_data->editU($WHERE,'adduser')->result();
        $this->load->view('auth/edituser',$data);
        $this->load->view('templates/footer');
    }

    public function updateU()
    {
        $user_id = $this->input->post('user_id');
        $uid = $this->input->post('uid');
        $nimnip = $this->input->post('nimnip');
        $name = $this->input->post('name');
        $nohp = $this->input->post('nohp');
        $typeuser = $this->input->post('typeuser');

        $data = array(
                'nimnip'  => $nimnip,
                'name'  => $name,
                'nohp'  => $nohp,
                'typeuser'  => $typeuser
            );

        $where = array(
                'user_id' => $user_id
            );

        $proses=$this->m_data->updateU($where,$data,'adduser');

           if ($proses) {
            echo $proses;
        }else{
            echo "Gagal";
            echo "<br>";
            redirect('auth/user');
        }
    }
        public function getData($uid)

    {
        $data=$this->db->query("SELECT * FROM adduser WHERE uid='".$uid."'")->result_array();
        echo json_encode($data);
    }

 			public function tambahlayanan()
 	{
 		$this->load->library('form_validation');
 		$this->load->view('templates/header');
    	$this->load->view('templates/sidebar');
    	$this->load->view('templates/topbar');
    	$this->load->view('auth/tambahlayanan');
    	/*if (isset($_GET['term'])) {
    		$result = $this->m_data->ceklayanan($_GET['term']);
    		if (count($result)>0) {

    			foreach ($result as $row) {
    			$result_array[] = array(
    				'uid'=>$row->uid,
    				'nimnip' =>strtoupper($row->nimnip),
    				'name' =>strtoupper($row->name),
    				'nohp' =>strtoupper($row->nohp),
    			);

    			echo json_encode($result_array);
    		}
    	}
    	$this->load->view('templates/f

    	}*/       
    	$uid=$this->input->post('uid');
    	$data=$this->m_data->ceklayanan($uid);
    	/*echo json_encode($data);
*/        $this->load->view('templates/footer');
    	
 	}

//FUNGSI PROSES INPUT KE MODEL
     public function inputdatalayanan()
    {

   /*    $t=time();
       date_default_timezone_set("Asia/Jakarta");
      $this->load-> Date('Y-m-d h:i',$t);*/
        $data = [
                'user_id' =>$this->input->post('uid'),
                'layanan_id' =>$this->input->post('namalayanan'),
                /*'created' =>$this->input->post('created',$t),*/
                ];
        $datas=$this->m_data->input_data($data,'tlayanan');
        if ($this->db->affected_rows() > 0 ) {

                echo "<script>
                    alert('Data berhasil disimpan');</script>";
            }

            redirect ('auth/layananmasuk');
        

        
    }

    public function editlayanan()
    {
        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('auth/editlayanan');
        $this->load->view('templates/footer');
    }


    public function editL($layanan_id)
    {
        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
          $this->load->view('templates/topbar');
        /*$layananid = $this->uri->segment(3);
        */
        $WHERE = array('layanan_id' => $layanan_id);
        $data ['layanan'] = $this->m_data->editL($WHERE,'addlayanan')->result();
        $this->load->view('auth/editlayanan',$data);
        $this->load->view('templates/footer');
    }

    public function updateL()
    {
        $layanan_id = $this->input->post('layanan_id');
        $namalayanan = $this->input->post('namalayanan');

        $data = array(
                'namalayanan'  => $namalayanan
            );

        $where = array(
                'layanan_id' => $layanan_id
            );

        $proses=$this->m_data->updateL($where,$data,'addlayanan');

           if ($proses) {
            echo $proses;
        }else{
            echo "Gagal";
            echo "<br>";
            redirect('auth/viewlayanan');
        }
    }

   /*     $id = $this->input->post('layanan_id');
        $data = array(
                'namalayanan'  => $this->input->post('namalayanan'),
            );

        $proses = $this->m_data->update($id, $data);
        if ($proses) {
            echo $proses;
        }else{
            echo "Gagal";
            echo "<br>";
            redirect('auth/viewlayanan');
        }*/
/*
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success ! Data berhasil.

            </div>');


        redirect('auth/viewlayanan');*/
/*
        $model = new m_data();
        $id = $this->request->getPost('layanan_id');
        $data = array(
                'namalayanan'  => $this->request->getPost('namalayanan'),);

        $model->updateLayanan($data,$id);
        return redirect()->to('auth/viewlayanan');*/
     /*   $this->load->library('form_validation');
        $namalayanan =$this->input->post('namalayanan');
        $query = $this->m_data->getedit($namalayanan);

        if ($this->form_validation->run() == FALSE) {
        
        } else{
        $post = $this->input->post(null, TRUE);
            $data = [
                'layanan_id' =>$this->input->post('namalayanan'),];
        $this->m_data->input_data($data,'addlayanan');
        $this->template->load('template', 'auth/editlayanan');
       if ($this->db->affected_rows() > 0 ) {

                echo "<script>
                    alert('Data berhasil disimpan');</script>";
            }

            redirect ('auth/viewlayanan');
        }*/
       /* $id = $this->input->post('layanan_id');
        $namalayanan = $this->input->post('namalayanan');

        $data  = array(
            'namalayanan' => $namalayanan, );

        $WHERE = array(
            'layanan_id' => $id, );
        $this->m_data->update_layanan($WHERE,$data,'addlayanan');
        redirect ('auth/viewlayanan');*/
    

 /*   public function do_delete($layanan_id)
    {
        $WHERE = array('layanan_id' => $layanan_id)
         $res = [
            
                'namalayanan' =>$this->input->delete('namalayanan'),
                'created' =>$this->input->post('created',$t),
                ];
        $res=$this->m_data->delete('addlayanan',$WHERE);
        if ($res>=1) {
            echo "<h2>Delete sukses</h2>";
        }
    
        $this->addlayanan->del($id);
        if ($this->db->affected_rows > 0) {
           echo "<script>alert('Data berhasil dihapus');</script>";
        }*/
    public function deleteLayanan($layanan_id)
    {
        $id['layanan_id'] = $this->uri->segment(3);
        $this->m_data->deleteLayanan($id);
        
        /*$data=$this->m_data->deleteLayanan();*/
        redirect('/auth/viewlayanan');
    }


     public function layananmasuk()
    {

        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');

       //$datalayanan['data']=$this->m_data->tlayanan();
        $data=$this->m_data->tlayanan();
        $this->load->view('auth/layananmasuk',array('data'=>$data));
        $this->load->view('templates/footer');
        

        
    }

 	public function addlayanan()
 
 	{ 	
        $this->load->library('form_validation');
 		$this->form_validation->set_rules('namalayanan','Namalayanan','required');

 		$this->form_validation->set_message('required','%s masih kosong, silahkan isi');

 		if ($this->form_validation->run() == FALSE) {
        $this->template->load('template', 'auth/layananbaru');
 		} else {
 			$post = $this->input->post(null, TRUE);
 			/*$this->m_data->adduser($post);*/
 				$data = [
 				'namalayanan' =>$this->input->post('namalayanan'),
 				];

 				$this->m_data->input_data($data,'addlayanan');
 				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congratulation!Your account has been created.</div>');

 			if ($this->db->affected_rows() > 0 ) {

 				echo "<script>
 					alert('Data berhasil disimpan');</script>";
 			}

 			redirect ('auth/viewlayanan');
 		}

         
       /* $model = new m_data();
        $data  = [
            'namalayanan' => $this->input->Post('namalayanan'),
        ];

            $model->simpanlayanan($data);
            redirect ('auth/tambahlayanan');*/
	 }
    

       public function editStatus($layanan_id)
    {
        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
          $this->load->view('templates/topbar');
        /*$layananid = $this->uri->segment(3);
        */
        $WHERE = array('t_layanan_id' => $layanan_id);
        $status ['status'] = $this->m_data->updateL($WHERE,'tlayanan')->result();
        $this->load->view('auth/layananmasuk',$status);
        $this->load->view('templates/footer');
    }

    public function prosesStatus()
    {
        $t_layanan_id = $this->input->post('idhidden');
        $status = $this->input->post('status');


        $data = array(
                'status'  => $status
            );

        $where = array(
                't_layanan_id' => $t_layanan_id
            );

        $proses=$this->m_data->updateL($where,$data,'tlayanan');

           if ($proses) {
            echo $proses;
        }else{
            echo "Gagal";
            echo "<br>";
            redirect('auth/layananmasuk');
        }
    }
        public function layananbaru()
    {
        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('auth/layananbaru');
        $this->load->view('templates/footer');
        

        
    }

        public function viewlayanan()
    {
        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        
        $datalayanan['data']=$this->m_data->viewlayanan();
        $this->load->view('auth/viewlayanan',$datalayanan);
        $this->load->view('templates/footer');
    
   
    }

        public function tlayanan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_id','User_id','required');
        $this->form_validation->set_rules('layanan_id','Layanan_id','required');

        $this->form_validation->set_message('required','%s masih kosong, silahkan isi');

        if ($this->form_validation->run() == FALSE) {
        $this->template->load('template', 'auth/tambahlayanan');
        } else {
            $post = $this->input->post(null, TRUE);
            /*$this->m_data->adduser($post);*/
                $data = [
                'user_id' =>$this->input->post('user_id'),
                 'layanan_id' =>$this->input->post('layanan_id'),
                ];

                $this->m_data->input_data($data,'tlayanan');
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congratulation!Your account has been created.</div>');

            if ($this->db->affected_rows() > 0 ) {

                echo "<script>
                    alert('Data berhasil disimpan');</script>";
            }

            redirect ('auth/layananmasuk');
        }
    
   
    }

   /* public function pdf()
    {
        $this->load->library('pdf');
        $pdf = new FPDF('l', 'mm', 'A5');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','16');
        $pdf->Cell(190,7,'IT HELPDESK DIREKTORAT SISTEM TEKNOLOGI DAN INFORMASI' ,0,1,'C');
        $pdf->SetFont('Arial', 'B', '12');
        $pdf->Cell(190,7,'Daftar Layanan IT HELPDESK',0,1,'C');

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'NIM/NIP',1,0);
        $pdf->Cell(85,6,'NAMA',1,0);
        $pdf->Cell(27,6,'NO HP',1,0);
        $pdf->Cell(25,6,'LAYANAN',1,1);
        $pdf->SetFont('Arial','',10);

   
    }*/
}


    
/*function timer()
{
    $original= '2012-05-03 17:00:00';

  date_default_timezone_set('Asia/Jakarta');


  $chunks = array(
      array(60 * 60 * 24 * 365, 'tahun'),
      array(60 * 60 * 24 * 30, 'bulan'),
      array(60 * 60 * 24 * 7, 'minggu'),
      array(60 * 60 * 24, 'hari'),
      array(60 * 60, 'jam'),
      array(60, 'menit'),
  );
 
  $today = time();
  $since = $today - $original;
 
  if ($since > 604800)
  {
    $print = date("M jS", $original);
    if ($since > 31536000)
    {
      $print .= ", " . date("Y", $original);
    }
    return $print;
  }
 
  for ($i = 0, $j = count($chunks); $i < $j; $i++)
  {
    $seconds = $chunks[$i][0];
    $name = $chunks[$i][1];
 
    if (($count = floor($since / $seconds)) != 0)
      break;
  }
 
  $print = ($count == 1) ? '1 ' . $name : "$count {$name}";
  return $print . ' yang lalu';
}

    public function waktu()
    {
        date_default_timezone_set('Asia/Jakarta');
        $chunks = array(
            array(60 * 60 * 24 * 365, 'tahun'),
            array(60 * 60 * 24 * 30, 'bulan'),
            array(60 * 60 * 24 * 7, 'minggu'),
            array(60 * 60 * 24, 'hari'),
            array(60 * 60, 'jam'),
            array(60, 'menit'),
        );

        $today = time();

        echo $today;
    }*/


/*
        if ($since > 604800) 
        {
            $print = date("M  jS", $ori);
            if ($since > 31536000)
            {
                $print .= ", " . date("Y", $ori);
            }
            return $print;
        }

        for ($i = 0, $j = count($chunks); $i < $j; $i++)
        {
            $second = $chunks[$i][0];
            $name = $chunks[$i][1];

            if (($count = floor($since / $second)) !=0)
                break;
            
            }

            $print = ($count == 1) ? '1'  . $name : "$count {$name}";
            return $print . 'yang lalu';
        }      
 	*/
 
 	//ori kemarin tgl 13/3/2020
/*public function masuk()
 
 	{ 	
		$this->load->library('form_validation');
 		$this->form_validation->set_rules('email','Email','trim|required|valid_email|[nfcitb_login.email]');
 		$this->form_validation->set_rules('password','password','trim|required');
 		
 		if($this->form_validation->run() == false){
		$this->load->view('templates/auth_header');
 		$this->load->view('auth/login');
 		$this->load->view('templates/auth_footer');	
 	
 		} else {
		
		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered!</div>');
		
 		redirect('auth');
	}
}

	private function _login()
	{

		$email =$this->input->post('email');
		$email =$this->input->post('password');

		$user = $this->db->get_where('user',['email'=> $email])->row_array();
		var_dump($user);

		die;
	}
*/


/*	public function masuk()
{

    $this->form_validation->set_rules('email','Email','trim|required|valid_email|[nfcitb_login.email]');
    $this->form_validation->set_rules('password','password','trim|required');

    if ($this->form_validation->run() == FALSE){
    	$this->load->view('templates/auth_header');
 		$this->load->view('auth/login');
 		$this->load->view('templates/auth_footer');
 		} else
    {
        $this->_login();
}
}

public function _login()
{
	$email =$this->input->post('email');
	$email =$this->input->post('password');

	$user = $this->db->get_where('user',['email'=> $email])->row_array();
	
	if($user) {
		 	if($user['is_active']==1) {

		 		if(password_verify($password, $user['password1'])) {
		 			$data = [
		 				'email'=>$user['email'],
		 				'role_id'=>$user['role_id']];
		 				$this->session->set_userdata($data);
		 				redirect('user');

		 		}else{
		 			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">password salah</div>');
		
 		redirect('auth');
		 		}

		 	}else{
		 		
		 		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">email tidak aktif </div>');
		
 		redirect('auth');

		 	}

	} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">email sudah ada</div>');
		
 		redirect('auth');
 		}
	}*/
 	/*public function registrationori()
 
 	{
 		$this->load->library('form_validation');
 		$this->form_validation->set_rules('name','Name','required');
 		$this->form_validation->set_rules('email','Email','required|valid_email');
 		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]matches[password2]',[
 			'matches' => 'Password dont match!',
 			'min_length' => 'Password too short!'
 		]);

 		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
 		if($this->form_validation->run() == false){

 		$this->load->view('templates/auth_header');
 		$this->load->view('auth/registration');
 		$this->load->view('templates/auth_footer');	
 		} else {
 			echo 'b';
 			$data = [
 				'name' => $this->input->post('name'),
 				'email' => $this->input->post('email'),
 				'image' => 'itb.png',
 				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
 				'role_id' => 2,
 				'is_active' =>1,
 				'data_created' => time()
 				];

 				$this->db->insert('user',$data);
 				
 				redirect('auth');
 		}

 	}	
*/

/* }*/