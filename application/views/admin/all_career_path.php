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
            <h1 class="m-0 pt-2" style="font-size: 1.2em;color: #7f7f7f;">All Career Path</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item"><a href="<?php echo base_url("AdminController/dashboard");?>">Dashboard</a></li>
              <li class="breadcrumb-item active">All Career Path</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <?php 
            $msg = $this->session->flashdata('msg');
            $status = $this->session->flashdata('status');
            if($msg !="")
            {
              ?>     
                <div class="alert alert-<?= $status ?>">
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
                    <h3 class="card-title">All Career Path</h3>
                  </div>
                  <div class="col-md-9">
                    <a class="btn btn-info float-right" style="margin-right:50px;"  href="<?= base_url() ?>career-library/add-career-path" >Add Career Path</a>
                  </div>
                </div>
              </div> 
              <!-- /.card-header -->
              
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered text-nowrap">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Cluster Name</th>
                      <th>Career Path</th>
                      <th>Created Date</th>
                      <th>Updated Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                        if( !empty( $list ) ){
                            foreach ( $list as $key => $row )
                            {
                    ?>
                        <tr>  
                            <td><?= $row['id'];?></td>
                            <td><?= $row['clustersName'];?></td>
                            <td><?= $row['career_path'];?></td>
                            <td><?= date('d-m-Y H:i:s' , strtotime($row['created_date']));?></td>
                            <td><?= $row['modified_date'] != '' ? date('d-m-Y H:i:s' , strtotime($row['modified_date'])) : 'Not Updated';?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?php echo base_url("career-library/edit-career-path/").$row['id'];?>">edit</a>
                                <a class="btn btn-sm btn-danger" href="<?php echo base_url("career-library/delete-career-path/").$row['id'];?>">Delete</a>
                            </td>
                        </tr>  
                    <?php
                            }
                        }
                        else{
                    ?>
                        <tr>
                            <td colspan='6' class='text-center'>No Record Found</td>
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