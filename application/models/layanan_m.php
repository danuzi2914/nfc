<?php defined('BASEPATH') OR exit('No direct script access allowed');

class layanan_m extends CI_Model {
	public function get($id=null)
	{
		$this->db->from('layanan');
		if($id != null) {
			$this->db->where('layanan_id',$id);
		}

		$query = $this->db->get();
		return $query;
	}

}
