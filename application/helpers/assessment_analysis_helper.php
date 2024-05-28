
<?php
ob_start();
 if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

if ( ! function_exists('helper_interest'))
{
    function helper_interest($solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group,$code,$solution_db){


        echo "Into Helper - Interest <br>";
        echo "<pre>";
        print_r([$solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group,$code,$solution_db]);
        echo "</pre>";


        $CI =& get_instance();

        $CI->load->database();

        $result =  $CI->Commen_model->get_distinct_cat($solution_table);


        echo "<pre>";
        echo "Categories";
        print_r($result);
        echo "</pre>";
       

        //Uce part1_2 - Interests
             $p1_2_para = array();

            foreach($result as $row){array_push($p1_2_para,$row->category);}

            print_r($p1_2_para);

            $p1_2_count = count($p1_2_para);
            for($i=0;$i<$p1_2_count;$i++)
            {
                $p1_2_score[$i]=0;
                $p1_2_q_qty[$i]=0;
                $p1_2_per[$i]=0;

            }
            for($i=0;$i<$p1_2_count;$i++)
            {
                
                $p1_2_cat = $p1_2_para[$i];

                $res =  $CI->Commen_model->get_interest_data($solution_table, $p1_2_cat);

                echo "<pre>";
                echo "Category - ".$p1_2_cat." - Score - <br>";
                print_r($res);
                echo "</pre>";
                

                foreach($res as $v){
                    $qno = $v->qno;

                    $q_data =  $CI->Commen_model->get_question_data($code, $solution_db, $qno);       
                    
            //         echo "<pre>";
            // print_r($q_data);die();

                    $ans = $q_data[0]->ans;
                    if($ans=='1'){$temp_ans = 0;}
                    else if($ans=='2'){$temp_ans = 1;}
                    else if($ans=='3'){$temp_ans = 3;}
                    else if($ans=='4'){$temp_ans = 4;}


                    $p1_2_score[$i] = $p1_2_score[$i] + $temp_ans;
                    $p1_2_q_qty[$i] = $p1_2_q_qty[$i] + 1; 
                }
            }

            for($i=0;$i<$p1_2_count;$i++)
            {
               $p1_2_q_qty[$i] = $p1_2_q_qty[$i] * 4; 
               $p1_2_per[$i] = round($p1_2_score[$i]*100 / $p1_2_q_qty[$i],0);
            }
            
            // echo "<pre>";
            // print_r($p1_2_per);die();

            //data max

            $num =  $CI->Commen_model->get_total_rows($code, $solution_table);

            if($num==0)
            {
                for($i=0;$i<$p1_2_count;$i++)
                {
                    $sc = $p1_2_per[$i];   
                    $cat = $p1_2_para[$i]; 

                    $data=[
                        'solution'=>$solution,
                        'code'    =>$code,
                        'category'=>$cat,
                        'per'     =>$sc
                    ];

                    $res =  $CI->Commen_model->insert_data($data);
                    //echo "res".$res;die();

                    //$res=$CI->db->insert('top_value_db', $data);
                }
            }

            $pos = 204;
            $s = array();
            $cat_name=array();

             $cat_name= [
                            'R'=>'Realistic',
                            'I'=>'Investigative',
                            'A'=>'Artistic',
                            'S'=>'Social',
                            'E'=>'Enterprising',
                            'C'=>'Conventional'
                        ];

            $res_data =  $CI->Commen_model->get_data_by_code($code);

            foreach($res_data as $v1){
                echo "<pre>";
                print_r($v1->category);
                $x=$v1->category."(".$cat_name[$v1->category].")";
                array_push($s,$v1->category);
                echo "Top Interest :".$x."<br>";

            }

            //die();


   } 
}    

if ( ! function_exists('helper_personality'))
{
    function helper_personality($solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group,$code,$solution_db)
    {   
        echo "Into Helper - Personality1 <br>";
        echo "<pre>";
        print_r([$solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group,$code,$solution_db]);
        echo "</pre>";
        //personalty score.
            $E = 0; $I = 0; $S = 0; $N = 0; $T = 0; $F = 0; $P = 0; $J = 0;

            $CI =& get_instance();

            $CI->load->database();

            $res_data =  $CI->Commen_model->get_personality_data($solution_db ,$code);

            echo "<pre>";
            echo "get_personality_data";
            print_r($res_data);
            echo "</pre>";


        foreach($res_data as $v){

            $qn = $v->qno;
            $ans = $v->ans;
            $solution = $v->solution;

            if($solution=='ocs_part/2'){$part = 'Part1';}
            else{$part = 'Part2';}

            if($ans=='optionA'){$ans=1;}
            elseif($ans=='optionB'){$ans=2;}
            elseif($ans=='optionC'){$ans=3;}
            elseif($ans=='optionD'){$ans=4;}

            //This logic have to change as per old code after discussion
            $score_data =  $CI->Commen_model->get_scoring_data($part ,$qn, $ans );

            echo "<pre>";
            echo "get_scoring_data";
            print_r($score_data);
            echo "</pre>";

            $type =$score_data[0]->Type;
            if($type=='E'){$E=$E+$score_data[0]->Points;}
            else if($type=='I'){$I=$I+$score_data[0]->Points;}
            else if($type=='S'){$S=$S+$score_data[0]->Points;}
            else if($type=='N'){$N=$N+$score_data[0]->Points;}
            else if($type=='T'){$T=$T+$score_data[0]->Points;}
            else if($type=='F'){$F=$F+$score_data[0]->Points;}
            else if($type=='P'){$P=$P+$score_data[0]->Points;}
            else if($type=='J'){$J=$J+$score_data[0]->Points;}

        }
       

        $val_f = array();
        if($I>=$E)
        {$val1 = $I;$value1 = 'I';array_push($val_f,'I - Introversion');}
        else{$val1 = $E;$value1 = 'E';array_push($val_f,'E - Extraversion');}

        if($N>=$S){$val2 = $N;$value2 = 'N';array_push($val_f,'N - Intuiting');}
        else{$val2 = $S;$value2 = 'S';array_push($val_f,'S - Sensing');}

        if($T>=$F){$val3 = $T;$value3 = 'T';array_push($val_f,'T - Thinking');}
        else{$val3 = $F;$value3 = 'F';array_push($val_f,'F - Feeling');}
        
        if($P>=$J){$val4 = $P;$value4 = 'P';array_push($val_f,'P - Perceiving');}
        else{$val4 = $J;$value4 = 'J';array_push($val_f,'J - Judging');}
        //print_r($val_f);die();
               
        $val1 = $val1/($I + $E);
        $val2 = $val2/($N + $S); 
        $val3 = $val3/ ($T + $F);
        $val4 = $val4/($P + $J); 

        $val1_per = $val1 * 100;
        $val2_per = $val2 * 100;
        $val3_per = $val3 * 100;
        $val4_per = $val4 * 100;
           
        $infre = array();
        if($val1_per<=75){$val1_status = "Medium"; echo $val1_status."<br>";}
        else{$val1_status = "High"; echo $val1_status."<br>";}

        if($val2_per<=75){$val2_status = "Medium"; echo $val2_status."<br>";}
        else{$val2_status = "High"; echo $val2_status."<br>";}

        if($val3_per<=75){$val3_status = "Medium"; echo $val3_status."<br>";}
        else{$val3_status = "High"; echo $val3_status."<br>";}

        if($val4_per<=75){$val4_status = "Medium"; echo $val4_status."<br>";}
        else{$val4_status = "High"; echo $val4_status."<br>";}

        //die();
    } 
}
 

if(! function_exists('helper_disha_preference'))
{
    function helper_disha_preference($solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group,$code,$solution_db)
    {
        

        $answer_mapping = [
            'opt_1'=>1,
            'opt_2'=>2
        ];
        echo "Into Helper - disha_preference <br>";
        echo "<pre>";
        print_r([$solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group,$code,$solution_db]);
        echo "</pre>";
        //die();

        $CI =& get_instance();

        $CI->load->database();

 
        $arr_pref_cat = ["vocation","Location"];            
        $x_3 =  $CI->Commen_model->disha_pref_id_arr();

        echo "<pre>";
        echo "disha_pref_id_arr";
        print_r($x_3);
        echo "</pre>";

     $sub_cat = [];$cat = [];$score = [];
     foreach($x_3 as $v){$sub_cat[] = $v['sub_cat'];$cat[] = $v['cat'];$score[] = 0;}
 
    
     $count_of_num = sizeof($sub_cat);            
     $x_1 = $CI->Commen_model->disha_pref_id_count_new($code,$solution = "ce_disha_part_2",$opt_name="opt_1",$opt_value="1");

        echo "<pre>";
        echo "disha_pref_id_arr";
        print_r($x_1);
        echo "</pre>";

     $x_2 = $CI->Commen_model->disha_pref_id_count_new($code,$solution = "ce_disha_part_2",$opt_name="opt_2",$opt_value="2");

        echo "<pre>";
        echo "disha_pref_id_arr";
        print_r($x_2);
        echo "</pre>";

     foreach($x_1 as $v)
     {
         for($i = 0; $i < $count_of_num ; $i++)
         {
             if($v["pref_cat"] == $cat[$i] && $v['pref_sub_cat']==$sub_cat[$i])
             {
                 $score[$i] +=1;
                 break;
             }
         }
     }
        
     foreach($x_2 as $v)
     {
         for($i = 0; $i < $count_of_num ; $i++)
         {                        
             if($v["pref_cat"] == $cat[$i] && $v['pref_sub_cat']==$sub_cat[$i])
             {
                 $score[$i] +=1;
                 break;
             }
         }
     }
        
 
     $max_score_voc =0;
     $tot_score_loc =0;
     for($i=0;$i<$count_of_num;$i++)
     {
         if($cat[$i]==$arr_pref_cat[0]){if($score[$i]>$max_score_voc){$max_score_voc = $score[$i];}}
         if($cat[$i]==$arr_pref_cat[1]){$tot_score_loc += $score[$i];}
     }
    
     echo "<pre>";
     print_r($arr_pref_cat);
     echo "</pre>";
     for($i=0;$i<$count_of_num;$i++)
     {  
        echo $cat[$i]."<br>";
         if($cat[$i]==$arr_pref_cat[0])
         {  
             // $score[$i] = intval($score[$i]*100/$max_score_voc);
             // if($score[$i] == 100){$this->priority = $sub_cat[$i];}
         }
         
         if($cat[$i]==$arr_pref_cat[1])
         {
             // $score[$i]= intval($score[$i]*100/$tot_score_loc);
             // if($score[$i] >= 50){$this->abroad = true;}
             // else{$this->abroad = false;}
         }
     }
 
     $arr_score_perc =[];
     $arr_x_names =[] ;
     $arr_names_full=[];           
     $chr_start = 833;
 
     for($i=0;$i<$count_of_num;$i++)
     {
         array_push($arr_score_perc, $score[$i]);
         array_push($arr_x_names, chr($chr_start));
         array_push($arr_names_full,$sub_cat[$i]);
         $chr_start +=1;
     }
     
     //    $this->draw_chart($arr_score_perc, $arr_x_names,
     //     $arr_names_full,"Post College",218);
     
     // $this->pdf->output();
         //die();
    }   
}

