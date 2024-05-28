<body class="hold-transition login-page">
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-3 bg-white" style="padding: 6px 0.5rem;border-bottom: 1px solid #dee2e6;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 pt-2" style="font-size: 1.2em;color: #7f7f7f;">Add Cluster</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item">
                <a href="
									<?php echo base_url("AdminController/dashboard");?>">Dashboard </a>
              </li>
              <li class="breadcrumb-item active"><?= !isset( $edit ) ? 'Add' : 'Edit' ?> Cluster</li>
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
              <div class="card-body box-profile"> <?php
                    $msg = $this->session->flashdata('msg');
                    if($msg != "")
                    {
                      $status = $this->session->flashdata('status');
                      echo "<div class='alert alert-".($status != '' ? $status : 'success')."'>$msg</div>";
                    }
                ?> <form action="<?php echo base_url('AdminController/insert_career_cluster') ?>" method="post">
                  <?php
                   if( isset( $edit ) ){
                  ?>
                    <input type="hidden" name="id" value="<?= $edit['id'] ?>" >
                  <?php
                   }
                  ?>
                  <div class="form-group">
                    <label for="cluster_name">Source</label>
                    <input type="text" class="form-control" required  value="<?= isset( $edit ) ? $edit['Source'] : set_value('source') ?>" id="source" name="Source" placeholder="Enter Source">
                  </div>
                  <div class="form-group">
                    <label for="profession_id">Profession id</label>
                    <input type="text" class="form-control" required  id="profession_id" value="<?= isset( $edit ) ? $edit['profession_id'] : set_value('profession_id') ?>" name="profession_id" placeholder="Enter Profession ID">
                  </div>
                  <div class="form-group">
                    <label for="Cluster">Cluster</label>
                    <input type="text" class="form-control" required  id="Cluster" value="<?= isset( $edit ) ? $edit['Cluster'] : set_value('Cluster') ?>" name="Cluster" placeholder="Enter Cluster Name">
                  </div>
                  <div class="form-group">
                    <label for="Path">Path</label>
                    <input type="text" class="form-control"   id="Path" name="Path" value="<?= isset( $edit ) ? $edit['Path'] : set_value('Path') ?>" placeholder="Enter Path ID">
                  </div>
                  <div class="form-group">
                    <label for="Preferred_electives">Preferred Electives</label>
                    <input type="text" class="form-control"   id="Preferred_electives" value="<?= isset( $edit ) ? $edit['Preferred_electives'] : set_value('Preferred_electives') ?>" name="Preferred_electives" placeholder="Enter Preferred Electives">
                  </div>
                  <div class="form-group">
                    <label for="standard_title">Standard Title</label>
                    <input type="text" class="form-control"   id="standard_title" name="standard_title" value="<?= isset( $edit ) ? $edit['standard_title'] : set_value('standard_title') ?>" placeholder="Enter Standard Title ID">
                  </div>
                  <div class="form-group">
                    <label for="Desc">Description</label>
                    <textarea class="form-control"    value="<?= isset( $edit ) ? $edit['Desc'] : set_value('Desc') ?>" id="Desc" name="Desc" rows="3" placeholder="Type here description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="Std_Stream_CBSE">Std Stream (CBSE)</label>
                    <input type="text" class="form-control"   id="Std_Stream_CBSE" value="<?= isset( $edit ) ? $edit['Std_Stream_CBSE'] : set_value('Std_Stream_CBSE') ?>" name="Std_Stream_CBSE" placeholder="Enter Std Stream (CBSE)">
                  </div>
                  <div class="form-group">
                    <label for="Zone">Zone</label>
                    <input type="text" class="form-control"   id="Zone" name="Zone" value="<?= isset( $edit ) ? $edit['Zone'] : set_value('Zone') ?>" placeholder="Enter Zone">
                  </div>
                  <div class="form-group">
                    <label for="Higher Education">Higher Education</label>
                    <input type="text" class="form-control" value="<?= isset( $edit ) ? $edit['Higher_Education'] : set_value('Higher_Education') ?>"   id="Higher Education" name="Higher Education" placeholder="Enter Higher Education">
                  </div>
                  <div class="row">
                    <div class="col-8"></div>
                    <!-- /.col -->
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary btn-block"><?= !isset( $edit ) ? 'Add' : 'Edit' ?> Cluster</button>
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