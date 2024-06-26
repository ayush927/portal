<body class="hold-transition sidebar-mini">
<div class="wrapper">
<div class="content-wrapper">
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Configer Link</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('AdminController/update_services_data'); ?>" method="post" id="edit_form">
          <input type="hidden" name="edit_id" id="edit_id" value="">
          <input type="hidden" name="solution" id="solution" value="">
          <div class="form-group">
          <label for="">Configure Link</label>
          <input type="text" name="edit_report" id="edit_reports" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update" id="update">Update</button>
        </form>
      </div>
      </div>
    </div>
    </div>

    <!-- Content Header (Page header) -->
    <section class="content-header mb-3" style="padding: 6px 0.5rem;background-color: #ffffff;border-bottom: 1px solid #dee2e6;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0 pt-2" style="font-size: 1.2em;color: #7f7f7f;">Sp & Reseller List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item"><a href="<?php echo base_url("AdminController/dashboard");?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Sp & Reseller Services List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
      <?php 
        $msg = $this->session->flashdata('msg');
        if($msg !="")
        {
  ?>     
    <div class="alert alert-success">
            <?php echo $msg; ?>
    </div>
    <?php 
      }
?>
  <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sp & Reseller Services List</h3>

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>-->
              </div> 
              <!-- /.card-header -->
              
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10%">Services Name</th>
                      <!-- <th style="width: 10%">Payment Gateways</th> -->
                    </tr>
                  </thead>
                  <tbody>
                  
                                <!-- <td><?php echo $row2['fullname'];?></td>
                                <td><?php echo $row2['email'];?></td>  
                                <td><?php echo $row2['mobile'];?></td>  
                                <td><?php echo $row2['iam'];?></td>   --> 
                                <td>
                                  <a class="btn btn-primary p-1" href="<?php echo base_url()?>/AdminController/allowed_services_update/<?php echo $id; ?>/assessment_expiry" style="white-space: nowrap;text-align: center;" >
                                      <?php $rr = explode(",",$services);
                                      echo (in_array("assessment_expiry", $rr))?'Assessment Expiry Disable':'Assessment Expiry Enable'; ?>
                                  </a><br><br>

                                  <a class="btn btn-primary p-1" href="<?php echo base_url()?>/AdminController/allowed_services_update/<?php echo $id; ?>/other_information"  style="white-space: nowrap;text-align: center;">
                                      <?php $rr = explode(",",$services);
                                      echo (in_array("other_information", $rr))?'Other Information Disable':'Other Information Enable'; ?>
                                  </a><br><br>
                                  <a class="btn btn-primary p-1" href="<?php echo base_url()?>/AdminController/allowed_services_update/<?php echo $id; ?>/notifications"  style="white-space: nowrap;text-align: center;">
                                      <?php $rr = explode(",",$services);
                                      echo (in_array("notifications", $rr))?'Notifications Disable':'Notifications Enable'; ?>
                                  </a><br><br><a class="btn btn-primary p-1" href="<?php echo base_url()?>/AdminController/allowed_services_update/<?php echo $id; ?>/counselling"  style="white-space: nowrap;text-align: center;">
                                      <?php $rr = explode(",",$services);
                                      echo (in_array("counselling", $rr))?'Counselling Disable':'Counselling Enable'; ?>
                                  </a><br><br>
                                  <a class="btn btn-primary p-1" href="<?php echo base_url()?>/AdminController/allowed_services_update/<?php echo $id; ?>/payment_gateways" style="white-space: nowrap;text-align: center;" >
                                      <?php $rr = explode(",",$services);
                                      echo (in_array("payment_gateways", $rr))?'Payment Gateways Disable':'Payment Gateways Enable'; ?>
                                  </a><br><br>
                                  <a class="btn btn-primary p-1" href="<?php echo base_url()?>/AdminController/allowed_services_update/<?php echo $id; ?>/automated_code_approval" style="white-space: nowrap;text-align: center;" >
                                      <?php $rr = explode(",",$services);
                                      echo (in_array("automated_code_approval", $rr))?'Automated Code Approval Disable':'Automated Code Approval Enable'; ?>
                                  </a>
                                  <br><br>
                                  <a class="btn btn-primary p-1" href="<?php echo base_url()?>/AdminController/allowed_services_update/<?php echo $id; ?>/video_conferencing" style="white-space: nowrap;text-align: center;" >
                                      <?php $rr = explode(",",$services);
                                      echo (in_array("video_conferencing", $rr))?'Video Conferencing Disable':'Video Conferencing Enable'; ?>
                                  </a>
                                  <br><br>
                                  <a class="btn btn-primary p-1" href="<?php echo base_url()?>/AdminController/allowed_services_update/<?php echo $id; ?>/overseas_services" style="white-space: nowrap;text-align: center;" >
                                      <?php $rr = explode(",",$services);
                                      echo (in_array("overseas_services", $rr))?'Overseas Services Disable':'Overseas Services Enable'; ?>
                                  </a>&nbsp;<a class="btn btn-primary p-1" href="<?php echo base_url()?>/AdminController/view_service_charge/<?php echo $id; ?>" style="white-space: nowrap;text-align: center;" >Overseas Services View
                                      
                                  </a>
                                  <br><br>
                                  <a class="btn btn-primary p-1" href="<?php echo base_url()?>/AdminController/allowed_services_update/<?php echo $id; ?>/placement_services" style="white-space: nowrap;text-align: center;" >
                                      <?php $rr = explode(",",$services);
                                      echo (in_array("placement_services", $rr))?'Placement Services Disable':'Placement Services Enable'; ?>
                                  </a> 
                                  <br><br>
                                  <a class="btn btn-primary p-1" href="<?php echo base_url()?>/AdminController/allowed_services_update/<?php echo $id; ?>/skill_services" style="white-space: nowrap;text-align: center;" >
                                      <?php $rr = explode(",",$services);
                                      echo (in_array("skill_services", $rr))?'Skill Development Disable':'Skill Development Enable'; ?>
                                  </a>
                                  
                                
                                </td>
                                <!-- <td>
                                  <a class="btn btn-primary p-1" href="<?php echo base_url().'AdminController/delete_services/'.$row2['id'];?>" >Enable
                                  </a>
                                  
                                  
                                
                              </td>  -->   

            </tr>  
               
          </tbody>
                </table>
                
              </div>          