if(! function_exists('helper_disha_capacity'))
{   
    function helper_disha_capacity($solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group,$code,$solution_db)
    {   
        $CI =& get_instance();
        $CI->load->database();

    echo "Into Helper - helper_disha_capacity <br>";
    echo "<pre>";
    print_r([$solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group,$code,$solution_db]);
    echo "</pre>";
    //die();
 
     $disha_cap_count = $CI->Commen_model->disha_cap_count($code,$solution_db);

     echo "disha_cap_count";
     echo "<pre>";
     print_r($disha_cap_count);
     echo "</pre>";

     $arr_cat = []; 
     $arr_score = [];
     $arr_cap_id = ["Study habits","Modern workplace skills","Entreprenuerial capacity"
     ,"Teaching","Immigration"];
     $arr_cap_disp = ["Research","Job","Entreprenuership","Academics","Abroad"];
     $arr_cat_score = [];
     $arr_cat_count = [];
     foreach($disha_cap_count as $v){$arr_cat[] = $v['cat']; $arr_score[] = $v['value'];}
     foreach($arr_cap_id  as $v){$arr_cat_score[$v] =0;$arr_cat_count[$v] =0;}
     echo "<pre>";
     print_r($arr_cat);
     echo "</pre>";
     for($i = 0; $i < sizeof($arr_cat) ; $i++)
     {
         foreach($arr_cap_id  as $v){
             if($arr_cat[$i] == $v){
                echo "match<br>";
                 $arr_cat_score[$v] += $arr_score[$i];
                 $arr_cat_count[$v] +=1;
                 break;
             }
 
         }
     }
     echo "<pre>";
     print_r($arr_cat_score);
     print_r($arr_cat_count);
     echo "</pre>";
  
     $arr_cat_score_v = [];

     foreach($arr_cat_score as $k => $v){$arr_cat_score_v[] = $v;}
      
      echo "score <pre>";
     print_r($arr_cat_score_v);
     echo "</pre>";
     $arr_cat_count_v = [];
     foreach($arr_cat_count as $k => $v){$arr_cat_count_v[] = $v;}

     echo "count<pre>";
     print_r($arr_cat_count_v);
     echo "</pre>";
 
     for($i = 0; $i < sizeof($arr_cat_count_v) ; $i++)
     {
        if($arr_cat_count_v[$i] !=0)
        {
            $arr_cat_score_v[$i] = intval($arr_cat_score_v[$i]*100/$arr_cat_count_v[$i]);
        }
        else
        {
            $arr_cat_score_v[$i] =0;
        }
        
    }
 
    
     $arr_score_perc =[];
     $arr_x_names =[] ;
     $arr_names_full=[];           
     $chr_start = 833;
 
     for($i=0;$i< sizeof($arr_cat_score_v) ;$i++)
     {
         if($arr_cat_score_v[$i] !=0)
         {
            array_push($arr_score_perc, $arr_cat_score_v[$i]);
            array_push($arr_x_names, chr($chr_start));
            array_push($arr_names_full,$arr_cap_disp[$i]);
            $chr_start +=1;   
         }
         
     }
     
 //    $this->draw_chart($arr_score_perc, $arr_x_names,
 //     $arr_names_full,"Strength Indicator",202);
 
     // $this->abroad
     // print_r($this->priority);
         function observations_remm()
         {
                     
             $heading = $CI->Commen_model->priority_heading_check($this->priority);
             $parameter_details = $CI->Commen_model->priority_details_check($this->priority);
             // $parameter_details = $this->CI->Commen_model->priority_details_check();
             echo $heading."--".$parameter_details."<br>";
         
         
         
             if($this->abroad)
             {
                 $heading = $CI->Commen_model->priority_heading_check("Abroad");
                 $parameter_details = $this->CI->Commen_model->priority_details_check("Abroad");
                 echo $heading."--".$parameter_details."<br>";
         
             }
         }

    //die();
      
     }
}


