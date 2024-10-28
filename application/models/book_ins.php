<?php
class Book_Ins extends CI_Model{
function __construct() {
parent::__construct();
}
public function autocompleteCategory($term)
    {
        $query = $this->db->query("SELECT book_name
            FROM book
            WHERE book_name LIKE '%".$term."%'
            GROUP BY book_name");
        echo json_encode($query->result_array());
    }
public function get_name_book($name)
{
	$query = $this->db->query("SELECT book_name
            FROM book
            WHERE book_name LIKE '%".$name."%'
            GROUP BY book_name");
        echo json_encode($query->result_array());
}
public function get_name_Auth($name)
{
	$query = $this->db->query("SELECT author_name
            FROM book
            WHERE author_name LIKE '%".$name."%'
            GROUP BY author_name");
        echo json_encode($query->result_array());
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('book',$data);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
public function dele($data,$a)
{
		$this->load->database();
		$this->db->where('id',$a); 
		$query=$this->db->delete('book');
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}
public function Update_Data($data,$up_id)
	{
		$this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('book', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
}
?>