<?php

    $user = $this->session->userdata('user');
    $email=$user['email'];        
    $allowed_services = explode(",",$data['reseller_sp']['allowed_services']);
    $assessment_expiry_window = $data['reseller_sp']['assessment_expiry_window'];
    $expiry_applicable_to = explode(",",$data['reseller_sp']['expiry_applicable_to']);
?>
<style>
  html{
    scroll-behavior: smooth;
  }
  a{color:black;}
  .title-ass{font-size:1.3rem;}
  .bg-card .card-header,.btn-primary{
    background-color:#fc9928;
    color:white;
  }
  .btn-primary{
    border:none;
  }
  hr{
    border-top: 1px solid #fc9928;
  }

  .card-title{
    position: relative;
  }

  .rounde-box{
      width: 2.5rem;
      height: 2.5rem;
      border-radius: 100%;
      border: 4px solid white;
      line-height: 2rem;
      text-align: center;
      font-weight: bolder;
      position: absolute;
      left: 14.8rem;
      background: #fc9928;
  }

  .btn-my {
      color: #fff;
      background-color: #fc9928;
      border-color: #fc9928;
    }

    .btn-my:hover {
      color: #fff;
      background-color: #fc9928;
      border-color: #fc9928;
    }
    .btn-my:active {
      color: #fff;
      background-color: #fc9928;
      border-color: #fc9928;
    }
