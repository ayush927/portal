<style>
  a{color:black}
  
  .profile-box img{
    width: 8rem;
    height: 6.5rem;
    object-fit: contain;
    margin: 10px;
  }

  .border-round{
    border:1px solid #fc9928;
  }

  .color-b{
    background-color:#fc9928;
    color:white;
  }

  /* .btn-my {
    color: #fc9928;
    border-color: #fc9928;
  } */
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

  .hover-effect:hover{
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
  }
</style>
<body class="hold-transition login-page">
<?php 

    // echo "<pre>";
    // print_r($q->result());
    // echo "</pre>";
    // die;
    $seg2 = $this->uri->segment(2);
    $sol_a = explode("_",$seg2)[0];
    $part = $this->uri->segment(3);
    $field = $seg2.$part;
    $tbl_asmt = $this->config->item('asmt_map')['sol_tbl'][$sol_a][$part];
    //echo $tbl_asmt."<br>";die();
    $options_within = $this->config->item('asmt_map')['sol_tbl']['all_options'][$tbl_asmt]['within'];
    //echo $options_within;
    if(!$options_within)
    {   $field_opt = $this->config->item('asmt_map')['sol_tbl']['all_options'][$tbl_asmt]['opt'];
        
    }
    else
    {
        $field_opt = $this->config->item('asmt_map')['sol_tbl']['all_options'][$tbl_asmt]['opt'];
    }
    // print_r($field_opt)."<br>";
    // die;
    $tbl_opt = 'assessment_options';
    $this->db->where('solution',$field);
    $detail = $this->db->get('solution_instruction')->row();
?>
    <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-white" style="padding: 6px 0.5rem;border-bottom: 1px solid #dee2e6;">
      <div class="container-fluid">
        <!-- instruction modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Instruction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php echo $detail->detail_instruction; ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-my" data-dismiss="modal">Close</button>
                   
                  </div>
                </div>
              </div>
            </div>
        <div class="row mb-2">
            
          <div class="col-sm-6">
          <h1 class="m-0 pt-2" style="font-size: 1.2em;"><?php echo $detail->top_display; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-sm btn-my mt-1" data-toggle="modal" data-target="#exampleModalLong">
              Read insturction
            </button>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
          <div class="col-md-6">

            <!-- Profile Image -->
            <div class="bg-white rounded border-round shadow mt-4">
                <div class="card-body box-profile">
                <h3 class="profile-username text-center"><!--Part 1-->
                </h3>
                <?php 
                    $msg = $this->session->flashdata('msg');
                    if($msg !="")
                    {
                    ?>     
                    <div class="alert alert-danger">
                        <?php echo $msg; ?>
                    </div>
                    <?php 
                    }
                     $msg2 = $this->session->flashdata('msg2');
                    if($msg2 !="")
                    {
                    ?>
                    <div class="alert alert-success">
                    <?php echo $msg2; ?>
                    </div>
                    <?php 
                    }
                    ?> 
               

      <form action="" method="post">
      <div class="col-sm-12">
            <div class="card card-solid shadow">
                <div class="card-body pb-0">
                <div class="form-group"><p class="bm-0 top-discription">
                <?php echo $detail->top_discription; ?>
                  </p>
                </div>
            <!-- /.card-body -->
                </div>
            </div>
        </div>
            <?php 
            // echo "<pre>";
            // print_r($q->result());die();
              $i = 1;
                foreach($q->result() as $q)
                {
                  
            ?>
            <div class="col-sm-12">
            <div class="card card-solid hover-effect">
            <div class="card-body pb-0">
            <div class="form-group">

           <p><b>
               
            <?php
            $grp=null;
            if(isset($q->grp)){
                if($q->grp =='SA')
                {
                    ?>
                    <h5>Please choose the correct 3-D object into which the 2-D image shown in the question can be folded ?</h5>
                    <?php
                }
                
                else if ($q->grp =='OM')
                {
                    ?>
                     <h5>Please select the option with shape identical to the shape in question</h5>
                    <?php
                }
            
            }
            ?>
               
            <?php 
            //echo 'Q. '.$q->qno.'. '.$q->question;
           $q_data=explode("/",$q->question);
           if($q_data[0]=='uploads'){?> <img src=<?php echo base_url().$q->question; ?> > <?php }else{ echo $q->question; }
           
            
              ?>
                
              </b></p>
        </div>
        <?php
        if($options_within)
        {
            
            foreach($field_opt as $v)
            {
                if($q->$v != null)

                { 
                     $ex_data=explode("/",$q->$v);
                //     print_r($ex_data[0]);
                // die();

                    if($ex_data[0]=='uploads'){?>
                    
                     <div class="icheck-success">
                        <input type="radio" name="<?php echo 'radio'.$i; ?>" value='<?php echo $v; ?>' 
                        id="<?php echo $q->qno.'o'.$v; ?>">
                                  <label for="<?php echo $q->qno.'o'.$v; ?>"> </label>
                                  <img src=<?php echo base_url().$q->$v; ?> >
                                  
                    </div>
                    
                    
                    <?php }else {?> 
                    
                    
                     <div class="icheck-success">
                        <input type="radio" name="<?php echo 'radio'.$i; ?>" value='<?php echo $v; ?>' 
                        id="<?php echo $q->qno.'o'.$v; ?>">
                                  <label for="<?php echo $q->qno.'o'.$v; ?>"> </label>
                                  <?php
                                  echo $q->$v; ?>
                               
                             
                    </div>
                    
                    
                    
                    <?php } ?>
                    
                   
                    
                    <?php
                }
              
            }
        }
        elseif(!($options_within))
        {
        ?>
            
            <div class="form-group clearfix">
                <?php 
                            // $assessment = 'uce_part1_1';
                    $this->db->where('assessment',$field_opt);
                    $qd = $this->db->get($tbl_opt);
                    foreach($qd->result() as $qd)
                    {
                ?>
                    <div class="icheck-success">
                        <input type="radio" name="<?php echo 'radio'.$i; ?>" value='<?php echo $qd->value; ?>' id="<?php echo $q->qno.'o'.$qd->value; ?>">
                                  <label for="<?php echo $q->qno.'o'.$qd->value; ?>">
                                <?php echo $qd->options; ?>
                              </label>
                    </div>
                <?php 
                    }
                ?>
                        
            </div>
          <?php
          }
          ?>
        </div>
        </div>
    </div>         <!-- radio -->
                    
                  <?php 
                  $i++;
        }
        ?>
        <div class="row">
            <div class="col-8">
            </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="saveBtn" name="saveBtn" class="btn btn-my btn-block">Save & Next</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
           
            <!-- /.card -->
          </div>
         
        </div>
        <!-- /.row -->

               

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
