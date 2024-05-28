<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header mb-3"
            style="padding: 6px 0.5rem;background-color: #ffffff;border-bottom: 1px solid #dee2e6;">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 pt-2" style="font-size: 1.2em;color: #7f7f7f;">Top Skill</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right pt-1">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("
                                    AdminController/dashboard");?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo base_url()."AdminController/seo_parameter";?>">Top Skill</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <!-- <div class="alert alert-success">
                    </div> -->
                <section class="content">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <form method="post">                                            
                                                <div class="input-group mb-3">
                                                    <input type="text" name="skill" value="<?php echo (!empty($seo_top_skill['skill']))?$seo_top_skill['skill']:'';?>" class="form-control"
                                                        placeholder="Skill"> 
                                                </div> 
                                                <?php echo form_error("skill");?>
                                                <div class="input-group mb-3">
                                                    <textarea name="description"  class="form-control" rows="5" spellcheck="false"><?php echo (!empty($seo_top_skill['description']))?$seo_top_skill['description']:'';?></textarea>
                                                </div>                                            
                                            <?php echo form_error("city_name");?>                                               
                                            <input type="hidden" name="tid" value="<?php echo (!empty($seo_top_skill['id']))?$seo_top_skill['id']:'add'?>">                                        
                                            <div class="row">
                                                <div class="col-8">
                                                </div>
                                                <div class="col-4">
                                                    <button type="submit" name="save"
                                                        class="btn btn-primary btn-block">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
</div>