</style>
<body class="hold-transition sidebar-mini ">
<div id="modalHomeEvents" class="modal fade" role="dialog">
    <div class="modal-dialog ">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="height:50px;">
        <b>Service Details</b>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
    
        <input type="hidden" name="eventId" id="eventId"/>
          <span id="idHolder"></span> 
            
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
<div class="wrapper">
<div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-3 bg-white" style="padding: 6px 0.5rem;border-bottom: 1px solid #dee2e6;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 pt-2" style="font-size: 1.2em;">Solutions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'BaseController/request_code'; ?>">Purchase code</a></li>
              <li class="breadcrumb-item">Take Assessment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
      <?php 
      $this->load->helper('check_expiry_helper');
        $msg = $this->session->flashdata('msg');
        if($msg !="")
        {
  ?>     
    <div class="alert alert-success">
            <?php echo $msg; ?>
    </div>
    <?php 
}
$email = $user['email'];
?>
  <section class="content">
      <div class="container-fluid">
        <?php 
        $url_msg = $this->session->flashdata("url_msg");
        if(!empty($url_msg)){
          if($url_msg == "view_code"){
            echo '<div class="alert alert-info">
            Take assessment pending
          </div>';
          }
        }?>
      
        <!-- SELECT2 EXAMPLE -->
        <?php
        // echo "<pre>";
        // print_r($s->result_array());
        // echo "</pre>";
        // die;
        ?>
        <?php
        
            // pre( $s->result() );
            // die;
            foreach($s->result() as $row)
            {
                // print_r($row); die();
        ?>
        <div id='<?= $row->code ?>' class="card card-default <?php echo $row->code != $selected ? 'collapsed-card' : '' ?>">
          <div class="card-header">
            <h3 class="card-title">
            <?php
                if( $row->solution == "OCSS" ){
                    echo str_replace("OCSS","Overseas Aspirants",$row->display_solution_name);
                }
                else{
                    if($row->display_solution_name == '' ){
                        echo $row->solution;
                    }
                    else{
                        echo $row->display_solution_name;
                    }
                }
            ?>  Code
            (<?php echo $row->code; ?>)</h3>
            <div class="card-tools">
            <?php
                $checkVariation = getQuery( [ 'where' => [ 'code' =>  $row->code ] , 'table' => 'user_assessment_variation' , 'single'=> true ]);
                if( $row->status == 'Ap' && $row->solution == "UCE" ){
                    if( empty($checkVariation) ){
                      $getVariation = getQuery( [ 'where' => [ 'reseller_id' => $data['reseller_sp']['id'] ] , 'table' => 'reseller_assessment_variation' , 'single' => true ] );
                      if( !empty( $getVariation ) ){
                        $variation = $getVariation['uce_variation'];
                      }
                      else{
                          $variation = 'one';
                      }
            ?>
                      <button type="button" class="btn btn-tool <?= $row->status == 'Ap' ? 'btn-insert-variation' : '' ?>" data-code='<?= $row->code ?>' data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                      </button>
            <?php
                    }
                    else{
                      // echo "2";
                      $variation = $checkVariation['variation'];
            ?>
                      <button type="button"  class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                      </button>
            <?php
                    }
                }
                else{
                    $getVariation = getQuery( [ 'where' => [ 'reseller_id' => $data['reseller_sp']['id'] ] , 'table' => 'reseller_assessment_variation' , 'single' => true ] );
                    $checkVariation = getQuery( [ 'where' => [ 'code' =>  $row->code ] , 'table' => 'user_assessment_variation' , 'single'=> true ]);
                    if( !empty( $getVariation ) ){
                        $variation = $getVariation['uce_variation'];
                    }
                    else{
                        $variation = 'one';
                    }
            ?>
                    <button type="button" class="btn btn-tool <?= empty($checkVariation) ? 'btn-insert-variation' : '' ?>" data-code='<?= $row->code ?>' data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
            <?php
                }
            ?>
            </div>
          </div>
          <!-- /.card-header -->
          
          <div class="card-body" <?php echo $row->code == $selected ? 'style="display: block;"' : '' ?>>
          <div class="row">
          <?php 
                  $fstatus = $row->status;
                  
                  //Sudhir's comment - Below condition needs to be made more robust
                  if($row->name=='' && $row->dob=='')
                  {
                    $lc = 0;
                    // echo "Validation error : Either name or date of birth is blank<br>";
                  }
                  else
                  {
                    $lc = 1;
                  }
                  
                 
              
                //   if($fstatus=='Ap')
                //   {
                    ?>
                    <div class="col-12 mb-2 text-right title-ass pr-3" >Assessment Pending</div>
                   
                   <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card  h-100 bg-card shadow">
                  
                      <div class="card-header">
                        <h3 class="card-title"><?php echo "Update Personal Details";?><div class="rounde-box">1</div></h3>
                       
                      </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Detail</strong>
                <?php 
                    if($lc==0)
                    {
                        // pre( $row , 1 );
                ?>
                    <p class="text-muted">
                       <?= "Please Fill Personal Details First then take assessment"; ?>
                    </p>
                    <hr>
                    <p class="text-muted">
                        <a href="<?php echo base_url().'BaseController/fill_personal_detail/'.base64_encode($row->code); ?>" class="btn btn-my btn-block"><b>Update Details</b></a>
                    </p>
                <?php      
                    }
                    else
                    {
                ?>
                <p class="text-muted">
                   <?= "Detail Filled You can Continue Your assessment"; ?>
                </p>

                <hr>
               
                <p class="text-muted">
                  
                  Personal Details Updated. Update the Other Information to take your assesment.
                </p>
                <?php      
                    }
                ?>
                
                <?php 

                  // code for assesment expiry// By Manoj #start
                  if(in_array('assessment_expiry', $allowed_services) && in_array($row->solution, $expiry_applicable_to))
                  {
                    $start_date = $row->asignment_registration_date;
                    $dateDiff = dateDifference($start_date);
                   
                    if($dateDiff<=$assessment_expiry_window)
                    { 
                    ?>
                    <h5 style="color: red;">
                      <?php echo ($assessment_expiry_window-$dateDiff) . " Days remaining for assessment expiry"; ?>
                    </h5>
                    <?php 
                    }
                    else
                    { 
                    ?>
                    <h5 style="color: red;"><?php echo "Your assessment is expired"; ?></h5>
                    <?php  
                    }
                  } 
                ?>
                <!-- code for assesment expiry// By Manoj #end -->
  


                   
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
            </div>         
             <!-- BLock 2 update other info #start -->   
             <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card  h-100 bg-card shadow">
                      <div class="card-header">
                        <h3 class="card-title">
                            <?= "Update Other Information";?>
                            <div class="rounde-box">2</div>
                        </h3>
                      </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Detail</strong>
                <?php 

                  if($row->aadhar=='' && $row->associate_code=='')
                  {
                    $o_info = 2;
                    // echo "Validation error : Either name or date of birth is blank<br>";
                  }
                  else
                  {
                    $o_info = 1;
                  }
                    if($lc==1 && $o_info == 2)
                    {
                ?>
                <p class="text-muted">
                   <?php echo "Please Fill Other Information First then take assessment"; ?>
                </p>

                <hr>
               
                <p class="text-muted">
                  
                  <a href="<?php echo base_url().'BaseController/fill_other_personal_detail/'.base64_encode($row->code); ?>" class="btn btn-my btn-block"><b>Update Other Info</b></a>
                </p>
                <?php      
                    }
                    else
                    {
                ?>
                <p class="text-muted">
                   <?php echo "Detail Filled You can Continue Your assessment"; ?>
                </p>

                <hr>
               
                <p class="text-muted">
                  
                  Other Information Updated. You can take your assesment
                </p>
                <?php      
                    }
                ?>
                
               
                 <!-- BLock 2 update other info #end --> 
  


                       
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
            </div>       
            
                    <?php
                  $i = 1;
                  $step_no = 3;
                  $num = $this->Base_model->solution_list($email,$row->solution,$row->code)->num_rows();
                // echo "No of rows of the solution :".$num.$row->solution.$row->code."<br>";die();
                 
                  $solutions = $this->Base_model->solution_list($email,$row->solution,$row->code);
                //   echo "<pre>";
                //   print_r($solutions->result_array());
                //   echo "</pre>";
                //   die;
                  foreach($solutions->result() as $part)
                  {
                      /*
                      echo "<br><pre>";
                      print_r($part);
                      */
            ?>
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
          <div class="card  h-100 bg-card shadow">
          
              <div class="card-header ">
                <h3 class="card-title"><?php echo $part->dis_solution; ?><div class="rounde-box"><?php echo $step_no++;?></div></h3>
                
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Detail</strong>

                <p class="text-muted">
                <?php echo $part->details; ?>
                </p>

                <hr>
                <?php 
                    $status = $part->status;

                      if($status=="Ap")
                      {                 
                ?>
                <strong><i class="fas fa-info-circle mr-1"></i> Status</strong>
                <p class="text-muted">
                    Assessment Pending 
                </p>
                <hr>
                <?php 
                      if($i!=100 && $lc!=0)
                      {
                        for($j=1;$j<=$num;$j++)
                        {
                          if($j==$i)
                          {
                  ?>
                          <p class="text-muted">



                <?php //if($dateDiff<8){ ?>


                  <?php 

                    // code to disable take assesment after assesment expiry#start
                    if(in_array('assessment_expiry', $allowed_services) && in_array($row->solution, $expiry_applicable_to))
                    {
                      $start_date = $row->asignment_registration_date;
                      $dateDiff = dateDifference($start_date);
                    
                      $partLink = $part->link;
                      if($dateDiff<=$assessment_expiry_window)
                      {
                        if( $row->solution == "UCE" ){

                      ?>
                          <a id='<?= $row->code ?>' data-part='<?= $partLink ?>' href="<?php echo base_url().( $variation == 'two' ? 'assessment_variations' : 'BaseController' ).'/'.$part->link.'/'.base64_encode($row->code); ?>" class="btn btn-my btn-block"><b>Take Assessment</b></a>
                          <?php
                        }
                      else{
                      ?>
                          <a id='<?= $row->code ?>' data-part='<?= $partLink ?>' href="<?php echo base_url().'BaseController'.'/'.$part->link.'/'.base64_encode($row->code); ?>" class="btn btn-my btn-block"><b>Take Assessment</b></a>
                      <?php
                        }  
                      }
                      else
                      { 
                      ?>
                          <button class="btn btn-my btn-block"><b>Expired</b></button>
                      <?php  
                      }
                    } 
                    else{  
                          $partLink = $part->link;
                          if( $row->solution == "UCE" ){

                      ?>
                          <a id='<?= $row->code ?>' data-part='<?= $partLink ?>' href="<?php echo base_url().( $variation == 'two' ? 'assessment_variations' : 'BaseController' ).'/'.$part->link.'/'.base64_encode($row->code); ?>" class="btn btn-my btn-block"><b>Take Assessment</b></a>
                          <?php
                        }
                        else{
                      ?>
                          <a id='<?= $row->code ?>' data-part='<?= $partLink ?>' href="<?php echo base_url().'BaseController'.'/'.$part->link.'/'.base64_encode($row->code); ?>" class="btn btn-my btn-block"><b>Take Assessment</b></a>
                      <?php
                        }
                      }
                  ?>
                <!--code to disable take assesment after assesment expiry #end-->



                 
                 <!--  <a href="<?php //echo base_url().'BaseController/'.$part->link.'/'.base64_encode($row->code); ?>" class="btn btn-my btn-block"><b>Take Assessment</b></a> -->
                   
                <?php //}else{ ?>
                 <!--  <h5 style="color: red;"><?php //echo "Your assessment is expired"; ?></h5> -->
                <?php  //}  ?>

         
                            <!-- <a href="<?php //echo base_url().'BaseController/'.$part->link.'/'.base64_encode($row->code); ?>" class="btn btn-my btn-block"><b>Take Assessment</b></a> -->
                          </p>
                      <?php
                          $i=100;
                          }
                        }
                      }
                      else
                      {
                        echo '<p class="text-muted">';
                        echo "<b>Assessment Locked</b>";
                        echo '</p>';
                      }
                     
                    }
                    else
                    {
                      $i++;
                       ?>
                        <strong><i class="fas fa-info-circle mr-1"></i> Status</strong>
                        <p class="text-muted">
                                              Assessment Completed 
                            </p>
                        <hr>
                        <p class="text-muted">
                          <b>Take next Assessment</b>
                        </p>
                <?php
                    }
                    
                ?>


                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
            </div>
          
           <?php 
                  }  
                  $i = 1;            
           ?>
            <!-- /.row -->



             <!-- Download report block #start -->   
             <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card  h-100 bg-card shadow">
                    <div class="card-header">
                      <h3 class="card-title"><?php echo "Download Report";?><div class="rounde-box">11</div></h3> 
                    </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Detail</strong>
                <?php 
                    if($lc==0)
                    {
                ?>
                <p class="text-muted">
                   <?php echo $reportData['report_message']; ?>
                </p>

                <hr>
               
                <!--<p class="text-muted">-->
                  
                <!--  <a href="<?php echo base_url().'BaseController/download_report/'.$row->code; ?>" class="btn btn-my btn-block"><b>Download Report</b></a>-->
                  
                <!--</p>-->
                <?php      
                    }
                    else
                    {
                ?>
                <p class="text-muted">
                   <?php echo "Click the link below to download report"; ?>
                   
                </p>

                <hr>
               
                <p class="text-muted">
                <?php 
                     $solution = array("OCS", "DOCCP", "OCSS", "DOCCPS", "OCSP", "DOCCPP", "JRAP_");
                        if(in_array($row->solution, $solution)){
                    ?>
                  
                        <a href="<?php echo 'https://faith-n-hope.com/services/reports/'.base64_encode($row->code)."/".base64_encode($email)."/".base64_encode($row->solution); ?>" class="btn btn-my btn-block"><b>Download Report</b></a>
                <?php 
                    }
                    else{
                ?>
                  <!-- <a href="#" class="btn btn-my btn-block"><b>Download Report</b></a> -->
                <?php
                    if($row->status !=='Ap'){
                      if(in_array($row->solution, $selected_services)){
                        $where = "code='$row->code' AND status=1";
                        $this->db->where($where);
                        $reportStatus =  $this->db->get('report_request')->row_array();
                        // pre(  $reportStatus , 1 );
                        // pre( $reportStatus );
                        if( !empty($reportStatus) ){
                              if( $reportStatus['saved_folder'] == 'dev' ){
                                $url = 'https://users.respicite.com/dev';
                              }
                              else{
                                $url = 'https://users.respicite.com';
                              }
                                // if( !empty($reportControl) ){
                                    if( $reportStatus['status'] == 1 ){
                                        if( $reportStatus['mannual_status'] == 1 ){
                        ?>
                                          <a class="btn btn-my btn-block" target='_black'  href="<?= $url.'/assets/report-pdf/'.$reportStatus['file_name']; ?>">View Report</a><br>
                        <?php
                                          $getRateAssessment = getQuery( [ 'where' => [ 'assessment_code' => $row->code ] , 'table' => 'user_book_appointment' , 'single' => true] );
                                      
                        ?>
                                          <a class="btn btn-my btn-block" <?= !empty( $getRateAssessment ) ? 'style="pointer-events: none;"' : '' ?>  href='<?= base_url() ?>baseController/rating-review/<?= $row->code ?>/service' ><?= !empty( $getRateAssessment ) ? 'Assessment Rated' : 'Rate Assessment' ?></a>
                        <?php
                                        }
                                        else{
                                            echo $reportData['report_message'];
                                        }
                                    }
                                    else{
                        ?>
                                        <a class="btn btn-my btn-block" target='_black' href="<?= $url.'/assets/report-pdf/'.$reportStatus['file_name']; ?>">View Report</a><br>
                                        <a class="btn btn-my btn-block" href='<?= base_url() ?>baseController/rating-review/<?= $row->code ?>/service' >Rating & Review</a><br>
                        <?php
                                    }
                                // }
                                // else{
                                //     echo $reportData['report_message'];
                                // }
                            }
                            else{
                                echo $reportData['report_message'];
                            }
                            if( in_array( 'counselling' , explode( ',' , $data['allowed_services'] ) ) ){
                        ?>
                                <a class="btn btn-my btn-block" href='https://calendly.com/respicite/45-minutes-for-default' >Book Appointment</a>
                        <?php
                            }
                        }
                        else{
                            // echo "Hello2";
                    ?>
                        <a href="<?php echo base_url().'OtherAjax/download_report.php?code='.base64_encode($row->code); ?>" class="btn btn-my btn-block"><b>Download Report</b></a>    
                    <?php
                            if( in_array( 'counselling' , explode( ',' , $data['allowed_services'] ) ) ){
                        ?>
                              <a class="btn btn-my btn-block" class= href='https://calendly.com/respicite/45-minutes-for-default' > Book Appointment</a>
                        <?php
                            }   
                        }
                    }
                    else{
                    ?>
                    <!--<a href="<?php //echo base_url().'OtherAjax/download_report.php?code='.base64_encode($row->code); ?>" class="btn btn-my btn-block"><b>Download Report</b></a>-->
                    <p class="text-muted">
                       <?php echo "Kindly Complete the Assesment to download report."; ?>
                    </p>
                 <?php      
                    }
                    
                }
                ?>
                </p>
                <?php      
                    }
                ?>
                     
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
            </div>    
              <!-- Download report block #end -->   

            <?php if($row->solution=='OCSP' || $row->solution=='DOCCPP'){ ?>
              <!-- Book Counseling block #start -->   
             <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card  h-100 bg-card shadow">
                  
                    <div class="card-header">
                      <h3 class="card-title"><?php echo "Book Counseling";?><div class="rounde-box">12</div></h3> 
                    </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Detail</strong>
                <?php 
                    //if($lc==0)
                    //{
                ?>
               <!--  <p class="text-muted"> -->
                   <?php //echo "Click on the link below to book your counseling"; ?>
               <!--  </p>

                <hr>
               
                <p class="text-muted"> -->
                  
                 <!--  <a href="<?php //echo base_url().'BaseController/counselingParameters/' ?>" class="btn btn-my btn-block"><b>Book Counseling</b></a> -->
                <!-- </p> -->
                <?php      
                    //}
                   // else
                    //{
                ?> 
                <p class="text-muted">
                   <?php echo "Book your counseling"; ?>
                </p>

                <hr>
               
                <p class="text-muted">
             
                  <?php if($row->report_status==1) {?>
                        
                            <a href="https://calendly.com/iquery-demo/45-minute-meeting?month=2022-11" class="btn btn-my btn-block"><b>Book Counseling</b></a>
                        <?php } ?>
                  
                </p>
                <?php      
                    //}
                ?>
                     
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
            </div>    
              <!-- Book Counseling block #end -->  
            <?php } ?>
           
        <?php 
            //   }
            //   else if($fstatus=="Rp")
            //   {
                ?>
                
                <!--<div class="card  col-12 h-100">-->
                <!--<div class="card-footer">-->
                
                <!--<div class="row"><div class="col-12">Assessment Completed</div></div>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="card  col-12 h-100">-->
                <!--<div class="card-footer">-->
                
                <!--<div class="row"> -->
                <!--  <div class="col-6">Report Pending</div> -->
                  <!--<div class="col-6" align="right"><a href="<?php //echo base_url().'OtherAjax/download_report.php?code='.base64_encode($row->code); ?>">Download Report</a></div>-->
                  
                  <?php 
                      //if($row->solution == 'OCS'){ ?>
                            <!--<div class="col-6" align="right"><button onclick="window.open('https://faith-n-hope.com/services/reports','_blank')" class="btn btn-sm btn-outline-primary btn-open-modal view-report">Download Report</button></div>-->
                     <!--       <div class="col-6" align="right"><a href="<?php //echo 'https://faith-n-hope.com/services/reports/'.base64_encode($row->code)."/".base64_encode($email); ?>" _blank>Download Report</a></div>-->
                        
                        <?php //}elseif($row->solution == 'DOCCP'){ ?>
                     <!--       <div class="col-6" align="right"><a href="<?php //echo 'https://faith-n-hope.com/services/reports/'.base64_encode($row->code)."/".base64_encode($email); ?>" _blank>Download Report</a></div>-->
                     <?php //} else{ ?>
                     <!--       <div class="col-6" align="right"><a href="<?php //echo 'https://faith-n-hope.com/services/reports/'.base64_encode($row->code)."/".base64_encode($email); ?>">Download Report</a></div>-->
                         
                    <?php //}
                   ?>



                  </div>
                
                </div>

                </div>
                
                <?php 
              
              }
            //   echo "Hello";
            //   die;
              ?>

              </div>
          
          <!-- /.card-body -->
          
          </div>
         
        </div>
       <?php 
           // }
        ?>



      <?php
      //  function dateDifference($start_date){
      //     $date= date_create(date('d-m-Y H:i:s'));
      //     $end_date = date_format($date, 'd-m-Y H:i:s');
      //     // calulating the difference in timestamps 
      //     $diff = strtotime($start_date) - strtotime($end_date);
      //     return ceil(abs($diff / 86400));
      // }  

      ?>     
       
        </div>
  </section>
        <script
  src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  
    <script>
        $(document).on("click", ".open-homeEvents", function () {
            var eventId = $(this).data('id');
            $.ajax({
                type : 'post',
                url : '<?php echo base_url()."OtherAjax/fetch_record.php"; ?>', //Here you will fetch records 
                data :  'rowid='+ eventId, //Pass $id
                success : function(data){
                    $('#idHolder').html(data);//Show fetched data from database
                }
            });
        });
        var base_url = '<?= base_url() ?>';
        
        $(document).on("click", ".btn-insert-variation", function () {
            var code = $(this).data('code')
            // console.log( code );
            var codeElement = document.getElementById(code);
            $.ajax({
                type : 'post',
                url : '<?php echo base_url()."baseController/variation-update/"; ?>'+code,
                success : function(data){
                    var response = JSON.parse(data);
                    if( response.status == 'success' && response.variation == 'two' ){
                        codeElement.href = base_url+'assessment_variations/'+codeElement.getAttribute('data-part')+'/'+btoa(code);
                    }
                }
            });
     
        });

  
    </script>

    <?php
      if( $selected != null ){
    ?>
      <script>
          const code = document.getElementById("<?= $selected ?>");
          code.scrollIntoView();
      </script>
    <?php
      }
    ?>