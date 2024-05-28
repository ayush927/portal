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
            <h1 class="m-0 pt-2" style="font-size: 1.2em;color: #7f7f7f;">Login Page Degisn</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item">
                <a href="<?php echo base_url("AdminController/dashboard");?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Login Page Design</li>
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
                <form action="<?= base_url() ?>AdminController/add-login-form-detail" method="post" enctype='multipart/form-data' >
                  <input type='hidden'  value='<?= $type ?>' name='design_type' />
                  <div class="form-group">
                    <label for="cluster_name">Background Type</label>
                    <select name="background_type" id='background_type' class="form-control" required>
                        <option value=''>Select Type</option>
                        <option value='1' <?=  $logindata[0]['column'] == 'background_type' ?  ( $logindata[0]['value'] == 1  ? 'selected' : '' ) : ''  ?> >Image</option>
                        <option value='2' <?=  $logindata[0]['column'] == 'background_type' ?  ( $logindata[0]['value'] == 2  ? 'selected' : '' ) : ''  ?>  >Color</option>
                    </select>
                  </div>
                  <?php
                  if( $logindata[0]['column'] == 'background_type' ) {
                    if($logindata[0]['value'] == 1) {
                  ?>
                      <div class="form-group" id='background_image'>
                        <label>Background Image</label>
                        <input type='file' name='background_image' class='form-control' >
                      </div>
                      <div class="form-group d-none" id='background_color' >
                        <label>Background Color</label>
                        <input type='color' name='background_color' value='<?= $logindata[2]['value'] ?>' class='form-control' >
                      </div>
                  <?php
                    }
                    else{
                  ?> 
                      <div class="form-group d-none" id='background_image'>
                        <label>Background Image</label>
                        <input type='file' name='background_image' class='form-control' >
                      </div>
                      <div class="form-group" id='background_color' >
                        <label>Background Color</label>
                        <input type='color' name='background_color' value='<?= $logindata[2]['value'] ?>' class='form-control' >
                      </div>
                  <?php
                    }
                  }
                  else{
                  ?>
                    <div class="form-group d-none" id='background_image'>
                        <label>Background Image</label>
                        <input type='file' name='background_image' class='form-control' >
                      </div>
                     <div class="form-group d-none" id='background_color' >
                        <label>Background Color</label>
                        <input type='color' name='background_color' value='<?= $logindata[2]['value'] ?>' class='form-control' >
                      </div>
                  <?php
                  }
                  ?>
                    <fieldset class="p-3">
                        <legend>H1 Detail</legend>
                        <div class="form-group">
                            <label>H1 Title</label>
                            <input type='text' name='h1_title' class='form-control' value= "<?= $logindata[3]['value'] ?>">
                        </div>
                        <div class="form-group">
                            <label>H1 Color</label>
                            <input type='color' name='h1_color' class='form-control' value= "<?= $logindata[4]['value'] ?>">
                        </div>
                        <div class="form-group">
                            <label>H1 Font Size</label>
                            <input type='text' name='h1_fontsize' class='form-control' value= "<?= $logindata[5]['value'] ?>">
                        </div>
                    </fieldset>
                    <fieldset class="p-3">
                        <legend>Description Detail</legend>
                        <div class="form-group">
                            <label>Discription</label>
                            <input type='text' name='description' class='form-control' value= "<?= $logindata[6]['value'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Discription Color</label>
                            <input type='color' name='description_color' class='form-control' value= "<?= $logindata[7]['value'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Discription Font Size</label>
                            <input type='text' name='description_color_fontsize' class='form-control' value= "<?= $logindata[8]['value'] ?>">
                        </div>
                    </fieldset>
                    <fieldset class="p-3">
                        <legend>Middle Discription</legend>
                        <div class="form-group">
                            <label>Middle Discription Title</label>
                            <input type='text' name='mh1_title' class='form-control' value= "<?= $logindata[9]['value'] ?>">
                        </div>
                        <div class="form-group">
                            <label>H1 Color</label>
                            <input type='color' name='mh1_color' class='form-control' value= "<?= $logindata[10]['value'] ?>">
                        </div>
                        <div class="form-group">
                            <label>H1 Font Size</label>
                            <input type='text' name='mh1_fontsize' class='form-control' value= "<?= $logindata[11]['value'] ?>">
                        </div>
                    </fieldset>
                  <div class="row">
                    <div class="col-8"></div>
                    <!-- /.col -->
                    <div class="col-4">
                      <button type="submit" name="btn_add_cluster" class="btn btn-primary btn-block">Submit</button>
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