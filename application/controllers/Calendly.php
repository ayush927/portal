<?php
require_once APPPATH.'third_party/razorpay-php/Razorpay.php';
use Razorpay\Api\Api;
class Calendly extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Sp_model');
        $this->load->model('Admin_model');
        $this->load->model('Commen_model');
    }
    
    function user_request_code_online($id, $email, $r_email){
        $purchase_code_details = [
            "u_email" => urldecode(base64_decode($email)),
            "r_email" => urldecode($r_email),
            "id" => urldecode($id)
        ];
        // print_r( $purchase_code_details );
        // die;
        $sp_details = $this->Sp_model->get_sp_details("DETAILS_BY_EMAIL",$purchase_code_details['r_email']);
        $sp_details = $this->Sp_model->get_sp_details("DETAILS_BY_EMAIL",$purchase_code_details['r_email']);
        // print_r(  );
        // echo $this->db->last_query();
        $user_details = $this->User_model->get_user_details("DETAILS_BY_EMAIL",$purchase_code_details['u_email']);
        $solution_details = $this->User_model->get_user_details("EVENT_DETAIL",$purchase_code_details['id']);
        // die;
        if( $sp_details->email != "merak@gmail.com" ){
            $paymentKeys = $this->Sp_model->get_payment_detail( $sp_details->id , 1 );
            if( empty( $paymentKeys ) ){
                $paymentKeys = $this->Sp_model->get_payment_detail( RESP_DEFAULT_PAYMENT_ID , 1 );
            }
        }
        else{
            $paymentKeys = $this->Sp_model->get_payment_detail( RESP_DEFAULT_PAYMENT_ID , 1 );
        }
        // }
        // else{
        // print_r( $paymentKeys );
        // die;
        $user = $this->session->userdata('user');
        if( empty( $user ) ){
            $data['user'] = $user_details;
        }
        
        //echo $reseller_id; die;
        // $this->db->select('user_id, content, date');
        // $query = $this->db->get('user_details');
        //initialize payment api by razarpay
        // if( $sp_details->email == "merak@gmail.com" ){
            $order_amount = $solution_details['price']*100;
        // }
        // else{
            // $order_amount = $solution_details['mr_price']*100;
        // }
        // echo "<pre>";
        // print_r( $order_amount );
        // die;
        $payment_api = new Api( $paymentKeys['api_key'], $paymentKeys['secret_key'] );
        
        $order_data = [
            'receipt'         => "rcptid_".$user_details["id"]."_".rand(1000,100000),
            'amount'          => $order_amount, // 39900 rupees in paise
            'currency'        => 'INR'
        ];
        
        // create payment 
        
        $create_order = $payment_api->order->create($order_data);
        // if( )

        //insert all required info in DB.
        $save_data = [
            "r_email"                   => $sp_details->email,
            "u_email"                   => $user_details['email'],
            "solution_id"               => $solution_details['id'],
            "solution_name"             => $solution_details['event_name'],
            "solution_price"            => $solution_details['price'],
            "transaction_id"            => $create_order['id'],
            "amount_paise"              => $create_order['amount'],
            "currency"                  => $create_order['currency'],
            "receipt"                   => $create_order['receipt'],
            "transaction_status"        => $create_order['status'],
            "transaction_created_at"    => $create_order['created_at']
        ];
        
        // print_r($save_data);
        // die;
        $this->db->insert("user_payment_history",$save_data);
        
        $purchase_code_details = [
            "transaction_id"    => $create_order['id'],
            "u_email"           => $email,
            "r_email"           => $r_email,
            "solution_id"       => $id
        ];

        $this->session->set_userdata( "purchase_code_details", $purchase_code_details);
        redirect(base_url().'calendly/checkout');
    }
    
    function checkout(){
        //echo "checkout";die();
        $data = [];
        // print_r( $data );die;
        // if($this->User_model->authorized()==false)
        // {
        //     if( !$this->session->userdata('isnotloggedin') ){
        //         $this->session->set_flashdata('msg','You are not authorized to access this section');
        //         redirect(base_url().'/UserController/login');
        //     }
        // }

        //get all details in data DB.
        $purchase_code_details = $this->session->userdata("purchase_code_details");

        if(empty($purchase_code_details)){
            redirect(base_url().'BaseController/request_code');
        }
        // print_r( $purchase_code_details );
        // die;
        $sp_details = $this->Sp_model->get_sp_details("DETAILS_BY_EMAIL",$purchase_code_details['r_email']);
        $user_details = $this->User_model->get_user_details("DETAILS_BY_EMAIL",base64_decode($purchase_code_details['u_email']));

        $solution_details = $this->User_model->get_user_details("EVENT_DETAIL", $purchase_code_details['solution_id']);

        $pay_data = $this->db->get_where("user_payment_history",["transaction_id"=>$purchase_code_details['transaction_id']])->row();
        
        if( $sp_details->email != "merak@gmail.com" ){
            $paymentKeys = $this->Sp_model->get_payment_detail( $sp_details->id , 1 );
            if( empty( $paymentKeys ) ){
                $paymentKeys = $this->Sp_model->get_payment_detail( RESP_DEFAULT_PAYMENT_ID , 1 );
            }
        }
        else{
            $paymentKeys = $this->Sp_model->get_payment_detail( RESP_DEFAULT_PAYMENT_ID , 1 );
        }
        // print_r( $paymentKeys );
        // die;
        
        //find log, if logo not exist then use respicite log by default.
        if(!empty($sp_details->logo)){
            if(file_exists("./$sp_details->logo")){
                $sp_logo = base_url($sp_details->logo);
            }else{
                $sp_logo = base_url("uploads/1631091187.png"); 
            }
        }else{
            $sp_logo = base_url("uploads/1631091187.png");
        }
        
        // $user = $this->session->userdata('user');
        // print_r($data['user']  );
        // die;
        // if( empty( $user ) ){
        $data['user'] = $user_details;
        // }
        // else{
        //     $data['user'] = $user;
        // }
        // print_r( $user_details );
        // die;
        $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
        if( !$this->session->userdata('isnotloggedin') ){
            $data['mainmenu'] = $this->Commen_model->get_marketplace_menu($data['user']['iam']);
            $data['submenu'] = $this->Commen_model->get_marketplace_submenu($data['user']['iam']);
            $data['allowed_services'] = $this->Admin_model->getUserDetailsById($data['user']['id']);
        }
        
        //send checkout detail in view page. 
        $order_json = [
            "key"               => $paymentKeys['api_key'],
            "amount"            => $pay_data->amount_paise,
            "name"              => ( $sp_details->user_id != "merak" ? $sp_details->fullname : 'Respicite'),
            "description"       => $solution_details['event_name'],
            "image"             => $sp_logo,
            "prefill"           => [
                "name"              => $user_details['fullname'],
                "email"             => $user_details['email'],
                "contact"           => $user_details['mobile'],
            ],
            "notes"             => [
                "address"           => "Respicite"
            ],
            "theme"             => [
                "color"             => "#fc9928"
            ],
            "order_id"          => $pay_data->transaction_id,
            "callback_url"      => 'payment-status'
            // "callback_url"      => 'https://calendly.com/respicite/30min'
        ];        
        
        // print_r($order_json);
        // die;
        
        //sp detail
        /* $data["sp"] = [
            "fullname"  =>  $sp_details->fullname,
            "email"     =>  $sp_details->email,
            "logo"      =>  $sp_logo
        ]; */

        $data["user_detail"] = $user_details;
        $solution_details['display_solution_name'] = $solution_details['event_name'];
        $solution_details['mrp'] = $solution_details['price'];
        $data["solution"] = $solution_details;
        $data["api_pay"] = json_encode($order_json);
        $this->load->view('navbar',$data);
        
        if( !$this->session->userdata('isnotloggedin') ){
            $this->load->view('user/sidebar');
            $this->load->view("user/payment_ui",$data);
        }
        else{
            $this->load->view("user/payment_ui",$data);
        }
        $this->load->view('footer');
    }
    
    function confirmation(){
        $purchase_code_details = $this->session->userdata("purchase_code_details");
        // echo "<pre>";
        // print_r( $purchase_code_details );
        // die;
        // print_r( $_REQUEST );
        $user_details = $this->User_model->get_user_details( "DETAILS_BY_EMAIL", $purchase_code_details['r_email']);
        // print_r( $user_details );
        $date = explode("T" , $_GET['event_start_time']);
        $newDate = explode("+" , $date[1] );
        $endDate = $date[0]." ".$newDate[0];
        $senDate = date('Y-m-d H:i A', strtotime($endDate));
        $data = [
            'user_id' =>  $user_details['id'],
            'appointment_type' => 'book_appointment',
            'book_time' => $senDate,
            'name' => ( isset($_GET['invitee_first_name']) ? $_GET['invitee_first_name']." ".$_GET['invitee_last_name'] : $_GET['invitee_full_name']),
            'email' => $_GET['invitee_email'],
            'message' => $_GET['answer_2'],
            'phone_no' => $_GET['answer_1'],
            'booking_link' => "https://calendly.com/events/".$_GET['event_type_uuid']."/google_meet",
            'booking_period' => $_GET['event_type_name'],
            'created_at' => date('Y-m-d h:i:s')
        ];
        $subject = "Booked Appointment For Respicite - ".$data['booking_period'];
        $body_msg  = "Dear ".$user_details['fullname']." <br/><br/> This is mail from respicite for appointment booked By 
            <br>
            <strong> Name : ".$data['name']."</strong> <br>
            <strong> Email : ".$data['email']."</strong> <br>
            <strong> Contact Number : ".$data['phone_no']."</strong><br>
            <strong> Booking Datetime : ".date('d m Y h:i A', strtotime($endDate))."</strong><br>
            <strong> Booking Messgae : ".$data['message']."</strong><br>
            <br/> Team Respicite <br/> <a href='https://respicite.com'>https://respicite.com</a> ";
        $this->User_model->otp_send_on_email($user_details['email'],$subject,$body_msg);
        // die;
        $this->db->insert("user_book_appointment",$data);
        redirect('best-counsellors-india');
    }
    
    function payment_status(){
        $purchase_code_details = $this->session->userdata("purchase_code_details");
        $sp_details = $this->Sp_model->get_sp_details("DETAILS_BY_EMAIL",$purchase_code_details['r_email']);
        $user_details = $this->User_model->get_user_details("DETAILS_BY_EMAIL",base64_decode($purchase_code_details['u_email']));

        $solution_details = $this->User_model->get_user_details("EVENT_DETAIL", $purchase_code_details['solution_id']);

        $pay_data = $this->db->get_where("user_payment_history",["transaction_id"=>$purchase_code_details['transaction_id']])->row();
        
        if( $sp_details->email != "merak@gmail.com" ){
            $paymentKeys = $this->Sp_model->get_payment_detail( $sp_details->id , 1 );
            if( empty( $paymentKeys ) ){
                $paymentKeys = $this->Sp_model->get_payment_detail( RESP_DEFAULT_PAYMENT_ID , 1 );
            }
        }
        else{
            $paymentKeys = $this->Sp_model->get_payment_detail( RESP_DEFAULT_PAYMENT_ID , 1 );
        }
        $data_view['url'] = $solution_details['url'];
        $data_view['user'] = $user_details;
        
        $data_view['parentData'] =  $sp_details;
        // $msg = 
        $api = new Api( $paymentKeys['api_key'], $paymentKeys['secret_key'] );  
        $success = true;
        // $error ;

        $razorpay_payment_id = $this->input->post("razorpay_payment_id");
        // echo $razorpay_payment_id."hello";
        // die;
        $razorpay_order_id = $this->input->post("razorpay_order_id");
        $razorpay_signature = $this->input->post("razorpay_signature");
        if (!empty($razorpay_payment_id)){
            try
            {
                $attributes = array(
                    'razorpay_payment_id' =>  $razorpay_payment_id,
                    'razorpay_order_id' => $razorpay_order_id,
                    'razorpay_signature' => $razorpay_signature
                );
               
                $api->utility->verifyPaymentSignature($attributes);
                $success = true;
            }
            catch(SignatureVerificationError $e)
            {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
            
            $check_payment_id = $this->db->get_where("razorpay_transaction_history",["razorpay_payment_id"=>$razorpay_payment_id]);
            // echo $this->db->last_query();
            // print_r( $check_payment_id->result() );
            // die;
            if($check_payment_id->num_rows() <= 0){
                $this->db->trans_start();
                if ($success === true)
                {
                    $res_data = array(
                        'razorpay_payment_id' =>  $razorpay_payment_id,
                        'razorpay_order_id' => $razorpay_order_id,
                        'razorpay_signature' => $razorpay_signature,
                        'payment_status' => "success"
                    );
                    
                    $this->db->insert("razorpay_transaction_history",$res_data);
                    if($this->db->affected_rows() > 0){  
                        //update transaction status
                        $insert_id = $this->db->insert_id();
                        $this->db->set("code_purchase_id",$insert_id);
                        $this->db->set("transaction_status","success");
                        $this->db->where([
                            "transaction_id" => $this->input->post("razorpay_order_id"),
                            "u_email"        => $purchase_code_details['u_email'],
                            "r_email"        => $purchase_code_details['r_email']
                        ]);
                        $this->db->limit(1);
                        $this->db->update("user_payment_history");
                        
                        //update user_code_list table in db
                        $this->db->set("payment_status","success");
                        $this->db->where("id",$insert_id);
                        $this->db->limit(1);
                        $this->db->update("user_code_list");
                        $data_view["roder_id"] = $razorpay_order_id;
                        // print_r( $data_view );
                        // die;
                        $this->load->view("user/payment_success", $data_view); 
                        // $this->session->unset_userdata('purchase_code_details');                       
                    }else{
                        $this->db->trans_rollback();
                    }
                }
                else
                {
                    $res_data = array(
                        'razorpay_payment_id' =>  $razorpay_payment_id,
                        'razorpay_order_id' => $razorpay_order_id,
                        'razorpay_signature' => $razorpay_signature,
                        'payment_status' => "failed"
                    );

                    $this->db->insert("razorpay_transaction_history",$res_data);
                    $data_view["roder_id"] = $razorpay_order_id;
                    $this->load->view("user/payment_failed",$data_view); 
                    // $this->session->unset_userdata('purchase_code_details'); 
                } 
                $this->db->trans_complete();
            }else{
                echo "<div style='text-align:center;padding:10px'>
                <a href='".base_url("BaseController/purchase_code_history")."' style='text-decoration: none;color: white;padding: 13px;border-radius: 33px;background: #f46b36;'>Back to Purchase Code History</a></div>";
                show_404();
            }            
        }else{
            echo "<div style='text-align:center;padding:10px'>
            <a href='".base_url("BaseController/purchase_code_history")."' style='text-decoration: none;color: white;padding: 13px;border-radius: 33px;background: #f46b36;'>Back to Purchase Code History</a></div>";
            show_404();
        }
    }
}
?>