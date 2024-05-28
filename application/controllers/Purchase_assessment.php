<?php
  class Purchase_assessment extends CI_Controller
  {
    function __construct(){
        parent::__construct();
        $this->load->model("Admin_model");
        $this->load->model("Commen_model");
        $this->load->model("user_model");
    }
    public function index(){
        // redirect(base_url() . "Basecontroller/login");
        date_default_timezone_set("Asia/Kolkata");
        $this->load->config();
    }

    function take_assessment($code = null){
      if(  $code != null){
        $code = base64_decode($code);
        $getCodeData = getQuery( [ 'where' => [ 'code' => $code  , 'link_status' => 'enabled'] , 'table' => 'generated_code_details' , 'single' => true ] );
        if( !empty($getCodeData) ){
          $spDetail = getQuery( [ 'where' => [ 'email' => $getCodeData['email'] ] , 'select' => 'user_id, email' , 'single' => true, 'table' => 'user_details' ] );
          // pre( $spDetail , 1);
          if( !empty( $spDetail ) ){
            $data['sp_logo'] = getQuery( [ 'where' => [ 'r_email' => $getCodeData['email'] ] , 'table' => 'reseller_homepage' , 'single' => true  ] );
            // lQ(1);
            $data['linkData'] = $getCodeData;
            $data["code"] = $code;
            $data["spDetail"] = $spDetail;
            $this->load->view("link_registration", $data);
          }
          else{
            setFlashData( [ 'msg' => 'Service is Expired, Contact service provider ,Thank You' , 'status' => 'info' ] );
            redirect( 'Basecontroller/login' );
          }
        }
        else{
          setFlashData( [ 'msg' => 'Link Has been Expired, Contact service provider ,Thank You' , 'status' => 'info' ] );
          redirect( 'Basecontroller/login' );
        }
      }
      else{
        setFlashData( [ 'msg' => 'Invalid Request' , 'status' => 'info' ] );
        redirect( 'Basecontroller/login' );
      }
    }

    function assessment( $reseller_id , $user_id , $assessment_link = null ){
      if(  $assessment_link != null){
        $spDetail = getQuery( [ 'where' => [ 'user_id' => base64_decode($reseller_id) ] , 'select' => 'id, user_id, email' , 'single' => true, 'table' => 'user_details' ] );
        $getlinkData = getQuery( [ 'where' => [ 'email' => $spDetail['email'] ,  'code' => $assessment_link  , 'link_status' => 'enabled'] , 'table' => 'generated_code_details' , 'single' => true ] );
        if( !empty($getlinkData) ){
          $solutionData = getQuery( [ 'where' => [ 'solution' => $getlinkData['solution'] ] , 'table' => 'solutions' , 'select' => 'display_solution_name' , 'single' => true ] );
          // pre( $solutionData );
          $getLastUser = getQuery( [ 'where' => [ 'id' => $user_id ] , 'table' => 'user_details' , 'single' => true ] );

          insert( [ 'user_id' => $getLastUser['id'] , 'code' => $assessment_link , 'variation' => 'two' , 'report_variation' => 'two' ] );
          // pre( $getLastUser , 1 );
          date_default_timezone_set("Asia/Kolkata");
          $date= date_create(date('d-m-Y H:i:sP'));
          $today_date= date_format($date, 'd-m-Y H:i:s');
          update( [ 'where' => [ 'code' => $getlinkData['code'] ] , 'data' => [ 'status' => 'allocated' ] , 'table' => 'generated_code_details' ] );
          $formArray = array(
              'user_id' => $getLastUser['email'],
              'reseller_id' => $spDetail['email'],
              'code' => $getlinkData['code'],
              'solution' => $getlinkData['solution'],
              'display_solution_name' => $solutionData['display_solution_name'],
              'asignment_registration_date' => $today_date,
              'status' => 'Ap',
              'payment_mode' => 'offline'
          );
          // print_r($formArray);die();
          if($this->db->insert('user_code_list',$formArray))
          {
            $insert_id = $this->db->insert_id();
            $serviceList = getQuery( [ 'where' => [ 'solution' => $getlinkData['solution'] ] , 'table' => 'services_list' ] );
            // pre( $serviceList , 1 );
            foreach ($serviceList as $sl) {
              $formArray = [
                  "user_id" => $getLastUser['email'],
                  "code" => $getlinkData['code'],
                  "solution" => $sl['solution'],
                  "dis_solution" => $sl['dorp'],
                  "part" => $sl['part'],
                  "link" => $sl['current_link'],
                  "details" => $sl['details'],
                  "status" => "Ap",
                  "remain_time" => $sl['duration'],
              ];
              $this->db->insert("user_assessment_info", $formArray);
            }
            $sessArray['id'] = $getLastUser['id'];
            $sessArray['fullname']=$getLastUser['fullname'];
            $sessArray['email']=$getLastUser['email'];
            $sessArray['mobile']=$getLastUser['mobile'];
            $sessArray['user_id']=$getLastUser['user_id'];
            $sessArray['iam']=$getLastUser['iam'];
            $sessArray['profile_photo']=$getLastUser['profile_photo'];
            // $sessArray['code']=$lastCode['code'];
            $this->session->set_userdata('user',$sessArray);
            redirect(base_url().'BaseController/view_code/'.$getlinkData['code']);
          }
        }
      }
      else{
        setFlashData( [ 'msg' => 'Invalid Request' , 'status' => 'info' ] );
        redirect( 'Basecontroller/login' );
      }
    }
  }
?>