<body class="hold-transition sidebar-mini">
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-3" style="padding: 6px 0.5rem;background-color: #ffffff;border-bottom: 1px solid #dee2e6;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 pt-2" style="font-size: 1.2em;color: #7f7f7f;">Associate List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item"><a href="<?php echo base_url("SpController/dashboard");?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Associate List</li>
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
                <h3 class="card-title">Associate List</h3>
                <a class="btn btn-primary" style="float:right;" href="<?php echo base_url('SpController/addAssociate'); ?>">Add Associate</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" style="float:right;margin-right:18px;" data-toggle="modal" data-target="#exampleModal">Select Code</button>
                
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
              
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    
                      <th>S.No</th>
                      <th>Associate Email</th>
                      <th>Associate Type</th>
                      <th>Code</th>
                      <th>Custom Code</th>
                      <th>Action</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i=1;
                    foreach($associate_data as $row){ ?>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo ($row->email ? $row->email : "N/A") ?></td>
                        <td><?php echo $row->associate_type ?></td>
                        <td><?php echo $row->code ?></td>
                        <td><?php echo $row->other_code ?></td>
                        <td><a class="btn btn-primary" href="<?php echo base_url('SpController/editAssociate/'.base64_encode($row->id)); ?>">Edit</a>
                            <a class="btn btn-danger" href="<?php echo base_url('SpController/deleteAssociate/'.base64_encode($row->id)); ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                        </td>
                      </tr>
                    <?php 
                    $i++;
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
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <form action="<?php echo base_url()?>SpController/insert_selected_code" method="post" >
                           
                            <div class="form-group">
                                <label for="report_code">Select Code For Report</label>
                                <select class="form-control" name="selected_code">
                                  <option value="">Select</option>
                                  <option value="Email">Email</option>
                                  <option value="Code">Code</option>
                                  <option value="Custom Code">Custom Code</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-8"></div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button value="Submit" class="btn btn-primary btn-block">
                                        Submit 
                                    </button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
              </div>
             
            </div>
          </div>
        </div>

        
         <!-- jQuery -->
<script src="<?php echo base_url('/assets/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.bundle.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables-responsive/js/dataTables.responsive.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js';?>"></script>
        <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info":false ,
      "autoWidth": false,
      "responsive": true,
    });
  });
  
  
   
</script>