</form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  
<script>
    // function activeDe($coun,$id) {
    //  //alert($id)
              
    //             $.ajax({
    //               url: "<?php echo base_url(); ?>AdminController/allowed_services_update",
    //               type : "POST",
    //               dataType:"json",
    //               data: {
    //                 ids: $id,
    //                 coun : $coun
    //               },
    //               success : function(data)
    //               {
    //                 if(data.responce == "success")
    //                 {
                      
    //                   location.reload(true)
    //                 }
    //                 else
    //                 {
    //                   alert("something went wrong")
    //                 }
    //               }
    //             });
    //         };
//     $(document).ready(function(){
//   $( "#target" ).submit(function( event ) {
//   alert( "Handler for .submit() called." );
//   event.preventDefault();
// });
// });
$(document).on("change","#configer", function(e){
  $( "#target" ).submit();
});
</script>
<script>
$(document).on("click","#edit", function(e){
  e.preventDefault();
  var edit_id = $(this).attr("value");
  if(edit_id==""){
    alert("Edit ID is required");
  }
  else
  {
    $.ajax({
      url: "<?php echo base_url(); ?>AdminController/edit_services",
      type : "POST",
      dataType:"json",
      data: {
        edit_id: edit_id
      },
      success : function(data){
        if(data.responce == "success"){
          $('#editModal').modal('show');
          $("#edit_id").val(data.post.id);
          $("#solution").val(data.post.solution);
          $("#edit_report").val(data.post.no_of_reports);
          $("#edit_mrp").val(data.post.mrp);
          $("#edit_dis").val(data.post.discount);
          $("#edit_discription").val(data.post.discription);
        }
        else
        {
          alert("something went wrong")
        }
      }
    });

  }
});


  
</script>
        