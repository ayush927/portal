<?php
    // extract( $logindata );
    // echo "<pre>";
    // print_r( $logindata );
    // die;
?>
<style>
    fieldset {
    	border-radius: 4px;
        border: 1px solid #4e4e4e;
    }

    legend {
    	background-color: #fff;
    	border: 1px solid #ddd;
    	border-radius: 4px;
    	color: var(--purple);
    	font-size: 17px;
    	font-weight: bold;
    	padding: 3px 5px 3px 7px;
    	width: auto;
    }
</style>
<body class="hold-transition login-page">
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-3 bg-white" style="padding: 6px 0.5rem;border-bottom: 1px solid #dee2e6;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 pt-2" style="font-size: 1.2em;color: #7f7f7f;">Report Setting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item">
                <a href="<?php echo base_url("AdminController/dashboard");?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Report Setting</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
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
                <form action="<?= base_url() ?>AdminController/add-report-data" method="post" enctype='multipart/form-data' >
                    <fieldset class="p-3">
                        <legend>Report Setting</legend>
                        <div class="form-group">
                            <label>Response Message</label>
                            <input type='text' name='report_message' class='form-control' value= "<?= $reportData['report_message'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Report Ready Message</label>
                            <input type='text' name='report_ready' class='form-control' value= "<?= $reportData['report_ready'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Report Deleted Msg</label>
                            <input type='text' name='report_deleted' class='form-control' value= "<?= $reportData['report_deleted'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Report Store Days</label>
                            <input type='text' name='report_duration' class='form-control' value= "<?= $reportData['report_duration'] ?>">
                        </div>
                    </fieldset>
                  <div class="row">
                    <div class="col-8"></div>
                    <!-- /.col -->
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>