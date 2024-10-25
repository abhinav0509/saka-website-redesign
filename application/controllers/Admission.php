<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admission extends CI_Controller {
	 var $globaldata;
     function __construct()
     {
	 
		
     	 parent::__construct();
		 $this->load->library("Pdf");
		 $this->load->database();
		
		 $var=$this->session->userdata;
	   	 if(isset($var['login_user']))
     	 {
          
          $this->globaldata=array(
		  'userdata'=>$var['login_user']
	 );
       }

     }
	

public function Delete_Data()
 {
 	$a= $_POST['id'];
	$this->load->model('admission_data');
	$res=$this->admission_data->dele1($a);
				if($res==true)
				{
					redirect('Franchisee/Admission');
				}
				else
				{
					echo "Your Data Is Not Inserted";
					redirect('Franchisee/Admission');
				}
 	
 }	
 
public function Delete_Admission()
 {
 	$a= $_POST['id'];
	$this->load->model('admission_data');
	$res=$this->admission_data->dele($a);
				if($res==true)
				{
					redirect('Admin/Fran_Admission');
				}
				else
				{
					echo "Your Data Is Not Inserted";
					redirect('Admin/Fran_Admission');
				}
 	
 }


public function Fran_Admission()
{
			
  				$arr=array();
  				$farr=array();
  				$b="";
				$data=$this->globaldata['userdata'];
				if($data->cus_id==null || $data->cus_id==""){
					redirect('welcome/Franchisee_Login');
				}
				$fid=$data->cus_id;
				$fname1=$data->institute_name;
				$up_id = $this->input->post('bid');
				$config['upload_path'] = './uploads/Admission/';
				$config['allowed_types'] = 'gif|jpg|png';
				
				$this->load->library('upload', $config);
				if ( !$this->upload->do_upload('upload'))
				{
					$error = array('error' => $this->upload->display_errors());
				} 
				else
				{
			 	$data = array('upload_data' => $this->upload->data());
			 	foreach($data as $d)
			 	{
			       $b= $d['file_name'];
			 	}
				
				}
				$endt=$this->input->post('doa');
				$arr =explode("/",$endt); 
				$arr=array_reverse($arr);
				$str =implode($arr,"/");
				$str1=str_replace("/","-",$str);

			    $edt=$this->input->post('edt');
				$farr =explode("/",$edt); 
				$farr=array_reverse($farr);
				$strr =implode($farr,"/");
				$str2=str_replace("/","-",$strr);

                $stud = $this->input->post('sid');
				$this->load->model('admission_data');
				$resid = $this->admission_data->Check_sid($stud);
				if($resid){
					$mess = "Id already exist!Please refresh your page!";
					$this->session->set_userdata('msg',$mess);
					redirect('Franchisee/Admission');
				}
			    else{
			
	
	$data = array(
					
					'fran_Name' => $fname1,
					'f_id' => $fid,
					'ad_id' => $this->input->post('max_id'),
					'stud_id' => $this->input->post('sid'),
					'name' => $this->input->post('sname'),
					'email' => $this->input->post('eml'),
					'add' => $this->input->post('add'),
					'contact' => $this->input->post('cnt'),
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'qualification' => $this->input->post('quali'),
					'course_Name' => $this->input->post('course'),
					'center_name' => $this->input->post('cent'),
					'course_date' => $str1,
					//'exame_date' => $str2,
					'timing' => $this->input->post('btime'),
					'remark' => $this->input->post('remark'),
					'image' => $b,
					'exm_status'=>'notactive',
					'remark'=>0,
					'O_Status'=>0,
					'tfee'=>$this->input->post('tfee'),
					'total_module'=>$this->input->post('hid2'),
					'dob'=>$this->input->post('studdob'),
					'studrel'=>$this->input->post('studrel'),
					'gender'=>$this->input->post("gender"),
					'padd'=>$this->input->post("padd"),
					'currrent_module'=>1,
					'n_status'=>'unread',
					'e_status'=>''
		);
		$data1 =array(
			'fid' => $fid,
			'sid' => $this->input->post('sid'),
			'course' => $this->input->post('course'),
			'status' => 'Incomplete'
		);
	
					$cou=$this->input->post('course');
					$studd_nm=$this->input->post('sname');
					$stud_mob=$this->input->post('cnt');

					$this->load->model('admission_data');
					$this->admission_data->Insert_Exam_Module_msg($cou,$studd_nm,$stud_mob);
	
					$res1=$this->admission_data->Insert_Exam_Module($data1,$cou);
					$res=$this->admission_data->Insert_Data($data,$cou);
					redirect('Franchisee/Admission');
              }
}


public function Fran_Admission1()
{
  				$arr=array();
  				$farr=array();
  				$b="";
				$data=$this->globaldata['userdata'];
				$fid=$data->cus_id;
				$fname1=$data->institute_name;
				$up_id = $this->input->post('bid');
				$config['upload_path'] = './uploads/Admission/';
				$config['allowed_types'] = 'gif|jpg|png';
				
				$this->load->library('upload', $config);
				if ( !$this->upload->do_upload('upload'))
				{
					$error = array('error' => $this->upload->display_errors());
				} 
				else
				{
			 	$data = array('upload_data' => $this->upload->data());
			 	foreach($data as $d)
			 	{
			       $b= $d['file_name'];
			 	}
				
				}
				$endt=$this->input->post('doa');
				$arr =explode("/",$endt); 
				$arr=array_reverse($arr);
				$str =implode($arr,"/");
				$str1=str_replace("/","-",$str);

			    $edt=$this->input->post('edt');
				$farr =explode("/",$edt); 
				$farr=array_reverse($farr);
				$strr =implode($farr,"/");
				$str2=str_replace("/","-",$strr);
				//die("ssdsdsdsa");

	
	$data = array(
					
					'fran_Name' => $fname1,
					'f_id' => $fid,
					'ad_id' => $this->input->post('max_id'),
					'stud_id' => $this->input->post('sid'),
					'name' => $this->input->post('sname'),
					'email' => $this->input->post('eml'),
					'add' => $this->input->post('add'),
					'contact' => $this->input->post('cnt'),
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'qualification' => $this->input->post('quali'),
					'course_Name' => $this->input->post('course'),
					'center_name' => $this->input->post('cent'),
					'course_date' => $str1,
					//'exame_date' => $str2,
					'timing' => $this->input->post('btime'),
					'remark' => $this->input->post('remark'),
					'image' => $b,
					'exm_status'=>'notactive',
					'remark'=>0,
					'O_Status'=>0,
					'tfee'=>$this->input->post('tfee'),
					'n_status'=>'unread'
		);
	

					$this->load->model('admission_data');
					$res=$this->admission_data->Insert_Data($data);
					redirect('Franchisee/Admission');
}

public function getadmissionsinglepdf()
{
    $id=$_GET['id'];
    $this->load->model("frn_excell");
    $this->frn_excell->getaddsinglepdf($id);
}
/*public function getadmissionsinglepdf1()
{
    $id=$_GET['id'];
    $this->load->model("frn_excell");
    $this->frn_excell->getaddsinglepdf1($id);
}*/
public function getadmissionsingleExcel()
{
	$id=$_GET['id'];
	$name=$_GET['name'];
    $this->load->model("frn_excell");
    $this->frn_excell->getaddsingleexcel($id,$name);
}
/*public function getadmissionsingleExcel1()
{
	$id=$_GET['id'];
	$name=$_GET['name'];
    $this->load->model("frn_excell");
    $this->frn_excell->getaddsingleexcel1($id,$name);
}*/
/*public function getAdmissioncatpdf()
{
    $fdt=$_GET['fdate'];
    $tdt=$_GET['todate'];
    $course=$_GET['course'];

    $farr=array();
	$tarr=array();

	$farr =explode("/",$fdt); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$from_date=str_replace("/","-",$newfdate1);

	$tarr =explode("/",$tdt); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$to_date=str_replace("/","-",$newtdate1);
    
    $this->load->model("frn_excell");
    if($from_date!="" && $to_date!="" && $course!="")
    {
    	$this->frn_excell->get_all_course_date_pdf($from_date,$to_date,$course,$this->globaldata['userdata']);
    }
    else if($from_date!="" && $to_date=="" && $course!="")
    {
        $this->frn_excell->get_date_course_date_pdf($from_date,$course,$this->globaldata['userdata']); 	
    }
    else if($from_date=="" && $to_date=="" && $course!="")
    {
        $this->frn_excell->get_course_wise_pdf($course,$this->globaldata['userdata']); 	
    }
    else if($from_date!="" && $to_date=="" && $course=="")
    {
        $this->frn_excell->get_date_wise_pdf($from_date,$this->globaldata['userdata']); 	
    }
    else if($from_date=="" && $to_date=="" && $course=="")
    {
        $this->frn_excell->get_all_pdf($this->globaldata['userdata']); 	
    }


}*/
public function getAdmissioncatpdf1()
{
    $fdt=$_GET['fdate'];
    $tdt=$_GET['todate'];
    $course=$_GET['course'];

    $farr=array();
	$tarr=array();

	$farr =explode("/",$fdt); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$from_date=str_replace("/","-",$newfdate1);

	$tarr =explode("/",$tdt); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$to_date=str_replace("/","-",$newtdate1);
    
    $this->load->model("frn_excell");
    $this->frn_excell->get_demo_admission_pdf($from_date,$to_date,$course,$this->globaldata['userdata']);

   

}

public function getAdmissioncatexcel()
{
	$fdt=$_GET['fdate'];
    $tdt=$_GET['todate'];
    $course=$_GET['course'];

    $farr=array();
	$tarr=array();

	$farr =explode("/",$fdt); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$from_date=str_replace("/","-",$newfdate1);

	$tarr =explode("/",$tdt); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$to_date=str_replace("/","-",$newtdate1);
    
    $this->load->model("frn_excell");
    if($from_date!="" && $to_date!="" && $course!="")
    {
    	$this->frn_excell->get_all_course_date_excel($from_date,$to_date,$course,$this->globaldata['userdata']);
    }
    else if($from_date!="" && $to_date=="" && $course!="")
    {
        $this->frn_excell->get_date_course_date_excel($from_date,$course,$this->globaldata['userdata']); 	
    }
    else if($from_date=="" && $to_date=="" && $course!="")
    {
        $this->frn_excell->get_course_wise_excel($course,$this->globaldata['userdata']); 	
    }
    else if($from_date!="" && $to_date=="" && $course=="")
    {
        $this->frn_excell->get_date_wise_excel($from_date,$this->globaldata['userdata']); 	
    }
    else if($from_date=="" && $to_date=="" && $course=="")
    {
        $this->frn_excell->get_all_excel($this->globaldata['userdata']); 	
    }

}

/*
public function getAdmissioncatexcel1()
{
	$fdt=$_GET['fdate'];
    $tdt=$_GET['todate'];
    $course=$_GET['course'];
    $stud=$_GET['stud'];

    $farr=array();
	$tarr=array();

	$farr =explode("/",$fdt); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$from_date=str_replace("/","-",$newfdate1);

	$tarr =explode("/",$tdt); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$to_date=str_replace("/","-",$newtdate1);
	$dt=date('Y-m-d');
    
    $this->load->model("frn_excell");
    if($from_date!=$dt && $to_date!=$dt && $course!="")
    {
    	$this->frn_excell->get_all_course_date_excel1($from_date,$to_date,$course,$this->globaldata['userdata']);
    }
    else if($from_date!=$dt && $to_date==$dt && $course!="")
    {
        $this->frn_excell->get_date_course_date_excel1($this->globaldata['userdata'],$from_date,$to_date,$course); 	
    }
    else if($from_date==$dt && $to_date==$dt && $course!="")
    {
        $this->frn_excell->get_course_wise_excel1($course,$this->globaldata['userdata']); 	
    }
    else if($from_date!=$dt && $to_date==$dt && $course=="")
    {
       $this->frn_excell->get_date_wise_excel1($this->globaldata['userdata'],$from_date,$to_date,$course); 	
    }
    else if($from_date!=$dt && $to_date=$dt && $course=="")
    {
       $this->frn_excell->get_date_wise_excel1($this->globaldata['userdata'],$from_date,$to_date,$course); 	
    }
    else if($from_date==$dt && $to_date==$dt && $course=="")
    {
        
        $this->frn_excell->get_all_excel1($this->globaldata['userdata'],$from_date,$to_date,$course); 	
    }

}
*/

 public function GetAuto_Data()
	{	
	  
	    $name= $this->input->post('term');	
	    $this->load->model('admission_data');	
	    $this->admission_data->getdata($name);
	
	}

	 public function GetAuto_Data1()
	{	
	  
	    $name= $this->input->post('term');	
	    $this->load->model('admission_data');	
	    $this->admission_data->getdata1($name);
	
	}

	
	
	
	public function Home()
	{
		$data=$this->globaldata;
		$this->load->view('Franchisee/header',$data);
		$this->load->view('Franchisee/Home');		
		$this->load->view('Franchisee/footer');
	}
	
	
		


public function addmissin_update()
{
	
		$old=$this->input->post('hid3');
		$cur=$this->input->post('course');
		$b="";
		if($old==$cur)
		{
		//echo "Equal";
		//die();
		$arr=array();
		$farr=array();
		$up_id = $this->input->post('bid');
		$config['upload_path'] = './uploads/Admission/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if ( !$this->upload->do_upload('upload'))
		{
			$error = array('error' => $this->upload->display_errors());
		} 
		else
		{
			 $data = array('upload_data' => $this->upload->data());
			 foreach($data as $d)
			 {
			    $b= $d['file_name'];
			 }
		}

				$endt=$this->input->post('doa');
				$arr =explode("/",$endt); 
				$arr=array_reverse($arr);
				$str =implode($arr,"/");
				$str1=str_replace("/","-",$str);

				$edt=$this->input->post('edt');
				$farr =explode("/",$edt); 
				$farr=array_reverse($farr);
				$strr =implode($farr,"/");
				$str2=str_replace("/","-",$strr);

					if($b!="")
					{
						$data1 = array(
					
					'name' => $this->input->post('sname'),
					'email' => $this->input->post('eml'),
					'add' => $this->input->post('add'),
					'contact' => $this->input->post('cnt'),
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'qualification' => $this->input->post('quali'),
					'course_Name' => $this->input->post('course'),
					'center_name' => $this->input->post('cent'),
					'course_date' => $str1,
					//'exame_date' => $str2,
					'dob'=>$this->input->post('studdob'),
					'studrel'=>$this->input->post('studrel'),
					'gender'=>$this->input->post("gender"),
					'padd'=>$this->input->post("padd"),
					'timing' => $this->input->post('btime'),
					'remark' => $this->input->post('remark'),
					'tfee' => $this->input->post('tfee'),
					'image' => $b
		);
						$this->load->model('admission_data');
						$res=$this->admission_data->Update_Admiossion($data1,$up_id);
						redirect('Franchisee/Admission');
					}
					else if($b=="")
					{
						$data1 = array(
					
					'name' => $this->input->post('sname'),
					'email' => $this->input->post('eml'),
					'add' => $this->input->post('add'),
					'contact' => $this->input->post('cnt'),
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'qualification' => $this->input->post('quali'),
					'course_Name' => $this->input->post('course'),
					'center_name' => $this->input->post('cent'),
					'course_date' => $str1,
					//'exame_date' => $str2,
					'dob'=>$this->input->post('studdob'),
					'studrel'=>$this->input->post('studrel'),
					'gender'=>$this->input->post("gender"),
					'padd'=>$this->input->post("padd"),
					'timing' => $this->input->post('btime'),
					'remark' => $this->input->post('remark'),
					'tfee' => $this->input->post('tfee')
					
		);
					}

				}
			else
			{
				
				$this->load->database();
				$this->db->order_by('quiz_cat_name','asc');
				$this->db->where('course',$cur);
				$this->db->limit(1,0);
				$query1=$this->db->get('quiz_category');
				$result=$query1->result_array();
				$result[0]['quiz_cat_name'];
				$data['module_id']=$result[0]['qid'];
				$data['module_name']=$result[0]['quiz_cat_name'];
				
				///print_r($data);
				$modulename=$data['module_name'];
				$moduleid=$data['module_id'];
			
				/********************************Start**********************************/
			
				$arr=array();
				$farr=array();
				$up_id = $this->input->post('bid');
				$config['upload_path'] = './uploads/Admission/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if ( !$this->upload->do_upload('upload'))
				{
				$error = array('error' => $this->upload->display_errors());
				} 
				else
				{
					$data = array('upload_data' => $this->upload->data());
					foreach($data as $d)
					{
					$b= $d['file_name'];
					}
				}


				$endt=$this->input->post('doa');
				$arr =explode("/",$endt); 
				$arr=array_reverse($arr);
				$str =implode($arr,"/");
				$str1=str_replace("/","-",$str);

				$edt=$this->input->post('edt');
				$farr =explode("/",$edt); 
				$farr=array_reverse($farr);
				$strr =implode($farr,"/");
				$str2=str_replace("/","-",$strr);

					if($b!="")
					{
						$data1 = array(
					
					'name' => $this->input->post('sname'),
					'email' => $this->input->post('eml'),
					'add' => $this->input->post('add'),
					'contact' => $this->input->post('cnt'),
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'qualification' => $this->input->post('quali'),
					'course_Name' => $this->input->post('course'),
					'center_name' => $this->input->post('cent'),
					'course_date' => $str1,
					//'exame_date' => $str2,
					'module_name' => $modulename,
					'module_id' => $moduleid,
					'total_module' => $this->input->post('hid2'),
					'timing' => $this->input->post('btime'),
					'remark' => $this->input->post('remark'),
					'tfee' => $this->input->post('tfee'),
					'image' => $b
					);
						$this->load->model('admission_data');
						$res=$this->admission_data->Update_Admiossion($data1,$up_id);
						redirect('Franchisee/Admission');
					}
					else if($b=="")
					{
						$data1 = array(
					
					'name' => $this->input->post('sname'),
					'email' => $this->input->post('eml'),
					'add' => $this->input->post('add'),
					'contact' => $this->input->post('cnt'),
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'qualification' => $this->input->post('quali'),
					'course_Name' => $this->input->post('course'),
					'center_name' => $this->input->post('cent'),
					'course_date' => $str1,
					//'exame_date' => $str2,
					'dob'=>$this->input->post('studdob'),
					'studrel'=>$this->input->post('studrel'),
					'gender'=>$this->input->post("gender"),
					'padd'=>$this->input->post("padd"),
					'module_name' => $modulename,
					'module_id' => $moduleid,
					'total_module' => $this->input->post('hid2'),
					'timing' => $this->input->post('btime'),
					'remark' => $this->input->post('remark'),
					'tfee' => $this->input->post('tfee')
					
		);
					}

			
			
			
			
				/*************************************End******************************/
				/////die();
				
				
				
			}
		
		
		
						$this->load->model('admission_data');
						$res=$this->admission_data->Update_Admiossion($data1,$up_id);
						redirect('Franchisee/Admission');
					
					
					



}		
	
 public function get_duration()
 {
 	$cname=$_POST['course'];
 	$this->load->model('admission_data');
	$res=$this->admission_data->duration_get($cname);
	print_r(json_encode($res));
 } 


 public function save_exame_date()
 {
 	 $this->load->model('admission_data');
 	 $dt=$this->input->post('exm_dt');
 	 $ids=$this->input->post('hd1');
 	 $arraydata = explode(',',$ids);
 	 $res=$this->admission_data->Exame_date_save($dt,$arraydata);
     
     if($res)
     {
     	    $str = "Exame Date Saved Successfuly.....!";
			$this ->session-> set_userdata('msg',$str);
			redirect('Admin/Fran_Admission');
     }
     else
     {
     	    $str = "Error In Saving Exam Date.....!";
			$this ->session->set_userdata('msg',$str);
			redirect('Admin/Fran_Admission');
     }
 }

 public function save_exame_date1()
 {
 	 $this->load->model('admission_data');
 	 $dt=$this->input->post('exm_dt');
 	 $ids=$this->input->post('hd1');
 	 $arraydata = explode(',',$ids);
 	 $res=$this->admission_data->Exame_date_save($dt,$arraydata);
     
     if($res)
     {
     	    $str = "Exame Date Saved Successfuly.....!";
			$this ->session-> set_userdata('msg',$str);
			redirect('Employee/Fran_Admission');
     }
     else
     {
     	    $str = "Error In Saving Exam Date.....!";
			$this ->session->set_userdata('msg',$str);
			redirect('Employee/Fran_Admission');
     }
 }

  public function save_single_stud_exame_date()
 {
 	 $this->load->model('admission_data');
 	 $dt=$_POST['date'];
 	 $id=$_POST['sid'];
 	 $res=$this->admission_data->Exame_single_date_save($dt,$id);
     
     if($res)
     {
     	    $data['message']="Exame Date Saved Successfuly.....!";
     	    print_r(json_encode($data));
     }
     else
     {
     	    $data['message']="Error In Saving Exam Date.....!";
     	    print_r(json_encode($data)) ;

     }
 }

	
	/*********************************End***************************************/
	
	public function getadmissionsingleExcel1()
{
	$id=$_GET['id'];
	$name=$_GET['name'];
    $this->load->model("frn_excell");
    $this->frn_excell->getaddsingleexcel1($id,$name);
}


public function getadmissionsinglepdf1()
{
    $id=$_GET['id'];
    $this->load->model("frn_excell");
    $this->frn_excell->getaddsinglepdf1($id);
}




public function getAdmissioncatexcel1()
{
	$fdt=$_GET['fdate'];
    $tdt=$_GET['todate'];
    $course=$_GET['course'];

    $farr=array();
	$tarr=array();

	$farr =explode("/",$fdt); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$from_date=str_replace("/","-",$newfdate1);

	$tarr =explode("/",$tdt); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$to_date=str_replace("/","-",$newtdate1);
	$dt=date('Y-m-d');
    
    $this->load->model("frn_excell");
    if($from_date!=$dt && $to_date!=$dt && $course!="")
    {
    	$this->frn_excell->get_all_course_date_excel1($from_date,$to_date,$course,$this->globaldata['userdata']);
    }
    else if($from_date!=$dt && $to_date==$dt && $course!="")
    {
        $this->frn_excell->get_date_course_date_excel1($this->globaldata['userdata'],$from_date,$to_date,$course); 	
    }
    else if($from_date==$dt && $to_date==$dt && $course!="")
    {
        $this->frn_excell->get_course_wise_excel1($course,$this->globaldata['userdata']); 	
    }
    else if($from_date!=$dt && $to_date==$dt && $course=="")
    {
       $this->frn_excell->get_date_wise_excel1($this->globaldata['userdata'],$from_date,$to_date,$course); 	
    }
    else if($from_date==$dt && $to_date==$dt && $course=="")
    {
        $this->frn_excell->get_all_excel1($this->globaldata['userdata'],$from_date,$to_date,$course); 	
    }
	 else if($from_date!=$dt && $to_date!=$dt)
    {
        $this->frn_excell->get_all_excel2($this->globaldata['userdata'],$from_date,$to_date); 	
    }

}




public function getAdmissioncatpdf()
{
    $fdt=$_GET['fdate'];
    $tdt=$_GET['todate'];
    $course=$_GET['course'];

    $farr=array();
	$tarr=array();

	$farr =explode("/",$fdt); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$from_date=str_replace("/","-",$newfdate1);

	$tarr =explode("/",$tdt); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$to_date=str_replace("/","-",$newtdate1);
    
    $this->load->model("frn_excell");
    if($from_date!="" && $to_date!="" && $course!="")
    {
    	$this->frn_excell->get_all_course_date_pdf($from_date,$to_date,$course,$this->globaldata['userdata']);
    }
    else if($from_date!="" && $to_date=="" && $course!="")
    {
        $this->frn_excell->get_date_course_date_pdf($from_date,$course,$this->globaldata['userdata']); 	
    }
    else if($from_date=="" && $to_date=="" && $course!="")
    {
        $this->frn_excell->get_course_wise_pdf($course,$this->globaldata['userdata']); 	
    }
    else if($from_date!="" && $to_date=="" && $course=="")
    {
        $this->frn_excell->get_date_wise_pdf($from_date,$this->globaldata['userdata']); 	
    }
    else if($from_date=="" && $to_date=="" && $course=="")
    {
        $this->frn_excell->get_all_pdf($this->globaldata['userdata']); 	
    }


}	
	
}

	