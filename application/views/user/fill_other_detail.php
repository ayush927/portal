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
</style>
<body class="hold-transition login-page">
<?php
    $last = $this->uri->total_segments();
    $record_num = $this->uri->segment($last);
    $code = base64_decode($record_num);
    $email = $user['email'];
    
    $this->db->where('code',$code);
    $rs = $this->db->get('user_code_list')->row();
    $sol = $rs->solution;
    
    //echo "solution".$sol;die();
?>


    <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-3 bg-white" style="padding: 6px 0.5rem;border-bottom: 1px solid #dee2e6;">
      <div class="container-fluid">
        <div class="row mb-2">
            
          <div class="col-sm-6">
            <h1 class="m-0 pt-2" style="font-size: 1.2em;">Update Other Details </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gender
              </li> -->
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
            <div class="bg-white rounded border-round shadow">
                <div class="card-body box-profile">
                <h3 class="profile-username text-center mb-4">Update Other Details</h3>
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
                             <div class="form-group">
                               <label for="dt">Aadhar Number ( Optional ) </label>
                              <input type="text" name="aadhar" class="form-control" placeholder="Example - 123456789012">
                               <p class="invalid-feedback"><?php echo strip_tags(form_error('aadhar')); ?></p>
                            </div>
                              <div class="form-group">
                                <label for="dt">Associate Code ( Ignore if you are not aware of the same ) </label>
                                <select class="form-control" name="associate_code" id="gender" required>
                                        <option value="-1">Not Applicable</option>
                                  <?php foreach($associates as $row){ ?>
                                        <option value=<?php echo $row->code; ?>><?php echo ($row->email ? $row->email: 'N/A')." [".$row->code."]"; ?></option>
                                  <?php } ?>
                                </select>
                                <p class="invalid-feedback"><?php echo strip_tags(form_error('associate_code')); ?></p>
                            </div>
                            <div class="form-group">
                                <label for="dt">Preffered Counseling Language</label>
                                 <input type="text" name="language" class="form-control" placeholder="Example - English">
                                 <input type="hidden" name="code" value="<?php echo $code; ?>">
                                 <input type="hidden" name="solution" value="<?php echo $sol; ?>">
                                 <p class="invalid-feedback"><?php echo strip_tags(form_error('language')); ?></p>
                            </div>
                            <?php if($sol=='APE'){ ?>
                            <div class="form-group">
                                <label for="dt">Indicate Family Type</label>
                                 
                                 <select name="nature_of_family" required class="form-control">
                                     <option>Select </option>
                                     <option value="Nuclear">Nuclear</option>
                                     <option value="Joint">Joint</option>
                                 </select>
                                 <p class="invalid-feedback"><?php echo strip_tags(form_error('language')); ?></p>
                            </div>
                            <div class="form-group">
                                <label for="dt">Have you taken our PPE solution earlier ?</label>
                                <select name="solutions_taken" required class="form-control">
                                     <option>Select </option>
                                     <option value="Yes">Yes</option>
                                     <option value="No">No</option>
                                 </select>
                                 <p class="invalid-feedback"><?php echo strip_tags(form_error('language')); ?></p>
                            </div>
                            <?php } ?>
                            
                            <?php if($sol=='JRAP_V2'){ ?>
                            <div class="form-group">
                                <label for="dt">Select Cluster</label>
                                 <select name="cluster" required onchange="clusterChange()" id="cluster" class="form-control">
                                        <option>Select Cluster</option>
                                     <?php foreach($cluster as $key=>$val){ ?>
                                         <option value="<?php echo $val->Cluster; ?>"><?php echo $val->Cluster; ?></option>
                                        
                                     <?php } ?>
                                 </select>
                                 <p class="invalid-feedback"><?php echo strip_tags(form_error('cluster')); ?></p>
                            </div>
                            <div class="form-group">
                                <label for="dt">Path</label>
                                <select name="path" onchange="PathChange()" id="path" required class="form-control">
                                     <option>Select Cluster First</option>
                                    
                                 </select>
                                 <p class="invalid-feedback"><?php echo strip_tags(form_error('path')); ?></p>
                            </div>
                            <div class="form-group">
                                <label for="dt">Profession</label>
                                <select name="profession" id="profession" required class="form-control">
                                     <option>Select Path First</option>
                                    
                                 </select>
                                 <p class="invalid-feedback"><?php echo strip_tags(form_error('profession')); ?></p>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-8">
                                </div>
                              <!-- /.col -->
                              <div class="col-4">
                                <button type="submit" id="saveBtn" name="saveBtn" class="btn btn-my btn-block">Save</button>
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
  <script>
      document.addEventListener('DOMContentLoaded', function () {
       clusterChange();
       PathChange();
    //   areaChange();
    //   statusChange();
   });
   
   function clusterChange(){
     var cluster_name = document.getElementById("cluster").value;
     var API_URL = "<?php echo base_url(); ?>/BaseController/get_path_by_cluster/"
    if(cluster_name){
       $.get([API_URL].join(), {cluster_name:cluster_name}).done(function(response){
               //$('#loader').hide();
               $('select#path').html(response);
               //$('select#rank_weekof_date').html(response);
           }).fail(function(){
               alert('This is embarrassing. An error has occurred. Please check the log for details');
           });
   }
   }
   
   
   function PathChange(){
     var path_name = document.getElementById("path").value;
     var API_URL = "<?php echo base_url(); ?>/BaseController/get_profession_by_path/"
    if(path_name){
       $.get([API_URL].join(), {path_name:path_name}).done(function(response){
               //$('#loader').hide();
               $('select#profession').html(response);
               //$('select#rank_weekof_date').html(response);
           }).fail(function(){
               alert('This is embarrassing. An error has occurred. Please check the log for details');
           });
   }
   }
  </script>
