// <?php //echo "<pre>";print_r($landingPages);
// print_r($h->result_array());die;
// ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-3" style="padding: 6px 0.5rem;background-color: #ffffff;border-bottom: 1px solid #dee2e6;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 pt-2" style="font-size: 1.2em;color: #7f7f7f;">Reseller List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item"><a href="<?php echo base_url("AdminController/dashboard");?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Reseller List</li>
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
                <div class="row">
                  <div class="col-md-3">
                    <h3 class="card-title">Reseller List</h3>
                  </div>
                  <div class="col-md-9">
                    <a class="btn btn-primary float-right" href="<?= base_url() ?>AdminController/create-user-link" >Sync Users</a>
                    <a class="btn btn-info float-right" style="margin-right:50px;"  href="<?= base_url() ?>AdminController/create-user-link" >Create Profile Link</a>
                  </div>
                </div>
              </div> 
              <!-- /.card-header -->
              
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered text-nowrap">
                  <thead>
                    <tr>
                    <th>Reseller ID</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Status</th>
                      <th>SEO Inputs</th>
                      <th>Page Status</th>
                      <th>Page Action</th>
                      <th>Action</th>
                      
                     
                    </tr>
                  </thead>
                  <tbody>
                    
                 <?php  
                foreach ($h->result() as $row)  
                {  
                  
                 ?><tr>  
                     <td><?php echo $row->user_id;?></td>  
            <td><?php echo $row->fullname;?></td>  
            <td><?php echo $row->email;?></td>  
            <td><?php echo $row->mobile;?></td>
            <td><?php $status = $row->status;
                if($status=='3')
                {
                  $cst = "active";
                  $ccst = "ACTIVE";
                  echo "INACTIVE";
                }
                else
                {
                  $ccst = "INACTIVE";
                  $cst = "inactive";
                  echo "ACTIVE";
                }
            ?>
            </td>
            <td>
                <a class="btn btn-sm btn-primary" href="<?php echo base_url("AdminController/seo_inputs/$row->id");?>">View</a>
            </td>
            <td>
            <?php $seo_status = $row->seo_status;
                if($seo_status=='inactive')
                {
                  $cst = "active";
                  $ccst = "ACTIVE";
                  echo "INACTIVE";
                }
                else
                {
                  $cst = "inactive";
                  $ccst = "INACTIVE";
                  echo "ACTIVE";
                }
            ?>
            </td>
            <td>
            <div class="form-group">
                            <input type="hidden" name="rid" id='rid<?php echo $row->id; ?>' value="<?php echo $row->id; ?>">
                            <select class="form-control" name="act" id="act<?php echo $row->id; ?>" onchange="changepagestatus(<?php echo $row->id; ?>)">
                            <option value="">Change Status</option>
                              <option value="<?php echo $cst; ?>"><?php echo $ccst; ?></option>
                            </select>
                          </div>
            </td>
                <td>
                    <div class="row">
                        <div class="col-sm-6">
                          <!-- select -->
                          <div class="form-group">
                            <input type="hidden" name="rid" id='rid<?php echo $row->id; ?>' value="<?php echo $row->id; ?>">
                            <select class="form-control" name="act" id="act<?php echo $row->id; ?>" onchange="changeThis(<?php echo $row->id; ?>)">
                            <option value="">Change Status</option>
                              <option value="<?php echo $cst; ?>"><?php echo $ccst; ?></option>
                              <option value="delete">DELETE</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <!-- select -->
                          <div class="form-group">
                            <input type="hidden" name="resellerid" id='resellerid_<?php echo $row->id; ?>'  value="<?php echo $row->id; ?>">  
                            <select class="form-control" name="landing_page" id="landing_page_<?php echo $row->id; ?>" onchange="configLanding('<?php echo $row->id; ?>')">
                            <option value="">config Landing Page</option>
                            <?php  if(isset($landingPages)){ foreach($landingPages as $page) {   
                            if($row->landing_id == $page['id'] ){
                            $selected = "selected";
                            }else{$selected = "";
                            } ?>
                              <option value="<?php echo $page['id']; ?>" <?php echo $selected;?>><?php echo $page['name']; ?></option>
                              <?php  } } ?>
                            </select>
                          </div>
                        </div>
                    </div>
                </td>
                    
            </tr>  
                <?php 
                }  
            ?>  
                      
                    
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
        function changeThis(sender) { 
          var s = sender
          var r = 'rid'.concat(s);
          var a = 'act'.concat(s);
          var rid = document.getElementById(r).value;
	        var act = document.getElementById(a).value;
              if(s=="")
              {
                alert("Something Went Wrong");
              }
              else
              {
                $.ajax({
                  url: "<?php echo base_url(); ?>AdminController/edit_reseller_status",
                  type : "POST",
                  dataType:"json",
                  data: {
                    s: rid,
                    act : act
                  },
                  success : function(data)
                  {
                    if(data.responce == "success")
                    {
                      toastr["success"](data.message)

                      toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": false,
                      "progressBar": true,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                        }
                      location.reload(true)
                    }
                    else
                    {
                      alert("something went wrong")
                    }
                  }
                });

              }
            };
            
        function changepagestatus(sender) { 
          var s = sender
          var r = 'rid'.concat(s);
          var a = 'act'.concat(s);
          var rid = document.getElementById(r).value;
	        var act = document.getElementById(a).value;
              if(s=="")
              {
                alert("Something Went Wrong");
              }
              else
              {
                $.ajax({
                  url: "<?php echo base_url(); ?>AdminController/edit_reseller_page_status",
                  type : "POST",
                  dataType:"json",
                  data: {
                    s: rid,
                    act : act
                  },
                  success : function(data)
                  {
                    if(data.responce == "success")
                    {
                      toastr["success"](data.message)

                      toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": false,
                      "progressBar": true,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                        }
                      location.reload(true)
                    }
                    else
                    {
                      alert("something went wrong")
                    }
                  }
                });

              }
            };
        function configLanding(id) {
          var resellerid = document.getElementById('resellerid_'+id).value;
	        var select = document.getElementById('landing_page_'+id);
           var value = select.options[select.selectedIndex].value;
           //var select =  $("#landing_page option:selected").val();
            console.log(resellerid);
            console.log(value);
              if(resellerid=="" && select=="")
              {
                alert("Something Went Wrong");
              }
              else
              {
                $.ajax({
                  url: "<?php echo base_url(); ?>AdminController/select_landing_page",
                  type : "POST",
                  dataType:"json",
                  data: {
                    resellerid: resellerid,
                    landId : value
                  },
                  success : function(data)
                  {
                      console.log(data.response);
                    if(data.response == "success")
                    {
                      
                      location.reload(true);
                    }
                    else
                    {
                      alert("something went wrong")
                    }
                  }
                });

              }
            };        
        </script>