<?php
    class Admin_model extends CI_Model
    {
        function __construct()  
        {  
         // Call the Model constructor  
            parent::__construct();  
        }  
        public function get_unapprove_reseller()
        {
            $where = "status='1' and iam='reseller'";
            $this->db->where($where);
            return $row = $this->db->get('user_details');
        }
        public function get_unapprove_code()
        {
            $where = "status='pending'";
            $this->db->where($where);
            return $row = $this->db->get('purchase_reseller_code_record');
        }
        public function code_details($code)
        {
            $this->db->where('code_id',$code);
            return $row = $this->db->get('reseller_code_record');
        }
        public function update_status_code($id){
            $this->db->set('status','Approve');
            $this->db->where('id',$id);
            $this->db->update('purchase_reseller_code_record');
            $this->db->where('id',$id);
            $this->db->select('*');
            return $row = $this->db->get('purchase_reseller_code_record');   
        }
        public function update_batch_data($table , $data){
            foreach( $data as $key => $value){
                $this->db->set('profile_link',$value['profile_link']);
                $this->db->where('id', $value['id']);
                $this->db->where('email', $value['email']);
                $this->db->update($table);
            }
        }
        
        public function insert_career_data( $data ){
            return $this->db->insert( 'c_library' , $data );
        }
        
        function update_career_data($data , $id){
            $this->db->where( 'id' , $id )->set($data)->update('c_library');
            if( $this->db->affected_rows() > 0 ){
                return true;
            }
            else{
                return false;
            }
        }
        function get_all_cluster(){
            $q = $this->db->get( 'c_library' );
            if( $q->num_rows() > 0 ){
                return $q->result_array();
            }
            else{
                return [];
            }

        }
        function get_cluster_by_id($id){
            $q = $this->db->where('id', $id)->get( 'c_library' );
            if( $q->num_rows() > 0 ){
                return $q->row_array();
            }
            else{
                return [];
            }

        }
        
        function view_cluter_content(){
            $q = $this->db->get( 'c_library_1' );
            if( $q->num_rows() > 0 ){
                return $q->result_array();
            }
            else{
                return [];
            }
        }
        
        function update_career_content_data($data , $id){
            unset( $data['id'] );
            $this->db->where( 'SNo' , $id )->set($data)->update('c_library_1');
            if( $this->db->affected_rows() > 0 ){
                return true;
            }
            else{
                return false;
            }
        }
        
        function get_cluster_content_by_id($id){
            $q = $this->db->where('SNo', $id)->get( 'c_library_1' );
            if( $q->num_rows() > 0 ){
                return $q->row_array();
            }
            else{
                return [];
            }
            
        }
        
        public function insert_career_content_data( $data ){
            return $this->db->insert( 'c_library_1' , $data );
        }
        
        public function getloginPageDesignData($design_type){
            $this->db->where('design_type' , $design_type);
            return $this->db->get('login_page_design')->result_array();
        }
        
        public function getReportConfig(){
            return $this->db->get('report_config')->row_array();
        }
        
        public function updateloginform($type, $key , $value){
            $this->db->where( 'design_type' , $type);
            $this->db->where('column' , $key);
            $this->db->set('value' , $value);
            $this->db->update('login_page_design');
            return $this->db->affected_rows();
        }
        public function updateReportData($data){
            $this->db->where('id' , 1);
            $this->db->set($data);
            $this->db->update('report_config');
            return $this->db->affected_rows();
        }
        public function generate_code()
        {
            $this->load->helper('string');
                        

                $num = rand(100001,999999);
                return $cd = $num;
                
           
        }
        public function savePaymetDetails($code_data)
        {
            $this->db->insert('payment_gatway_details',$code_data);
            return $this->db->insert_id();
        }
        public function savepaymentcrd($code_data)
        {
            $this->db->insert('paymentcrd',$code_data);
            //return $this->db->insert_id();
        }
        public function insert_code($code_data)
        {
            $this->db->insert('generated_code_details',$code_data);
        }
        public function check_code($cd)
        {
            $this->db->where('code',$cd);
            $row = $this->db->get('generated_code_details');  
            return $row->num_rows();
        }
        public function generate_reseller_code(){
            $this->load->helper('string');
                        
            $chars = array(
                
                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
                'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y'
                
            );
        
            shuffle($chars);
        
            $num_chars = count($chars) - 22;
            $token = '';
        
            for ($i = 0; $i < $num_chars; $i++){ // <-- $num_chars instead of $len
                $token .= $chars[mt_rand(0, $num_chars)];
            }
            return $token;
        }

        public function check_reseller_code($cd)
        {
            $this->db->where('user_id',$cd);
            $row = $this->db->get('user_details');  
            return $row->num_rows();
        }
        
        public function fetch_reseller()
        {
            $this->db->select( 'user_details.* , user_details_seo.status as seo_status' );
            $where = "( ( (user_details_seo.status = '2' and `iam` = 'reseller') or (`user_details_seo.status` = '3' and `iam` = 'reseller') ) OR (`iam` = 'sp' AND `user_details_seo.status` != 0 ) )";
            $this->db->where($where);
            $this->db->join('user_details_seo' , 'user_details.id = user_details_seo.user_id' , 'INNER');
            return $row = $this->db->get('user_details');
        }
        function update_status($user_id , $status){
            $this->db->set('status',$status);
            $this->db->where('user_id',$user_id);
            $this->db->update('user_details_seo');
        }
        function get_sync_user(){
            $q = "SELECT * FROM user_details WHERE (( (status='2' and iam='reseller') or (status='3' and iam='reseller') ) or ( `iam` = 'sp' AND `status` != 0 )) AND id NOT IN (SELECT user_id FROM user_details_seo)";
            $result = $this->db->query($q);
            if( $result->num_rows() > 0 ){
                return $result->result_array();
            }
            else{
                return [];
            }
        }
        function get_user(){
            $q = "SELECT id, email, fullname FROM user_details WHERE (( ( status='2' and iam='reseller' ) or ( status='3' and iam='reseller' ) ) or ( `iam` = 'sp' AND `status` != 0 )) AND profile_link = ''";
            $result = $this->db->query($q);
            if( $result->num_rows() > 0 ){
                return $result->result_array();
            }
            else{
                return [];
            }
        }
        function get_reseller_by_email($email){
            $q = "SELECT GROUP_CONCAT( DISTINCT c_group ORDER BY c_group ASC SEPARATOR ',' ) as services FROM reseller_certification WHERE email = '".$email."' AND c_group != ''";
            $result = $this->db->query($q);
            if( $result->num_rows() > 0 ){
                return $result->row_array();
            }
            else{
                return [];
            }
        }
        function get_services_by_email($email){
            $q = "SELECT GROUP_CONCAT( grp SEPARATOR ',' ) as services FROM partner_counselor_status WHERE email = '".$email."' AND p_c == 1";
            $result = $this->db->query($q);
            if( $result->num_rows() > 0 ){
                return $result->row_array();
            }
            else{
                return [];
            }
        }

        function get_spdata_by_email($email){
            $q = "SELECT DISTINCT email, CONCAT( ' ( id = ' , GROUP_CONCAT( CONCAT( CONCAT( CONCAT( CONCAT( CONCAT ( CONCAT( l3 , ' AND l1 = ' ) , l1 ) , ' AND l2 = ' )  , l2 ) , '' ) , ' ) ' ) SEPARATOR ' OR (  id = ' ) ) as services FROM provider_detail_three WHERE email = '".$email."' AND l3 != 0";
            
            // $q = "SELECT DISTINCT email, CONCAT( ' ( id = ' , GROUP_CONCAT( CONCAT( CONCAT( CONCAT( CONCAT( CONCAT ( CONCAT( l3 , ' AND l1 = ' ) , l1 ) , ' AND l2 = ' )  , l2 ) , '' ) , ' ) ' ) SEPARATOR ' OR (  id = ' ) ) as services FROM provider_detail_three WHERE email = '".$email."'";
            // if( $email == "principal.snktt@respicite.com" ){
            //     echo $q;
            //     die;
            // }
            
            $result = $this->db->query($q);
            if( $result->num_rows() > 0 ){
                return $result->row_array();
            }
            else{
                return [];
            }
        }
        
        function select_service($combination){
            $q = $this->db->query( "SELECT GROUP_CONCAT( alternate_name SEPARATOR ',' ) as services  FROM provider_level_three WHERE  ".$combination );
            // $result = $this->db->query($q);
            // echo $this->db->last_query();
            if( $q->num_rows() > 0 ){
                return $q->row_array();
            }
            else{
                return [];
            }
        }
        public function landing_page()
        {
            $this->db->select("*");
            $this->db->from("landing_page");
            $query = $this->db->get();
            return $query->result_array();
        }

        public function fetch_services()
        {
            $this->db->where('status','active');
            return $row = $this->db->get('reseller_code_record');
        }

        public function edit_data($id)
        {
            $this->db->select("*");
            $this->db->from("reseller_code_record");
            $this->db->where("id",$id);
            $query = $this->db->get();
            if(count($query->result()) > 0){
                return $query->row();
            }
        }
        public function edit_detail($id)
        {
            $this->db->select("*");
            $this->db->from("solutions");
            $this->db->where("id",$id);
            $query = $this->db->get();
            if(count($query->result()) > 0){
                return $query->row();
            }
        }
        public function fetch_sp()
        {
            // $where = "status='2' and iam='sp' or status='3' and iam='sp'";
            // $this->db->where($where);
            $this->db->where('iam','sp');
            return $row = $this->db->get('user_details');
        }
        public function fetch_solution()
        {
            
            return $row = $this->db->get('solutions');
        }
        public function get_unapprove_domain()
        {
            $where = "status='0'";
            $this->db->where($where);
            return $row = $this->db->get('reseller_homepage');  
        }
        public function provider_level_list()
        {
            return $level = $this->db->get('provider_level_one');
            
        }
        public function fetch_level_two($level)
        {
            return  $query = $this->db->get_where('provider_level_two', array('l1' => $level));

        } 
         public function fetch_section($level)
        {
            return  $query = $this->db->get_where('landing_page_section', array('landingId' => $level));

        } 
        public function provider_level3_list()
        {
            return $level = $this->db->get('provider_level_three');
            
        }
        public function fetch_level_three($level)
        {
            return  $query = $this->db->get_where('provider_level_three', array('l2' => $level));

        } 
        public function fetch_level_four($level,$l1,$l2)
        {
            return  $query = $this->db->get_where('provider_level_four', array('l3_id' => $level,'l1' => $l1,'l2' => $l2));

        } 
        public function get_unapprove_sp()
        {
            $where = "status='1' and iam='sp'";
            $this->db->where($where);
            return $row = $this->db->get('user_details');
        }
        public function fetch_reseller_for_certification()
        {
            $this->db->select('email');
            $this->db->distinct();
            return $row = $this->db->get('reseller_certification');
        }
        public function solution_group_list()
        {
            $this->db->select('c_group');
            $this->db->distinct();
            return $row = $this->db->get('solutions');
        }
        public function get_unapprove_partner()
        {
            
            // $this->db->where('status','ua');
            return $row = $this->db->get('partner_counselor_status');
        }

        function add_team_and_condition($insert_data){
            $this->db->insert("terms_and_conditions",$insert_data);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }

        function team_and_condition_fetch(){
            $this->db->order_by("ord_heading","asc");
            $this->db->order_by("ord_cat","asc");
            $q = $this->db->get("terms_and_conditions");
            
            return $q->result();
        }

        function add_FAQ($insert_data){
            $this->db->insert("f_a_q",$insert_data);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }

        function FAQ_fetch(){
            $this->db->order_by("ord_heading","asc");
            $this->db->order_by("ord_cat","asc");
            $q = $this->db->get("f_a_q");
            
            return $q->result();
        }

        function get_sp_reseller($ids = null){
            $this->db->select("id,fullname,email,iam");
            if(!empty($ids)){
                $this->db->where_in("id",$ids);
            }else{
                $this->db->where_in("iam",["sp","reseller","user"]);
            }
            $this->db->order_by("fullname","acs");
            $q = $this->db->get("user_details");
            return $q->result();
        }

        function send_on_email($email,$subject,$msg)
        {
            $this->load->library('email');
            $this->email->from('sales@respicite.com', 'respicite.com');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($msg);
            $this->email->set_mailtype("html");
            $this->email->send();
        }


        public function get_managed_services()
        {
            $this->db->select('*');
            $where = "in_admin='1'";
            $this->db->where($where);
            $q = $this->db->get('services_all');
            return $q->result_array();

        }

        public function get_managed_service_details($t)
        {
            $this->db->select('*');
            $q = $this->db->get($t);
            // echo "<pre>";
            // print_r($q->result_array());
            // echo "</pre>";
            return $q->result_array();
        }

        public function get_managed_services_with_details()
        {
            $res = [];
            $a = $this->get_managed_services();
            foreach($a as $v)
            {
                
                $details=[];
                $sd = $this->get_managed_service_details($v['tbl_details']);
                foreach($sd as $v1)
                {
                    if($v1['status']=='active')
                    {
                        $details[] = $v1;
                    }
                }
                $res[] = [
                    'service'=>$v,
                    'service_details'=>$details
                ];
                
            }
            
            // echo "<pre>";
            // print_r($res);
            // echo "</pre>";
            // die;
            return $res;
        }

        //sudhir
        // public function get_marketplace_menu($role)
        // {
            
           
        // }


         public function get_marketplace_menu(){

            $this->db->select('*');
            $where = "parent_id='0'";
            $this->db->where($where);
            $q = $this->db->get('services_marketplace_menu');
            return $q->result();
            
        }

         public function get_marketplace_submenu(){

            $this->db->select('*');
            $where = "parent_id!='0'";
            $this->db->where($where);
            $q = $this->db->get('services_marketplace_menu');
            return $q->result();
            
        }

        public function insert_marketplace_menu($data){
            //print_r($data);die();

            $this->db->insert("services_marketplace_menu",$data);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
            
        }

        public function get_all_menus()
        {
            $this->db->select("*");
            $where = "parent_id !=''";
            $this->db->where($where);
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result();
        }

        public function get_flow_data()
        {
            $this->db->select("*");
            $this->db->where('name','flow');
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function get_trigger_data()
        {
            $this->db->select("*");
            //$this->db->where('name','flow');
            $this->db->from("services_notification_trigger");
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function get_notification_type_data()
        {
            $this->db->select("*");
            $this->db->where('name','Notification Types');
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function get_owners_data()
        {
            $this->db->select("*");
            $this->db->where('name','owners');
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_sp_data()
        {
            $this->db->select("*");
            $this->db->where('name','SP Progress Status List');
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_filter_data()
        {
            $this->db->select("*");
            $this->db->where('name','Filters');
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_flow_data_byId($id)
        {
            $this->db->select("parameter");
            $this->db->where('id',$id);
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function get_category_data_byId($id)
        {
            $this->db->select("parameter,description");
            $this->db->where('id',$id);
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function get_notificationtype_data_byId($id)
        {
            $this->db->select("parameter");
            $this->db->where('id',$id);
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result_array();
        }

         public function get_sp_data_byId($id)
        {
            $this->db->select("parameter");
            $this->db->where('id',$id);
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_filter_data_byId($id)
        {
            $this->db->select("parameter");
            $this->db->where('id',$id);
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_status_byId($id)
        {
            $this->db->select("*");
            $this->db->where('id',$id);
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result();
        }
        
        public function get_parameter_byId($id)
        {
            $this->db->select("*");
            $this->db->where('id',$id);
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result();
        }
        public function updateLanding($id,$landingID)
        {
            $this->db->where("id", $id);  
            $this->db->set("landing_id", $landingID) ;    
            if ( $this->db->update("user_details")) {  
             return true; 
            }else{
             return false;
            }
        }    
        public function update_flow_data_byId($new_parameter, $id)
        {
            $this->db->where("id", $id);  
            $this->db->set("parameter", $new_parameter) ;    
            if ( $this->db->update("services_marketplace_menu")) {  
             return true; 
            }else{
             return false;
            }
        }
        
        public function update_category_data_byId($data, $id)
        {
            $this->db->where("id", $id);  
            //$this->db->set("parameter", $data) ;    
            if ( $this->db->update("services_marketplace_menu",$data)) {  
             return true; 
            }else{
             return false;
            }
        }

         public function update_sp_data_byId($new_parameter, $id)
        {
            $this->db->where("id", $id);  
            $this->db->set("parameter", $new_parameter) ;    
            if ( $this->db->update("services_marketplace_menu")) {  
             return true; 
            }else{
             return false;
            }
        }


        public function update_filter_data_byId($new_parameter, $id)
        {
            $this->db->where("id", $id);  
            $this->db->set("parameter", $new_parameter) ;    
            if ( $this->db->update("services_marketplace_menu")) {  
             return true; 
            }else{
             return false;
            }
        }

        
        //update status for Flow, Filters, SP #start
        public function updateStatusById($id, $status)
        {
            //echo $status.$id;die();
            $this->db->where("id", $id);  
            $this->db->set("status", $status) ;    
            if ($this->db->update("services_marketplace_menu")) {  
             return true; 
            }else{
             return false;
            }
        }
        //update status for Flow, Filters, SP #end
        
        //update parameter for Flow, Filters, SP #start
        public function updateParameterById($id, $parameters)
        {
            $this->db->where("id", $id);  
            $this->db->set("parameter", $parameters) ;    
            if ( $this->db->update("services_marketplace_menu")) {  
             return true; 
            }else{
             return false;
            }
        }
        //update parameter for Flow, Filters, SP #end
        
        public function updateCurrencyById($id, $parameters, $description)
        {
            $this->db->where("id", $id);  
            $this->db->set("parameter", $parameters) ; 
            $this->db->set("description", $description) ;
            if ( $this->db->update("services_marketplace_menu")) {  
                return true; 
            }else{
                return false;
            }
        }
        
        
        //update parameter for Flow, Filters, SP #start
        public function updateCategoryById($id, $parameters, $description)
        {
            $this->db->where("id", $id);  
            $this->db->set("parameter", $parameters) ;  
            $this->db->set("description", $description) ;
            if ( $this->db->update("services_marketplace_menu")) {  
             return true; 
            }else{
             return false;
            }
        }
        //update parameter for Flow, Filters, SP #end

    //get all data of l1
    public function get_all_l1_data($service=null)
    {

        $this->db->select("*");
        if($service !=null)
        {
            $this->db->where('l1',$service);
        }
        $this->db->from("provider_level_one");
        $query = $this->db->get();
        return $query->result();
    }


    //get all data of l2
    public function get_all_l2_data($l1_id)
    {
        $this->db->select("*");
        $this->db->where("l1", $l1_id);
        $this->db->from("provider_level_two");
        $query = $this->db->get();
        return $query->result();
    }

     //get all data of l3
    public function get_all_l3_data($l1_id, $l2_id)
    {
        $this->db->select("*");
        $this->db->where("l1", $l1_id);
        $this->db->where("l2", $l2_id);
        $this->db->from("provider_level_three");
        $query = $this->db->get();
        return $query->result();
    }



    public function insertProviderLevelData($data)
    {
        $tbl = "services_marketplace_schema";

        //truncate table
        // $this->db->empty_table($tbl);

        //insert entries
        $this->db->insert($tbl,$data);
        if($this->db->affected_rows() > 0){return true;}
        else{return false;}
            
    }

    public function get_marketplace_services()
    {
        $this->db->select('*');
        $q = $this->db->get('services_marketplace_schema');
        return $q->result_array();
    }
    
    public function get_notification_types()
    {
        $this->db->select('*');
        $this->db->where("name", 'Notification Types');
        $q = $this->db->get('services_marketplace_menu');
        return $q->result();
    }
    
    public function get_status_list()
    {
        $this->db->select('*');
        $this->db->where("name", 'SP Progress Status List');
        $q = $this->db->get('services_marketplace_menu');
        return $q->result();
    }
    
    public function get_activity_list()
    {
        $this->db->select('*');
        $this->db->where("name", 'Flow');
        $q = $this->db->get('services_marketplace_menu');
        return $q->result();
    }
    
    public function insert_notification_trigger($formData){

        $this->db->insert("services_notification_trigger",$formData);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    
    public function insert_marketplace_mrp($formData){

        $this->db->insert("services_marketplace_mrp",$formData);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
     public function get_notification_trigger_byId($id)
        {
            $this->db->select("*");
            $this->db->where('id',$id);
            $this->db->from("services_notification_trigger");
            $query = $this->db->get();
            return $query->result();
        }
        
        
        public function get_financials_categoty_data()
        {
            $this->db->select("*");
            $this->db->where('name','Category');
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result_array();
        }
        
        
        public function get_mrp_data()
        {
            $this->db->select("*");
            $this->db->from("services_marketplace_mrp");
            $query = $this->db->get();
            return $query->result();
        }
        
        /*get currency start*/
        public function get_currency()
        {
            $this->db->select("*");
            $this->db->where('name','Currency');
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result_array();
        }
        /*get currency end*/
        
        public function get_mrp_by_Id($id)
            {
            $this->db->select("*");
            $this->db->where('id',$id);
            $this->db->from("services_marketplace_mrp");
            $query = $this->db->get();
            return $query->result();
            }
        
         public function get_financials_currency_data()
        {
            $this->db->select("*");
            $this->db->where('name','Currency');
            $this->db->from("services_marketplace_menu");
            $query = $this->db->get();
            return $query->result_array();
        }
        public function get_landing_data()
        {
            $this->db->select("*");
            $this->db->from("landing_page");
            $query = $this->db->get();
            return $query->result_array();
        }
        public function get_landing_data_by_user($id)
        {
            $this->db->select("*");
            $this->db->where('id',$id);
            $this->db->from("landing_page");
            $query = $this->db->get();
            return $query->result_array();
        }
        public function get_landing_page_details_data($id)
        {
            $this->db->select("lpd.*,lp.name,lps.name as SectionName");
            //$this->db->where('landingPageId',$id);
            $this->db->from("landing_page_details as lpd");
            $this->db->join("landing_page as lp","lp.id=lpd.landingPageId");
            $this->db->join("landing_page_section as lps","lps.id=lpd.section_id");
            $this->db->where('lpd.landingPageId',$id);
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function insert_landing_data($data)
        {
            $tbl = "landing_page";
            //insert entries
            $this->db->insert($tbl,$data);
            if($this->db->affected_rows() > 0){return true;}
            else{return false;}
                
        }
         public function insert_landing_section_data($data)
        {
            // echo "<pre>";print_r($data);die;
            //$this->db->insert('landing_page_section',$data_feature);//inserts into a single column 
            // return $this->db->insert_id();//returns last inserted id
            $tbl = "landing_page_section";
            //insert entries
            $this->db->insert($tbl,$data);
            if($this->db->affected_rows() > 0){return true;}
            else{return false;}
                
        }
         public function insert_landing_details_data($data)
        {
            //echo "<pre>";print_r($data);die;
            //$this->db->insert('landing_page_section',$data_feature);//inserts into a single column 
            // return $this->db->insert_id();//returns last inserted id
            $tbl = "landing_page_details";
            //insert entries
            $this->db->insert($tbl,$data);
            if($this->db->affected_rows() > 0){return true;}
            else{return false;}
                
        }
        public function landingDelete($id)
        {
            $this->db->where('id',$id);
            $result = $this->db->delete('landing_page');
            return $result;
        }
        public function landingDetailsDelete($id)
        {
            $this->db->where('id',$id);
            $result = $this->db->delete('landing_page_details');
            return $result;
        }
        public function get_land_byId($id)
        {
            $this->db->select("*");
            $this->db->where('id',$id);
            $this->db->from("landing_page");
            $query = $this->db->get();
            return $query->result();
        }
         public function updatLandingById($id, $parameters)
        {
            //echo "<pre>";print_r($parameters);die;
            $this->db->where("id", $id);  
            $this->db->set("descripation", $parameters['descripation']); 
            $this->db->set("name", $parameters['name']); 
            $this->db->set("path", $parameters['path']); 
            if ( $this->db->update("landing_page")) {  
             return true; 
            }else{
             return false;
            }
        }
         public function updatLandingDetailsById($id, $parameters)
        {
            //echo "<pre>";print_r($parameters);die;
            $this->db->where("id", $id);  
            $this->db->set("parameter", $parameters['parameter']); 
            $this->db->set("type", $parameters['type']); 
            $this->db->set("landingPageId", $parameters['landingPageId']); 
            $this->db->set("section_id", $parameters['section_id']);
            if ( $this->db->update("landing_page_details")) {  
             return true; 
            }else{
             return false;
            }
        }
        
        public function update_marketplace_mrp($formdata, $id)
        {
            $this->db->where("id", $id);  
            if ($this->db->update("services_marketplace_mrp", $formdata)) {  
             return true; 
            }else{
             return false;
            }
        }

        public function spResellers($order_by = null, $order_nature='null'){
            $sql="SELECT * FROM  user_details  WHERE iam IN('sp','reseller')";  
            if($order_by && !$order_nature){$this->db->order_by($order_by, 'asc');}
            if($order_by && !$order_nature){$this->db->order_by($order_by, $order_nature);}
            if(!$order_by && $order_nature){$this->db->order_by('name', $order_nature);}
            $query = $this->db->query($sql);
            return $query->result_array();

        }
        public function getUserDetailsById($id){
            //echo $id;die;
            $this->db->select('allowed_services');
            $this->db->from('user_details');
            $this->db->where('id',$id);
            $row = $this->db->get()->row();
            if (isset($row)) {
                return $row->allowed_services;
            } else {
                return false;
            }
            
        }
        public function allowed_services_update($id,$allow){
            $str = $allow;
            $rr = explode(",",$str);

            if (in_array('placement_services', $rr)){
                //echo $status;die;
                $this->db->set('status_s_h',0);
                $this->db->where('sp_id',$id);
                $this->db->update('placement_jobs');    
            }else{
                $this->db->set('status_s_h',1);
                $this->db->where('sp_id',$id);
                $this->db->update('placement_jobs'); 
            }
            if (in_array('skill_services', $rr)){
                //echo $status;die;
                $this->db->set('status_s_h',0);
                $this->db->where('sp_id',$id);
                $this->db->update('vocational_training');    
            }else{
                $this->db->set('status_s_h',1);
                $this->db->where('sp_id',$id);
                $this->db->update('vocational_training'); 
            }
            $this->db->set('allowed_services',$allow);
            $this->db->where('id',$id);
            if ($this->db->update('user_details')) {  
             return true; 
            }else{
             return false;
            }
        }
        public function getpayment_details_data($id)
        {
            $this->db->select("pd.*,payCrd.*");
            $this->db->from("paymentcrd as payCrd");
            $this->db->join("payment_gatway_details as pd","pd.id=payCrd.payment_type");
            $this->db->where('payCrd.user_id',$id);
            $query = $this->db->get();
            return $query->result_array();
        }
        public function getpayment_details()
        {
            $this->db->distinct();
            $this->db->select("payCrd.*,pd.*");
            // $this->db->distinct('payCrd.payment_type');
            //$this->db->where('landingPageId',$id);
            $this->db->from("paymentcrd as payCrd");
            $this->db->join("payment_gatway_details as pd","pd.id=payCrd.payment_type");
            $query = $this->db->get();
            // echo $this->db->last_query();
            // die;
            return $query->result_array();
        }
        public function get_payment_details_id_vias($id = null,$user_id=null){
            $this->db->select("*");
            $this->db->from("paymentcrd");
            if( $id != null ){
                $this->db->where('id',$id);
            }
            if( $user_id != null ){
                $this->db->where('user_id',$user_id);
            }
            $query = $this->db->get()->row();
            // echo $this->db->last_query();
            // die;
            return $query;
        }
        public function inserCrd($data){
            $this->db->insert('paymentcrd',$data);
        }
        public function updatePaymentCrd($formArray,$id){
            $this->db->set('api_key',$formArray['api_key']);
            $this->db->set('secret_key',$formArray['secret_key']);
            $this->db->set('user_id',$formArray['user_id']);
            $this->db->set('payment_type',$formArray['payment_type']);
            $this->db->where('id',$id);
            $this->db->update('paymentcrd');
        }
        public function paymentGatwayActiveDeactive($id,$status){
            // $this->db->select("*");
            // $this->db->from("paymentcrd");
            // $this->db->where('id',$id);
            // $currentStatus = $this->db->get()->row()->crd_status;
            // $this->db->set("crd_status", 0);
            // $this->db->update("paymentcrd");
            $this->db->where("id", $id);  
            $this->db->set("crd_status", $status);
            if ( $this->db->update("paymentcrd")) {
                // echo $this->db->last_query();
                // die;
                return true;
            }else{
                // echo $this->db->last_query();
                // die;
                return false;
            }
        }
        public function getPaymentGatway($id = null){
            $this->db->select("*");
            $this->db->from("paymentcrd");
            // $this->db->where('crd_status',1);
            $this->db->where('id',$id);
           return $currentStatus = $this->db->get();
             
            // $this->db->set("crd_status", 0);
            // $this->db->update("paymentcrd");
            // $this->db->where("id", $id);  
            // $this->db->set("crd_status", $status);
            // if ( $this->db->update("paymentcrd")) {
            //     return true;
            // }else{
            //     return false;
            // }
        }
        public function record_count($where = '') {
            if( $where != '' ){
                $this->db->where( $where );
            }
            $this->db->from("user_details");
            return $this->db->count_all_results();
            // echo $this->db->last_query();
                //  die;
        }
        public function fetch_user_details($limit = '', $start = '',$keys) {
            $where = "iam='sp' and status!='0' and id>=1";
            $this->db->where($where);
            $datas = $datas1 = $datas2= $datakey=[];
            if($keys['key'] !='' || $keys['key1'] !='' || $keys['key2'] !=''){
                  $key=  $keys['key'];
                  $key1=  $keys['key1'];
                  $key2= $keys['key2'];
                if(!empty($key)){
                    $query ="SELECT * FROM `provider_detail_first` WHERE l1=$key";
                    $results = $this->db->query($query)->result_array();
                    foreach($results as $row){
                    $datas[]=$row['email'];
                    }
                }
        
                if(!empty($key1)){
                    $query ="SELECT * FROM `provider_detail_sec` WHERE l2=$key1";
                     $results = $this->db->query($query)->result_array();
                     foreach($results as $row){
                        $datas1[]=$row['email'];
        
                     }
                }
        
                if(!empty($key2)){
                    $query ="SELECT * FROM `provider_detail_three` WHERE l3=$key2";
                     $results = $this->db->query($query)->result_array();
                     foreach($results as $row){
                        $datas2[]=$row['email'];
        
                     }
                }
                
                $datakey = array_intersect($datas,$datas1,$datas2);
        
                if(count($datakey)>0){
                    $this->db->where_in('email',$datakey);
                }else{
                    return $data=[];
                }
                
            }
            if( $limit != '' ){
                $this->db->limit($limit, $start);
            }
            $query = $this->db->get("user_details");
            // echo $this->db->last_query();
            // die;
            if ($query->num_rows() > 0) {
               foreach ($query->result() as $row) {
                   $data[] = $row;
               }
               return $data;
            }
            return false;
        }
    }
?>