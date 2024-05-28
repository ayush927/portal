<?php
    class Sp_Model extends CI_Model
    {
         function __construct()
        {
            parent::__construct();

        }
        public function provider_level_list()
        {
            return $level = $this->db->get('provider_level_one');
        }
        public function fetch_level_two($level)
        {
            return  $query = $this->db->get_where('provider_level_two', array('l1' => $level));
        } 
        public function provider_level3_list()
        {
            return $level = $this->db->get('provider_level_three');
        }
        public function who_check($email)
        {
            $where = "email='$email' and role='institute'";
            $this->db->where($where);
            return $row = $this->db->get('user_details');
        }

        public function insert_institute_details($formArray)
        {
            $this->db->insert('provider_institute_details',$formArray);
        }

        public function provider_level_list_sec($l1)
        {
            $this->db->where('l1',$l1);
            return $row = $this->db->get('provider_level_two');  
        }
        public function provider_level_list_three($l2)
        {
            $this->db->where('l2',$l2);
            return $row = $this->db->get('provider_level_three');  
        }
        public function fetch_level($level,$email)
        {
            return  $query = $this->db->get_where('provider_detail_three', array('l2' => $level,'email'=>$email));

        } 
        public function fetch_l3($l)
        {
            return  $query = $this->db->get_where('provider_level_three', array('id' => $l));
        }
        public function update_entry($data)
        {
            $user = $this->session->userdata('user');
           
            $email=$user['email'];
            return $this->db->update('sp_profile_detail', $data, array('email' => $email));
        }
        public function solution_list()
        {
            $this->db->distinct();
            $this->db->select('c_group');
            // $this->db->where('name !=', $name);
            $this->db->where('c_group !=', 'ignore');
            return $solutions = $this->db->get('solutions');
        }
        public function get_solution($c_group)
        {
            
            $this->db->where('c_group',$c_group);
            return $solutions = $this->db->get('solutions');
        }
        public function insert_partner_request($formArray)
        {
            
            $this->db->insert('partner_counselor_status',$formArray);
            
        }

        public function ppot_question($num)
        {
            $where = "org_qno>='$num' and Modified_Nature='O1'";
            $this->db->where($where);
            return $this->db->limit(5)->get('partner_counselor_parenting');
        }
        public function ceot_question($x,$num)
        {
           
            $where = "org_qno>='$num' and Modified_Nature='$x'";
            $this->db->where($where);
            return $this->db->limit(5)->get('partner_counselor_career_explorer');
        }

        public function cect_question($x,$num)
        {
           //echo "x=".$x.$num;die();
            $where = "org_qno>='$num' and Modified_Nature='$x'";
            $this->db->where($where);
            return $this->db->limit(5)->get('partner_counselor_career_explorer');
        }
        public function cexct_question($x,$num)
        {
           
            $where = "org_qno>='$num' and Modified_Nature='$x'";
            $this->db->where($where);
            return $this->db->limit(5)->get('partner_counselor_cmb');
        }
        public function cexot_question($ob,$num)
        {
            $where = "org_qno>='$num' and Modified_Nature='$ob'";
            $this->db->where($where);
            return $this->db->limit(5)->get('partner_counselor_cmb');
        }
        
        public function ocoxt_question($ob,$num,$solution)
        {
            //echo "model".$ob.$num.$solution;die();
            $where = "org_qno>='$num' and Modified_Nature='$ob'";
            $this->db->where($where);
            if($solution == 'ocoxt')
            {
                return $this->db->limit(5)->get('partner_counselor_oc');
            }else if($solution=='occxt')
            {
                return $this->db->limit(5)->get('partner_counselor_oc_cer');
            }
            
        }
        public function ppct_question($num)
        {
            $where = "org_qno>='$num' and Modified_Nature!='O1'";
            $this->db->where($where);
            return $this->db->limit(5)->get('partner_counselor_parenting');
        }

        public function get_sp_logo($u_id){
            $this->db->select("b.logo");
            $this->db->where("a.user_id",$u_id);
            $this->db->join("reseller_homepage b","b.reseller_id = a.user_id");
           return $this->db->get("user_details a")->row_array();
        }

        public function get_sp_logo_by_reseller_id($u_id){
            $this->db->select("logo");
            $this->db->where("reseller_id",$u_id);
           return $this->db->get("reseller_homepage")->row_array();
        }
        
        function get_job_data($check,$id = null){
            if($check == "SHORT_VIEW"){
                $this->db->select("*");
                $this->db->where(["sp_id"=>$id]);
                $this->db->order_by("id","desc");
                $q = $this->db->get("placement_jobs");
                return $q->result();
            }
            if($check == "EDIT_BY_ID"){
                $this->db->select("*");
                $this->db->where(["id"=>$id]);
                $q = $this->db->get("placement_jobs");
                return $q->row();
            }
            if($check == "ALL_SHORT_VIEW"){
                
                $this->db->select("a.*,b.fullname,b.email");
                $this->db->join("user_details b","b.id = a.sp_id","inner");
                $this->db->order_by("a.id","desc");
                $this->db->order_by("a.job_post_date");
                $q = $this->db->get("placement_jobs a");
                return $q->result();
            }
            if($check == "ALL_JOB_DOMAIN"){
                $this->db->select("*");
                $q = $this->db->get("job_domain");
                return $q->result();
            }
            if($check == "SPECIALIZATION"){
                $this->db->select("*");
                $q = $this->db->get_where("job_specialization",['job_domain_id'=>$id]);
                // echo $this->db->last_query();
                return $q->result();
            }
            if($check == "JOB_REQUEST_USERS"){
                $this->db->select("a.id,a.user_email,a.cv_path,b.fullname,a.apply_date,a.job_status");
                $this->db->where(["a.job_id"=>$id]);
                $this->db->order_by("a.id","desc");
                $this->db->order_by("a.apply_date");
                $this->db->join("user_details b","b.email = a.user_email","inner");
                $q = $this->db->get("jobs_apply_user a");
                return $q->result();
            }
            if($check == "JOB_REQUEST_USER"){
                $this->db->select("a.id,a.user_email,a.cv_path,a.job_id,b.fullname,a.apply_date,a.job_status");
                $this->db->where(["a.id"=>$id]);
                $this->db->join("user_details b","b.email = a.user_email","inner");
                $q = $this->db->get("jobs_apply_user a");
                return $q->row();
            }
        }

        function update_status($check,$id=null){
            switch($check){
                case "JOB_STATUS";
                    $this->db->set("status","published");
                    $this->db->where("id",$id);
                    $this->db->update("placement_jobs");
                    if($this->db->affected_rows() > 0){
                        return true;
                    }else{
                        return false;
                    }
                    break;
                    
                    case "JOB_STATUS_REQUEST";
                    $status_type = $this->input->get("req_type",true);
                    if(!empty($status_type)){
                    $this->db->set("job_status",$status_type);
                    $this->db->where(["id"=>$id]);
                    $this->db->limit(1);
                    $this->db->update("jobs_apply_user");
                    if($this->db->affected_rows() > 0){
                        return true;
                    }else{
                        return false;
                    }
                    break;
                }else{
                    $json_msg = ["MSG"=>"EMPTY"];
                }
            }
        }

        function send_on_email($email,$subject,$msg)
        {
            $this->load->library('email');
            $this->email->from('sales@respicite.com', 'respicite.com');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($msg);
            $this->email->set_mailtype("html");
            if($this->email->send()){
                return true;
            }else{
                return false;
            }
        }

        public function get_sp_details($action = null,$id = null , $user_id = null){
           // echo $id;die();
            switch($action){
                case "DETAILS_BY_EMAIL":
                    $this->db->select("a.id,a.user_id, a.fullname,a.email,b.logo");
                    if( $id != null ){
                        $this->db->where("a.email",urldecode($id));
                    }
                    if( $user_id != null ){
                        $this->db->where("a.id", $user_id);
                    }
                    $this->db->join("reseller_homepage b","b.reseller_id = a.user_id","left");
                    $q = $this->db->get("user_details a");
                    // echo $this->db->last_query();
                    return $q->row();
                break;
                case "DETAILS_BY_USER_ID":
                    $this->db->select("a.id,a.user_id, a.fullname,a.email,b.logo");
                    if( $id != null ){
                        $this->db->where("a.user_id",urldecode($id));
                    }
                    if( $user_id != null ){
                        $this->db->where("a.id", $user_id);
                    }
                    $this->db->join("reseller_homepage b","b.reseller_id = a.user_id","left");
                    $q = $this->db->get("user_details a");
                    // echo $this->db->last_query();
                    return $q->row_array();
                break;
            }
        }


        public function insertAssociate($data) { 
            if ($this->db->insert("user_associate", $data)) { 
                return $this->db->insert_id(); 
            }else{
                return 0;
            }
        } 


        public function getAssociate($user_id,$user_type) { 
            $this->db->select('*');
            $this->db->from('user_associate');
            $this->db->where('user_id', $user_id);
            $this->db->where('user_type', $user_type);
            $query = $this->db->get();
            return $result = $query->result();
        } 


        public function getAssociateById($associate_id) { 
            $this->db->select('*');
            $this->db->from('user_associate');
            $this->db->where('id', $associate_id);
            $query = $this->db->get();
            return $result = $query->result();
        } 


        public function updateAssociate($data,$id) { 
            $this->db->where("id", $id);       
            if ( $this->db->update("user_associate", $data)) {  
             return true; 
            }else{
             return false;
            }
        }

        public function deleteAssociate($id) { 

            $this->db->where('id', $id);
            if ($this->db->delete("user_associate")) { 
                return true; 
            }else{
                return false;
            }
        }
        
        public function solutions()
        {
            //$this->db->distinct();
            $this->db->select('*');
            // $this->db->where('name !=', $name);
           // $this->db->where('c_group !=', 'ignore');
            return $solutions = $this->db->get('solutions')->result_array();
        }
        public function allowed_expiry_update($id,$duration,$expiry){
            $this->db->set('assessment_expiry_window',$duration);
            $this->db->set('expiry_applicable_to',$expiry);
            $this->db->where('id',$id);
            if ($this->db->update('user_details')) {  
             return true; 
            }else{
             return false;
            }
        }
        public function getUserDetailsById($id){
            //echo $id;die;
            $this->db->select('*');
            $this->db->from('user_details');
            $this->db->where('id',$id);
            $row = $this->db->get()->row();
            if (isset($row)) {
                return $row;
            } else {
                return false;
            }
            
        }
        public function getpayment_details_data($id , $type = null)
        {
            $this->db->select("payCrd.*,pd.*");
            if( $type == null ){
                $this->db->where( 'payment_type', $type );
            }
            $this->db->from( "paymentcrd as payCrd" );
            $this->db->join( "payment_gatway_details as pd","pd.id=payCrd.payment_type" );
            $this->db->where('payCrd.user_id',$id);
            $this->db->where_in('pd.payment_type_name',array('zoom_meet','google_meet'));
            $query = $this->db->get();
            return $query->result_array();
        }

        function get_payment_detail( $id , $type ){
            $this->db->where( 'user_id', $id );
            $this->db->where( 'crd_status', 1 );
            $this->db->where( 'payment_type', $type );
            $this->db->from( "paymentcrd" );
            $query = $this->db->get();
            return $query->row_array();
            // die;
        }
        
        public function get_num_rows_for_associate($user_id) { 
            $this->db->select('*');
            $this->db->from('user_associate');
            $this->db->where('user_id', $user_id);
            $query = $this->db->get();
            return $result = $query->num_rows();
        } 
        
         public function insert_selected_code($selected_code,$email,$user_id,$user_type ) { 
             
            //echo $selected_code.$email.$user_id.$user_type;die();
            $this->db->where("user_id", $user_id);  
            $this->db->where("email", $email);
            $this->db->where("iam", $user_type);
            $this->db->set('selected_code', $selected_code);
            if ( $this->db->update('user_details')) {  
             return true; 
            }else{
             return false;
            }
        }

    }
?>