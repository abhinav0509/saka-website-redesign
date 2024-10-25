<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State_master extends CI_Controller {


 public function index()
 {

     
      $this->load->model("city_master");
      $data=array();
      $data=$this->city_master->getstate();
      print_r($data);


 }
 public function getcity()
 {
      $sid=$_POST['cntid'];
      $this->load->model("city_master");
      $data=array();
      $data=$this->city_master->getcity($sid);
      print_r($data);
 }
 public function getfranch()
 {
 	  $sid=$_POST['sid'];
 	  $cid=$_POST['cid'];
 	  $this->load->model("city_master");
      $data=array();
      $data=$this->city_master->getfr($sid,$cid);
      print_r($data);
 }
 public function getfranchadd()
 {
 	  $sid=$_POST['sid'];
 	  $cid=$_POST['cid'];
 	  $fr=$_POST['fr'];
 	  $this->load->model("city_master");
      $data=array();
      $data=$this->city_master->getfraddd($sid,$cid,$fr);
      print_r($data);
 }
 public function getmapdata()
 {
 	  $sid=$_POST['sid'];
 	  $cid=$_POST['cid'];
 	  $fr=$_POST['fr'];
 	  $this->load->model("city_master");
      $data=array();
      $data=$this->city_master->getAlldata($sid,$cid,$fr);
      print_r($data);
 }

  public function insertinloc()
 {
 	  
 	  $add=$_POST['add'];
 	  $f_id=$_POST['f_id'];
 	  $lat=$_POST['lat'];
 	  $lang=$_POST['lang'];
      $dt=date('Y-m-d');
      // /die("adsd");

      $data=array('f_id'=>$f_id,'address'=>$add,'lati'=>$lat,'longi'=>$lang,'entrydate'=>$dt);

 	  $this->load->model("city_master");
      $data1=$this->city_master->save_loc($data);
      //print_r($data);
 }
 
 public function get_addr()
 {
      $cid=$_POST['cid'];
      $sid=$_POST['sid'];
      $this->load->model("city_master");
      $data=$this->city_master->addr_get($sid,$cid);
      print_r(json_encode($data));
 }

 public function get_Franch()
 {
      $st_id=$_POST['cntid'];
      $this->load->Model('city_master');
      $data=$this->city_master->franch_get($st_id);
      print_r(json_encode($data));
 }

 public function get_placed_details()
 {
       $st_id=$_POST['frid'];
       $pi=$_POST['page_index'];
       //die("sadad");
       $this->load->Model('city_master');
       $data1=$this->city_master->get_franch_add($st_id);
       $data2=$this->city_master->get_placed_stud($st_id,$pi);
       $data3=$this->city_master->get_placed_company($st_id);
       $data4=$this->city_master->get_tot_placed($st_id);
       $data5=$this->city_master->get_fran_det($st_id);

       $data6=$this->city_master->get_fran_all_det_cnt($st_id);

       $result['data1']=$data1;
       $result['data2']=$data2;
       $result['data3']=$data3;
       $result['data4']=$data4;
       $result['data5']=$data5;
       $result['data6']=$data6;
       print_r(json_encode($result));
 }





}