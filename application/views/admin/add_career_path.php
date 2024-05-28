<body class="hold-transition login-page">
    <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-3 bg-white" style="padding: 6px 0.5rem;border-bottom: 1px solid #dee2e6;">
      <div class="container-fluid">
        <div class="row mb-2">
            
          <div class="col-sm-6">
            <h1 class="m-0 pt-2" style="font-size: 1.2em;color: #7f7f7f;">Add Career Path</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item"><a href="<?php echo base_url("adminController/dashboard");?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Career Path</li>
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
            <div class="card ">
                <div class="card-body box-profile">
                
                <?php
                    $msg = $this->session->flashdata('msg');
                    if($msg != "")
                    {
                        echo "<div class='alert alert-success'>$msg</div>";
                    }
                    
                ?>
                <form action="<?= base_url() ?>career-library/submit-cluster-path" method="post">
                <?php
                        if(isset($edit))
                        {
                    ?>
                        <input type='hidden' name='id' value='<?= $edit['id'] ?>' >
                    <?php
                        }
                ?>
                
                    <div class="form-group">
                        <label for="cluster_path">Career Cluster</label>
                        <select class="form-control" id="clusterId"   name="clusterId">
                            <option value=''>Select Cluster</option>
                            <?php
                                if( !empty($list) ){
                                    foreach( $list as $key => $value ){
                            ?>
                                    <option value='<?= $value['id'] ?>' <?= isset($edit) ? ( $edit['clusterId'] == $value['id'] ? 'selected' : '' ) : '' ?> > <?= ucwords($value['clustersName']) ?> </option>
                            <?php
                                    }                                    
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="career_path">Career Path</label>
                        <input type="text" class="form-control" id="career_path" value='<?= isset($edit) ? $edit['career_path'] : '' ?>'  name="career_path">
                    </div>
    
                    <!--<div class="form-group">-->
                    <!--    <label for="cluster_description">Cluster Description</label>-->
                    <!--    <textarea class="form-control" id="cluster_description" name="cluster_description" rows="3" placeholder="Type here..."></textarea>-->
                    <!--</div>-->
    
                    <!--<div class="form-group">-->
                    <!--    <label for="sourceName">Source Name</label>-->
                    <!--    <input type="text" class="form-control" id="sourceName" value='<?= isset($edit) ? $edit['sourceName'] : '' ?>' name="sourceName">-->
                    <!--</div>-->
                    <div class="row">
                      <div class="col-8">
                      </div>
                      <!-- /.col -->
                      <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block"><?= isset($edit) ? 'Edit' : 'Add' ?> Source </button>
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
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->

               

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  