if(! function_exists('helper_aptitude_c'))
{

       function helper_aptitude_c($solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group,$code,$solution_db,$sol)
        {
            echo "helper_aptitude_c";
            echo "<pre>";
             print_r([$solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group,$code,$solution_db,$sol]);
        echo "</pre>";

            //die();


            $sol_tbls = ['asmt_convas_a', 'asmt_convas_b','asmt_convas_c'];
            if($sol=='ocs'){
                $sol_dbs = ['ocs_part/6', 'ocs_part/7','ocs_part/8'];
            }elseif($sol=='doccp'){
                $sol_dbs = ['doccp_part/6', 'doccp_part/7','doccp_part/8'];
            }elseif($sol=='ocsp'){
                $sol_dbs = ['doccp_part/6', 'doccp_part/7','doccp_part/8'];
            }
            elseif($sol=='doccpp'){
                $sol_dbs = ['doccp_part/6', 'doccp_part/7','doccp_part/8'];
            }
            
            $answer_mapping = ['optionA'=>1,'optionB'=>2,'optionC'=>3,'optionD'=>4,'optionE'=>5];
            $score_2_1 = $score_2_2 =$score_2_3 = $score_2_4 = $score_2_5 = $score_2_6 =0;
            $nm_1 = $nm_2=$nm_3 = $nm_4 = $nm_5=$nm_6 = 0;

 

                foreach($sol_tbls as $k=>$v)
                {
                    $CI =& get_instance();
                    $CI->load->database();

                    $res_data =  $CI->Commen_model->get_aptitude_data($sol_dbs[$k] ,$code);
                    // $CI->db->select('*');
                    // $CI->db->from('ppe_part1_test_details');
                    // $CI->db->where('solution',$sol_dbs[$k]);
                    // $CI->db->where('code',$code);
                    // $query = $CI->db->get();
                    // $res_data = $query->result();
                    echo "apt data<pre>";
                    print_r($res_data);
                    echo "</pre>";
                    //die();



                    foreach($res_data as $row){


                    $qno = $row->qno;
                    $ans = $row->ans;

                    $res_db =  $CI->Commen_model->get_aptitude_q_data($v,$qno);

                    // $CI->db->select('*');
                    // $CI->db->from($v);
                    // $CI->db->where('qno',$qno);
                    // $query = $CI->db->get();
                    // $res_db = $query->result();

                    echo "apt data<pre>";
                    print_r($res_db);
                    echo "</pre>";
                    $r_ans= $res_db[0]->r_ans;

                    $ans_mod = $ans;
                    if($v=='asmt_convas_a'){$ans_mod = $answer_mapping[$ans];}
                    



                    if($res_db[0]->grp == 'AR')
                    {
                        if($ans_mod == $r_ans){$score_2_1 +=1;}
                          $nm_1 = $nm_1 + 1;
                    }
                    elseif($res_db[0]->grp == 'SA'){
                        if($ans==$r_ans){$score_2_3 = $score_2_3 + 1;}
                        $nm_3 = $nm_3 + 1;
                    }
                    elseif($res_db[0]->grp == 'COM'){
                        if($ans==$r_ans){$score_2_4 = $score_2_4 + 1;}
                        else{$score_2_4 = $score_2_4 - 0.25;}
                        $nm_4 = $nm_4 + 1;
                    }
                    elseif($res_db[0]->grp == 'OM'){
                        if($ans==$r_ans){$score_2_6 = $score_2_6 + 1;}
                        else{$score_2_6 = $score_2_6 - 0.3333;}
                        $nm_6 = $nm_6 + 1;
                    }
                    elseif($res_db[0]->grp == 'VR'){
                        if($ans==$r_ans){$score_2_2 = $score_2_2 + 1;}
                        $nm_2 = $nm_2 + 1;
                    }
                    elseif($res_db[0]->grp == 'NC'){
                        if($ans==$r_ans){ $score_2_5 = $score_2_5 + 1;}
                        else{$score_2_5 = $score_2_5 - 1;}
                        $nm_5 = $nm_5 + 1;
                    } 
                
                    
                }
                
                $apt_value = array();
                for($i=1;$i<=6;$i++)
                {
                    if($i==1){$param = 'AR';$s_type = $score_2_1;}
                    else if($i==2){$param = 'VR';$s_type = $score_2_2;}
                    else if($i==3){$param = 'SA';$s_type = $score_2_3;}
                    else if($i==4){$param = 'COM';$s_type = $score_2_4;}
                    else if($i==5){$param = 'NC';$s_type = $score_2_5;}
                    else if($i==6){$param = 'OM';$s_type = $score_2_6;}
                
                    
                    // echo "Currently Working Here"."<br>";
                    // echo "Param :".$param."<br>";
                    // echo "Score :".$s_type."<br>";
                    $u_datails =  $CI->Commen_model->get_user_data($code);
        
                    // $CI->db->select('*');
                    // $CI->db->from('user_code_list');
                    // $CI->db->where('code',$code);
                    // $query = $CI->db->get();
                    // $u_datails = $query->result();
                    // echo "u_datails<pre>";
                    // print_r($res_db);
                    // echo "</pre>";
        
                    $class= $u_datails[0]->cls;
                    
                    //by manoj start
                    $all_classes = array("1", "2", "3", "4","5","6", "7", "8","9", "10", "11", "12");
                    
                    if (!in_array($class, $all_classes))
                      {
                          $class=12;
                      }
                    //by manoj end
                    
                    $res =  $CI->Commen_model->get_apt_score_data($class, $param, $s_type);

                    echo "get_apt_score_data<pre>";
                    print_r($res);
                    echo "</pre>";//die();
                    
                    
        
                    // $CI->db->select('*');
                    // $CI->db->from('uce_apt_calculation');
                    // $CI->db->where('class',$class);
                    // $CI->db->where('param',$param);
                    // $CI->db->where('score >',$s_type);
                    // $CI->db->limit(1);
                    // $query = $CI->db->get();
                    // $res = $query->result();

                    $high_score = $res[0]->score;
                    $high_l = $res[0]->fs;
        
                    //print_r($res);die();
            
                    if($high_l>0){$low_l = $high_l - 1;} 
                    else {$low_l = $high_l;}

                    $result =  $CI->Commen_model->get_uce_cal_data($class, $param, $low_l);

                    // $CI->db->select('*');
                    // $CI->db->from('uce_apt_calculation');
                    // $CI->db->where('class',$class);
                    // $CI->db->where('param',$param);
                    // $CI->db->where('fs >',$low_l);
                    // $CI->db->limit(1);
                    // $query = $CI->db->get();
                    // $result = $query->result();
                     echo "res<pre>";
                    print_r($result);
                    echo "</pre>";

                    $low_score = $result[0]->score;
                    
                    echo $high_score."-----".$low_score."------".$high_l."-----".$low_l;
            
                    $f_score = $high_score - $low_score; 
                    
                    $y = $s_type - $low_score;
                    echo "s_type = ".$s_type."<br>";
                    if ($s_type <=0){$per[$i] =0;$z = 0;array_push($apt_value,$z);}
                    else 
                    {
                        if ($s_type == $low_score || $s_type == $high_score)
                        {
                      
                            
                            //changes on 17 Jan 2022
                            $f_score = $high_score - $low_score;
                            echo "Score Range :".$f_score;
                            $y = $s_type - $low_score;
                            if($f_score ==0)
                            {
                                $z = $low_l;
                            }
                            else
                            {
                                
                            $delta = $y/$f_score;
        
                            $z = $delta + $low_l;
                            }
                            array_push($apt_value,$z);
                            $per[$i] = $z/7*100;
                            //End of changes on 17 Jan 2022
                            // echo "per = ".$per[$i]."<br>";
                        } 
                    
                        else 
                        {
                            $f_score = $high_score - $low_score;
                            //echo "Score Range :".$f_score;
                            $y = $s_type - $low_score;
                            if($f_score == 0)
                            {
                                $z = $low_l;
                            }
                            else
                            {
                            $delta = $y/$f_score;
        
                            $z = $delta + $low_l;
                            }
                            array_push($apt_value,$z);
                            $per[$i] = $z/7*100;
                        }
                            
                    }
                    echo "Type :".$param."<br>";
                }
        
                // $pt = value_level_mapper($per[1]);
                // $pt = value_level_mapper($per[2]);
                // $pt = value_level_mapper($per[3]);
                // $SA_Level = $pt['level'];
                // $pt = value_level_mapper($per[4])
                // ;$cols = explode(",", $pt['color']);
                // $pt = value_level_mapper($per[5]);
                // $cols = explode(",", $pt['color']);
                // $pt = value_level_mapper($per[6]);
                // $cols = explode(",", $pt['color']);
                // $per_2_7 = uce_part3_score_calculation($code,$con);
                // $pt = value_level_mapper($per_2_7[0]);
                // $cols = explode(",", $pt['color']);
                // $pt = value_level_mapper($per_2_7[1]);
                // $cols = explode(",", $pt['color']);
                // $pt = value_level_mapper($per_2_7[2]);
                // $cols = explode(",", $pt['color']);
                // echo "end";
                //die();
        }   
}

if(! function_exists('helper_aptitude_b'))
{
       function helper_aptitude_b($solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group)
       {
    
            // echo "in helper_aptitude_b";
            // echo "<pre>";
            // print_r([$solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group]);
            // echo "</pre>";
            // die;
       }   

}

if(! function_exists('helper_aptitude_a'))
{
       function helper_aptitude_a($solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group)
       {
    
            // echo "in helper_aptitude_c";
            // echo "<pre>";
            // print_r([$solution, $solution_table, $options_within_table, $has_right_answer, $option_field_names,$question_group]);
            // echo "</pre>";
            //die;
       }   

}

if(! function_exists('value_level_mapper'))
{
    function value_level_mapper($per_val)
    {
        $status['level'] = '';
        $status['color'] = '';
        if($per_val < 40){$status['level'] = 'Low';$status['color'] = '247,89,73';} 
        else if($per_val < 60){$status['level'] = 'Medium';$status['color'] = '234,250,33';}
        else if($per_val < 75){$status['level'] = 'High';$status['color'] = '95,250,33';}
        else if($per_val <= 100){$status['level'] = 'Very High';$status['color'] = '74,191,27';}
        return $status;
    }
}


if(! function_exists('interest_mapper_uce'))
{
    function interest_mapper_uce($con,$cd,$S1,$S2,$S3,$J1,$J2,$J3,$code)
    {
        $match_array = array("VL", "L", "M", "MH", "H3", "H2", "H1", "VH");
        $cnd = array();
        $sql = "select * from career_int_map";
        $res = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($res)){array_push($cnd,$row);}
        $cnd_count = count($cnd);
       
        //J1 mapping
        $str1='';$str2='';$str3='';$str4='';
        if ($J1=="NA"){$str1="J1=NA";} 
        else if ($J1==$S1){$str1="J1=S1";} 
        else if ($J1==$S2){$str1="J1=S2";} 
        else if ($J1==$S3){$str1="J1=S3";} 
        else {$str1="J1=X";}
                    
        if ($J2=="NA"){$str2="J2=NA";} else
        if ($J2==$S1){$str2="J2=S1";} else
        if ($J2==$S2){$str2="J2=S2";} else
        if ($J2==$S3){$str2="J2=S3";} else
                    {$str2="J2=X";}
                    
        if ($J3=="NA"){$str3="J3=NA";} else
        if ($J3==$S1){$str3="J3=S1";} else
        if ($J3==$S2){$str3="J3=S2";} else
        if ($J3==$S3){$str3="J3=S3";} else
                    {$str3="J3=X";}
        $str4 = $str1.$str2.$str3; 
        $match = '';
        for($i=0;$i<$cnd_count;$i++)
        {
            if($str4==$cnd[$i]['cndt']){$match=$cnd[$i]['mtch'];break;}
        }
        
        if($match==''){$match ="VL";}
        return $match;
    }
}

if(! function_exists('aptitude_mapper'))
{
    function aptitude_mapper($a1,$a2,$a3,$a4,$a5,$a6,$b1,$b2,$b3,$b4,$b5,$b6,$c1,$c2,$c3,$c4,$c5,$c6,$prof_name,$con,$SA_Level)
    {

        $match = '';
        $ar_level = array('L','M','H2','H1','VH');
        $ar_level_val = array(0.40,0.60,0.75,0.90,1.00);
        
        $arr_level = array();
        if ($a1 >= $b1) {array_push($arr_level,1); } else {array_push($arr_level,0);}
        if ($a2 >= $b2) {array_push($arr_level,1); } else {array_push($arr_level,0);}
        if ($a3 >= $b3) {array_push($arr_level,1); } else {array_push($arr_level,0);}
        if ($a4 >= $b4) {array_push($arr_level,1); } else {array_push($arr_level,0);}
        if ($a5 >= $b5) {array_push($arr_level,1); } else {array_push($arr_level,0);}
        if ($a6 >= $b6) {array_push($arr_level,1); } else {array_push($arr_level,0);}
        $sum = $arr_level[0]*$c1 + $arr_level[1]*$c2 +$arr_level[2]*$c3 + $arr_level[3]*$c4 +$arr_level[4]*$c5 + $arr_level[5]*$c6;
        // echo "Match coeff :".$sum."<br>";
        for ($i=0;$i < count($ar_level_val);$i++)
        {if($sum <= $ar_level_val[$i]){$match = $ar_level[$i];break;}}

        //Modification - 25-04-22 - Code adapted to SA
        $man_apt = null;
        $x='';
        $sql_query = "SELECT mandatory_apt FROM `career_apt_latest_2` WHERE profession_name = '$prof_name'";
        $mandatory_apt_sql = mysqli_query($con,$sql_query);
        
        while($data = mysqli_fetch_array($mandatory_apt_sql)) {
            $x = $man_apt = $data['mandatory_apt'];
        };
        
        //Sudhir - 29-06-22
        if ($man_apt=='SA')
        {
            if ($SA_Level == "Low"){$GLOBALS['sa_override'][$prof_name]['apt'] = 'L';}
            if ($SA_Level == "Medium"){$GLOBALS['sa_override'][$prof_name]['apt'] = 'M';}
        }


        //End of Sudhir - 29-06-22
        //Old elimination logic - between 25-04-22 till 29-06-22 
        // if($man_apt=='SA' && ($SA_Level == "Low"  || $SA_Level == "Medium")){
        //     $match = $ar_level[0]; 
        // }
        //End of Old elimination logic - between 25-04-22 till 29-06-22
        return $match;        
    }


}

