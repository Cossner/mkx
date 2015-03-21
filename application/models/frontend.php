<?php

Class Frontend extends CI_Model{

Public function __construct(){
	
	parent::__construct();
	
}

/*========================================
=========== BASIC DB OPERATIONS ==========
========================================*/

/* GETTERS */

function getTable($database){
	$query = $this->db->get($database);
	return $query->result();
}

function GetRow($database,$tag){
	$this->db->where('id',$tag);
	$query = $this->db->get($database);
	$query = $query->result();
	return $query[0];
}

function getTableOrderNewest($database){
	$this->db->order_by("id","desc");
	$query = $this->db->get($database);
	return $query->result();
}

function GetLatestItem($database,$section){
	$this->db->where('section',$section);
	$query = $this->db->get($database);
	return $query->last_row('array');
}

function GetDBWhereIs($database,$where,$is){
	$this->db->where($where,$is);
	$query = $this->db->get($database);
	return $query->result();
}

function GetDBWhereIsOrderByNewest($database,$where,$is){
	$this->db->order_by("id","desc");
	$this->db->where($where,$is);
	$query = $this->db->get($database);
	return $query->result();
}

function GetNextTwo($database,$where){
	$this->db->order_by("id","desc");
	$query = $this->db->get($database, 1 ,$where);
	return $query->result();
}

function GetDBOrderByHighest($database,$where){
	$this->db->order_by($where,"desc");
	$query = $this->db->get($database);
	return $query->result();
}

function GetDBOrderByASC($database,$where){
	$this->db->order_by($where,"asc");
	$query = $this->db->get($database);
	return $query->result();
}

function GetDBOrderByHighestLimit($database,$where,$limit){
	$this->db->order_by($where,"desc");
	$query = $this->db->get($database,$limit);
	return $query->result();
}

function GetDBOrderByLowestLimit($database,$where,$limit){
	$this->db->order_by($where,"asc");
	$query = $this->db->get($database,$limit);
	return $query->result();
}


function GetSearchQuery($database,$search_query,$where,$filter){
	$this->db->where("(title LIKE '%{$search_query}%' OR author LIKE '%{$search_query}%' OR description LIKE '%{$search_query}%' OR content LIKE '%{$search_query}%')");
	$this->db->where($where,$filter);
	$this->db->order_by('title','desc');
	$query = $this->db->get($database);
	return $query->result();
}

function GetSearchQueryFrontend($database,$search_query){
	$this->db->where("(title LIKE '%{$search_query}%' OR author LIKE '%{$search_query}%' OR description LIKE '%{$search_query}%' OR content LIKE '%{$search_query}%')");
	$this->db->order_by('title','desc');
	$query = $this->db->get($database);
	return $query->result();
}

/* INSERT ROW */

function InsertRow($database,$arreglo){
	$this->db->insert($database,$arreglo);
}

function InsertRowReturnID($database,$arreglo){
	$this->db->insert($database,$arreglo);
	return $this->db->insert_id();
}

/* UPDATE ROW */

function UpdateRow($database,$id,$arreglo){
	$this->db->where('id',$id);
	$this->db->update($database,$arreglo);
}

/* DELETE ROW */

function DeleteRow($database,$id){
	$this->db->where('id', $id);
	$this->db->delete($database); 
}

/*========================================
============ PICTURE UPLOADING ===========
========================================*/

/* PICTURE UPLOADING */

function UploadPicture($name,$route,$file_name){
		
	if($_FILES[$file_name]["type"] == "image/jpeg"){
		$config['file_name'] = $name.'.jpg';
		$whichFormat = 'jpg';
	}else if($_FILES[$file_name]["type"] == "image/gif"){
		$config['file_name'] = $name.'.gif';
		$whichFormat = 'gif';
	}else if($_FILES[$file_name]["type"] == "image/png"){
		$config['file_name'] = $name.'.png';
		$whichFormat = 'png';
	}
	
	$config['overwrite'] = TRUE;
	$config['upload_path'] = $route;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']	= '200000';
	$config['max_width']  = '10000';
	$config['max_height']  = '10000';
	$this->load->library('upload', $config);
	if ( ! $this->upload->do_upload($file_name))
	{
		$this->session->set_flashdata('error', 'noimage');
		//$error = array('error' => $this->upload->display_errors());
	}
	else
	{
		//$data = array('upload_data' => $this->upload->data());
		/*include 'phmagick.php';
		if($whichFormat == 'png'){
    		$p = new phMagick($route.$name.'.png',$route.$name.'.jpg');
   			$p->resize($width,$height);
    		$p->convert();
    	}else if($whichFormat == 'gif'){
    		$p = new phMagick($route.$name.'.gif',$route.$name.'.jpg');
   			$p->resize($width,$height);
    		$p->convert();
    	}else if($whichFormat == 'jpg'){
 		   	$p = new phMagick($route.$name.'.jpg',$route.$name.'.jpg');	
    		$p->resize($width,$height);
    	}*/
	}
}

}