<?php
date_default_timezone_set("Asia/Kolkata");
class Home extends Ci_controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model("Home_model");
    }

    function service_provider( $service_name = null,$city = null,$days = null,$channel = null){
        // echo $service_name;die;
        $service_name = urldecode($service_name);
        // echo $service_name;die;
        $city = urldecode($city);
        $days = urldecode($days);
        $channel = urldecode($channel);
        $data = [];
        $data["s_lists"] = $this->Home_model->services_list();//table='solutions'
        $data["c_lists"] = $this->Home_model->cities_list(); //table='user_cities_all'
        $data["channels_lists"] = $this->Home_model->u_seo_channels_lists();//table='user_details_seo_channels'
        $data["days"] = $this->Home_model->days();//days
        $seo_lists = $this->filter_data($service_name,$city,$days,$channel);//table='user_details_seo'
        $data["seo_lists"] = $seo_lists["seo_lists"];
        $data["seo_filter"] = $seo_lists["seo_filter"];
        $this->load->view("home/sp_pages/all_sp",$data);
    }
    
    function counselors_view($profile_link){
        $this->db->where('profile_link',$profile_link);
        $level1['s']=$this->db->get('user_details');
        if( $level1['s']->num_rows() > 0 ){
            $email = $level1['s']->row_array()['email'];
        $this->db->where('email',$email);
            $data['config'] = [
                'title' => 'Best Career Counsellors | Parenting Coach in India - Respicite',
                // 'keywords' => 'parenting counselor, career counselling services,education,school,university,educational,learn,learning,teaching,workshop',
                // 'keywords' => 'best career aptitude test, psychometric test for career counselling, career assessment test india',
                'keywords' => 'best career counsellors in india, parenting coach in india, overseas consultancy in india, career counselling, parenting counselling, corporate coachiing, life coach',
                'description' => 'Respicite provides the best overseas consultancy services in India. We also offer parenting coaching and career counselling services. Book your service now!',
                'contact_no' => '9584675111',
                'email' => 'sales@respicite.com',
                'msg' => [
                    'register'=>'Register as a User',
                    // 'banner-1'=> $title,
                    'banner-2'=>'Browse, Choose, Get Counselling'
                ],
                'img' => [
                    'bg'=>'https://respicite.com/images/1920x820-2.jpg',
                    'data-bg'=>'https://respicite.com/images/1920x820-2.jpg'
                ],
            ];
            $level1['l']=$this->db->get('provider_detail_four');
            $this->load->view("home/counsellors/header" , $data );
            $this->load->view('home/counsellors/profile-view',$level1);
            $this->load->view("home/counsellors/footer");
        }
        else{
            $this->session->set_flashdata('msg','No Counsellor Found');
            redirect(base_url().'best-counsellors-india'); 
        }
    }

    function partner_counsellors($service_name = null,$city = null,$days = null,$channel = null){
        $service_name = urldecode($service_name);
        $city = urldecode($city);
        $days = urldecode($days);
        $channel = urldecode($channel);
        $data = [];
        $data["s_lists"] = $this->Home_model->services_list();//table='solutions'
        $data["c_lists"] = $this->Home_model->cities_list(); //table='user_cities_all'
        $data["channels_lists"] = $this->Home_model->u_seo_channels_lists();//table='user_details_seo_channels'
        $data["days"] = $this->Home_model->days();//days
        $seo_lists = $this->filter_data($service_name,$city,$days,$channel);//table='user_details_seo'
        $data["seo_lists"] = $seo_lists["seo_lists"];
        $data["seo_filter"] = $seo_lists["seo_filter"];
        $this->load->view("home/sp_pages/all_sp",$data);
    }

    function counsellors( $service_name = null,$city = null){
        // $data = [];
        if( $service_name == 'all-services' ){
            $service_name = null;
        }
        $serviceDetail = [];
        $filter_service = '0';
        $filter_location = '0';
        
        // echo "<pre>";
        // print_r( $serviceDetail );
        // print_r( $resellerSeo );
        // die;
        $this->load->library("pagination");
        $service_name = urldecode($service_name);
        if( $service_name == "career-counselling-all" ){
            $service_name = [ 'Career Counselling', 'College', 'Corporate Coaching', 'Education Counselling', 'Overseas Services','Placement Services', 'School' , 'Skill Development' , 'Other services' ];
        }
        if( $service_name == "parenting-counselling-all" ){
            $service_name = [ 'Dmit Practitioner' , 'Life Counselling' , 'Parenting Counselling' , 'Psychological Counselling' , 'Other services' ];
        }
        $city = urldecode($city);
        // $days = urldecode($days);
        // $channel = urldecode($channel); 
        $data["s_lists"] = $this->Home_model->services_list_2();//table='solutions'
        // print_r( $data );
        $data["c_lists"] = $this->Home_model->cities_list(); //table='user_cities_all'
        $data["channels_lists"] = $this->Home_model->u_seo_channels_lists();//table='user_details_seo_channels'
        $data["days"] = $this->Home_model->days();//days
        if( $this->session->userdata('current_page')){
            $page_number = $this->session->userdata('current_page');
            $seo_lists = $this->filter_data($page_number,$service_name,$city);
        }
        else{
            $seo_lists = $this->filter_data(null,$service_name,$city);
        }
        if( $seo_lists['all_count'] == 0 ){
            $filter_service = '0';
            $filter_location = '0';
            $service_name = 'all-services';
            $city = null;
        }
        if( $service_name != null && $service_name != 'all-services' && $service_name != 'other-services' ){
            $filter_service = '1';
            if( !is_array( $service_name ) ){
                $serviceDetail = $this->Home_model->getResellerServiceDetail( [ 'serviceName' => ucwords( str_replace('-' , ' ' , $this->uri->segment(2)))] );
            }
            elseif( $service_name = 'career-counselling-all' ){
                $serviceDetail = $this->Home_model->getResellerServiceDetail( [ 'serviceName' => 'career counselling'] );
            }
            elseif( $service_name = 'parenting-counselling-all' ){
                $serviceDetail = $this->Home_model->getResellerServiceDetail( [ 'serviceName' => 'parenting counselling'] );
            }
            if( $serviceDetail['serviceType'] == '' ){
                // echo "heelo";
                // die;
                $filter_service = '0';
                $filter_location = '0';
                $serviceDetail = [];
                $data['serviceFirst'] = $this->Home_model->getResellerServiceDetail( [ 'serviceType' => 1 ] );
                // echo $this->db->last_query();
                // echo "<br>";
                $data['serviceSecond'] = $this->Home_model->getResellerServiceDetail( [ 'serviceType' => 2 ] );                
                // echo $this->db->last_query();
                // echo "<br>";
            }

        }
        else{
            $data['serviceFirst'] = $this->Home_model->getResellerServiceDetail( [ 'serviceType' => 1 ] );
            $data['serviceSecond'] = $this->Home_model->getResellerServiceDetail( [ 'serviceType' => 2 ] );
        }
        if( $city != null ){
            $filter_location = '1';
        }
        
        $resellerSeo = $this->Home_model->getResellerSeo( [ 'filter_service' => $filter_service , 'filter_location' => $filter_location ] );
        $data['resellerSeo'] = $resellerSeo; 
        $data['serviceDetail'] = $serviceDetail;
        $data["seo_lists"] = $seo_lists["paginate_list"];
        $config["total_rows"] = $seo_lists["all_count"];
        $config["base_url"] = base_url() . "best-career-counsellor";
        $config["per_page"] = 10;
        $config['cur_page'] = 1;
        if( $this->session->userdata('current_page')){
            $config['cur_page'] = $this->session->userdata('current_page');
            $this->session->unset_userdata('current_page');
        }
        // $config["uri_segment"] = 2;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $data["seo_filter"] = $seo_lists["seo_filter"];
        $data["links"] = $this->pagination->create_links();
        $title = 'Best Career Aptitude and Assessment test in India - Respicite';
        if( $this->uri->segment(2) != '' ){
            $title.= ' of '.(ucwords( str_replace('-' , ' ' , $this->uri->segment(2))) );
        }
        if( $this->uri->segment(3) != '' ){
            $title.= '<br> in location '.ucwords($city);
        }
        $data['config'] = [
            'title' => 'Best Career Counsellors | Parenting Coach in India - Respicite',
            // 'keywords' => 'parenting counselor, career counselling services,education,school,university,educational,learn,learning,teaching,workshop',
            // 'keywords' => 'best career aptitude test, psychometric test for career counselling, career assessment test india',
            'keywords' => 'best career counsellors in india, parenting coach in india, overseas consultancy in india, career counselling, parenting counselling, corporate coachiing, life coach',
            'description' => 'Respicite provides the best overseas consultancy services in India. We also offer parenting coaching and career counselling services. Book your service now!',
            'contact_no' => '9584675111',
            'email' => 'sales@respicite.com',
            'msg' => [
                'register'=>'Register as a User',
                'banner-1'=> $title,
                'banner-2'=>'Browse, Choose, Get Counselling'
            ],
            'img' => [
                'bg'=>'https://respicite.com/images/1920x820-2.jpg',
                'data-bg'=>'https://respicite.com/images/1920x820-2.jpg'
            ],
        ];
        $data['service_name'] = $service_name;
        $data['city'] = $city;
        // echo "<pre>";
        // print_r($data);
        // die;
        $this->load->view("home/counsellors/header",$data);
        $this->load->view("home/counsellors/list",$data);
        $this->load->view("home/counsellors/footer",$data);
    }

    
    function filter_data( $page = null, $service_name, $city){
        if( !is_array($service_name)){
            $service_name = ( $service_name != null ? ucwords(str_replace( '-' , ' ' , $service_name )) : null );
        }
        // echo $service_name;
        // die;
        $seo_lists = $this->Home_model->user_seo_lists( null, $service_name, $city );
        $paginate_list = $this->Home_model->user_seo_lists( ($page != null ? $page : 1), $service_name, $city);        
        // echo $this->db->last_query();
        // die;
        $_count = sizeof($paginate_list);
        $seo_filter = false;
        // if($_count == 0){
        //     $seo_lists =   $this->Home_model->user_seo_lists(($page != null ? $page : 1),null,null);
        //     $_count = sizeof($seo_lists);
        // }
        $seo_filter = true;
        if(!empty( $paginate_list ) ){
            for($i = 0; $i < $_count;$i++){
                $paginate_list[$i]["services"] = array_filter(explode(',' , $paginate_list[$i]["services"]));
                $paginate_list[$i]["profile_photo"] = base_url(($paginate_list[$i]["profile_photo"] != '' ? $paginate_list[$i]["profile_photo"] : 'uploads/default.png' ));
                $paginate_list[$i]["locations"] = explode(",",$paginate_list[$i]["locations"]);
                $paginate_list[$i]["most_relevant_education"] = explode(",",$paginate_list[$i]["most_relevant_education"]);
                $paginate_list[$i]["top_skills"] = $this->Home_model->top_skills(explode(",",$paginate_list[$i]["top_skills"]));
            }
        }
        return ["all_count" => count($seo_lists) , "paginate_list" => $paginate_list, "seo_filter" => $seo_filter , ];
    }
    function set_page_number($page_number){
        if( is_numeric( $page_number ) ){
            $this->session->set_userdata( 'current_page' , $page_number );
            echo json_encode( [ 'status' => true ] );
        }
    }

    function work_ajax(){
         $this->load->model('User_model');
         $this->load->model('Sp_model');
        $json_msg = [];
        $form_data = [
            "appointment_type"=>$this->input->post("action_name"),
            "name"=>$this->input->post("name"),    
            "email"=>$this->input->post("email"),
            "phone_no"=>$this->input->post("phone_no"),    
            "location"=>$this->input->post("location"),
            "message"=>htmlspecialchars($this->input->post("message")),
            "user_id"=>$this->input->post("user_id"),
            "created_at"  => date('Y-m-d H:i:s'),
        ];
        // echo 1;
        $sp_detail = $this->Sp_model->get_sp_details('DETAILS_BY_EMAIL', null , $form_data['user_id']);
        $this->db->insert("user_book_appointment",$form_data);
        if($this->db->affected_rows() > 0){
            $subject = ucwords(str_replace('_', ' ', $form_data['appointment_type']));
            $body_msg = "Dear ".$form_data['name']."<br/><br/> Appointment requested by a parent or student for a call back, providing the following information.
            <br>
            <strong> Name : ".$form_data['name']."</strong> <br>
            <strong> Email : ".$form_data['email']."</strong> <br>
            <strong> Contact Number : ".$form_data['phone_no']."</strong><br>
            <strong> Booking Datetime : ".date( 'd m Y h:i A' )."</strong><br>
            <strong> Booking Messgae : ".$form_data['message']."</strong><br>
            <br/> Team Respicite <br/> <a href='https://respicite.com'>https://respicite.com</a>";
            $this->User_model->otp_send_on_email( $sp_detail->email  , $subject , $body_msg );
            $json_msg["message_type"] = "book_succ";
            $json_msg["message"] = "Your Request has been forwarded to the counsellor.The team shall connect with you.";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json_msg));
    }    
}
?>