if(! function_exists('career_recommendations'))
{
    function career_recommendations()
    {

        $GLOBALS['sa_override']=[];
        $sql = "select * from career_int_latest";
        $res = mysqli_query($con,$sql);
        

        //Update interests
        while($row = mysqli_fetch_array($res))
        {
            $cd = $row['profession_name'];
            $match = interest_mapper_uce($con,$cd,$s[0],$s[1],$s[2], $row['J1'],$row['J2'],$row['J3'],$code);
            $sql_update = "update career_sui_latest set inte='$match' where profession_name='$cd' and code='$code'";
            mysqli_query($con,$sql_update);
    
            $x='';
            $sql_query = "SELECT mandatory_apt FROM `career_apt_latest_2` WHERE profession_name = '$cd'";
            $mandatory_apt_sql = mysqli_query($con,$sql_query);
            while($data = mysqli_fetch_array($mandatory_apt_sql)) {$x  = $data['mandatory_apt'];};
            
            //Sudhir - 29-06-22
            if ($x=='SA'){$GLOBALS['sa_override'][$cd]['int'] = $match;}
        }
       
        //Update aptitude
        $sql_apt = "select * from career_apt_latest";
        $res_apt = mysqli_query($con,$sql_apt);
        while($row_apt = mysqli_fetch_array($res_apt))
        {
            $cd = $row_apt['profession_name'];
            // Added by Sudhir
            $ar_w = $row_apt['AR_w'];
            $vr_w = $row_apt['VR_w'];
            $sa_w = $row_apt['SA_w'];
    
            $com_w = $row_apt['COM_w'];
            $nc_w = $row_apt['NC_w'];
            $om_w = $row_apt['OM_w'];
            //End of added by Sudhir
       
            $match = aptitude_mapper($apt_value[0],$apt_value[1],$apt_value[2],$apt_value[3],$apt_value[4],$apt_value[5],
            $row_apt['AR_v'],$row_apt['VR_v'],$row_apt['SA_v'],$row_apt['COM_v'],$row_apt['NC_v'],$row_apt['OM_v'],
            $ar_w,$vr_w,$sa_w,$com_w,$nc_w,$om_w,$cd,$con,$SA_Level);
            $sql_update = "update career_sui_latest set apt='$match' where profession_name='$cd' and code='$code'";
            mysqli_query($con,$sql_update);
        }

        //Overall recommendations
        $logic_sql = "select * from career_logic_latest";
        $logic_res = mysqli_query($con,$logic_sql);
        $arr_logic = array();
        while($data = mysqli_fetch_array($logic_res)) {array_push($arr_logic,$data);}
   
        $res_ft = mysqli_query($con,$sql_ft);
        $sql_ft = "select * from career_sui_latest where code='$code'";
        while($row_ft=mysqli_fetch_array($res_ft))
        {
            $cd = $row_ft['profession_name'];
            $x = "I-".$row_ft['inte']."-A-".$row_ft['apt'];
    
            //echo $row_ft['apt'].'<br>';
            foreach($arr_logic as $la){if($la[5] == $x)
                {
                    $match = $la[4];
                    $sql_update = "update career_sui_latest set recommendation='$match' where profession_name='$cd' and code='$code'";
                    mysqli_query($con,$sql_update);
                        //echo $match."<br>";
                }
            } 
            
            //New Logic for sa_override - 29 June 2022 - Sudhir
            $arr_sa_override = ["L" => ["VL", "L", "M"], "M" => ["VL", "L"],];
            $sa_override_val = "Avoid";
        
            foreach($GLOBALS['sa_override'] as $k=>$v)
            {
               foreach($arr_sa_override as $k1=>$v1)
               {
                if($k1 == $v['apt'] )
                {
                    if(in_array($v['int'], $v1))
                    {
                        $sql_update = "update career_sui_latest set recommendation='$sa_override_value' where profession_name='$cd' and code='$code'";        
                    }
                }
               }
            }
         //End of New Logic for sa_override - 29 June 2022 - Sudhir
        }
            
        $careers_to_disp = 50;
        $max_from_clstr = 20;
        $choise = array('Top Choice','Good Choice','Optional');
        $t = array();
        $i = 1;
        $arr_a = array();
        $arr_b = array();
        $arr_c = array();
        $arr_careers = array();
        $arr_ch_val = array('Top Choice','Good Choice','Optional','Develop','Explore');
        $arr_ch_rank = array(4,3,2,1,0);
        $cnt_ch_val = count($arr_ch_val);
        
        for ($i=0;$i<$cnt_ch_val;$i++){$arr_b[$arr_ch_val[$i]] = array();}
        
        //Added by Sudhir on 20 Jan 22
        {
            $count_of_professions = 0;
            $max_count = 20;
            $arr_professions = [];
        
            foreach($arr_ch_val as $v_ch_val)
            {
                $count_limit = $max_count - $count_of_professions;
                if($count_limit > 0)
                {
                    $sql_query_ch = "SELECT a.Cluster, a.recommendation, a.profession_name,b.11th_12th,b.Education";
                    $sql_query_ch .= " FROM career_sui_latest a LEFT JOIN career_edu_latest b ON b.profession_name = a.profession_name";
                    $sql_query_ch .= " WHERE a.code='$code' AND (a.recommendation ='$v_ch_val' AND a.Cluster !='#N/A') AND b.display_priority = 1";
                    $sql_query_ch .= " AND b.11th_12th IS NOT NULL AND b.11th_12th != '#NAME?'";
                    $sql_query_ch .= " ORDER BY  a.Cluster";
                    $sql_query_ch .= " LIMIT $count_limit";

                    $res_ch = mysqli_query($con,$sql_query_ch);
                    $count_num = mysqli_num_rows($res_ch);
                    if($count_num > 0)
                    {
                        while($res_ch_result = mysqli_fetch_array($res_ch)){$arr_professions[] = $res_ch_result;}
                    }
                    $count_of_professions += $count_num;
                }
                else{break;}
            }
            
            //count 
            $arr_cluster=[];
            $arr_stream =[];
            foreach($arr_professions as $v_professions)
            {
                array_push($arr_cluster,$v_professions['Cluster']);
                array_push($arr_stream, $v_professions['11th_12th']);
            }
            
            $arr_cluster_200122 = array_count_values($arr_cluster);        
            $arr_stream_200122 =  array_count_values($arr_stream);
            arsort($arr_cluster_200122);
            arsort($arr_stream_200122);
        }

        //Added by Sudhir on 01 Nov 21
       
        {
            $sql_cnt_x = "SELECT Cluster, recommendation, COUNT(profession_name) FROM career_sui_latest";
            $sql_cnt_x .= " WHERE code='$code' AND recommendation !='Avoid' AND Cluster !='#N/A' ";
            $sql_cnt_x .= " GROUP BY Cluster, recommendation ";
            $sql_cnt_x .= " ORDER BY COUNT(profession_name) DESC";
            $res_cnt_x = mysqli_query($con,$sql_cnt_x);
            while($row = mysqli_fetch_array($res_cnt_x))
            {
                if($row['recommendation']=='Top Choice'){array_push($arr_b['Top Choice'],$row);}
                if($row['recommendation']=='Good Choice'){array_push($arr_b['Good Choice'],$row);}
                if($row['recommendation']=='Optional'){array_push($arr_b['Optional'],$row);}
                if($row['recommendation']=='Develop'){array_push($arr_b['Develop'],$row);}
                if($row['recommendation']=='Explore'){array_push($arr_b['Explore'],$row);}

            }
         
            function sortByOrder($a, $b) {return $a['COUNT(profession_name)'] - $b['COUNT(profession_name)'];}
            
            {
                sort($arr_b['Good Choice'],SORT_NUMERIC, 'sortByOrder');
                sort($arr_b['Top Choice'], SORT_NUMERIC ,'sortByOrder');
                sort($arr_b['Optional'] ,SORT_NUMERIC, 'sortByOrder');
                sort($arr_b['Develop'],SORT_NUMERIC, 'sortByOrder');
                sort($arr_b['Explore'] ,SORT_NUMERIC, 'sortByOrder');
            }
            
            $cnt_profs =0;
            echo __LINE__ ." I am here...";
            foreach($arr_b['Top Choice'] as $temp_x)
            {
                echo "Entered Top Choice :"."<br>";
                if($temp_x['COUNT(profession_name)']<$max_from_clstr)
                {$cnt_profs += $temp_x['COUNT(profession_name)'];}
                else{$cnt_profs += $max_from_clstr;}
                $clstr = $temp_x['Cluster'];
                {
                    $sql_choice_top = "select * from career_sui_latest where Cluster = '$clstr' AND recommendation='Top Choice' AND code='$code' LIMIT $max_from_clstr";
                    $res_choice_top = mysqli_query($con,$sql_choice_top);
                    //echo "No of Top Choice Clusters : ".mysqli_num_rows($res_choice_top)."<br>";
                    while($row = mysqli_fetch_array($res_choice_top))
                    {
                        $pro_x = $row['profession_name'];
                        //echo "Profession Name :".$pro_x."<br>";
                        $sql_choice_top_1 = "select * from career_edu_latest where profession_name = '$pro_x'";
                        $res_choice_top_1 = mysqli_query($con,$sql_choice_top_1);
                        while($row_1 = mysqli_fetch_array($res_choice_top_1))
                        {array_push($t, array($pro_x,$clstr,$row_1['11th_12th'], $row_1['Education'],'Top Choice'));}
                    }
                }    
                //if(!in_array($temp_x['Cluster'],$arr_c))
                {array_push($arr_c,$temp_x['Cluster']); }
                if($cnt_profs >= $careers_to_disp){break;}
            }
        }
        if ($cnt_profs < $careers_to_disp)
        {
            foreach($arr_b['Good Choice'] as $temp_x)
            {
                echo "Entered Good Choice :"."<br>";
                if($temp_x['COUNT(profession_name)']<$max_from_clstr)
                {$cnt_profs += $temp_x['COUNT(profession_name)'];   }
                else{$cnt_profs += $max_from_clstr;}
                $clstr = $temp_x['Cluster'];
                //echo "Cluster :".$clstr." has ".$temp_x['COUNT(profession_name)']."<br>";
                {
                    $sql_choice_good = "select * from career_sui_latest where Cluster = '$clstr' AND recommendation='Good Choice' and code='$code' LIMIT $max_from_clstr";
                    $res_choice_good = mysqli_query($con,$sql_choice_good);
                    echo "No of Top Choice Clusters : ".mysqli_num_rows($res_choice_good)."<br>";
                    while($row = mysqli_fetch_array($res_choice_good))
                    {
                            $pro_x = $row['profession_name'];
                            //echo "Profession Name :".$pro_x."<br>";
                            $sql_choice_good_1 = "select * from career_edu_latest where profession_name = '$pro_x'";
                            $res_choice_good_1 = mysqli_query($con,$sql_choice_good_1);
                            while($row_1 = mysqli_fetch_array($res_choice_good_1))
                            {
                            array_push($t, array($pro_x,$clstr,$row_1['11th_12th'], $row_1['Education'],'Good Choice'));
                            }
                    }
                }
                //if(!in_array($temp_x['Cluster'],$arr_c))
                {array_push($arr_c,$temp_x['Cluster']); }
                if($cnt_profs >= $careers_to_disp){break;}
            }
        }
        if ($cnt_profs < $careers_to_disp)
        {
            foreach($arr_b['Optional'] as $temp_x)
            {
                echo "Entered Optional :"."<br>";
                if($temp_x['COUNT(profession_name)']<$max_from_clstr)
                {$cnt_profs += $temp_x['COUNT(profession_name)'];   }
                else
                {$cnt_profs += $max_from_clstr;}
                $clstr = $temp_x['Cluster'];
                {
                    $sql_choice_opt = "select * from career_sui_latest where Cluster = '$clstr' AND recommendation='Optional' and code='$code' LIMIT $max_from_clstr";
                    $res_choice_opt = mysqli_query($con,$sql_choice_opt);
                    //echo "No of Top Choice Clusters : ".mysqli_num_rows($res_choice_opt)."<br>";
                    while($row = mysqli_fetch_array($res_choice_opt))
                    {
                        $pro_x = $row['profession_name'];
                        //echo "Profession Name :".$pro_x."<br>";
                        $sql_choice_opt_1 = "select * from career_edu_latest where profession_name = '$pro_x'";
                        $res_choice_opt_1 = mysqli_query($con,$sql_choice_opt_1);
                        while($row_1 = mysqli_fetch_array($res_choice_opt_1))
                        {array_push($t, array($pro_x,$clstr,$row_1['11th_12th'], $row_1['Education'],'Optional'));}
                    }
                }
                //if(!in_array($temp_x['Cluster'],$arr_c))
                {array_push($arr_c,$temp_x['Cluster']); }
                if($cnt_profs >= $careers_to_disp){break;}
                
            }
        }
                    
        if ($cnt_profs < $careers_to_disp)
        {
            foreach($arr_b['Develop'] as $temp_x)
            {
                echo "Entered Developed :"."<br>";
                if($temp_x['COUNT(profession_name)']<$max_from_clstr)
                {$cnt_profs += $temp_x['COUNT(profession_name)'];   }
                else{$cnt_profs += $max_from_clstr;}
                $clstr = $temp_x['Cluster'];
                //echo "Cluster :".$clstr." has ".$temp_x['COUNT(profession_name)']."<br>";
                
                {
                    $sql_choice_dev = "select * from career_sui_latest where Cluster = '$clstr' AND recommendation='Develop' and code='$code' LIMIT $max_from_clstr";
                    $res_choice_dev = mysqli_query($con,$sql_choice_dev);
                    echo "No of Top Choice Clusters : ".mysqli_num_rows($res_choice_dev)."<br>";
                    while($row = mysqli_fetch_array($res_choice_dev))
                    {
                        $pro_x = $row['profession_name'];
                        //echo "Profession Name :".$pro_x."<br>";
                        $sql_choice_dev_1 = "select * from career_edu_latest where profession_name = '$pro_x'";
                        $res_choice_dev_1 = mysqli_query($con,$sql_choice_dev_1);
                        while($row_1 = mysqli_fetch_array($res_choice_dev_1))
                        {
                        array_push($t, array($pro_x,$clstr,$row_1['11th_12th'], $row_1['Education'],'Develop'));
                        }
                    }
                }
                
                //if(!in_array($temp_x['Cluster'],$arr_c))
                {array_push($arr_c,$temp_x['Cluster']); }
                if($cnt_profs >= $careers_to_disp){break;}
            }
        }
                        
        if ($cnt_profs < $careers_to_disp)
        {
        foreach($arr_b['Explore'] as $temp_x)
            {
                    echo "Entered Explore :"."<br>";
                    if($temp_x['COUNT(profession_name)']<$max_from_clstr)
                    {
                    $cnt_profs += $temp_x['COUNT(profession_name)'];   
                    }
                    else
                    {
                        $cnt_profs += $max_from_clstr;
                    }
                    $clstr = $temp_x['Cluster'];
                    //echo "Cluster :".$clstr." has ".$temp_x['COUNT(profession_name)']."<br>";
                    
                    {
                    $sql_choice_exp = "select * from career_sui_latest where Cluster = '$clstr' AND recommendation='Explore' and code='$code' LIMIT $max_from_clstr";
                    $res_choice_exp = mysqli_query($con,$sql_choice_exp);
                    //echo "No of Top Choice Clusters : ".mysqli_num_rows($res_choice_exp)."<br>";
                        while($row = mysqli_fetch_array($res_choice_exp))
                    {
                            $pro_x = $row['profession_name'];
                            //echo "Profession Name :".$pro_x."<br>";
                            $sql_choice_exp_1 = "select * from career_edu_latest where profession_name = '$pro_x'";
                            $res_choice_exp_1 = mysqli_query($con,$sql_choice_exp_1);
                            while($row_1 = mysqli_fetch_array($res_choice_exp_1))
                            {
                            array_push($t, array($pro_x,$clstr,$row_1['11th_12th'], $row_1['Education'],'Explore'));
                            }
                    }
                    }
                    
            //      if(!in_array($temp_x['Cluster'],$arr_c))
                    {
                    array_push($arr_c,$temp_x['Cluster']); 
                    }
                    
                    if($cnt_profs >= $careers_to_disp)
                    {
                        break;
                    }
            }
        }
                        


            

                    
                    
                    

        
            
                    

            
            

        
        
        // echo "Count of Professions :".$cnt_profs."<br><pre>";
    // print_r($arr_c);
    // var_dump($arr_careers);
        
        
        
        

    
        
        //echo top cluster array
        //echo "Top Clusters :<pre>";
        //print_r($arr_a);
        
        $clusters_to_display = 0;
        //echo "No of rows fetched :".$res_cnt->num_rows."<br>";
    
        
    
        
        //Top Cluster analysis pdf
        
        
        
        $clust_ctr=0;
        $top_clusters = "";
        echo $to_print = "Your Top Career Clusters"."\r\n\r\n";
        echo "Test"."<br>";
        // print_r($arr_c);
        // echo "<pre>";
        //Added on 21-01-2022
        foreach($arr_cluster_200122 as $top_clstr=> $v_top_cluster)
        //End of Added on 21-01-2022

        /* Commented on  21-01-2022  
        foreach($arr_c as $top_clstr)
        */
        //while($row_cnt = mysqli_fetch_array($res_cnt))
        {
            // print_r($top_clstr);
            // die();
            echo "1"."<br>";
            $clusters_to_display +=1;
            if ($clust_ctr < $clusters_to_display)
            {
                //echo "2"."<br>";
                //$x = $row_cnt['Cluster'];
                
                $x = $top_clstr;   
                echo "<br>Top Cluster: $x<br>";
                
                $sql_desc = "SELECT Description FROM career_cluster_desc WHERE Cluster = '$x'";
                
                $res_desc = mysqli_query($con, $sql_desc);
                
                if (!$res_desc) {
                    printf("Error: %s\n", mysqli_error($con));
                    exit();
                }
                
                $row_desc = mysqli_fetch_array($res_desc);
                
                /* $bypass_condition = ($x == "Arts, Audio/Video Technology & Communications") && ($SA_Level=="Low");
                if($bypass_condition != "TRUE"){
                    
                } */

                $top_clusters .="'".$x."',";
                $to_print .= $x."\r\n".$row_desc['Description']."\r\n\r\n";
                

                //echo ($to_print)."<br>";
                
                
            
            }
            $clust_ctr += 1;
            if($clusters_to_display >2)
            {
                $clusters_to_display = 2;
                break;
            }
        
            
            
        
        }
        
        //die();
        //echo "Clusters to display :".$clusters_to_display."<br>";
        $top_clusters = rtrim($top_clusters, ", ");
        echo "Top Clusters :".$top_clusters."<br>";
        
        
        
        $pagecount = $pdf->setSourceFile('report_template/Border Page.pdf');
        $tpl = $pdf->importPage(1);
        $pdf->AddPage("P", "A4");
        $pdf->useTemplate($tpl, ['adjustPageSize'=>true]);
        $pdf->SetXY(20,20);
        $pdf->SetFont('Arial','',10);
        $pdf->MultiCell(170,6.5, $to_print,0,'L',false);
        //End of Added by Sudhir
        
        //Top Stream printing to PDF - 21 Jan 2022
        $to_print_stream_210122 = 'Your Top Streams';
        $to_print_streams_max = 2;
        //$to_print_stream_label =['1st Preference', '2nd Preference'];
        $to_print_stream_label =['', ''];
        $to_print_stream_ctr = 0;
        foreach($arr_stream_200122 as $k_stream_to_print=>$v_stream_to_print)
        {
            
            if($to_print_stream_ctr<$to_print_streams_max)
            {
                $to_print_stream_210122 .= "\r\n\r\n".$to_print_stream_label[$to_print_stream_ctr]." ".$k_stream_to_print."\r\n\r\n";
                $to_print_stream_ctr +=1;           
            }
        
        }
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',15);
        $pdf->MultiCell(170,6.5, $to_print_stream_210122,0,'L',false);


        //End of Top Stream printing to PDF - 21 Jan 2022
        
        
    
        echo "Client Code :".$code."<br>";
        

        $p_ct =0;
        

        
        //echo "Professions :<pre>";
        //print_r($t);

        function value_level_mapper($per_val)
        {
            $status['level'] = '';
            $status['color'] = '';
            if($per_val<40)
            {
                $status['level'] = 'Low';
                $status['color'] = '247,89,73';
            } else
            if($per_val<60)
            {
                $status['level'] = 'Medium';
                $status['color'] = '234,250,33';
            }
            else
            if($per_val<75)
            {
                $status['level'] = 'High';
                $status['color'] = '95,250,33';
            }
            else
            if($per_val<=100 )
            {
                $status['level'] = 'Very High';
                $status['color'] = '74,191,27';
            }
            return $status;
        }

        
        
        
        $pdf->addPage();
        checking_size($logo,$pdf);
        $pdf->SetFont('Arial','B',24);
        $pdf->SetXY(10,36);
        $pdf->SetTextColor(11,170,54);
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(80,6,'Career Suggestions',0,0,'L',true);

        $pdf->SetFont('Arial','B',9);
        $pdf->SetXY(10,46);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFillColor(219,233,201);
        $pdf->Cell(30,6,'Profession Name',1,0,'L',true); // First header column 
        
        //Added by Sudhir on 24-Oct-2021
        
        $pdf->Cell(30,6,'Cluster',1,0,'L',true); // First header column 
        
        //End of Added by Sudhir
        
        $pdf->Cell(25,6,'11Th / 12Th',1,0,'L',true); // Second header column
        $pdf->Cell(65,6,'Higher Education',1,0,'L',true); // Third header column 
        $pdf->Cell(34,6,'Recommendation',1,1,'L',true); // Fourth header column
        $xn = $x = $pdf->GetX();
        $yn = $y = $pdf->GetY();
        $pdf->SetFont('Arial','B',9);
        $maxheight = 0;
        $width=46;
        $height=6;
        $cells = count($t);
        
        //$width_cell=array(38,30,48,70);
        
        $page_height = 400; // mm 
        $pdf->SetAutoPageBreak(true);
        // echo "<pre>";
        //print_r($t);
        echo "<br>here------------------<br>";

        $arr_professions_final = [];
        foreach($arr_professions as $k=>$v)
        {
            
            //Lines added on 25-04-22 - to adapt for SA
            
            $cluster = $v[0];
            $reco = $v[1];
            $prof = $v[2];
            $_11th = $v[3];
            $edu = $v[4];

        $arr_professions_final[] = [$prof,$cluster,$_11th,$edu,$reco];


        }
        foreach($arr_professions_final as $item)
        //End of 21-01-22 - Added below foreacg

        /* 21-01-22 - Commented foreach
        foreach($t as $item)
        */
        {
            
                
                $x = $x;
                $y = $y+$maxheight;
                $height_of_cell=$y-$yn;
                $space_left=$page_height-($y); // space left on page
                if ($height_of_cell > $space_left) 
                {
                    // $pdf->Write($y+$yn,'Next');
                    // $tpl = $pdf->importPage(7);
                    $pdf->AddPage();
                    // $pdf->useTemplate($tpl, ['adjustPageSize'=>true]);
                    checking_size($logo,$pdf);
                    
                    $pdf->SetFont('Arial','B',9);
                    $pdf->SetXY(10,46);
                    $pdf->SetTextColor(0,0,0);
                    $pdf->SetFillColor(219,233,201);
                    $pdf->Cell(30,6,'Profession Name',1,0,'L',true); // First header column 
                    
                    //Added by Sudhir on 24-Oct-2021
        
                    $pdf->Cell(30,6,'Cluster',1,0,'L',true); // First header column 
        
                    //End of Added by Sudhir
                    
                    $pdf->Cell(25,6,'11Th / 12Th',1,0,'L',true); // Second header column
                    $pdf->Cell(65,6,'Higher Education',1,0,'L',true); // Third header column 
                    $pdf->Cell(34,6,'Recommendation',1,1,'L',true); // Fourth header column
                    $xn = $x = $pdf->GetX();
                    $yn = $y = $pdf->GetY();
                    //   $pdf->SetXY(12, 30);// page break
                    $pdf->SetFont('Arial','B',9);
                    $x=$xn;
                    $y=$yn;
                }
                // $ty=$y;
                // $space_left=$page_height-$ty; // space left on page
                // if ($j/5==floor($j/5) && $ty > $space_left) {
                //   $pdf->AddPage(); // page break
                //   $x=$x;
                //   $y=$y;
                // }
                


                $maxheight = 0;
                for ($i = 0; $i < $cells; $i++) 
                {
                    // $pdf->SetXY($x + ($width * ($i)) , $y);
                    if($i==0)
                    {
                        $pdf->SetXY($x + (0) , $y);
                        $pdf->MultiCell(30, $height, $item[$i],0,'L');
                    }
                    else if($i==1)
                    {
                        $pdf->SetXY($x + (30) , $y);
                        $pdf->MultiCell(30, $height, $item[$i],0,'L'); 
                    }
                    else if($i==2)
                    {
                        $pdf->SetXY($x + (60) , $y);
                        $pdf->MultiCell(25, $height, $item[$i],0,'L'); 
                    }
                    else if($i==3)
                    {
                        $pdf->SetXY($x + (85) , $y);
                        $pdf->MultiCell(65, $height, $item[$i],0,'L');  
                    }
                    else 
                    {
                        $pdf->SetXY($x + (150) , $y);
                        $pdf->MultiCell(20, $height, $item[$i],0,'L');
                    }
                    if ($pdf->GetY() - $y > $maxheight) 
                    {
                        $maxheight = $pdf->GetY() - $y;
                    }  
                }
                // $pdf->SetXY($x + ($width * ($i + 1)), $y);
        
                
                for ($i = 0; $i < $cells + 1; $i++) 
                {
                    if($i==0)
                    {
                        $pdf->Line($x + 30 * $i, $y, $x + 30 * $i, $y + $maxheight);
                    }
                    else if($i==1)
                    {
                        $pdf->Line($x + 30 * $i, $y, $x + 30 * $i, $y + $maxheight); 
                    }
                    else if($i==2)
                    {
                        $pdf->Line($x + 60, $y, $x + 60, $y + $maxheight); 
                    }
                    else if($i==3)
                    {
                        $pdf->Line($x + 85, $y, $x + 85, $y + $maxheight); 
                    }
                    else if($i==4)
                    {
                        $pdf->Line($x + 150, $y, $x + 150, $y + $maxheight);
                    }  
                    
                    
                    
                        $pdf->Line($x + 184, $y, $x+ 184, $y + $maxheight);
                    
                }
                
                $pdf->Line($x, $y, $x + 184, $y);// top line
                $pdf->Line($x, $y + $maxheight, $x + 184, $y + $maxheight);//bottom
                            
        } 
        
        include('Remark.php');


    ob_end_clean();
    $pdf->AliasNbPages();


    $pdf->Output();


    // $pdf2->Output();

    ob_end_flush();
    




    }
}

