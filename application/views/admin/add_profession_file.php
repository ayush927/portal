<body class="hold-transition login-page">
<style>
    .img-select{
        cursor:pointer;
    }
</style>
    <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-3 bg-white" style="padding: 6px 0.5rem;border-bottom: 1px solid #dee2e6;">
      <div class="container-fluid">
        <div class="row mb-2">
            
          <div class="col-sm-6">
            <h1 class="m-0 pt-2" style="font-size: 1.2em;color: #7f7f7f;">Add Profession</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item"><a href="<?php echo base_url("adminController/dashboard");?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Profession</li>
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
                    $status = $this->session->flashdata('msg');
                    if($msg != "")
                    {
                        echo "<div class='alert alert-".($status !='' ? $status: 'success')."'>$msg</div>";
                    }
                    
                ?>
                <form action="<?= base_url() ?>career-library/submit-profession" method="post" enctype="multipart/form-data">
                <?php
                        if(isset($edit))
                        {
                    ?>
                        <input type='hidden' name='id' value='<?= $edit['id'] ?>' >
                    <?php
                        }
                ?>
                
                    <div class="form-group">
                        <label for="cluster_path">Cluster</label>
                        <select class="form-control" id="clusterId"   name="Cluster">
                            <option value=''>Select Cluster</option>
                            <?php
                                if( !empty($list) ){
                                    foreach( $list as $key => $value ){
                            ?>
                                    <option value='<?= $value['clustersName'] ?>' <?= isset($edit) ? ( $edit['Cluster'] == $value['clustersName'] ? 'selected' : '' ) : '' ?> > <?= ucwords($value['clustersName']) ?> </option>
                            <?php
                                    }                                    
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cluster_path"> Career Path</label>
                        <select class="form-control" id="careerPath"   name="Path">
                            <option value=''>Select Career Path</option>
                            <?php
                                if( !isset($list2) ){
                                    if( !empty($list2) ){
                                        foreach( $list as $key => $value ){
                                ?>
                                        <option value='<?= $value['career_path'] ?>' <?= isset($edit) ? ( $edit['Path'] == $value['career_path'] ? 'selected' : '' ) : '' ?> > <?= ucwords($value['career_path']) ?> </option>
                                <?php
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cluster_path">Sources</label>
                        <select class="form-control" id="Source" name="Source">
                            <option value=''>Select Sources</option>
                            <?php
                                if( !empty($sources) ){
                                    foreach( $sources as $key => $value ){
                                ?>
                                        <option value='<?= $value['sourceName'] ?>' <?= isset($edit) ? ( $edit['Source'] == $value['sourceName'] ? 'selected' : '' ) : '' ?> > <?= ucwords($value['sourceName']) ?> </option>
                                <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="career_path">Image Upload ( Width Max :- <?= $sizes['max_width'] ?> - Width Min <?= $sizes['min_width'] ?> ) -  ( Height Max :- <?= $sizes['max_height'] ?> - Height Min <?= $sizes['min_height'] ?> )</label>
                        <input type="file" class="form-control" name="images">
                    </div>
                    <div class="form-group">
                        <label for="career_path">Select Image From Gallery</label>
                        <button type="button" class="btn btn-info btn-lg float-right btn-image" data-toggle="modal" data-target="#myModal">Select Image</button>
                        <input type="hidden" id='imageId' class="form-control" name="imageId">
                    </div>
                    <div class="form-group">
                        <label for="career_path">Profession Id</label>
                        <input type="text" class="form-control" id="profession_id" value='<?= isset($edit) ? $edit['profession_id'] : '' ?>'  name="profession_id">
                    </div>
                    <div class="form-group">
                        <label for="career_path">Profession Name</label>
                        <input type="text" class="form-control" id="standard_title" value='<?= isset($edit) ? $edit['standard_title'] : '' ?>'  name="standard_title">
                    </div>
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
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style='max-width: 1200px;'>
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Image Select</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class='row'>
                        <?php
                            if( !empty( $images ) ){
                                foreach( $images  as $key => $value){
                        ?>
                                    <div class='col-md-4'>
                                        <img class="img-fluid img-select" data-id='<?= $value['id'] ?>' src='<?= base_url() ?>/uploads/galleryImage/<?= $value['imageName'] ?>' >
                                    </div>
                        <?php
                                }
                            }
                            else{
                        ?>
                            <p class=='text-center'>No Images Found</p>
                        <?php
                            }
                        ?>
                  </div>
              </div>
            </div>
        
          </div>
        </div>
  