<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class m_data extends CI_Model
{
	
	public function tampil_data()
	{
		return $this->db->get('user');
	}

	public function cekuser($email,$password)
	{
		return $this->db->query("SELECT count(*) as counts FROM nfcitb_login WHERE email='".$email."' AND password =md5('".$password."')")->result_array();
	}

    public function cek_email($email)
	{
		return $this->db->query("SELECT * FROM nfcitb WHERE email='$email'");
	}

	public function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function user()
	{
		return $this->db->query("SELECT * FROM adduser")->result_array();
	}

		public function editU($where,$table)
	{
		return $this->db->get_where($table,$where);
				
	
	}

	public function updateU($where,$data, $table)
	{

		$this->db->where($where);
		$this->db->update($table,$data);
/*
		$query =$this->db->update('addlayanan',$data,$id);

		if ($query) {
			return true;
		}else{
			return false;
		}*/
	}

	public function admin()
	{
		return $this->db->query("SELECT * FROM nfcitb_login")->result_array();
	}
/*
	public function getimage(){
		return $this->db->get('image');
	}*/

		public function editA($where,$table)
	{
		return $this->db->get_where($table,$where);
				
	
	}

	public function updateA($where,$data, $table)
	{

		$this->db->where($where);
		$this->db->update($table,$data);
/*
		$query =$this->db->update('addlayanan',$data,$id);

		if ($query) {
			return true;
		}else{
			return false;
		}*/
	}

	public function save_upload($image){
		$data = array(
			'image' => $image
		);

		$result=$this->db->insert('nfcitb_login', $data);
	}
	public function ceklayanan($uid)
	{
		/*$this->db->like('uid','BOTH');
		$this->db->order_by('id','asc');
		$this->db->limit(10);
		return $this->db->get('adduser')->result();*/

		$hsl=$this->db->query("SELECT * FROM adduser WHERE uid='".$uid."'")->result_array();
		// if ($hsl->num_rows() > 0 ) {
		// 	foreach ($hsl->result() as $data) {
		// 		$hasil = array(
		// 			'uid' => $data->uid,
		// 			'nimnip' => $data->nimnip,
		// 			'name' => $data->name,
		// 			'nohp' => $data->nohp,
		// 		);
		// 	}
		// }

		return $hsl;
	}

		public function viewlayanan()
	{
		return $this->db->query("SELECT * FROM addlayanan")->result_array();
	}

/*	public function tlayanan2()
	{
		$this->db->SELECT('tlayanan.*, adduser.uid as uid, adduser.nimnip as nimnip, adduser.name as name, adduser.nohp as nohp, addlayanan.namalayanan as namalayanan' );
		$this->db->FROM('tlayanan');
		$this->db->JOIN('adduser', 'adduser.user_id = tlayanan.user_id');
		$this->db->JOIN('addlayanan', 'addlayanan.layanan_id = tlayanan.layanan_id');

		if ($id !=null) {
			$this->db->WHERE('t_layanan_id', $id);

		}
		$query = $this->db->get();
		return $query;
	/*	return $this->db->get('layananmasuk')->result_array();*/
	
	public function tlayanan()
	{
		return $this->db->query("SELECT b.uid, b.nimnip,b.name,b.nohp,c.namalayanan,a.wkt_layanan,a.status,a.t_layanan_id FROM `tlayanan` as a INNER JOIN adduser as b ON a.user_id=b.uid INNER JOIN addlayanan as c ON a.layanan_id=c.layanan_id order by a.status asc")->result_array();
	/*return $this->db->query("SELECT b.uid, b.nimnip,b.name,b.nohp,c.namalayanan,a.wkt_layanan,a.status,a.t_layanan_id FROM `tlayanan` as a INNER JOIN adduser as b ON a.user_id=b.uid INNER JOIN addlayanan as c ON a.layanan_id=c.layanan_id")->result_array();*/
	
	}
/*
	public function updateLayanan ($data, $id)
	{

		$query = $this->db->table('addlayanan')->update($data, array('layanan_id' => $id));
		return $query;
		$this->db->FROM('addlayanan');
		if ($namalayanan != null) {
			$this->db->WHERE('namalayanan',$namalayanan);
		}

		$query = $this->db->get();
		return $query;
	}
*/
/*	public function update_layanan ($WHERE,$data,$table)
	{
		$this->db->WHERE($WHERE);
		$this->db->update($table,$data);
		return $this->db->get_where($table,$WHERE);
	}*/

	public function editL($where,$table)
	{
		return $this->db->get_where($table,$where);
				
	
	}

	public function updateL($where,$data, $table)
	{

		$this->db->where($where);
		$this->db->update($table,$data);
/*
		$query =$this->db->update('addlayanan',$data,$id);

		if ($query) {
			return true;
		}else{
			return false;
		}*/
	}


	public function deleteLayanan($id)
	{

		$query = $this->db->delete('addlayanan',$id);
		if ($query) {
			return true;
		}else{
			return false;
		}
	/*	return $this->db->query("DELETE * FROM addlayanan WHERE layanan_id")->row();*/
		/*$res=$this->db->delete()("SELECT * FROM addlayanan WHERE namalayanan='".$layanan."'")->result_array();
		= $this->db->delete($table,$WHERE);
		return $res;
		$this->db->WHERE('layanan_id',$id);
		$this->db->delete('addlayanan');*/
	}

	public function deleteUser($id)
	{

		$query = $this->db->delete('adduser',$id);
		if ($query) {
			return true;
		}else{
			return false;
		}

	}

	public function deleteAdmin($id)
	{
		$query = $this->db->delete('nfcitb_login',$id);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function dashboardstatus()
	{
			return $this->db->query("SELECT (SELECT COUNT(*) FROM tlayanan WHERE status = 0) as status0,(SELECT COUNT(*) FROM tlayanan WHERE status = 1) as status1,(SELECT COUNT(*) FROM tlayanan WHERE status = 2) as status2,(SELECT COUNT(*) FROM tlayanan WHERE status = 3) as status3")->result_array();
	}

		public function dashboardsoft()
	{
			return $this->db->query("SELECT (SELECT COUNT(*) FROM tlayanan WHERE layanan_id = 1) as layanan1,(SELECT COUNT(*) FROM tlayanan WHERE layanan_id = 2) as layanan2,(SELECT COUNT(*) FROM tlayanan WHERE layanan_id = 3) as layanan3,(SELECT COUNT(*) FROM tlayanan WHERE layanan_id = 4) as layanan4,(SELECT COUNT(*) FROM tlayanan WHERE layanan_id = 5) as layanan5,(SELECT COUNT(*) FROM tlayanan WHERE layanan_id = 6) as layanan6,(SELECT COUNT(*) FROM tlayanan WHERE layanan_id = 7) as layanan7")->result_array();
	}
}
 ?>
