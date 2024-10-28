<?php
class Fran_display extends CI_Model{
function __construct() {
parent::__construct();
}

		
        public function count_enquery($session)
        {

		    $this->load->database();
			return $this->db->count_all("enquiry",array('f_id'=>$session->cus_id));
		}


		public function daliy_enquiry($limit,$start,$session,$from_date,$to_date,$snm)
		{
				
                if($from_date!="" && $to_date!="")
                {
                	$this->db->where('enq_date >=', $from_date);
              		$this->db->where('enq_date <=', $to_date);
			        $this->db->where(array('f_id'=>$session->cus_id));
			        $query=$this->db->get("enquiry");
			        if ($query->num_rows() > 0) {
			            return $query->result_array();
			          
			           
			        }
			        return false;
                }
                else if($snm!="")
                {
                	
              		
			        $this->db->where(array('stud_name'=>$snm,'f_id'=>$session->cus_id));
			        $query=$this->db->get("enquiry");
			        if ($query->num_rows() > 0) {
			           foreach ($query->result() as $row) {
			                $data[] = $row;
			            }
			            return $data;
			           
			        }
			        return false;
                }
                else
                {
					$dt=date("Y-m-d");
					$this->db->limit($limit, $start);

			        $query = $this->db->get_where("enquiry",array('f_id'=>$session->cus_id,'enq_date'=>$dt));
			 
			        if ($query->num_rows() > 0) {
			            foreach ($query->result() as $row) {
			                $data[] = $row;
			            }
			            return $data;
			        }
			        return false;
			    }    
 		} 



}