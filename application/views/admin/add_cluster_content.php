<body class="hold-transition login-page">

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-3" style="padding: 6px 0.5rem;background-color: #ffffff;border-bottom: 1px solid #dee2e6;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0 pt-2" style="font-size: 1.2em;color: #7f7f7f;">Add Cluster Content</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item"><a href="<?php echo base_url("AdminController/dashboard");?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Cluster Content</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="profile-username text-center">Add Cluster Content</h3>
            </div>
            <div class="card-body box-profile">
            <?php
                $msg = $this->session->flashdata('msg');
                if($msg != "")
                {
                  $status = $this->session->flashdata('status');
                  echo "<div class='alert alert-".($status != '' ? $status : 'success')."'>$msg</div>";
                }
            ?>
              <div id="accordion">
                <div class="card">
                  <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
                      Cluster Detail's
                    </a>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                      <form action="<?= base_url() ?>/AdminController/add-cluster-details" method="post" >
                        <div class="row">
                          <?php
                          if( isset( $edit ) ){
                          ?>
                            <input type="hidden" name="id" value="<?= $edit['SNo'] ?>" >
                          <?php
                          }
                          ?>
                          <div class="col-sm-6">
                            <label class="label-control">Update Code</label>
                            <input type="text"  class="form-control" id="update_code" required
                            name="update_code" value="<?= isset( $edit ) ? $edit['update_code'] : set_value('update_code') ?>" placeholder="Update Code">
                            <p class="text-primary m-1 update_code"></p>
                          </div>
                          <div class="col-sm-6">
                            <label class="label-control">Profession Id</label>
                            <input type="text"  class="form-control" id="profession_id" required
                            name="profession_id" value="<?= isset( $edit ) ? $edit['profession_id'] : set_value('profession_id ') ?>" placeholder="Profession Id">
                            <p class="text-primary m-1  	profession_id "></p>
                          </div>
                          <div class="col-sm-6">
                            <label class="label-control">Profession Name</label>
                            <input type="text"  class="form-control" id="profession_name" required
                            name="profession_name" value="<?= isset( $edit ) ? $edit['profession_name'] : set_value('profession_name') ?>" placeholder="Profession Name">
                            <p class="text-primary m-1 profession_name"></p>
                          </div>
                          <div class="col-sm-6">
                            <label class="label-control">Profession Demand</label>
                            <input type="text"  class="form-control" id="profession_demand" required
                            name="profession_demand" value="<?= isset( $edit ) ? $edit['profession_demand'] : set_value('profession_demand') ?>" placeholder="Profession Demand">
                            <p class="text-primary m-1 profession_demand"></p>
                          </div>
                          <div class="col-sm-12">
                            <label class="label-control">Profession Description</label>
                            <input type="text"  class="form-control" id="profession_desc" required
                                name="profession_desc" value="<?= isset( $edit ) ? $edit['profession_desc'] : set_value('profession_desc') ?>" placeholder="Profession Description">
                            <p class="text-primary m-1 profession_desc"></p>
                          </div>
                          <div class="col-sm-3 offset-sm-9 mt-5">
                            <input type="submit"  class="btn btn-info form-control" value="Submit">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <?php
                  if( isset( $edit ) ){
                ?>
                  <div class="card">
                    <div class="card-header">
                      <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                        Role Detail's
                      </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <form action="<?= base_url() ?>/AdminController/update-role-details" method="post" >
                          <div class="row">
                            <?php
                            if( isset( $edit ) ){
                            ?>
                              <input type="hidden" name="id" value="<?= $edit['SNo'] ?>" >
                            <?php
                            }
                            ?>
                            <div class="col-sm-6">
                              <label class="label-control">Role 1</label>
                              <input type="text"  class="form-control" id="Role_1"
                              name="Role_1" value="<?= isset( $edit ) ? $edit['Role_1'] : set_value('Role_1') ?>" placeholder="Update Code">
                              <p class="text-primary m-1 Role_1"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Role 1 Description</label>
                              <input type="text"  class="form-control" id="Role_1_description"
                              name="Role_1_description" value="<?= isset( $edit ) ? $edit['Role_1_description'] : set_value('Role_1_description ') ?>" placeholder="Profession Id">
                              <p class="text-primary m-1  Role_1_description"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Role 2</label>
                              <input type="text"  class="form-control" id="Role_2"
                              name="Role_2" value="<?= isset( $edit ) ? $edit['Role_2'] : set_value('Role_2') ?>" placeholder="Update Code">
                              <p class="text-primary m-1 Role_2"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Role 2 Description</label>
                              <input type="text"  class="form-control" id="Role_2_description"
                              name="Role_2_description" value="<?= isset( $edit ) ? $edit['Role_2_description'] : set_value('Role_2_description ') ?>" placeholder="Profession Id">
                              <p class="text-primary m-1  Role_2_description"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Role 3</label>
                              <input type="text"  class="form-control" id="Role_3"
                              name="Role_3" value="<?= isset( $edit ) ? $edit['Role_3'] : set_value('Role_3') ?>" placeholder="Update Code">
                              <p class="text-primary m-1 Role_3"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Role 3 Description</label>
                              <input type="text"  class="form-control" id="Role_3_description"
                              name="Role_3_description" value="<?= isset( $edit ) ? $edit['Role_3_description'] : set_value('Role_3_description ') ?>" placeholder="Profession Id">
                              <p class="text-primary m-1  Role_3_description"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Role 4</label>
                              <input type="text"  class="form-control" id="Role_4"
                              name="Role_4" value="<?= isset( $edit ) ? $edit['Role_4'] : set_value('Role_4') ?>" placeholder="Update Code">
                              <p class="text-primary m-1 Role_4"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Role 4 Description</label>
                              <input type="text"  class="form-control" id="Role_4_description"
                              name="Role_4_description" value="<?= isset( $edit ) ? $edit['Role_4_description'] : set_value('Role_4_description ') ?>" placeholder="Profession Id">
                              <p class="text-primary m-1  Role_4_description"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Role 5</label>
                              <input type="text"  class="form-control" id="Role_5"
                              name="Role_5" value="<?= isset( $edit ) ? $edit['Role_5'] : set_value('Role_5') ?>" placeholder="Update Code">
                              <p class="text-primary m-1 Role_5"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Role 5 Description</label>
                              <input type="text"  class="form-control" id="Role_5_description"
                              name="Role_5_description" value="<?= isset( $edit ) ? $edit['Role_5_description'] : set_value('Role_5_description ') ?>" placeholder="Profession Id">
                              <p class="text-primary m-1  Role_5_description"></p>
                            </div>
                            <div class="col-sm-3 offset-sm-9 mt-5">
                              <input type="submit"  class="btn btn-info form-control" value="Submit">
                            </div>
                          </div>
                        </form>  
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        Stream Detail's
                      </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <form action="<?= base_url() ?>/AdminController/update-role-details" method="post" >
                          <?php
                            if( isset( $edit ) ){
                            ?>
                              <input type="hidden" name="id" value="<?= $edit['SNo'] ?>" >
                            <?php
                            }
                          ?>
                          <div class="row jumbotron">
                            <div class="col-sm-6">
                              <label class="label-control">Stream 12th 1</label>
                              <input type="text"  class="form-control" id="Stream_12th_1"
                              name="Stream_12th_1" value="<?= isset( $edit ) ? $edit['Stream_12th_1'] : set_value('Stream_12th_1') ?>" placeholder="Stream 12th">
                              <p class="text-primary m-1 Stream_12th_1"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream Dip 1</label>
                              <input type="text"  class="form-control" id="Stream_Dip_1"
                              name="Stream_Dip_1" value="<?= isset( $edit ) ? $edit['Stream_Dip_1'] : set_value('Stream_Dip_1 ') ?>" placeholder="Stream Dip">
                              <p class="text-primary m-1  Stream_Dip_1"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream UG 1</label>
                              <input type="text"  class="form-control" id="Stream_UG_1"
                              name="Stream_UG_1" value="<?= isset( $edit ) ? $edit['Stream_UG_1'] : set_value('Stream_UG_1') ?>" placeholder="Stram UG">
                              <p class="text-primary m-1 Stream_UG_1"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream PG Dip 1</label>
                              <input type="text"  class="form-control" id="Stream_PGDip_1"
                              name="Stream_PGDip_1" value="<?= isset( $edit ) ? $edit['Stream_PGDip_1'] : set_value('Stream_PGDip_1 ') ?>" placeholder="Stream PG Dip">
                              <p class="text-primary m-1  Stream_PGDip_1"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream PG 1</label>
                              <input type="text"  class="form-control" id="Stream_PG_1"
                              name="Stream_PG_1" value="<?= isset( $edit ) ? $edit['Stream_PG_1'] : set_value('Stream_PG_1') ?>" placeholder="Stream PG">
                              <p class="text-primary m-1 Stream_PG_1"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream Phd 1</label>
                              <input type="text"  class="form-control" id="Stream_PhD_1"
                              name="Stream_PhD_1" value="<?= isset( $edit ) ? $edit['Stream_PhD_1'] : set_value('Stream_PhD_1 ') ?>" placeholder="Stream Phd">
                              <p class="text-primary m-1  Stream_PhD_1"></p>
                            </div>
                            <div class="col-sm-12">
                              <label class="label-control">Stream Add 1</label>
                              <input type="text"  class="form-control" id="Stream_Add_1"
                              name="Stream_Add_1" value="<?= isset( $edit ) ? $edit['Stream_Add_1'] : set_value('Stream_Add_1') ?>" placeholder="Stream Add">
                              <p class="text-primary m-1 Stream_Add_1"></p>
                            </div>
                          </div>
                          <div class="row jumbotron">
                            <div class="col-sm-6">
                              <label class="label-control">Stream 12th 2</label>
                              <input type="text"  class="form-control" id="Stream_12th_2"
                              name="Stream_12th_2" value="<?= isset( $edit ) ? $edit['Stream_12th_2'] : set_value('Stream_12th_2') ?>" placeholder="Stream 12th">
                              <p class="text-primary m-1 Stream_12th_2"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream Dip 2</label>
                              <input type="text"  class="form-control" id="Stream_Dip_2"
                              name="Stream_Dip_2" value="<?= isset( $edit ) ? $edit['Stream_Dip_2'] : set_value('Stream_Dip_2 ') ?>" placeholder="Stream Dip">
                              <p class="text-primary m-1  Stream_Dip_2"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream UG 2</label>
                              <input type="text"  class="form-control" id="Stream_UG_2"
                              name="Stream_UG_2" value="<?= isset( $edit ) ? $edit['Stream_UG_2'] : set_value('Stream_UG_2') ?>" placeholder="Stram UG">
                              <p class="text-primary m-1 Stream_UG_2"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream PG Dip 2</label>
                              <input type="text"  class="form-control" id="Stream_PGDip_2"
                              name="Stream_PGDip_2" value="<?= isset( $edit ) ? $edit['Stream_PGDip_2'] : set_value('Stream_PGDip_2 ') ?>" placeholder="Stream PG Dip">
                              <p class="text-primary m-1  Stream_PGDip_2"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream PG 2</label>
                              <input type="text"  class="form-control" id="Stream_PG_2"
                              name="Stream_PG_2" value="<?= isset( $edit ) ? $edit['Stream_PG_2'] : set_value('Stream_PG_2') ?>" placeholder="Stream PG">
                              <p class="text-primary m-1 Stream_PG_2"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream Phd 2</label>
                              <input type="text"  class="form-control" id="Stream_PhD_2"
                              name="Stream_PhD_2" value="<?= isset( $edit ) ? $edit['Stream_PhD_2'] : set_value('Stream_PhD_2 ') ?>" placeholder="Stream Phd">
                              <p class="text-primary m-1  Stream_PhD_2"></p>
                            </div>
                            <div class="col-sm-12">
                              <label class="label-control">Stream Add 2</label>
                              <input type="text"  class="form-control" id="Stream_Add_2"
                              name="Stream_Add_2" value="<?= isset( $edit ) ? $edit['Stream_Add_2'] : set_value('Stream_Add_2') ?>" placeholder="Stream Add">
                              <p class="text-primary m-1 Stream_Add_2"></p>
                            </div>
                          </div>
                          <div class="row jumbotron">
                            <div class="col-sm-6">
                              <label class="label-control">Stream 12th 3</label>
                              <input type="text"  class="form-control" id="Stream_12th_3"
                              name="Stream_12th_3" value="<?= isset( $edit ) ? $edit['Stream_12th_3'] : set_value('Stream_12th_3') ?>" placeholder="Stream 12th">
                              <p class="text-primary m-1 Stream_12th_3"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream Dip 3</label>
                              <input type="text"  class="form-control" id="Stream_Dip_3"
                              name="Stream_Dip_3" value="<?= isset( $edit ) ? $edit['Stream_Dip_3'] : set_value('Stream_Dip_3 ') ?>" placeholder="Stream Dip">
                              <p class="text-primary m-1  Stream_Dip_3"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream UG 3</label>
                              <input type="text"  class="form-control" id="Stream_UG_3"
                              name="Stream_UG_3" value="<?= isset( $edit ) ? $edit['Stream_UG_3'] : set_value('Stream_UG_3') ?>" placeholder="Stram UG">
                              <p class="text-primary m-1 Stream_UG_3"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream PG Dip 3</label>
                              <input type="text"  class="form-control" id="Stream_PGDip_3"
                              name="Stream_PGDip_3" value="<?= isset( $edit ) ? $edit['Stream_PGDip_3'] : set_value('Stream_PGDip_3 ') ?>" placeholder="Stream PG Dip">
                              <p class="text-primary m-1  Stream_PGDip_3"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream PG 3</label>
                              <input type="text"  class="form-control" id="Stream_PG_3"
                              name="Stream_PG_3" value="<?= isset( $edit ) ? $edit['Stream_PG_3'] : set_value('Stream_PG_3') ?>" placeholder="Stream PG">
                              <p class="text-primary m-1 Stream_PG_3"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream Phd 3</label>
                              <input type="text"  class="form-control" id="Stream_PhD_3"
                              name="Stream_PhD_3" value="<?= isset( $edit ) ? $edit['Stream_PhD_3'] : set_value('Stream_PhD_3 ') ?>" placeholder="Stream Phd">
                              <p class="text-primary m-1  Stream_PhD_3"></p>
                            </div>
                            <div class="col-sm-12">
                              <label class="label-control">Stream Add 3</label>
                              <input type="text"  class="form-control" id="Stream_Add_3"
                              name="Stream_Add_3" value="<?= isset( $edit ) ? $edit['Stream_Add_3'] : set_value('Stream_Add_3') ?>" placeholder="Stream Add">
                              <p class="text-primary m-1 Stream_Add_3"></p>
                            </div>
                          </div>
                          <div class="row jumbotron">
                            <div class="col-sm-6">
                              <label class="label-control">Stream 12th 4</label>
                              <input type="text"  class="form-control" id="Stream_12th_4"
                              name="Stream_12th_4" value="<?= isset( $edit ) ? $edit['Stream_12th_4'] : set_value('Stream_12th_4') ?>" placeholder="Stream 12th">
                              <p class="text-primary m-1 Stream_12th_4"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream Dip 4</label>
                              <input type="text"  class="form-control" id="Stream_Dip_4"
                              name="Stream_Dip_4" value="<?= isset( $edit ) ? $edit['Stream_Dip_4'] : set_value('Stream_Dip_4 ') ?>" placeholder="Stream Dip">
                              <p class="text-primary m-1  Stream_Dip_4"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream UG 4</label>
                              <input type="text"  class="form-control" id="Stream_UG_4"
                              name="Stream_UG_4" value="<?= isset( $edit ) ? $edit['Stream_UG_4'] : set_value('Stream_UG_4') ?>" placeholder="Stram UG">
                              <p class="text-primary m-1 Stream_UG_4"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream PG Dip 4</label>
                              <input type="text"  class="form-control" id="Stream_PGDip_4"
                              name="Stream_PGDip_4" value="<?= isset( $edit ) ? $edit['Stream_PGDip_4'] : set_value('Stream_PGDip_4 ') ?>" placeholder="Stream PG Dip">
                              <p class="text-primary m-1  Stream_PGDip_4"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream PG 4</label>
                              <input type="text"  class="form-control" id="Stream_PG_4"
                              name="Stream_PG_4" value="<?= isset( $edit ) ? $edit['Stream_PG_4'] : set_value('Stream_PG_4') ?>" placeholder="Stream PG">
                              <p class="text-primary m-1 Stream_PG_4"></p>
                            </div>
                            <div class="col-sm-6">
                              <label class="label-control">Stream Phd 4</label>
                              <input type="text"  class="form-control" id="Stream_PhD_4"
                              name="Stream_PhD_4" value="<?= isset( $edit ) ? $edit['Stream_PhD_4'] : set_value('Stream_PhD_4 ') ?>" placeholder="Stream Phd">
                              <p class="text-primary m-1  Stream_PhD_4"></p>
                            </div>
                            <div class="col-sm-12">
                              <label class="label-control">Stream Add 4</label>
                              <input type="text"  class="form-control" id="Stream_Add_4"
                              name="Stream_Add_4" value="<?= isset( $edit ) ? $edit['Stream_Add_4'] : set_value('Stream_Add_4') ?>" placeholder="Stream Add">
                              <p class="text-primary m-1 Stream_Add_4"></p>
                            </div>
                            <div class="col-sm-3 offset-sm-9 mt-5">
                              <input type="submit"  class="btn btn-info form-control" value="Submit">
                            </div>
                          </div>
                        </form>  
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
                        Institute Detail's
                      </a>
                    </div>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <form action="<?= base_url() ?>/AdminController/update-role-details" method="post" >
                          <?php
                            if( isset( $edit ) ){
                            ?>
                              <input type="hidden" name="id" value="<?= $edit['SNo'] ?>" >
                            <?php
                            }
                          ?>
                          <div class="row jumbotron">
                            <div class="col-sm-4">
                              <label class="label-control">Institute 1 UG</label>
                              <input type="text"  class="form-control" id="Institute_1_ug"
                              name="Institute_1_ug" value="<?= isset( $edit ) ? $edit['Institute_1_ug'] : set_value('Institute_1_ug') ?>" placeholder="Institute 1 UG">
                              <p class="text-primary m-1 Institute_1_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 2 UG</label>
                              <input type="text"  class="form-control" id="Institute_2_ug"
                              name="Institute_2_ug" value="<?= isset( $edit ) ? $edit['Institute_2_ug'] : set_value('Institute_2_ug ') ?>" placeholder="Institute 2 UG">
                              <p class="text-primary m-1  Institute_2_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 3 UG</label>
                              <input type="text"  class="form-control" id="Institute_3_ug"
                              name="Institute_3_ug" value="<?= isset( $edit ) ? $edit['Institute_3_ug'] : set_value('Institute_3_ug') ?>" placeholder="Institute 3 UG">
                              <p class="text-primary m-1 Institute_3_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 4 UG</label>
                              <input type="text"  class="form-control" id="Institute_4_ug"
                              name="Institute_4_ug" value="<?= isset( $edit ) ? $edit['Institute_4_ug'] : set_value('Institute_4_ug ') ?>" placeholder="Institute 4 UG">
                              <p class="text-primary m-1  Institute_4_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 5 UG</label>
                              <input type="text"  class="form-control" id="Institute_5_ug"
                              name="Institute_5_ug" value="<?= isset( $edit ) ? $edit['Institute_5_ug'] : set_value('Institute_5_ug') ?>" placeholder="Institute 5 UG">
                              <p class="text-primary m-1 Institute_5_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 6 UG</label>
                              <input type="text"  class="form-control" id="Institute_6_ug"
                              name="Institute_6_ug" value="<?= isset( $edit ) ? $edit['Institute_6_ug'] : set_value('Institute_6_ug ') ?>" placeholder="Institute 6 UG">
                              <p class="text-primary m-1  Institute_6_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 7 UG</label>
                              <input type="text"  class="form-control" id="Institute_7_ug"
                              name="Institute_7_ug" value="<?= isset( $edit ) ? $edit['Institute_7_ug'] : set_value('Institute_7_ug') ?>" placeholder="Institute 7 UG">
                              <p class="text-primary m-1 Institute_7_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 8 UG</label>
                              <input type="text"  class="form-control" id="Institute_8_ug"
                              name="Institute_8_ug" value="<?= isset( $edit ) ? $edit['Institute_8_ug'] : set_value('Institute_8_ug') ?>" placeholder="Institute 8 UG">
                              <p class="text-primary m-1 Institute_8_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 9 UG</label>
                              <input type="text"  class="form-control" id="Institute_9_ug"
                              name="Institute_9_ug" value="<?= isset( $edit ) ? $edit['Institute_9_ug'] : set_value('Institute_9_ug') ?>" placeholder="Institute 9 UG">
                              <p class="text-primary m-1 Institute_9_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 10 UG</label>
                              <input type="text"  class="form-control" id="Institute_10_ug"
                              name="Institute_10_ug" value="<?= isset( $edit ) ? $edit['Institute_10_ug'] : set_value('Institute_10_ug') ?>" placeholder="Institute 10 UG">
                              <p class="text-primary m-1 Institute_10_ug"></p>
                            </div>
                          </div>
                          <div class="row jumbotron">
                          <div class="col-sm-4">
                              <label class="label-control">Institute 1 PG</label>
                              <input type="text"  class="form-control" id="Institute_1_pg"
                              name="Institute_1_pg" value="<?= isset( $edit ) ? $edit['Institute_1_pg'] : set_value('Institute_1_pg') ?>" placeholder="Institute 1 PG">
                              <p class="text-primary m-1 Institute_1_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 2 PG</label>
                              <input type="text"  class="form-control" id="Institute_2_pg"
                              name="Institute_2_pg" value="<?= isset( $edit ) ? $edit['Institute_2_pg'] : set_value('Institute_2_pg ') ?>" placeholder="Institute 2 PG">
                              <p class="text-primary m-1  Institute_2_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 3 PG</label>
                              <input type="text"  class="form-control" id="Institute_3_pg"
                              name="Institute_3_pg" value="<?= isset( $edit ) ? $edit['Institute_3_pg'] : set_value('Institute_3_pg') ?>" placeholder="Institute 3 PG">
                              <p class="text-primary m-1 Institute_3_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 4 PG</label>
                              <input type="text"  class="form-control" id="Institute_4_pg"
                              name="Institute_4_pg" value="<?= isset( $edit ) ? $edit['Institute_4_pg'] : set_value('Institute_4_pg ') ?>" placeholder="Institute 4 PG">
                              <p class="text-primary m-1  Institute_4_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 5 PG</label>
                              <input type="text"  class="form-control" id="Institute_5_pg"
                              name="Institute_5_pg" value="<?= isset( $edit ) ? $edit['Institute_5_pg'] : set_value('Institute_5_pg') ?>" placeholder="Institute 5 PG">
                              <p class="text-primary m-1 Institute_5_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 6 PG</label>
                              <input type="text"  class="form-control" id="Institute_6_pg"
                              name="Institute_6_pg" value="<?= isset( $edit ) ? $edit['Institute_6_pg'] : set_value('Institute_6_pg ') ?>" placeholder="Institute 6 PG">
                              <p class="text-primary m-1  Institute_6_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 7 PG</label>
                              <input type="text"  class="form-control" id="Institute_7_pg"
                              name="Institute_7_pg" value="<?= isset( $edit ) ? $edit['Institute_7_pg'] : set_value('Institute_7_pg') ?>" placeholder="Institute 7 PG">
                              <p class="text-primary m-1 Institute_7_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 8 PG</label>
                              <input type="text"  class="form-control" id="Institute_8_pg"
                              name="Institute_8_pg" value="<?= isset( $edit ) ? $edit['Institute_8_pg'] : set_value('Institute_8_pg') ?>" placeholder="Institute 8 PG">
                              <p class="text-primary m-1 Institute_8_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 9 PG</label>
                              <input type="text"  class="form-control" id="Institute_9_ug"
                              name="Institute_9_ug" value="<?= isset( $edit ) ? $edit['Institute_9_ug'] : set_value('Institute_9_ug') ?>" placeholder="Institute 9 PG">
                              <p class="text-primary m-1 Institute_9_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Institute 10 PG</label>
                              <input type="text"  class="form-control" id="Institute_10_ug"
                              name="Institute_10_ug" value="<?= isset( $edit ) ? $edit['Institute_10_ug'] : set_value('Institute_10_ug') ?>" placeholder="Institute 10 PG">
                              <p class="text-primary m-1 Institute_10_ug"></p>
                            </div>
                          </div>
                          <div class="col-sm-3 offset-sm-9 mt-5">
                            <input type="submit"  class="btn btn-info form-control" value="Submit">
                          </div>
                        </form>  
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <a class="collapsed card-link" data-toggle="collapse" href="#collapsefive">
                        Exam Detail's
                      </a>
                    </div>
                    <div id="collapsefive" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                      <form action="<?= base_url() ?>/AdminController/update-role-details" method="post" >
                          <?php
                            if( isset( $edit ) ){
                            ?>
                              <input type="hidden" name="id" value="<?= $edit['SNo'] ?>" >
                            <?php
                            }
                          ?>
                          <div class="row jumbotron">
                            <div class="col-sm-4">
                              <label class="label-control">Exam 1 UG</label>
                              <input type="text"  class="form-control" id="Exam_1_ug"
                              name="Exam_1_ug" value="<?= isset( $edit ) ? $edit['Exam_1_ug'] : set_value('Exam_1_ug') ?>" placeholder="Exam 1 UG">
                              <p class="text-primary m-1 Exam_1_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 2 UG</label>
                              <input type="text"  class="form-control" id="Exam_2_ug"
                              name="Exam_2_ug" value="<?= isset( $edit ) ? $edit['Exam_2_ug'] : set_value('Exam_2_ug ') ?>" placeholder="Exam 2 UG">
                              <p class="text-primary m-1  Exam_2_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 3 UG</label>
                              <input type="text"  class="form-control" id="Exam_3_ug"
                              name="Exam_3_ug" value="<?= isset( $edit ) ? $edit['Exam_3_ug'] : set_value('Exam_3_ug') ?>" placeholder="Exam 3 UG">
                              <p class="text-primary m-1 Exam_3_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 4 UG</label>
                              <input type="text"  class="form-control" id="Exam_4_ug"
                              name="Exam_4_ug" value="<?= isset( $edit ) ? $edit['Exam_4_ug'] : set_value('Exam_4_ug ') ?>" placeholder="Exam 4 UG">
                              <p class="text-primary m-1  Exam_4_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 5 UG</label>
                              <input type="text"  class="form-control" id="Exam_5_ug"
                              name="Exam_5_ug" value="<?= isset( $edit ) ? $edit['Exam_5_ug'] : set_value('Exam_5_ug') ?>" placeholder="Exam 5 UG">
                              <p class="text-primary m-1 Exam_5_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 6 UG</label>
                              <input type="text"  class="form-control" id="Exam_6_ug"
                              name="Exam_6_ug" value="<?= isset( $edit ) ? $edit['Exam_6_ug'] : set_value('Exam_6_ug ') ?>" placeholder="Exam 6 UG">
                              <p class="text-primary m-1  Exam_6_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 7 UG</label>
                              <input type="text"  class="form-control" id="Exam_7_ug"
                              name="Exam_7_ug" value="<?= isset( $edit ) ? $edit['Exam_7_ug'] : set_value('Exam_7_ug') ?>" placeholder="Exam 7 UG">
                              <p class="text-primary m-1 Exam_7_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 8 UG</label>
                              <input type="text"  class="form-control" id="Exam_8_ug"
                              name="Exam_8_ug" value="<?= isset( $edit ) ? $edit['Exam_8_ug'] : set_value('Exam_8_ug') ?>" placeholder="Exam 8 UG">
                              <p class="text-primary m-1 Exam_8_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 9 UG</label>
                              <input type="text"  class="form-control" id="Exam_9_ug"
                              name="Exam_9_ug" value="<?= isset( $edit ) ? $edit['Exam_9_ug'] : set_value('Exam_9_ug') ?>" placeholder="Exam 9 UG">
                              <p class="text-primary m-1 Exam_9_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 10 UG</label>
                              <input type="text"  class="form-control" id="Exam_10_ug"
                              name="Exam_10_ug" value="<?= isset( $edit ) ? $edit['Exam_10_ug'] : set_value('Exam_10_ug') ?>" placeholder="Exam 10 UG">
                              <p class="text-primary m-1 Exam_10_ug"></p>
                            </div>
                          </div>
                          <div class="row jumbotron">
                          <div class="col-sm-4">
                              <label class="label-control">Exam 1 PG</label>
                              <input type="text"  class="form-control" id="Exam_1_pg"
                              name="Exam_1_pg" value="<?= isset( $edit ) ? $edit['Exam_1_pg'] : set_value('Exam_1_pg') ?>" placeholder="Exam 1 PG">
                              <p class="text-primary m-1 Exam_1_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 2 PG</label>
                              <input type="text"  class="form-control" id="Exam_2_pg"
                              name="Exam_2_pg" value="<?= isset( $edit ) ? $edit['Exam_2_pg'] : set_value('Exam_2_pg ') ?>" placeholder="Exam 2 PG">
                              <p class="text-primary m-1  Exam_2_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 3 PG</label>
                              <input type="text"  class="form-control" id="Exam_3_pg"
                              name="Exam_3_pg" value="<?= isset( $edit ) ? $edit['Exam_3_pg'] : set_value('Exam_3_pg') ?>" placeholder="Exam 3 PG">
                              <p class="text-primary m-1 Exam_3_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 4 PG</label>
                              <input type="text"  class="form-control" id="Exam_4_pg"
                              name="Exam_4_pg" value="<?= isset( $edit ) ? $edit['Exam_4_pg'] : set_value('Exam_4_pg ') ?>" placeholder="Exam 4 PG">
                              <p class="text-primary m-1  Exam_4_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 5 PG</label>
                              <input type="text"  class="form-control" id="Exam_5_pg"
                              name="Exam_5_pg" value="<?= isset( $edit ) ? $edit['Exam_5_pg'] : set_value('Exam_5_pg') ?>" placeholder="Exam 5 PG">
                              <p class="text-primary m-1 Exam_5_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 6 PG</label>
                              <input type="text"  class="form-control" id="Exam_6_pg"
                              name="Exam_6_pg" value="<?= isset( $edit ) ? $edit['Exam_6_pg'] : set_value('Exam_6_pg ') ?>" placeholder="Exam 6 PG">
                              <p class="text-primary m-1  Exam_6_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 7 PG</label>
                              <input type="text"  class="form-control" id="Exam_7_pg"
                              name="Exam_7_pg" value="<?= isset( $edit ) ? $edit['Exam_7_pg'] : set_value('Exam_7_pg') ?>" placeholder="Exam 7 PG">
                              <p class="text-primary m-1 Exam_7_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 8 PG</label>
                              <input type="text"  class="form-control" id="Exam_8_pg"
                              name="Exam_8_pg" value="<?= isset( $edit ) ? $edit['Exam_8_pg'] : set_value('Exam_8_pg') ?>" placeholder="Exam 8 PG">
                              <p class="text-primary m-1 Exam_8_pg"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 9 PG</label>
                              <input type="text"  class="form-control" id="Exam_9_ug"
                              name="Exam_9_ug" value="<?= isset( $edit ) ? $edit['Exam_9_ug'] : set_value('Exam_9_ug') ?>" placeholder="Exam 9 PG">
                              <p class="text-primary m-1 Exam_9_ug"></p>
                            </div>
                            <div class="col-sm-4">
                              <label class="label-control">Exam 10 PG</label>
                              <input type="text"  class="form-control" id="Exam_10_ug"
                              name="Exam_10_ug" value="<?= isset( $edit ) ? $edit['Exam_10_ug'] : set_value('Exam_10_ug') ?>" placeholder="Exam 10 PG">
                              <p class="text-primary m-1 Exam_10_ug"></p>
                            </div>
                          </div>
                          <div class="col-sm-3 offset-sm-9 mt-5">
                            <input type="submit"  class="btn btn-info form-control" value="Submit">
                          </div>
                        </form> 
                      </div>
                    </div>
                  </div>
                <?php
                  }
                ?>
              </div> 
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div> 