if(! function_exists('career_recommendations_new'))
{
    function career_recommendations_new()
    {

        $GLOBALS['sa_override']=[];
        $sql = "select * from career_int_latest";
        $res = mysqli_query($con,$sql);
        

        //Update interests
        while($row = mysqli_fetch_array($res))
        {
            $cd = $row['profession_name'];
            $match = interest_mapper_uce($con,$cd,$s[0],$s[1],$s[2], $row['J1'],$row['J2'],$row['J3'],$code);
            $sql_update = "update career_sui_latest set inte='$match' where profession_name='$cd' and code='$code'";
            mysqli_query($con,$sql_update);
    
            $x='';
            $sql_query = "SELECT mandatory_apt FROM `career_apt_latest_2` WHERE profession_name = '$cd'";
            $mandatory_apt_sql = mysqli_query($con,$sql_query);
            while($data = mysqli_fetch_array($mandatory_apt_sql)) {$x  = $data['mandatory_apt'];};
            
            //Sudhir - 29-06-22
            if ($x=='SA'){$GLOBALS['sa_override'][$cd]['int'] = $match;}
        }
       
        //Update aptitude
        $sql_apt = "select * from career_apt_latest";
        $res_apt = mysqli_query($con,$sql_apt);
        while($row_apt = mysqli_fetch_array($res_apt))
        {
            $cd = $row_apt['profession_name'];
            // Added by Sudhir
            $ar_w = $row_apt['AR_w'];
            $vr_w = $row_apt['VR_w'];
            $sa_w = $row_apt['SA_w'];
    
            $com_w = $row_apt['COM_w'];
            $nc_w = $row_apt['NC_w'];
            $om_w = $row_apt['OM_w'];
            //End of added by Sudhir
       
            $match = aptitude_mapper($apt_value[0],$apt_value[1],$apt_value[2],$apt_value[3],$apt_value[4],$apt_value[5],
            $row_apt['AR_v'],$row_apt['VR_v'],$row_apt['SA_v'],$row_apt['COM_v'],$row_apt['NC_v'],$row_apt['OM_v'],
            $ar_w,$vr_w,$sa_w,$com_w,$nc_w,$om_w,$cd,$con,$SA_Level);
            $sql_update = "update career_sui_latest set apt='$match' where profession_name='$cd' and code='$code'";
            mysqli_query($con,$sql_update);
        }

        //Overall recommendations
        $logic_sql = "select * from career_logic_latest";
        $logic_res = mysqli_query($con,$logic_sql);
        $arr_logic = array();
        while($data = mysqli_fetch_array($logic_res)) {array_push($arr_logic,$data);}
   
        $res_ft = mysqli_query($con,$sql_ft);
        $sql_ft = "select * from career_sui_latest where code='$code'";
        while($row_ft=mysqli_fetch_array($res_ft))
        {
            $cd = $row_ft['profession_name'];
            $x = "I-".$row_ft['inte']."-A-".$row_ft['apt'];
    
            //echo $row_ft['apt'].'<br>';
            foreach($arr_logic as $la){if($la[5] == $x)
                {
                    $match = $la[4];
                    $sql_update = "update career_sui_latest set recommendation='$match' where profession_name='$cd' and code='$code'";
                    mysqli_query($con,$sql_update);
                        //echo $match."<br>";
                }
            } 
            
            //New Logic for sa_override - 29 June 2022 - Sudhir
            $arr_sa_override = ["L" => ["VL", "L", "M"], "M" => ["VL", "L"],];
            $sa_override_val = "Avoid";
        
            foreach($GLOBALS['sa_override'] as $k=>$v)
            {
               foreach($arr_sa_override as $k1=>$v1)
               {
                if($k1 == $v['apt'] )
                {
                    if(in_array($v['int'], $v1))
                    {
                        $sql_update = "update career_sui_latest set recommendation='$sa_override_value' where profession_name='$cd' and code='$code'";        
                    }
                }
               }
            }
         //End of New Logic for sa_override - 29 June 2022 - Sudhir
        }
            
        
        
        //Careers to display
        
        $careers_to_disp = 50;
        $max_from_clstr = 20;
        $choise = array('Top Choice','Good Choice','Optional');
        $t = array();
        $i = 1;
        $arr_a = array();
        $arr_b = array();
        $arr_c = array();
        $arr_careers = array();
        $arr_ch_val = array('Top Choice','Good Choice','Optional','Develop','Explore');
        $arr_ch_rank = array(4,3,2,1,0);
        $cnt_ch_val = count($arr_ch_val);
        
        for ($i=0;$i<$cnt_ch_val;$i++){$arr_b[$arr_ch_val[$i]] = array();}
        
        //Added by Sudhir on 20 Jan 22
        {
            $count_of_professions = 0;
            $max_count = 20;
            $arr_professions = [];
        
            foreach($arr_ch_val as $v_ch_val)
            {
                $count_limit = $max_count - $count_of_professions;
                if($count_limit > 0)
                {
                    $sql_query_ch = "SELECT a.Cluster, a.recommendation, a.profession_name,b.11th_12th,b.Education";
                    $sql_query_ch .= " FROM career_sui_latest a LEFT JOIN career_edu_latest b ON b.profession_name = a.profession_name";
                    $sql_query_ch .= " WHERE a.code='$code' AND (a.recommendation ='$v_ch_val' AND a.Cluster !='#N/A') AND b.display_priority = 1";
                    $sql_query_ch .= " AND b.11th_12th IS NOT NULL AND b.11th_12th != '#NAME?'";
                    $sql_query_ch .= " ORDER BY  a.Cluster";
                    $sql_query_ch .= " LIMIT $count_limit";

                    $res_ch = mysqli_query($con,$sql_query_ch);
                    $count_num = mysqli_num_rows($res_ch);
                    if($count_num > 0)
                    {
                        while($res_ch_result = mysqli_fetch_array($res_ch)){$arr_professions[] = $res_ch_result;}
                    }
                    $count_of_professions += $count_num;
                }
                else{break;}
            }
            
            //count 
            $arr_cluster=[];
            $arr_stream =[];
            foreach($arr_professions as $v_professions)
            {
                array_push($arr_cluster,$v_professions['Cluster']);
                array_push($arr_stream, $v_professions['11th_12th']);
            }
            
            $arr_cluster_200122 = array_count_values($arr_cluster);        
            $arr_stream_200122 =  array_count_values($arr_stream);
            arsort($arr_cluster_200122);
            arsort($arr_stream_200122);
        }

        //Added by Sudhir on 01 Nov 21
       
        {
            $sql_cnt_x = "SELECT Cluster, recommendation, COUNT(profession_name) FROM career_sui_latest";
            $sql_cnt_x .= " WHERE code='$code' AND recommendation !='Avoid' AND Cluster !='#N/A' ";
            $sql_cnt_x .= " GROUP BY Cluster, recommendation ";
            $sql_cnt_x .= " ORDER BY COUNT(profession_name) DESC";
            $res_cnt_x = mysqli_query($con,$sql_cnt_x);
            while($row = mysqli_fetch_array($res_cnt_x))
            {
                if($row['recommendation']=='Top Choice'){array_push($arr_b['Top Choice'],$row);}
                if($row['recommendation']=='Good Choice'){array_push($arr_b['Good Choice'],$row);}
                if($row['recommendation']=='Optional'){array_push($arr_b['Optional'],$row);}
                if($row['recommendation']=='Develop'){array_push($arr_b['Develop'],$row);}
                if($row['recommendation']=='Explore'){array_push($arr_b['Explore'],$row);}

            }
         
            function sortByOrder($a, $b) {return $a['COUNT(profession_name)'] - $b['COUNT(profession_name)'];}
            
            {
                sort($arr_b['Good Choice'],SORT_NUMERIC, 'sortByOrder');
                sort($arr_b['Top Choice'], SORT_NUMERIC ,'sortByOrder');
                sort($arr_b['Optional'] ,SORT_NUMERIC, 'sortByOrder');
                sort($arr_b['Develop'],SORT_NUMERIC, 'sortByOrder');
                sort($arr_b['Explore'] ,SORT_NUMERIC, 'sortByOrder');
            }
            
            $cnt_profs =0;
            echo __LINE__ ." I am here...";
            foreach($arr_b['Top Choice'] as $temp_x)
            {
                echo "Entered Top Choice :"."<br>";
                if($temp_x['COUNT(profession_name)']<$max_from_clstr)
                {$cnt_profs += $temp_x['COUNT(profession_name)'];}
                else{$cnt_profs += $max_from_clstr;}
                $clstr = $temp_x['Cluster'];
                {
                    $sql_choice_top = "select * from career_sui_latest where Cluster = '$clstr' AND recommendation='Top Choice' AND code='$code' LIMIT $max_from_clstr";
                    $res_choice_top = mysqli_query($con,$sql_choice_top);
                    //echo "No of Top Choice Clusters : ".mysqli_num_rows($res_choice_top)."<br>";
                    while($row = mysqli_fetch_array($res_choice_top))
                    {
                        $pro_x = $row['profession_name'];
                        //echo "Profession Name :".$pro_x."<br>";
                        $sql_choice_top_1 = "select * from career_edu_latest where profession_name = '$pro_x'";
                        $res_choice_top_1 = mysqli_query($con,$sql_choice_top_1);
                        while($row_1 = mysqli_fetch_array($res_choice_top_1))
                        {array_push($t, array($pro_x,$clstr,$row_1['11th_12th'], $row_1['Education'],'Top Choice'));}
                    }
                }    
                //if(!in_array($temp_x['Cluster'],$arr_c))
                {array_push($arr_c,$temp_x['Cluster']); }
                if($cnt_profs >= $careers_to_disp){break;}
            }
        }
        if ($cnt_profs < $careers_to_disp)
        {
            foreach($arr_b['Good Choice'] as $temp_x)
            {
                echo "Entered Good Choice :"."<br>";
                if($temp_x['COUNT(profession_name)']<$max_from_clstr)
                {$cnt_profs += $temp_x['COUNT(profession_name)'];   }
                else{$cnt_profs += $max_from_clstr;}
                $clstr = $temp_x['Cluster'];
                //echo "Cluster :".$clstr." has ".$temp_x['COUNT(profession_name)']."<br>";
                {
                    $sql_choice_good = "select * from career_sui_latest where Cluster = '$clstr' AND recommendation='Good Choice' and code='$code' LIMIT $max_from_clstr";
                    $res_choice_good = mysqli_query($con,$sql_choice_good);
                    echo "No of Top Choice Clusters : ".mysqli_num_rows($res_choice_good)."<br>";
                    while($row = mysqli_fetch_array($res_choice_good))
                    {
                            $pro_x = $row['profession_name'];
                            //echo "Profession Name :".$pro_x."<br>";
                            $sql_choice_good_1 = "select * from career_edu_latest where profession_name = '$pro_x'";
                            $res_choice_good_1 = mysqli_query($con,$sql_choice_good_1);
                            while($row_1 = mysqli_fetch_array($res_choice_good_1))
                            {
                            array_push($t, array($pro_x,$clstr,$row_1['11th_12th'], $row_1['Education'],'Good Choice'));
                            }
                    }
                }
                //if(!in_array($temp_x['Cluster'],$arr_c))
                {array_push($arr_c,$temp_x['Cluster']); }
                if($cnt_profs >= $careers_to_disp){break;}
            }
        }
        if ($cnt_profs < $careers_to_disp)
        {
            foreach($arr_b['Optional'] as $temp_x)
            {
                echo "Entered Optional :"."<br>";
                if($temp_x['COUNT(profession_name)']<$max_from_clstr)
                {$cnt_profs += $temp_x['COUNT(profession_name)'];   }
                else
                {$cnt_profs += $max_from_clstr;}
                $clstr = $temp_x['Cluster'];
                {
                    $sql_choice_opt = "select * from career_sui_latest where Cluster = '$clstr' AND recommendation='Optional' and code='$code' LIMIT $max_from_clstr";
                    $res_choice_opt = mysqli_query($con,$sql_choice_opt);
                    //echo "No of Top Choice Clusters : ".mysqli_num_rows($res_choice_opt)."<br>";
                    while($row = mysqli_fetch_array($res_choice_opt))
                    {
                        $pro_x = $row['profession_name'];
                        //echo "Profession Name :".$pro_x."<br>";
                        $sql_choice_opt_1 = "select * from career_edu_latest where profession_name = '$pro_x'";
                        $res_choice_opt_1 = mysqli_query($con,$sql_choice_opt_1);
                        while($row_1 = mysqli_fetch_array($res_choice_opt_1))
                        {array_push($t, array($pro_x,$clstr,$row_1['11th_12th'], $row_1['Education'],'Optional'));}
                    }
                }
                //if(!in_array($temp_x['Cluster'],$arr_c))
                {array_push($arr_c,$temp_x['Cluster']); }
                if($cnt_profs >= $careers_to_disp){break;}
                
            }
        }
                    
        if ($cnt_profs < $careers_to_disp)
        {
            foreach($arr_b['Develop'] as $temp_x)
            {
                echo "Entered Developed :"."<br>";
                if($temp_x['COUNT(profession_name)']<$max_from_clstr)
                {$cnt_profs += $temp_x['COUNT(profession_name)'];   }
                else{$cnt_profs += $max_from_clstr;}
                $clstr = $temp_x['Cluster'];
                //echo "Cluster :".$clstr." has ".$temp_x['COUNT(profession_name)']."<br>";
                
                {
                    $sql_choice_dev = "select * from career_sui_latest where Cluster = '$clstr' AND recommendation='Develop' and code='$code' LIMIT $max_from_clstr";
                    $res_choice_dev = mysqli_query($con,$sql_choice_dev);
                    echo "No of Top Choice Clusters : ".mysqli_num_rows($res_choice_dev)."<br>";
                    while($row = mysqli_fetch_array($res_choice_dev))
                    {
                        $pro_x = $row['profession_name'];
                        //echo "Profession Name :".$pro_x."<br>";
                        $sql_choice_dev_1 = "select * from career_edu_latest where profession_name = '$pro_x'";
                        $res_choice_dev_1 = mysqli_query($con,$sql_choice_dev_1);
                        while($row_1 = mysqli_fetch_array($res_choice_dev_1))
                        {
                        array_push($t, array($pro_x,$clstr,$row_1['11th_12th'], $row_1['Education'],'Develop'));
                        }
                    }
                }
                
                //if(!in_array($temp_x['Cluster'],$arr_c))
                {array_push($arr_c,$temp_x['Cluster']); }
                if($cnt_profs >= $careers_to_disp){break;}
            }
        }
                        
        if ($cnt_profs < $careers_to_disp)
        {
        foreach($arr_b['Explore'] as $temp_x)
            {
                    echo "Entered Explore :"."<br>";
                    if($temp_x['COUNT(profession_name)']<$max_from_clstr)
                    {$cnt_profs += $temp_x['COUNT(profession_name)'];   }
                    else{$cnt_profs += $max_from_clstr;}
                    $clstr = $temp_x['Cluster'];
                    //echo "Cluster :".$clstr." has ".$temp_x['COUNT(profession_name)']."<br>";
                    
                    {
                    $sql_choice_exp = "select * from career_sui_latest where Cluster = '$clstr' AND recommendation='Explore' and code='$code' LIMIT $max_from_clstr";
                    $res_choice_exp = mysqli_query($con,$sql_choice_exp);
                    //echo "No of Top Choice Clusters : ".mysqli_num_rows($res_choice_exp)."<br>";
                        while($row = mysqli_fetch_array($res_choice_exp))
                    {
                            $pro_x = $row['profession_name'];
                            //echo "Profession Name :".$pro_x."<br>";
                            $sql_choice_exp_1 = "select * from career_edu_latest where profession_name = '$pro_x'";
                            $res_choice_exp_1 = mysqli_query($con,$sql_choice_exp_1);
                            while($row_1 = mysqli_fetch_array($res_choice_exp_1))
                            {
                            array_push($t, array($pro_x,$clstr,$row_1['11th_12th'], $row_1['Education'],'Explore'));
                            }
                    }
                    }
                    
            //      if(!in_array($temp_x['Cluster'],$arr_c))
                    {array_push($arr_c,$temp_x['Cluster']); }
                    if($cnt_profs >= $careers_to_disp){break;}
                    
            }
        }
        $clusters_to_display = 0;
        $clust_ctr=0;
        $top_clusters = "";
        echo $to_print = "Your Top Career Clusters"."\r\n\r\n";

        foreach($arr_cluster_200122 as $top_clstr=> $v_top_cluster)
        {
            echo "1"."<br>";
            $clusters_to_display +=1;
            if ($clust_ctr < $clusters_to_display)
            {
                $x = $top_clstr;   
                echo "<br>Top Cluster: $x<br>";
                $sql_desc = "SELECT Description FROM career_cluster_desc WHERE Cluster = '$x'";
                $res_desc = mysqli_query($con, $sql_desc);
                if (!$res_desc) {printf("Error: %s\n", mysqli_error($con));exit();}
                $row_desc = mysqli_fetch_array($res_desc);
                $top_clusters .="'".$x."',";
                $to_print .= $x."\r\n".$row_desc['Description']."\r\n\r\n";
            }
            $clust_ctr += 1;
            if($clusters_to_display >2){$clusters_to_display = 2;break;}
        }
        $top_clusters = rtrim($top_clusters, ", ");
        echo "Top Clusters :".$top_clusters."<br>";

        
        //Top Stream printing to PDF - 21 Jan 2022
        $to_print_stream_210122 = 'Your Top Streams';
        $to_print_streams_max = 2;
        //$to_print_stream_label =['1st Preference', '2nd Preference'];
        $to_print_stream_label =['', ''];
        $to_print_stream_ctr = 0;
        foreach($arr_stream_200122 as $k_stream_to_print=>$v_stream_to_print)
        {
            
            if($to_print_stream_ctr<$to_print_streams_max)
            {
                $to_print_stream_210122 .= "\r\n\r\n".$to_print_stream_label[$to_print_stream_ctr]." ".$k_stream_to_print."\r\n\r\n";
                $to_print_stream_ctr +=1;           
            }
        
        }
        //End of Top Stream printing to PDF - 21 Jan 2022
         echo "Client Code :".$code."<br>";
         $p_ct =0;


        $arr_professions_final = [];
        foreach($arr_professions as $k=>$v)
        {
            $cluster = $v[0];
            $reco = $v[1];
            $prof = $v[2];
            $_11th = $v[3];
            $edu = $v[4];
            $arr_professions_final[] = [$prof,$cluster,$_11th,$edu,$reco];
        }

        include('Remark.php');
    }
}

}






  
