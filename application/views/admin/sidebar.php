<?php 
// echo "<pre>";
// print_r($submenu);
// echo "</pre>";
// die;
?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0)" class="brand-link" style="height: 57px;background:white;padding-top: 9px;">
    <img src="<?php echo base_url("uploads/1631091187.png");?>" alt="AdminLTE Logo"  style="height: 41px;width: 100%;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-2 mb-2 d-flex">
        <div class="image">
          <img src="<?php echo base_url().'assets/dist/img/user2-160x160.jpg'; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $user['fullname']; ?></a>
        </div>
      </div>

     
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="<?php echo base_url().'AdminController/dashboard'; ?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Service
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/add_services'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/add_package'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Package</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/view_services'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/view_service_detail'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Service Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/confg_counseling_link'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Other Services</p>
                </a>
              </li>
              
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="pages/kanban.html" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Users
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Reseller
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/approve_reseller'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Reseller</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/approve_domain'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Domain</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/view_reseller'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Reseller</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/approve_service_code'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Service Codes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/certification'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Certification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/seo_parameter'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SEO Parameter</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Service Provider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/approve_reseller'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Reseller</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/view_sp'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View SP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/approve_sp'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve SP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/approve_partner_test'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PC Onboarding</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/sp_vocation_trainings'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SP Vocation Trainings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/sp_jobs'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SP Jobs</p>
                </a>
              </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon far fa-envelope"></i>
                      <p>
                        Counselling
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class='nav nav-treeview'>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>AdminController/calendly-config" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>
                                Calendly config 
                              </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>AdminController/calendly-link-list" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>
                                Calendly Link List 
                              </p>
                            </a>
                        </li>
                    </ul>
                </li>
              <!-- <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/approve_service_code'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Service Codes</p>
                </a>
              </li> -->
              
            </ul>
          </li>

          <!-- SP Management -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                SP Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/add_level1'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Level 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/add_level2'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Level 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/add_level3'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Level 3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/add_level4'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Level 4</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/add_level5'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Level 5</p>
                </a>
              </li>
              
              
            </ul>
          </li>
          <!-- ! SP Management -->

          <!-- Marketplace -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>Marketplace<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <?php foreach($mainmenu as $row) {?>
              <li class="nav-item">
                <a href="<?php //echo base_url().'AdminController/addMenuMarketplace'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $row->name; ?><i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <?php foreach($submenu as $sub) {
                    if($row->id == $sub->parent_id){
                      $a = str_replace(' ', '', $row->name);
                      $b = str_replace(' ','', $sub->name);
                    ?>
                  <li class="nav-item" style="margin-left:15px;">
                    <a href="<?php echo base_url('AdminController/marketplace_'.strtolower($a).'_'.strtolower($b)); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i>
                      <p><?php echo $sub->name ?></p>
                    </a>
                    
                    <!--Submenu of submenu #start-->
                    <?php foreach($submenu as $items) { 

                    if($sub->id == $items->parent_id){ 
                    
                    ?>
                    <ul class="nav nav-treeview">
                        <?php
                          $a = str_replace(' ', '', $sub->name);
                          $b = str_replace(' ','', $items->name);
                        ?>
                        <li class="nav-item" style="margin-left:30px;">
                            <a href="<?php echo base_url('AdminController/marketplace_'.strtolower($a).'_'.strtolower($b)); ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p><?php echo $items->name ?></p>
                            </a>
                        </li>
                    </ul>
                <?php } ?>  <?php } ?>
                   
                 <!--Submenu of submenu #end-->
                    
                  </li>
                <?php } } ?>
                </ul>
              </li>
             <?php } ?>
            </ul>
          </li>

          <!-- ! Marketplace -->

          <!-- MOT -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Marketing Optimization
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dummy</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- !MOT -->

              
              


          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Certification
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/certification'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Certification</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/certification_input'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Certificate input</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Overseas Services #Start -->
          <?php
            //check if $overseas action is present
            //if so - fetch - all overseas services
            //display all services in the menu
            //Add link to appropriate controller - for onclick action
            

          ?>
          
 
          <!-- Overseas Services #END -->


          <!-- tearm and conditions #Start -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Terms & Conditions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/term_conditions_view'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View </p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/term_conditions_add'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add T&C</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- tearm and conditions #END -->
          <!-- F&Q #Start -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                FAQ
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/FaQ_view'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View FaQ</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'AdminController/FaQ_add'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add FaQ</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- tearm and conditions #END -->
        </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'AdminController/event_input'; ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
              <p>
                Events
               
              </p>
            </a>
        </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Administrator System
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-envelope"></i>
                  <p>
                    Career Library
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p> Sources <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url().'career-library/add-source'; ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Source</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url().'career-library/all-sources'; ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>List Source</p>
                            </a>
                        </li>
                    </ul>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p> Career Cluster <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url().'adminController/add-cluster'; ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p> Add Cluster </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url().'adminController/all-clusters'; ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p> List Cluster</p>
                            </a>
                        </li>
                    </ul>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p> Career Path <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url().'career-library/add-career-path'; ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p> Add Career Path </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url().'career-library/all-career-path'; ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p> All Career Paths</p>
                            </a>
                        </li>
                    </ul>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p> Profession <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url().'career-library/add-profession'; ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p> Add Profession </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url().'adminController/view-career-cluster-details'; ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p> All Profession</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url().'adminController/view-cluster-content'; ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p> Profession Details</p>
                            </a>
                        </li>
                    </ul>
                </ul>
                <!--<ul class="nav nav-treeview">-->
                <!--  <li class="nav-item">-->
                <!--    <a href="<?php echo base_url().'AdminController/view-career-cluster-details'; ?>" class="nav-link">-->
                <!--      <i class="far fa-circle nav-icon"></i>-->
                <!--      <p>View Career Cluster Details</p>-->
                <!--    </a>-->
                <!--  </li>-->
                <!--</ul>-->
                <!--<ul class="nav nav-treeview">-->
                <!--  <li class="nav-item">-->
                <!--    <a href="<?php echo base_url().'AdminController/add-cluster-content'; ?>" class="nav-link">-->
                <!--      <i class="far fa-circle nav-icon"></i>-->
                <!--      <p>Add Cluster Details</p>-->
                <!--    </a>-->
                <!--  </li>-->
                <!--</ul>-->
                <!--<ul class="nav nav-treeview">-->
                <!--  <li class="nav-item">-->
                <!--    <a href="<?php echo base_url().'AdminController/view-cluster-content'; ?>" class="nav-link">-->
                <!--      <i class="far fa-circle nav-icon"></i>-->
                <!--      <p>View Cluster Content List</p>-->
                <!--    </a>-->
                <!--  </li>-->
                <!--</ul>-->
              </li>
              <li class="nav-item">
                  <a href="<?php echo base_url().'AdminController/reset_password'; ?>" class="nav-link">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>Reset Password</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo base_url().'payment-gateway/configure'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Gateway</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo base_url().'payment-gateway/configure'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Video Meetings</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home Page</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Calendar</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo base_url().'AdminController/login-page-design/reseller'; ?>" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                    <p>Reeller Login Page Design</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo base_url().'AdminController/login-page-design/user'; ?>" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                    <p>User Login Page Design</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?= base_url().'AdminController/Report-config'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report Config</p>
                </a>
              </li>
              
            </ul>
          </li>  

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Solution Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <?php 
            $q_all = $this->db->query("SELECT * FROM `solutions_management` ORDER by id,c_group,solution_id")->result_array();
            $q_group = $this->db->query("SELECT DISTINCT c_group FROM `solutions_management` ORDER by c_group")->result_array();
            $q_solution = $this->db->query("SELECT DISTINCT c_group,solution FROM `solutions_management` ORDER by c_group,solution")->result_array();
           
            foreach($q_group as $k=>$v_group){              
              ?>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="#" class="nav-link">
                      <i class="nav-icon far fa-envelope"></i>
                      <p>
                        <?php echo $v_group['c_group'];?>
                        <i class="fas fa-angle-left right"></i>
                      </p>
                </a> 
                <?php
                foreach($q_solution as $k1=>$q_solution)
                {
                  if($q_solution['c_group']==$v_group['c_group'])
                  {
                    ?>                      
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    <?php echo $q_solution['solution'];?>
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php               
                            foreach($q_all as $k2=>$v_all){
                              if($v_all['c_group']==$v_group['c_group'] 
                              && $v_all['solution']==$q_solution['solution']){
                                ?>                                  
                                  <li class="nav-item">
                                      <a href="<?php echo base_url('AdminController/'.$v_all['url_link']);?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p><?php echo $v_all['Item'];?></p>
                                      </a>
                                  </li>
                                <?php
                              }
                            }
                            ?>
                            </ul>
                      </li>
                    </ul>
                  <?php 
                  }
                }
                ?>
               </li>
              </ul>
            <?php       
            }           
            ?>
          </li>

          <!--Dynamic Module to Add all new services -->
          <?php
          // echo "<pre>";
          // print_r($sidebar_services);
          // echo "</pre>";
          // die;
          // foreach($sidebar_services as $v)
          // {
          // ?>
          <!-- //   <li class="nav-item">
          //     <a href="#" class="nav-link">
          //       <i class="nav-icon <?php //echo $v['service']['icon']; ?>"></i>
          //       <p>
          //         <?php //echo ucfirst($v['service']['name']); ?>
          //         <i class="fas fa-angle-left right"></i>
          //       </p>
          //     </a> -->
               <?php
          //     foreach($v['service_details'] as $v1)
          //     {
          //     ?>
          <!-- //     <ul class="nav nav-treeview">
          //       <li class="nav-item">
          //           <a href="<?php //echo base_url().'AdminController/'.$v1['controller_sidebar']; ?>" class="nav-link">
          //             <i class="nav-icon <?php //echo $v1['icon']; ?>"></i>
          //             <p><?php //echo $v1['category']; ?></p>
          //           </a>
          //       </li>
          //     </ul> -->
              
               <?php

          //     }
          //     ?>
             <!-- </li>  -->

           <?php
          // }
          // ?>

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Login & Register v1
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/examples/login.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/register.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/forgot-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/recover-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v1</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Login & Register v2
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/examples/login-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/register-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/recover-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v2</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Search
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/search/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Search</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/search/enhanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enhanced</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="iframe.html" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Tabbed IFrame Plugin</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.1/" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        
        
        
        
        
        
        </ul>
      </nav> -->
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
