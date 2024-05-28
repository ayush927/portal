<?php 
    class Career_library extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            $this->load->model('User_model');
            $this->load->model('Commen_model');
            $this->load->model('Admin_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
        }

        protected $view_shared =[
            'na'=>'not_shared',
            'global'=>'shared_globally', 
            'admin' => 'shared_admin', 
            'sp' =>'shared_sp', 
            'reseller'=>'shared_reseller', 
            'user' => 'shared_user'
        ];
        
        
        protected $disp_upload_size = [
            'max_size'     => 1000, 
            'max_width'     => 1260, 
            'min_width'     => 1140,  
            'max_height'    => 900, 
            'min_height'    => 815
        ];

        protected $controller_role_mapping = [
            'career-library'=>'admin',
        ];
        
        public function add_source($id = null){
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            if( $id != null ){
                $data['edit'] = getQuery([ 'table' => 'source' , 'where' => [ 'id' => $id ] , 'single' => true ]);
            }
            $this->load->model('Admin_model');
            $this->load->view('navbar',$data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/add_sources');
            $this->load->view('footer');
        }
        
        public function submit_sources(){
            if( !empty( $_POST ) ){
                // pre( $_POST );
                // die;
                if(! isset($_POST['id']) ){
                $this->form_validation->set_rules("sourceName","Source","trim|required");    
                }
                else{
                    $this->form_validation->set_rules("sourceName","Source","trim|required|is_unique[source.sourceName]");
                }
                if($this->form_validation->run() == false){
                    $this->session->set_flashdata( 'msg' , 'Please Fill up form Correctly');
                    $this->session->set_flashdata('status' , 'danger');
                    if( isset( $_POST['id'] ) ){
                        // print_r( $this->form_validation->error_array() );
                        // die;
                        redirect( 'career-library/edit-source/'.$_POST['id'] , true );
                    }
                    else{
                        redirect( 'career-library/add-source' , true );
                    }
                }
                else{
                    if( isset( $_POST['id'] ) ){
                        $status = update([ 'table' =>  'source' , 'data' =>  $_POST, 'where' => [ 'id' => $_POST['id'] ] ]);
                        // lQ(1);
                        if( affected() > 0 ){
                            $this->session->set_flashdata( 'msg' , 'Updated Career Cluster');
                            $this->session->set_flashdata('status' , 'success');
                            redirect( 'career-library/all-sources' , true );
                        }
                        else{
                            $this->session->set_flashdata( 'msg' , 'Not Updated Try Again');
                            $this->session->set_flashdata('status' , 'info');
                            redirect( 'career-library/edit-source/'.$_POST['id'] , true );
                        }
                    }   
                    else{
                        $id = insert( 'source' , $_POST );
                        if( $id ){
                            $this->session->set_flashdata( 'msg' , 'Add Career Cluster');
                            $this->session->set_flashdata('status' , 'success');
                            redirect( 'career-library/all-sources' , true );
                        }
                        else{
                            $this->session->set_flashdata( 'msg' , 'Something Error Haappen , Try Again');
                            $this->session->set_flashdata('status' , 'info');
                            redirect( 'career-library/add-sources' , true );
                        }
                    }                 
                }
            }
            else{
                $this->session->set_flashdata('msg' , 'Please fill up the form');
                $this->session->set_flashdata('status' , 'danger');
                redirect( 'career-library/add-sources' );
            }
        }
        
        public function all_sources(){
            $user = $this->session->userdata('user');
            
            $data['user'] = $user;
            $data['list'] = getQuery([ 'table' => 'source' ]);
            $this->load->model('Admin_model');
            $this->load->view('navbar',$data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/all_sources');
            $this->load->view('footer');
        }
        
        function delete_sources( $id ){
            $status = delete(['table' => 'source' , 'where' => [ 'id' =>  $id ] ] );
            if( $status == true ){
                $this->session->set_flashdata( 'msg' , 'Deleted Sources');
                $this->session->set_flashdata('status' , 'success');
                redirect( 'career-library/all-sources' , true );
            }
            else{
                $this->session->set_flashdata( 'msg' , 'Not Deleted Try Again');
                $this->session->set_flashdata('status' , 'info');
                redirect( 'career-library/all-sources' , true );
            }
        }
        
        public function add_career_path($id = null){
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['list'] = getQuery([ 'table' => 'clusters' ]);
            if( $id != null ){
                 $data['edit'] = getQuery(['table' => 'career_path' , 'where' => [ 'id' =>  $id ] , 'single' => true ] );
            }
            // pre( $data );
            // die;
            $this->load->model('Admin_model');
            $this->load->view('navbar',$data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/add_career_path');
            $this->load->view('footer');
        }
        
        public function all_career_path(){
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['list'] = getQuery([ 'select' => 'career_path.* , clusters.clustersName' , 'table' => 'career_path' , 'join' => [
                [ 'clusters' , 'clusters.id = career_path.clusterId' , 'INNER' ]] 
            ]);
            $this->load->model('Admin_model');
            $this->load->view('navbar',$data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/all_career_path');
            $this->load->view('footer');
        }
        
        function submit_cluster_path(){
            if( !empty( $_POST ) ){
                // pre( $_POST );
                // die;
                $this->form_validation->set_rules("clusterId","Cluster","trim|required");    
                if(! isset($_POST['id']) ){
                    $this->form_validation->set_rules("career_path","Source","trim|required|is_unique[career_path.career_path]");
                }
                else{
                    $this->form_validation->set_rules("career_path","Source","trim|required");    
                }
                if($this->form_validation->run() == false){
                    $this->session->set_flashdata( 'msg' , 'Please Fill up form Correctly');
                    $this->session->set_flashdata('status' , 'danger');
                        // print_r( $this->form_validation->error_array() );
                        // die;
                    if( isset( $_POST['id'] ) ){
                        redirect( 'career-library/edit-career-path/'.$_POST['id'] , true );
                    }
                    else{
                        redirect( 'career-library/add-career-path' , true );
                    }
                }
                else{
                    if( isset( $_POST['id'] ) ){
                        $status = update([ 'table' =>  'career_path' , 'data' =>  $_POST, 'where' => [ 'id' => $_POST['id'] ] ]);
                        // lQ(1);
                        if( affected() > 0 ){
                            $this->session->set_flashdata( 'msg' , 'Updated Career Cluster');
                            $this->session->set_flashdata('status' , 'success');
                            redirect( 'career-library/all-career-path' , true );
                        }
                        else{
                            $this->session->set_flashdata( 'msg' , 'Not Updated Try Again');
                            $this->session->set_flashdata('status' , 'info');
                            redirect( 'career-library/edit-career-path/'.$_POST['id'] , true );
                        }
                    }   
                    else{
                        $id = insert( 'career_path' , $_POST );
                        if( $id ){
                            $this->session->set_flashdata( 'msg' , 'Add Career Cluster');
                            $this->session->set_flashdata('status' , 'success');
                            redirect( 'career-library/all-career-path' , true );
                        }
                        else{
                            $this->session->set_flashdata( 'msg' , 'Something Error Haappen , Try Again');
                            $this->session->set_flashdata('status' , 'info');
                            redirect( 'career-library/add-career-path' , true );
                        }
                    }                 
                }
            }
            else{
                $this->session->set_flashdata('msg' , 'Please fill up the form');
                $this->session->set_flashdata('status' , 'danger');
                redirect( 'career-library/add-career-path' );
            }
        }
        
        function delete_career_path( $id ){
            $status = delete(['table' => 'career_path' , 'where' => [ 'id' =>  $id ] ] );
            if( $status == true ){
                $this->session->set_flashdata( 'msg' , 'Deleted Sources');
                $this->session->set_flashdata('status' , 'success');
                redirect( 'career-library/all-career-path' , true );
            }
            else{
                $this->session->set_flashdata( 'msg' , 'Not Deleted Try Again');
                $this->session->set_flashdata('status' , 'info');
                redirect( 'career-library/all-career-path' , true );
            }
        }
        
        public function add_profession($id = null){
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['edit'] = getQuery([ 'table' => 'c_library' , 'where' => [ 'id' => $id ] , 'single' => true ]);
            // pre($data , 1);
            $data['sizes'] = $this->disp_upload_size;
            $data['list'] = getQuery([ 'table' => 'clusters' ]);
            $data['sources'] = getQuery([ 'table' => 'source' ]);
            $data['images'] = getQuery([ 'table' => 'profession_images' ]);
            $this->load->model('Admin_model');
            $this->load->view('navbar',$data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/add_profession_file');
            $this->load->view('footer');
        }
        
        public function get_career_path($id = null){
            if( $id != null ){
                $cluster = getQuery([ 'table' => 'clusters' , 'where' => [ 'clustersName' => base64_decode($id) ], 'single' => true ]);
                // lQ( 1 );
                // die;
                $result = getQuery([ 'table' => 'career_path' , 'where' => [ 'clusterId' => $cluster['id'] ] ]);
                if( !empty( $result ) ){
                    $html = '';
                    foreach( $result as $key => $value ){
                        $html .='<option value="'.$value['career_path'].'" >'.$value['career_path'].'</option>';
                    }
                    $data = [ 'result' => $html , 'code' =>'success' , 'message' => 'career path found' ];
                }
                else{
                    $data = [ 'result' => [] , 'message' => 'career path not found' ];
                }
            }
            else{
                $data = [ 'result' => [] , 'message' => 'cluster id not found' ];
            }
            echo json_encode( $data );
        }
        
        public function submit_profession(){
            // pre($_POST);
            // pre($_FILES);
            // die;
            if(!empty($_POST)){
                $this->form_validation->set_rules("Cluster","Cluster","trim|required");    
                $this->form_validation->set_rules("Path","Cluster","trim|required");    
                $this->form_validation->set_rules("Source","Cluster","trim|required");    
                $this->form_validation->set_rules("profession_id","Cluster","trim|required");    
                $this->form_validation->set_rules("standard_title","Cluster","trim|required");
                if( isset( $_POST['id'] ) ){
                    $this->form_validation->set_rules("standard_title","Cluster","trim|required");
                }
                else{
                    $this->form_validation->set_rules("standard_title","Cluster","trim|required|is_unique[c_library.standard_title]");
                }
                if($this->form_validation->run() == false){
                    $this->session->set_flashdata( 'msg' , 'Please Fill up form Correctly');
                    $this->session->set_flashdata('status' , 'danger');
                        // print_r( $this->form_validation->error_array() );
                        // die;
                    if( isset( $_POST['id'] ) ){
                        redirect( 'career-library/edit-profession/'.$_POST['id'] , true );
                    }
                    else{
                        redirect( 'career-library/add-profession' , true );
                    }
                }
                else{
                    extract( $_POST );
                    if( isset( $_FILES['images'] ) ){
                       if( $_FILES['images']['name'] != '' ){
                            $config['upload_path']   = 'uploads/galleryImage/'; 
                            $config['allowed_types'] = 'gif|jpg|png'; 
                            $config['encrypt_name']  = true;
                            $config['max_size']      = $this->disp_upload_size['max_size']; 
                            $config['max_width']     = $this->disp_upload_size['max_width']; 
                            $config['min_width']     = $this->disp_upload_size['min_width'];  
                            $config['max_height']    = $this->disp_upload_size['max_height'];  
                            $config['min_height']    = $this->disp_upload_size['min_height'];  
                            $this->load->library('upload', $config);
                    			
                            if (!$this->upload->do_upload('images')) {
                                $error = array('error' => $this->upload->display_errors());
                                // print_r( $error );
                                // die;
                                $this->session->set_flashdata( 'msg' , implode('<br>' , $error));
                                $this->session->set_flashdata('status' , 'danger'); 
                                if( isset( $_POST['id'] ) ){
                                    redirect( 'career-library/edit-profession/'.$_POST['id'] , true );
                                }
                                else{
                                    redirect( 'career-library/add-profession' , true );
                                }
                            }	
                            else{ 
                                $data = $this->upload->data();
                                $images['imageName'] = $data['file_name'];
                                insert( 'profession_images' , $images );
                                $imageId = $this->db->insert_id();
                                // echo $imageId;
                                // die;
                            }   
                       }
                    }
                    if( isset( $_POST['id'] ) ){
                        $c_library = [
                            'profession_id' => $profession_id,
                            'Source' => $Source,
                            'Cluster' => $Cluster,
                            'Path' => $Path,
                            'standard_title' => $standard_title,
                        ];
                        if( isset( $imageId ) ){
                            $c_library['imageId'] = $imageId;
                        }
                        elseif( isset($_POST['imageId']) ){
                            if( $_POST['imageId'] != '' ){
                                $c_library['imageId'] = $_POST['imageId'];
                            }
                        }
                        // pre( $c_library );
                        // die;
                        $status = update([ 'table' =>  'c_library' , 'data' =>  $c_library, 'where' => [ 'standard_title' => $standard_title ] ]);
                        $c_library1 = [
                            'profession_id' => $profession_id,
                            'profession_name' => $standard_title,
                        ];
                        $status = update([ 'table' =>  'c_library_1' , 'data' =>  $c_library1, 'where' => [ 'profession_name' => $standard_title ] ]);
                        // lQ(1);
                        if( affected() > 0 ){
                            $this->session->set_flashdata( 'msg' , 'Updated Career Cluster');
                            $this->session->set_flashdata('status' , 'success');
                            redirect( 'career-library/edit-profession/'.$_POST['id'] , true );
                        }
                        else{
                            $this->session->set_flashdata( 'msg' , 'No Changes Updated');
                            $this->session->set_flashdata('status' , 'info');
                            redirect( 'adminController/view-career-cluster-details' , true );
                        }
                    }   
                    else{
                        // extract( $_POST );
                        $c_library = [
                            'profession_id' => $profession_id,
                            'Source' => $Source,
                            'Cluster' => $Cluster,
                            'Path' => $Path,
                            'standard_title' => $standard_title,
                        ];
                        if( isset( $imageId ) ){
                            $c_library['imageId'] = $imageId;
                        }
                        $id = insert( 'c_library' , $c_library );
                        $c_library1 = [
                            'profession_id' => $profession_id,
                            'profession_name' => $standard_title,
                        ];
                        $id = insert( 'c_library_1' , $c_library1 );
                        if( $id ){
                            $this->session->set_flashdata( 'msg' , 'Add Career Cluster');
                            $this->session->set_flashdata('status' , 'success');
                            redirect( 'career-library/all-career-path' , true );
                        }
                        else{
                            $this->session->set_flashdata( 'msg' , 'Something Error Haappen , Try Again');
                            $this->session->set_flashdata('status' , 'info');
                            redirect( 'career-library/add-career-path' , true );
                        }
                    }                 
                }
            }
            else{
                $this->session->set_flashdata( 'msg' , 'Method is invalid');
                $this->session->set_flashdata('status' , 'danger');
                redirect( 'career-library/add-profession' , true );
            }
        }
    }