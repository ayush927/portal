<?php
    class Assessment_variations extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('Commen_model');
            $this->load->model('Admin_model');
            date_default_timezone_set('Asia/Kolkata');
            $this->part2_timer = [
                'uce_part2' => 20, 
                'uce_part2_2' => 8,
                'uce_part2_3' => 9, // Additonal 1 minute for image loading
                'uce_part2_4' => 6, 
                // 'uce_part2_4' => 15, 
                'uce_part2_5' => 6, 
                'uce_part2_6' => 7 // Additonal 2 minute for image loading
            ];
            $this->variation = 'two';
        }
        
        public function uce_part1($code)
        {
            $code = base64_decode($code);
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
            $data['allowed_services'] = $this->Base_model->getUserDetailsByIds($user['user_id']);
            $email = $user['email'];
            $where = "email='$email' and code='$code' and solution='uce_part1_1'";
            $this->db->where($where);
            $qno = $this->db->get('ppe_part1_test_details')->num_rows();
            if($qno==0)
            {
                $num = '1';
            }
            else if($qno>=27)
            {
                redirect(base_url().'assessment_variations/uce_part1_2/'.base64_encode($code));
            }
            else
            {
                $this->db->where($where);
                $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                foreach($qno->result() as $qno)
                {
                    $qno = $qno->qno;
                    $num = $qno + 1;
                }
            }
            $qlist['q'] = $this->Base_model->uce_part1_1($num);
            
            $this->load->view('navbar3',$data);
            $this->load->view('user/sidebar',$data); 
            $this->load->view('user/uce_part1_1',$qlist); 
            $this->load->view('footer'); 
            if(isset($_POST['saveBtn']))
            {
                if($num!=26)
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fifth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part1_1',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        redirect(base_url().'assessment_variations/uce_part1/'.base64_encode($code));
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part1/'.base64_encode($code));   
                    }
                    

                }
                else
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                   
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part1_1',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        //that code used after fourth asssessment 
                        // $this->Base_model->update_code_status($code);
                        // $where = "user_id='$email' and code='$code' and part='Part 1'";
                        // $this->db->where($where);
                        // $this->db->set('status','Rp');
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part1/'.base64_encode($code));   
                        // $this->session->set_flashdata('msg','Test Compeleted Please Take Next Assessment');
                        // redirect(base_url().'BaseController/view_code');     
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part1/'.base64_encode($code));   
                    }
                    
                   
                }
                
            }
        }
        public function uce_part1_2($code)
        {
            $code = base64_decode($code);
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
            $data['allowed_services'] = $this->Base_model->getUserDetailsByIds($user['user_id']);
            $email = $user['email'];
            $where = "email='$email' and code='$code' and solution='uce_part1_2'";
            $this->db->where($where);
            $qno = $this->db->get('ppe_part1_test_details')->num_rows();
            if($qno==0)
            {
                $num = '1';
            }
            else if($qno>=56)
            {
                redirect(base_url().'assessment_variations/uce_part1_3/'.base64_encode($code));
            }
            else
            {
                $this->db->where($where);
                $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                foreach($qno->result() as $qno)
                {
                    $qno = $qno->qno;
                    $num = $qno + 1;
                }
            }
            $qlist['q'] = $this->Base_model->uce_part1_2($num);
            
            $this->load->view('navbar3',$data);
            $this->load->view('user/sidebar',$data); 
            $this->load->view('user/uce_part1_2',$qlist); 
            // pre( $data , 1 );
            $this->load->view('footer'); 
            if(isset($_POST['saveBtn']))
            {
                if($num!=56)
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fifth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part1_2',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        redirect(base_url().'assessment_variations/uce_part1_2/'.base64_encode($code));
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part1_2/'.base64_encode($code));   
                    }
                    

                }
                else
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fifth Question','required');
                   
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part1_2',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        //that code used after fourth asssessment 
                        // $this->Base_model->update_code_status($code);
                        // $where = "user_id='$email' and code='$code' and part='Part 1'";
                        // $this->db->where($where);
                        // $this->db->set('status','Rp');
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part1_2/'.base64_encode($code));   
                        // $this->session->set_flashdata('msg','Test Compeleted Please Take Next Assessment');
                        // redirect(base_url().'BaseController/view_code');     
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part1_2/'.base64_encode($code));   
                    }
                    
                   
                }
                
            }
        }
        public function uce_part1_3($code)
        {
            $code = base64_decode($code);
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
            $data['allowed_services'] = $this->Base_model->getUserDetailsByIds($user['user_id']);
            $email = $user['email'];
            $where="email='$email' and code='$code'";
            $this->db->where($where);
            $this->db->order_by('id','desc')->limit(1);
            $num = $this->db->get('wls_part2_rank_ordring')->num_rows();
            if($num==0)
            {
                $grp = 1;
            }
            else
            {
                $where="email='$email' and code='$code'";
                $this->db->where($where);
                $this->db->order_by('id','desc')->limit(1);
                $row = $this->db->get('wls_part2_rank_ordring');
                foreach($row->result() as $row)
                {
                    $grp = $row->grp;
                    $grp = $grp + 1;    
                }    
            }
            if($grp>21)
            {
                redirect(base_url().'assessment_variations/uce_part1_4/'.base64_encode($code));
            }
            $where2 = "grp>=$grp";
            $this->db->where($where2);
            $r['r']= $this->db->limit(25)->get('wls_part2_1_detail');
            
            $this->load->view('navbar3',$data);
            $this->load->view('user/sidebar',$data); 
            $this->load->view('user/uce_part1_3',$r); 
            $this->load->view('footer');        
            
            if(isset($_POST['saveBtn']))
            {
                $j=1;
                $list = $_POST['list'];
                $grop = $_POST['grp'];
                $count = count($list);
                for($i=0;$i<=$count-1;$i++)
                {
                    if($j>5)
                    {
                        $j=1;
                    }
                    $formArray = array(
                        'email'=>$email,
                        'solution'=>'uce_part1_3',
                        'code'=>$code,
                        'grp'=>$grop[$i],
                        'qno'=>$j,
                        'ordr'=>$list[$i]
                    );  
                    $this->db->insert('wls_part2_rank_ordring',$formArray);
                    $j++;
                }
                redirect(base_url().'assessment_variations/uce_part1_3/'.base64_encode($code));
            }
        }
        public function uce_part1_4($code)
        {
            $code = base64_decode($code);
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
            $data['allowed_services'] = $this->Base_model->getUserDetailsByIds($user['user_id']);
            $email = $user['email'];
            $where = "email='$email' and code='$code' and solution='uce_part1_4_1'";
            $this->db->where($where);
            $qno = $this->db->get('ppe_part1_test_details')->num_rows();
            if($qno==0)
            {
                $num = '1';
            }
            else if($qno>=26)
            {
                redirect(base_url().'assessment_variations/uce_part1_4_2/'.base64_encode($code));
            }
            else
            {
                $this->db->where($where);
                $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                foreach($qno->result() as $qno)
                {
                    $qno = $qno->qno;
                    $num = $qno + 1;
                }
            }
            $qlist['q'] = $this->Base_model->uce_part1_4_1($num);
            
            $this->load->view('navbar3',$data);
            $this->load->view('user/sidebar',$data); 
            $this->load->view('user/uce_part1_4_1',$qlist); 
            $this->load->view('footer'); 
            if(isset($_POST['saveBtn']))
            {
                if($num!=26)
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fifth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part1_4_1',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        redirect(base_url().'assessment_variations/uce_part1_4/'.base64_encode($code));
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part1_4/'.base64_encode($code));   
                    }
                    

                }
                else
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                   
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part1_4_1',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        //that code used after fourth asssessment 
                        // $this->Base_model->update_code_status($code);
                        // $where = "user_id='$email' and code='$code' and part='Part 1'";
                        // $this->db->where($where);
                        // $this->db->set('status','Rp');
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part1_4_2/'.base64_encode($code));   
                        // $this->session->set_flashdata('msg','Test Compeleted Please Take Next Assessment');
                        // redirect(base_url().'BaseController/view_code');     
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part1_4/'.base64_encode($code));   
                    }
                    
                   
                }
                
            }
        }
        public function uce_part1_4_2($code)
        {
            $code = base64_decode($code);
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
            $data['allowed_services'] = $this->Base_model->getUserDetailsByIds($user['user_id']);
            $email = $user['email'];
            $where = "email='$email' and code='$code' and solution='uce_part1_4_2'";
            $this->db->where($where);
            $qno = $this->db->get('ppe_part1_test_details')->num_rows();
            if($qno==0)
            {
                $num = '1';
            }
            else if($qno>=24)
            {
                redirect(base_url().'assessment_variations/uce_part1_5/'.base64_encode($code));
            }
            else
            {
                $this->db->where($where);
                $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                foreach($qno->result() as $qno)
                {
                    $qno = $qno->qno;
                    $num = $qno + 1;
                }
            }
            $qlist['q'] = $this->Base_model->uce_part1_4_2($num);
            
            $this->load->view('navbar3',$data);
            $this->load->view('user/sidebar',$data); 
            $this->load->view('user/uce_part1_4_2',$qlist); 
            $this->load->view('footer'); 
            if(isset($_POST['saveBtn']))
            {
                if($num!=21)
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fifth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part1_4_2',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        redirect(base_url().'assessment_variations/uce_part1_4_2/'.base64_encode($code));
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part1_4_2/'.base64_encode($code));   
                    }
                    

                }
                else
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part1_4_2',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        //that code used after fourth asssessment 
                        // $this->Base_model->update_code_status($code);
                        // $where = "user_id='$email' and code='$code' and part='Part 1'";
                        // $this->db->where($where);
                        // $this->db->set('status','Rp');
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part1_5/'.base64_encode($code));   
                        // $this->session->set_flashdata('msg','Test Compeleted Please Take Next Assessment');
                        // redirect(base_url().'BaseController/view_code');     
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part1_4_2/'.base64_encode($code));   
                    }
                    
                   
                }
                
            }
        }
        public function uce_part1_5($code)
        {
            $code = base64_decode($code);
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
            $data['allowed_services'] = $this->Base_model->getUserDetailsByIds($user['user_id']);
            $email = $user['email'];
            $where = "email='$email' and code='$code' and solution='uce_part1_5'";
            $this->db->where($where);
            $qno = $this->db->get('ppe_part1_test_details')->num_rows(); 
            // foreach($qno->result() as $qno)
            // {
            //     $qno = $qno->qno;
                
            // }
            if($qno==0)
            {
                $num = '1';
            }
            else if($qno>=16)
            {
                redirect(base_url().'assessment_variations/uce_part2/'.base64_encode($code));
            }
            else
            {
                $this->db->where( $where );
                $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                foreach( $qno->result() as $qno )
                {
                    $qno = $qno->qno;
                    $num = $qno + 1;
                }
            }
            $qlist['q'] = $this->Base_model->uce_part1_5($num);
            
            $this->load->view('navbar3',$data);
            $this->load->view('user/sidebar',$data); 
            $this->load->view('user/uce_part1_5',$qlist); 
            $this->load->view('footer'); 
            if(isset($_POST['saveBtn']))
            {
            // pre( $_POST , 1 );
                if($num!=16)
                {
                    // $this->form_validation->set_rules('radio11','First Question','required');
                    // $this->form_validation->set_rules('radio21','Second Question','required');
                    // $this->form_validation->set_rules('radio33','Third Question','required');
                    // $this->form_validation->set_rules('radio41','Fourth Question','required');
                    // $this->form_validation->set_rules('radio51','Fifth Question','required');
                    // if($this->form_validation->run()==true)
                    // {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            $l=0;
                            $as = '';
                            $ans = 'radio'.$i;
                            for($b=1;$b<=4;$b++){
                                $answ = $ans.$b;
                                
                                if(isset($_POST[$answ]))
                                {
                                    if($l!=0)
                                    {
                                        $answ = $_POST[$answ];
                                        $as = $as.','.$answ;
                                        
                                    }
                                    else
                                    {
                                        $answ = $_POST[$answ];
                                        $as = $as.$answ;
                                        $l=1;
                                    }
                                   
                                }
                                
                            }
                            $ans = $as;
                        
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part1_5',
                                    'code'=>$code,
                                    'ans'=>$ans
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        redirect(base_url().'assessment_variations/uce_part1_5/'.base64_encode($code));
                    // }
                    // else
                    // {
                    //     $this->session->set_flashdata('msg',validation_errors());
                    //     redirect(base_url().'assessment_variations/uce_part1_5/'.base64_encode($code));   
                    // }
                }
                else
                {
                    // $this->form_validation->set_rules('radio1','First Question','required');
                    
                     $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            $l=0;
                            $as = '';
                            $ans = 'radio'.$i;
                            for($b=1;$b<=4;$b++){
                                $answ = $ans.$b;
                                
                                if(isset($_POST[$answ]))
                                {
                                    if($l!=0)
                                    {
                                        $answ = $_POST[$answ];
                                        $as = $as.','.$answ;
                                        
                                    }
                                    else
                                    {
                                        $answ = $_POST[$answ];
                                        $as = $as.$answ;
                                        $l=1;
                                    }
                                   
                                }
                                
                            }
                            $ans = $as;
                        
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part1_5',
                                    'code'=>$code,
                                    'ans'=>$ans
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        //that code used after fourth asssessment 
                        // $this->Base_model->update_code_status($code);
                        $where = "user_id='$email' and code='$code' and part='Part 1'";
                        $this->db->where($where);
                        $this->db->set('status','Rp');
                        $this->db->update('user_assessment_info');
                        // redirect(base_url().'assessment_variations/uce_part1_5/'.base64_encode($code));   
                        $this->session->set_flashdata('msg','Test Compeleted Please Take Next Assessment');
                        redirect(base_url().'BaseController/view_code');     
                   
                    
                   
                }
                
            }
        }

        function variation_time_update( $code  , $partName)
        {
            $dateTime = date('Y-m-d H:i:s');
            $this->db->where( 'code="'.$code.'" and link="uce_part2"' );
            $this->db->set( 'start_time' , $dateTime );
            $this->db->set( 'remain_time' , $this->part2_timer[$partName] );
            $this->db->update( 'user_assessment_info' );
            // lQ(1);
            $this->db->where( 'code="'.$code.'" and link="uce_part2"' );
            $part2Data =  $this->db->get('user_assessment_info')->row_array();
            // lQ( 1 );
            $newDateTime = date( 'Y-m-d H:i:s' , strtotime( "+".$part2Data['remain_time']." minutes", strtotime($dateTime) ));
            if( affected() > 0 ){
                echo json_encode( [ 'status' => 'success' , 'data' => [ 'dateTime' => $dateTime , 'newDateTime' => $newDateTime ] ] );
            }
            else{
                echo json_encode( [ 'status' => 'failed' ] );            
            }
        }
        
        public function uce_part2($code)
        {
            $initial_time = microtime(true);
            $code = base64_decode($code);
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
            $data['allowed_services'] = $this->Base_model->getUserDetailsByIds($user['user_id']);
            $data['variation'] = $this->variation;
            $data['partName'] = 'uce_part2';
            $data['nextPartName'] = 'uce_part2_2';
            $email = $user['email'];
            $where = "user_id='$email' and code='$code' and link='uce_part2'";
            $this->db->where( $where );
            $part2Data =  $this->db->get('user_assessment_info')->row_array();
            if( !empty( $part2Data ) ){
                if( $part2Data['remain_time'] == null ){

                    if( isset($_SESSION['timer']) ){
                        unset( $_SESSION['timer'] );
                    }

                }
                if( $part2Data['start_time'] == '' ){
                    $dateTime = date('Y-m-d H:i:s');
                    $this->db->where( $where );
                    $this->db->set( 'start_time' , $dateTime );
                    $this->db->set( 'remain_time' , $this->part2_timer['uce_part2'] );
                    $this->db->update( 'user_assessment_info' );
                    $this->db->where( $where );
                    $part2Data =  $this->db->get('user_assessment_info')->row_array();
                }
                else{
                    $dateTime = $part2Data['start_time'];
                }
            }
            $qlist['stamp'] = $dateTime;
            $qlist['code'] = $code;
            $qlist['newDateTime'] = date( 'Y-m-d H:i:s' , strtotime( "+".$part2Data['remain_time']." minutes", strtotime($dateTime) ));
            // pre( $qlist );
            // die;
            $where = "email='$email' and code='$code' and solution='uce_part2'";
            $this->db->where($where);
            $qno = $this->db->get('ppe_part1_test_details')->num_rows();
            // print_r( $qno );
            // die;
            //time check #start 22-1-22
               
           /*  $final_time = microtime(true);
            $duration = $final_time-$initial_time;
                $hours = (int)($duration/60/60);
                $minutes = (int)($duration/60)-$hours*60;
                echo "<h1>duration:$duration , Hours : $hours, Mit : $minutes</h1>";
                //$seconds = (int)$duration-$hours*60*60-$minutes*60;
                $this->uce_part_2_time += $minutes;
                echo "<script>alert('time lap $this->uce_part_2_time')</script>";
            if ($this->uce_part_2_time >1){
                $this->uce_part_2_time = 0;
                redirect(base_url().'assessment_variations/uce_part2_2/'.base64_encode($code));

            } */
          //   die("work");
            //time check #end 22-1-22
            if($qno==0)
            {
                $num = '1';
            }
            else if($qno>=18)
            {
                redirect(base_url().'assessment_variations/uce_part2_2/'.base64_encode($code));
            }
            else
            {
                $this->db->where($where);
                $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                foreach($qno->result() as $qno)
                {
                    $qno = $qno->qno;
                    $num = $qno + 1;
                }
            }
            $qlist['q'] = $this->Base_model->uce_part2($num);
            $this->load->view('navbar3',$data);
            $this->load->view('user/sidebar',$data); 
            $this->load->view('user/uce_part2',$qlist); 
            $this->load->view('footer'); 
            if(isset($_POST['saveBtn']))
            {

                if($num!=16)
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fifth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        $where3 = "code='$code' and link='uce_part2'";
                        // $this->db->where($where3);
                        // $this->db->set('remain_time', $_POST['remain_time'] );
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part2/'.base64_encode($code));
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2/'.base64_encode($code));   
                    }
                    

                }
                else
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','First Question','required');
                    $this->form_validation->set_rules('radio3','First Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        // $where3 = "code='$code' and link='uce_part2'";
                        // $this->db->where($where3);
                        // $this->db->set('remain_time',$_POST['remain_time']);
                        // $this->db->update('user_assessment_info');
                        //that code used after fourth asssessment 
                        // $this->Base_model->update_code_status($code);
                        // $where = "user_id='$email' and code='$code' and part='Part 1'";
                        // $this->db->where($where);
                        // $this->db->set('status','Rp');
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part2_2/'.base64_encode($code));   
                        // $this->session->set_flashdata('msg','Test Compeleted Please Take Next Assessment');
                        // redirect(base_url().'BaseController/view_code');     
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2/'.base64_encode($code));   
                    }
                    
                   
                }
                
              
            } //saveBtn #end.
 
        }
        public function uce_part2_2($code)
        {
            if( isset( $_SESSION['workingOn']['uce_part2_2'] ) ){
                $visited = true;
            }
            else{
                $visited = false;
            }
            $code = base64_decode($code);
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
            $data['allowed_services'] = $this->Base_model->getUserDetailsByIds($user['user_id']);
            $data['variation'] = $this->variation;
            $data['partName'] = 'uce_part2_2';
            $data['nextPartName'] = 'uce_part2_3';
            $email = $user['email'];
            $where = "user_id='$email' and code='$code' and link='uce_part2'";
            $this->db->where( $where );
            $part2Data =  $this->db->get('user_assessment_info')->row_array();
            if( !empty( $part2Data ) ){
                if( $part2Data['remain_time'] == null ){

                    if( isset($_SESSION['timer']) ){
                        unset( $_SESSION['timer'] );
                    }

                }
                if( $visited == false ){
                    $dateTime = date('Y-m-d H:i:s');
                    $this->db->where( $where );
                    $this->db->set( 'start_time' , $dateTime );
                    $this->db->set( 'remain_time' , $this->part2_timer['uce_part2_2'] );
                    $this->db->update( 'user_assessment_info' );
                    $this->db->where( $where );
                    $part2Data =  $this->db->get('user_assessment_info')->row_array();
                    $_SESSION['workingOn']['uce_part2_2'] = true;
                }
                else{
                    $dateTime = $part2Data['start_time'];
                }
            }
            
            $qlist['stamp'] = $dateTime;
            $qlist['newDateTime'] = date( 'Y-m-d H:i:s' , strtotime( "+".$part2Data['remain_time']." minutes", strtotime($dateTime) ));
            // pre( $qlist );
            // pre( $part2Data ,  1 );
            $where = "email='$email' and code='$code' and solution='uce_part2_2'";
            $this->db->where($where);
            $qno = $this->db->get('ppe_part1_test_details')->num_rows();
            // echo "<pre>";
            // print_r( $qno );
            // die;
            if($qno == 0){
                $num = '1';
            }
            else if($qno>=19)
            {
                redirect(base_url().'assessment_variations/uce_part2_3/'.base64_encode($code));
            }
            else
            {
                $this->db->where($where);
                $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                foreach($qno->result() as $qno)
                {
                    $qno = $qno->qno;
                    $num = $qno + 1;
                }
            }
            $qlist['q'] = $this->Base_model->uce_part2_2($num);
            // echo $this->db->last_query();
            // echo "<pre>";
            // print_r( $qlist['q']->result_array() );
            // die;
            $this->load->view('navbar3',$data);
            $this->load->view('user/sidebar',$data); 
            $this->load->view('user/uce_part2_2',$qlist); 
            $this->load->view('footer'); 
            if(isset($_POST['saveBtn']))
            {
                if($num!=16)
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fifth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2_2',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        // $where3 = "code='$code' and link='uce_part2'";
                        // $this->db->where($where3);
                        // $this->db->set('remain_time',$_POST['remain_time']);
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part2_2/'.base64_encode($code));
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2_2/'.base64_encode($code));   
                    }
                    

                }
                else
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2_2',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );

                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        // $where3 = "code='$code' and link='uce_part2'";
                        // $this->db->where($where3);
                        // $this->db->set('remain_time',$_POST['remain_time']);
                        // $this->db->update('user_assessment_info');
                        //that code used after fourth asssessment 
                        // $this->Base_model->update_code_status($code);
                        // $where = "user_id='$email' and code='$code' and part='Part 1'";
                        // $this->db->where($where);
                        // $this->db->set('status','Rp');
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part2_3/'.base64_encode($code));   
                        // $this->session->set_flashdata('msg','Test Compeleted Please Take Next Assessment');
                        // redirect(base_url().'BaseController/view_code');     
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2_2/'.base64_encode($code));   
                    }
                    
                   
                }
                
            }
        }

        public function uce_part2_3($code)
        {
            if( isset( $_SESSION['workingOn']['uce_part2_3'] ) ){
                $visited = true;
            }
            else{
                $visited = false;
            }
            $code = base64_decode($code);
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['allowed_services'] = $this->Base_model->getUserDetailsByIds($user['user_id']);
            $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
            $data['variation'] = $this->variation;
            $data['partName'] = 'uce_part2_3';
            $data['nextPartName'] = 'uce_part2_4';
            $email = $user['email'];
            $where = "user_id='$email' and code='$code' and link='uce_part2'";
            $this->db->where( $where );
            $dateTime = date('Y-m-d H:i:s');
            $part2Data =  $this->db->get('user_assessment_info')->row_array();
            if( !empty( $part2Data ) ){
                if( $part2Data['remain_time'] == null ){

                    if( isset($_SESSION['timer']) ){
                        unset( $_SESSION['timer'] );
                    }

                }
                if( $visited == false ){
                    $this->db->where( $where );
                    $this->db->set( 'start_time' , $dateTime );
                    $this->db->set( 'remain_time' , $this->part2_timer['uce_part2_3'] );
                    $this->db->update( 'user_assessment_info' );
                    $this->db->where( $where );
                    $part2Data =  $this->db->get('user_assessment_info')->row_array();
                    $_SESSION['workingOn']['uce_part2_3'] = true;
                }
                else{
                    $dateTime = $part2Data['start_time'];
                }
            }// print_r( $qlist );
            // die;
            $qlist['stamp'] = $dateTime;
            $qlist['newDateTime'] = date( 'Y-m-d H:i:s' , strtotime( "+".$part2Data['remain_time']." minutes", strtotime($dateTime) ));
            $where = "email='$email' and code='$code' and solution='uce_part2_3'";
            $this->db->where($where);
            $qno = $this->db->get('ppe_part1_test_details')->num_rows();
            if($qno==0)
            {
                $num = '1';
            }
            else if($qno>=20)
            {
                redirect(base_url().'assessment_variations/uce_part2_4/'.base64_encode($code));
            }
            else
            {
                $this->db->where($where);
                $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                foreach($qno->result() as $qno)
                {
                    $qno = $qno->qno;
                    $num = $qno + 1;
                }
            }
            $qlist['q'] = $this->Base_model->uce_part2_3($num);
            
            $this->load->view('navbar3',$data);
            $this->load->view('user/sidebar',$data); 
            $this->load->view('user/uce_part2_3',$qlist); 
            $this->load->view('footer'); 
            if(isset($_POST['saveBtn']))
            {
                if($num!=16)
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fifth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2_3',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        // $where3 = "code='$code' and link='uce_part2'";
                        // $this->db->where($where3);
                        // $this->db->set('remain_time',$_POST['remain_time']);
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part2_3/'.base64_encode($code));
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2_3/'.base64_encode($code));   
                    }
                    

                }
                else
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','First Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fifth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2_3',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        // $where3 = "code='$code' and link='uce_part2'";
                        // $this->db->where($where3);
                        // $this->db->set('remain_time',$_POST['remain_time']);
                        // $this->db->update('user_assessment_info');
                        //that code used after fourth asssessment 
                        // $this->Base_model->update_code_status($code);
                        // $where = "user_id='$email' and code='$code' and part='Part 1'";
                        // $this->db->where($where);
                        // $this->db->set('status','Rp');
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part2_4/'.base64_encode($code));   
                        // $this->session->set_flashdata('msg','Test Compeleted Please Take Next Assessment');
                        // redirect(base_url().'BaseController/view_code');     
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2_3/'.base64_encode($code));   
                    }
                   
                }
                
            }
        }
        public function uce_part2_4( $code )
        {
            if( isset( $_SESSION['workingOn']['uce_part2_4'] ) ){
                $visited = true;
            }
            else{
                $visited = false;
            }
            $code = base64_decode($code);
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
            $data['allowed_services'] = $this->Base_model->getUserDetailsByIds($user['user_id']);
            $email = $user['email'];
            $data['variation'] = $this->variation;
            $data['partName'] = 'uce_part2_4';
            $data['nextPartName'] = 'uce_part2_5';
            $email = $user['email'];
            $where = "user_id='$email' and code='$code' and link='uce_part2'";
            $this->db->where( $where );
            $part2Data =  $this->db->get('user_assessment_info')->row_array();
            if( !empty( $part2Data ) ){
                if( $part2Data['remain_time'] == null ){

                    if( isset($_SESSION['timer']) ){
                        unset( $_SESSION['timer'] );
                    }

                }
                if( $visited == false ){
                    $dateTime = date('Y-m-d H:i:s');
                    $this->db->where( $where );
                    $this->db->set( 'start_time' , $dateTime );
                    $this->db->set( 'remain_time' , $this->part2_timer['uce_part2_4'] );
                    $this->db->update( 'user_assessment_info' );
                    $this->db->where( $where );
                    $part2Data =  $this->db->get('user_assessment_info')->row_array();
                    $_SESSION['workingOn']['uce_part2_4'] = true;
                }
                else{
                    $dateTime = $part2Data['start_time'];
                }
            }
            // print_r( $qlist );
            // die;
            $qlist['stamp'] = $dateTime;
            $qlist['newDateTime'] = date( 'Y-m-d H:i:s' , strtotime( "+".$part2Data['remain_time']." minutes", strtotime($dateTime) ));
            $where = "email='$email' and code='$code' and solution='uce_part2_4'";
            $this->db->where($where);
            $qno = $this->db->get('ppe_part1_test_details')->num_rows();
            if($qno==0)
            {
                $num = '1';
            }
            else if($qno>=40)
            {
                redirect(base_url().'assessment_variations/uce_part2_5/'.base64_encode($code));
            }
            else
            {
                $this->db->where($where);
                $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                foreach($qno->result() as $qno)
                {
                    $qno = $qno->qno;
                    $num = $qno + 1;
                }
            }
            $qlist['q'] = $this->Base_model->uce_part2_4($num);
            
            $this->load->view('navbar3',$data);
            $this->load->view('user/sidebar',$data); 
            $this->load->view('user/uce_part2_4',$qlist); 
            $this->load->view('footer'); 
            if(isset($_POST['saveBtn']))
            {
                if($num!=36)
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fifth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2_4',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        // $where3 = "code='$code' and link='uce_part2'";
                        // $this->db->where($where3);
                        // $this->db->set('remain_time',$_POST['remain_time']);
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part2_4/'.base64_encode($code));
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2_4/'.base64_encode($code));   
                    }
                    

                }
                else
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','First Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fourth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2_4',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        // $where3 = "code='$code' and link='uce_part2'";
                        // $this->db->where($where3);
                        // $this->db->set('remain_time',$_POST['remain_time']);
                        // $this->db->update('user_assessment_info');
                        //that code used after fourth asssessment 
                        // $this->Base_model->update_code_status($code);
                        // $where = "user_id='$email' and code='$code' and part='Part 1'";
                        // $this->db->where($where);
                        // $this->db->set('status','Rp');
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part2_5/'.base64_encode($code));   
                        // $this->session->set_flashdata('msg','Test Compeleted Please Take Next Assessment');
                        // redirect(base_url().'BaseController/view_code');     
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2_4/'.base64_encode($code));   
                    }
                   
                }
                
            }
        }
        public function uce_part2_5($code)
        {
            if( isset( $_SESSION['workingOn']['uce_part2_5'] ) ){
                $visited = true;
            }
            else{
                $visited = false;
            }
            $code = base64_decode($code);
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
            $data['allowed_services'] = $this->Base_model->getUserDetailsByIds($user['user_id']);
            $data['variation'] = $this->variation;
            $data['partName'] = 'uce_part2_5';
            $data['nextPartName'] = 'uce_part2_6';
            $email = $user['email'];
            $where = "user_id='$email' and code='$code' and link='uce_part2'";
            $this->db->where( $where );
            $part2Data =  $this->db->get('user_assessment_info')->row_array();
            if( !empty( $part2Data ) ){
                if( $part2Data['remain_time'] == null ){

                    if( isset($_SESSION['timer']) ){
                        unset( $_SESSION['timer'] );
                    }

                }
                if( $visited == false ){
                    $dateTime = date('Y-m-d H:i:s');
                    $this->db->where( $where );
                    $this->db->set( 'start_time' , $dateTime );
                    $this->db->set( 'remain_time' , $this->part2_timer['uce_part2_5'] );
                    $this->db->update( 'user_assessment_info' );
                    $this->db->where( $where );
                    $part2Data =  $this->db->get('user_assessment_info')->row_array();
                    $_SESSION['workingOn']['uce_part2_5'] = true;
                }
                else{
                    $dateTime = $part2Data['start_time'];
                }
            }
            $qlist['stamp'] = $dateTime;
            $qlist['newDateTime'] = date( 'Y-m-d H:i:s' , strtotime( "+".$part2Data['remain_time']." minutes", strtotime($dateTime) ));
            $where = "email='$email' and code='$code' and solution='uce_part2_5'";
            $this->db->where($where);
            $qno = $this->db->get('ppe_part1_test_details')->num_rows();
            if($qno==0)
            {
                $num = '1';
            }
            else if($qno>=90)
            {
                redirect(base_url().'assessment_variations/uce_part2_6/'.base64_encode($code));
            }
            else
            {
                $this->db->where($where);
                $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                foreach($qno->result() as $qno)
                {
                    $qno = $qno->qno;
                    $num = $qno + 1;
                }
            }
            $qlist['q'] = $this->Base_model->uce_part2_5($num);
            
            $this->load->view('navbar3',$data);
            $this->load->view('user/sidebar',$data); 
            $this->load->view('user/uce_part2_5',$qlist); 
            $this->load->view('footer'); 
            if(isset($_POST['saveBtn']))
            {
                if($num!=96)
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fifth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2_5',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        // $where3 = "code='$code' and link='uce_part2'";
                        // $this->db->where($where3);
                        // $this->db->set('remain_time',$_POST['remain_time']);
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part2_5/'.base64_encode($code));
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2_5/'.base64_encode($code));   
                    }
                    

                }
                else
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','First Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                   
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2_5',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        // $where3 = "code='$code' and link='uce_part2'";
                        // $this->db->where($where3);
                        // $this->db->set('remain_time',$_POST['remain_time']);
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part2_6/'.base64_encode($code));   
   
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2_5/'.base64_encode($code));   
                    }
                   
                }
                
            }
        }
        public function uce_part2_6($code)
        {
            if( isset( $_SESSION['workingOn']['uce_part2_6'] ) ){
                $visited = true;
            }
            else{
                $visited = false;
            }
            $code = base64_decode($code);
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
            $data['allowed_services'] = $this->Base_model->getUserDetailsByIds($user['user_id']);
            $data['variation'] = $this->variation;
            $data['partName'] = 'uce_part2_6';
            // $data['nextAssessment'] = '';
            $email = $user['email'];
            $where = "user_id='$email' and code='$code' and link='uce_part2'";
            $this->db->where( $where );
            $part2Data =  $this->db->get('user_assessment_info')->row_array();
            if( !empty( $part2Data ) ){
                if( $part2Data['remain_time'] == null ){

                    if( isset($_SESSION['timer']) ){
                        unset( $_SESSION['timer'] );
                    }

                }
                if( $visited == false ){
                    $dateTime = date('Y-m-d H:i:s');
                    $this->db->where( $where );
                    $this->db->set( 'start_time' , $dateTime );
                    $this->db->set( 'remain_time' , $this->part2_timer['uce_part2_6'] );
                    $this->db->update( 'user_assessment_info' );
                    $this->db->where( $where );
                    $part2Data =  $this->db->get('user_assessment_info')->row_array();
                    $_SESSION['workingOn']['uce_part2_6'] = true;
                }
                else{
                    $dateTime = $part2Data['start_time'];
                }
            }
            $qlist['stamp'] = $part2Data['start_time'];
            $qlist['newDateTime'] = date( 'Y-m-d H:i:s' , strtotime( "+".$part2Data['remain_time']." minutes", strtotime($part2Data['start_time']) ));
            $where = "email='$email' and code='$code' and solution='uce_part2_6'";
            $this->db->where($where);
            $qno = $this->db->get('ppe_part1_test_details')->num_rows();
            if($qno==0)
            {
                $num = '1';
            }
            // else if($qno>=42)
            // {
            //     redirect(base_url().'assessment_variations/uce_part2_7/'.base64_encode($code));
            // }
            else
            {
                $this->db->where($where);
                $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                foreach($qno->result() as $qno)
                {
                    $qno = $qno->qno;
                    $num = $qno + 1;
                }
            }
            $qlist['q'] = $this->Base_model->uce_part2_6($num);
            
            $this->load->view('navbar3',$data);
            $this->load->view('user/sidebar',$data); 
            $this->load->view('user/uce_part2_6',$qlist); 
            $this->load->view('footer'); 
            if(isset($_POST['saveBtn']))
            {
                if($num!=41)
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fifth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2_6',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        // $where3 = "code='$code' and link='uce_part2'";
                        // $this->db->where($where3);
                        // $this->db->set('remain_time',$_POST['remain_time']);
                        // $this->db->update('user_assessment_info');
                        redirect(base_url().'assessment_variations/uce_part2_6/'.base64_encode($code));
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2_6/'.base64_encode($code));   
                    }
                    

                }
                else
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','First Question','required');
                   
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2_6',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        // $where3 = "code='$code' and link='uce_part2'";
                        // $this->db->where($where3);
                        // $this->db->set('remain_time',$_POST['remain_time']);
                        // $this->db->update('user_assessment_info');
                        // //that code used after fourth asssessment 
                        // // $this->Base_model->update_code_status($code);
                        // $where = "user_id='$email' and code='$code' and part='Part 2'";
                        // $this->db->where($where);
                        // $this->db->set('status','Rp');
                        // $this->db->update('user_assessment_info');
                        // $dt = date("d-m-Y h:m"); 
                        // $where2 = "user_id='$email' and code='$code'";
                        // $this->db->where($where2);
                        // $this->db->set('asignment_submission_date',$dt);
                        // $this->db->set('status','Rp');
                        // $this->db->update('user_code_list');

                        // $soc_code = $this->db->get('career_data');
                        // foreach($soc_code->result() as $soc)
                        // {
                        //     $cd = $soc->profession_id;
                            
                        //     $formArray3 = Array(
                        //         'soc_code'=>$cd,
                        //         'code'=>$code
                        //     );
                        //     $this->db->insert('career_all_user_record',$formArray3);
                            
                        // }
                        $where = "user_id='$email' and code='$code' and part='Part 2'";
                        $this->db->where($where);
                        $this->db->set('status','Rp');
                        $this->db->update('user_assessment_info');
                        $this->session->set_flashdata('msg','Test Compeleted Please Take Next Assessment');
                        redirect(base_url().'BaseController/view_code');     
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2_6/'.base64_encode($code));   
                    }
                   
                }
                
            }
        }
        public function uce_part2_7($code)
        {
            $code = base64_decode($code);
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $data['reseller_sp'] = $this->Commen_model->get_reseller_sp($data['user']['user_id']);
            $data['allowed_services'] = $this->Base_model->getUserDetailsByIds($user['user_id']);
            $email = $user['email'];
            $where = "email='$email' and code='$code' and solution='uce_part2_7'";
            $this->db->where($where);
            $qno = $this->db->get('ppe_part1_test_details')->num_rows();
            if($qno==0)
            {
                $num = '1';
            }
            else
            {
                $this->db->where($where);
                $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                foreach($qno->result() as $qno)
                {
                    $qno = $qno->qno;
                    $num = $qno + 1;
                }
            }
            $qlist['q'] = $this->Base_model->uce_part2_7($num);
            
            $this->load->view('navbar3',$data);
            $this->load->view('user/sidebar',$data); 
            $this->load->view('user/uce_part2_7',$qlist); 
            $this->load->view('footer'); 
            if(isset($_POST['saveBtn']))
            {
                if($num!=31)
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','Second Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fifth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2_7',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        redirect(base_url().'assessment_variations/uce_part2_7/'.base64_encode($code));
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2_7/'.base64_encode($code));   
                    }
                }
                else
                {
                    $this->form_validation->set_rules('radio1','First Question','required');
                    $this->form_validation->set_rules('radio2','First Question','required');
                    $this->form_validation->set_rules('radio3','Third Question','required');
                    $this->form_validation->set_rules('radio4','Fourth Question','required');
                    $this->form_validation->set_rules('radio5','Fourth Question','required');
                    if($this->form_validation->run()==true)
                    {
                        $i=1;
                        foreach($qlist['q']->result() as $q)
                        {   
                            
                                $ans = 'radio'.$i;
                                $formArray = Array(
                                    'email'=>$email,
                                    'qno'=>$q->qno,
                                    'solution'=>'uce_part2_7',
                                    'code'=>$code,
                                    'ans'=>$_POST[$ans]
                                );
                                $this->db->insert('ppe_part1_test_details',$formArray);
                            $i++;
                            
                        }
                        //that code used after fourth asssessment 
                        // $this->Base_model->update_code_status($code);
                        $where = "user_id='$email' and code='$code' and part='Part 3'";
                        $this->db->where($where);
                        $this->db->set('status','Rp');
                        $this->db->update('user_assessment_info');
                        date_default_timezone_set("Asia/Kolkata");
                        $dt = date("d-m-Y H:i");
                        $dt = $dt.' (GMT + 5:30)';
                        $where2 = "user_id='$email' and code='$code'";
                        $this->db->where($where2);
                        $this->db->set('status','Rp');
                        $this->db->set('asignment_submission_date',$dt);
                        $this->db->update('user_code_list');

                        $soc_code = $this->db->get('career_sui_temp_latest');
                        foreach($soc_code->result() as $soc)
                        {
                            $formArray3 = Array(
                                'Cluster'=>$soc->Cluster,
                                'Path'=>$soc->Path,
                                'G_1'=>$soc->G_1,
                                'G_2'=>$soc->G_2,
                                'profession_name'=>$soc->profession_name,
                                'code'=>$code
                            );
                            $this->db->insert('career_sui_latest',$formArray3);
                            
                        }
                        // redirect(base_url().'assessment_variations/uce_part2_6/'.base64_encode($code));   
                        $this->session->set_flashdata('msg','Test Compeleted Please Wait For Report Development');
                        // $reportData = $this->Admin_model->getReportConfig();
                        // $requestData = [
                        //     'user_id' => $user['user_id'],
                        //     'code' => $code,
                        //     'status' => 0,
                        //     'expiry_date' => date( 'Y-m-d' , strtotime( '+'.$reportData['report_duration'].' days' , strtotime(date('Y-m-d'))))
                        // ];
                        // $id = $this->User_model->insert_request($requestData);
                        redirect(base_url().'BaseController/view_code');     
                    }
                    else
                    {
                        $this->session->set_flashdata('msg',validation_errors());
                        redirect(base_url().'assessment_variations/uce_part2_7/'.base64_encode($code));   
                    }
                   
                }
                
            }
        }
        
        public function finish_time()
        {
            $this->load->model('User_model');
            $this->load->model('Base_model');
            if($this->User_model->authorized()==false)
            {
                $this->session->set_flashdata('msg','You are not authorized to access this section');
                redirect(base_url().'/UserController/login');
            }
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $email = $user['email'];
            $partArray = [ 
                'uce_part2' , 
                'uce_part2_2', 
                'uce_part2_3', 
                'uce_part2_4', 
                'uce_part2_5', 
                'uce_part2_6' 
            ];
            $code = $this->input->post('code');
            $part = $this->input->post('part');
            if( isset( $_SESSION['workingOn'][$part] ) ){
                unset($_SESSION['workingOn'][$part]);
            }
            $onIndex  = array_search($part, $partArray);
            $where = "email='$email' and code='$code' and solution='".$part."'";
            $this->db->where($where);
            $qno = $this->db->get('ppe_part1_test_details')->num_rows();
            // print_r( $qno );
            // die;
            // foreach( $partArray as $key => $partName  ){
            // if( $key >= $onIndex ){
                if( $onIndex == 0 ){
                    if($qno==0)
                    {
                        $num = '1';
                    }
                    else{
                        $this->db->where($where);
                        $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details');
                        foreach($qno->result() as $qno)
                        {
                            $qno = $qno->qno;
                            $num = $qno + 1;
                        }
                    }
                    $qlist['q'] = $this->Base_model->uce_part2_all($num);
                    if( $qlist['q']->num_rows() > 0){
                        foreach($qlist['q']->result() as $q)
                        {
                            $formArray = Array(
                                'email'=>$email,
                                'qno'=>$q->qno,
                                'solution'=>'uce_part2',
                                'code'=>$code,
                                'ans'=> 0
                            );
                            $this->db->insert('ppe_part1_test_details',$formArray);
                        }
                    }
                }
                elseif( $onIndex == 1 ){
                    if($qno == 0){
                        $num = '1';
                    }
                    else{
                        $this->db->where($where);
                        $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                        foreach($qno->result() as $qno)
                        {
                            $qno = $qno->qno;
                            $num = $qno + 1;
                        }
                    }
                    $qlist['q'] = $this->Base_model->uce_part2_2_all($num);
                    if( $qlist['q']->num_rows() > 0){
                        foreach($qlist['q']->result() as $q)
                        {
                            $formArray = Array(
                                'email'=>$email,
                                'qno'=>$q->qno,
                                'solution'=>'uce_part2_2',
                                'code'=>$code,
                                'ans'=> 0
                            );
                            $this->db->insert('ppe_part1_test_details',$formArray);
                        }
                    }
                }
                elseif( $onIndex == 2 ){
                    if($qno == 0){
                        $num = '1';
                    }
                    else
                    {
                        $this->db->where($where);
                        $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                        foreach($qno->result() as $qno)
                        {
                            $qno = $qno->qno;
                            $num = $qno + 1;
                        }
                    }
                    $qlist['q'] = $this->Base_model->uce_part2_3_all($num);
                    if( $qlist['q']->num_rows() > 0){
                        foreach($qlist['q']->result() as $q)
                        {
                            $formArray = Array(
                                'email'=>$email,
                                'qno'=>$q->qno,
                                'solution'=>'uce_part2_3',
                                'code'=>$code,
                                'ans'=> 0
                            );
                            $this->db->insert('ppe_part1_test_details',$formArray);
                        }
                    }
                    
                }
                elseif( $onIndex == 3 ){
                    if($qno == 0){
                        $num = '1';
                    }
                    else
                    {
                        $this->db->where($where);
                        $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                        foreach($qno->result() as $qno)
                        {
                            $qno = $qno->qno;
                            $num = $qno + 1;
                        }
                    }
                    $qlist['q'] = $this->Base_model->uce_part2_4_all($num);
                    if( $qlist['q']->num_rows() > 0){
                        foreach($qlist['q']->result() as $q)
                        {
                            $formArray = Array(
                                'email'=>$email,
                                'qno'=>$q->qno,
                                'solution'=>'uce_part2_4',
                                'code'=>$code,
                                'ans'=> 0
                            );
                            $this->db->insert('ppe_part1_test_details',$formArray);
                        }
                    }
                }
                elseif( $onIndex == 4 ){
                    if($qno == 0){
                        $num = '1';
                    }
                    else
                    {
                        $this->db->where($where);
                        $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                        foreach($qno->result() as $qno)
                        {
                            $qno = $qno->qno;
                            $num = $qno + 1;
                        }
                    }
                    $qlist['q'] = $this->Base_model->uce_part2_5_all($num);
                    if( $qlist['q']->num_rows() > 0){
                        foreach($qlist['q']->result() as $q)
                        {
                            $formArray = Array(
                                'email'=>$email,
                                'qno'=>$q->qno,
                                'solution'=>'uce_part2_5',
                                'code'=>$code,
                                'ans'=> 0
                            );
                            $this->db->insert('ppe_part1_test_details',$formArray);
                        }
                    }
                }
                elseif( $onIndex == 5 ){
                    if($qno == 0){
                        $num = '1';
                    }
                    else
                    {
                        $this->db->where($where);
                        $qno = $this->db->limit(1)->order_by('id','desc')->get('ppe_part1_test_details'); 
                        foreach($qno->result() as $qno)
                        {
                            $qno = $qno->qno;
                            $num = $qno + 1;
                        }
                    }
                    $qlist['q'] = $this->Base_model->uce_part2_6_all($num);
                    if( $qlist['q']->num_rows() > 0){
                        foreach($qlist['q']->result() as $q)
                        {
                            $formArray = Array(
                                'email'=>$email,
                                'qno'=>$q->qno,
                                'solution'=>'uce_part2_6',
                                'code'=>$code,
                                'ans'=> 0
                            );
                            $this->db->insert('ppe_part1_test_details',$formArray);
                        }
                    }
                }
            // }
            // redirect( base_url().'assessment_variations/'.$partArray[$onIndex+1]."/".base64_encode($code) );
            // }
            if( $part == 'uce_part2_6' ){
                $where2 = "user_id='$email' and code='$code' and link='uce_part2'";
                $this->db->where( $where2 );
                $this->db->set( 'status' , 'Rp' );
                $this->db->update( 'user_assessment_info' );
            }
            echo json_encode(['status' => 'success' , 'msg' => 'assessment time up']);
        }
    }
?>