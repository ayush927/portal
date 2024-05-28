<body class="hold-transition sidebar-mini">
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-3" style="padding: 6px 0.5rem;background-color: #ffffff;border-bottom: 1px solid #dee2e6;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0 pt-2" style="font-size: 1.2em;color: #7f7f7f;">Sub Menu List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item"><a href="<?php echo base_url("AdminController/dashboard");?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Pending List</li>
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
          <h3 class="card-title">View Training</h3>
        </div> 
        <!-- /.card-header -->
        
        <div class="card-body table-responsive p-0">
          <table class="table table-bordered text-nowrap">
            <thead>
              <tr>
                <th>S.NO</th>
                <th>Update Code</th>
                <th>Profession Id</th>
                <th>Profession Name</th>
                <!-- <th>Profession Demand</th> -->
              <!--    <th>Controller</th> -->
                <!--   <th>Action</th> -->
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if( !empty( $content )  ){
                foreach ($content as $key => $value) {
                  extract( $value );
              ?>
                  <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= ucwords( $update_code ) ?></td>
                    <td><?= ucwords( $profession_id  ) ?></td>
                    <td><?= ucwords( $profession_name  ) ?></td>
                    <!-- <td><?= ucwords( $profession_demand  ) ?></td> -->
                    <td>
                      <a class="btn btn-primary" href="<?php echo base_url('AdminController/edit-cluster-content/'.$SNo) ?>">Edit</a>
                      <a class="btn btn-info" href="<?php echo base_url('AdminController/status-cluster-content/'.$SNo.'/'.($status == 0 ? 1 : 0 )) ?>"><?= $status == 1 ? 'Deliver' : 'Draft' ?></a>
                      <a class="btn btn-danger" href="<?php echo base_url('AdminController/delete-cluster-content/'.$SNo) ?>" >Delete</a>
                    </td>
                  </tr>
              <?php
                }
              }
              else{
              ?>
                <tr >
                  <td colspan='8' class="text-center">No Data Found</td>
                </tr>
              <?php
              }
              ?>       
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

         <!--Add OMR Template Model Start -->
             <!-- Add OMR Template Model Closed -->