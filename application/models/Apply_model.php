<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Apply_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Codeigniter : Write Less Do More
	}
	public function apply_consult($query){
		$this->db->query($query);
	}

	public function consult_apply($data){
		$this->db->insert('apply_students',$data);
        return $this->db->insert_id();
	}
}

?>
