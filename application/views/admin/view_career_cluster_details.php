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
              <li class="breadcrumb-item">
                <a href="<?php echo base_url("AdminController/dashboard");?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Career Cluster Details List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
      <?php
        $msg = $this->session->flashdata('msg');
        if($msg !=""){
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
              <h3 class="card-title">Reseller List</h3>
            </div> 
            <div class="card-body table-responsive p-0">
              <table class="table table-bordered text-nowrap table-responsive" id="example1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Source</th>
                    <th>Profession Id</th>
                     <th>Cluster</th> 
                     <th>Path</th> 
                     <th>Standard Title</th> 
                     <!--<th>Desc</th>     -->
                    <!-- <th>Std Stream CBSE</th>     -->
                    <!--<th>Preferred Electives</th>    -->
                    <!-- <th>Higher Education</th>     -->
                    <!--<th>Zone</th>    -->
                    <th>Action</th>    
                  </tr>
                </thead>
                <tbody>    
                  <?php
                   if( !empty( $list ) ){
                     foreach ($list as $key => $row) 
                     {
                      extract( $row );
                 ?>
                  <tr>
                      <td> <?= $key +1?> </td>
                       <td> <?= ucwords($Source)?> </td> 
                      <td> <?= ucwords($profession_id)?> </td>
                      <td> <?= ucwords($Cluster)?> </td>
                       <td> <?= ucwords($Path)?> </td> 
                       <td> <?= ucwords($standard_title)?> </td> 
                       <!--<td> <?= ucwords($Desc)?> </td> -->
                       <!--<td> <?= ucwords($Std_Stream_CBSE)?> </td> -->
                      <!--<td> <?= ucwords($Preferred_electives)?> </td>-->
                      <!-- <td> <?= ucwords($Higher_Education)?> </td> -->
                      <!--<td> <?= ucwords($Zone)?> </td>-->
                      <td>
                        <a class="btn btn-success" title="Edit Detail's" href="<?= base_url() ?>career-library/edit-profession/<?= $id ?>" > Edit </a>
                        <a class="btn btn-info" href="<?php echo base_url('AdminController/status-career-content/'.$id.'/'.($status == 0 ? 1 : 0 )) ?>"><?= $status == 1 ? 'Deliver' : 'Draft' ?></a>
                        <a class="btn btn-danger" title="Delete" href="<?= base_url() ?>AdminController/delete-cluster-detail/<?= $id ?>" > Delete </a>
                      </td>
                  </tr>  
                <?php 
                   }
                }
                else{
                ?>
                  <tr>
                    <td colspan="12" class="text-center" > No Data Found </td>
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