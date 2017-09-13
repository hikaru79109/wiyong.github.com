<div id="nav-col">
    
    <section id="col-left" class="col-left-nano">
        <div id="col-left-inner" class="col-left-nano-content">
            
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
                <ul class="nav nav-pills nav-stacked">
                    
                    <?php
                    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $url=base_url().'admin/dashboard';
                    if($actual_link==$url) {
                        ?>
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/dashboard">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                                <span class="label label-primary label-circle pull-right"></span>
                            </a>
                        </li>
                        <?php
                    }
                    else {
                        ?>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/dashboard">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                                <span class="label label-primary label-circle pull-right"></span>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                    
                    
                    <?php
                    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $url1=base_url().'admin/manage_booking?status_code=pending';
                    $url2=base_url().'admin/manage_booking?status_code=completed';
                    $url3=base_url().'admin/manage_booking?status_code=user-cancelled';
                    $url4=base_url().'admin/manage_booking?status_code=driver-unavailable';
                    $url5=base_url().'admin/manage_booking';
                    if($actual_link==$url5) {
                    ?>
                        
                    <?php    
                    }
                    
                    
                    else if($actual_link==$url4){
                    ?>
                        
                    <?php
                    }
                    else {
                        ?>
                        
                        <?php
                    }
                    ?>
                    <?php
                    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $url5=base_url().'admin/manage_driver';
                    $url6=base_url().'admin/manage_driver?flag=yes';
                    if($actual_link==$url5) {
                        ?>
                       
                        <?php
                    }
                    else if($actual_link==$url6){
                        ?>
                        
                        <?php
                    }
                    else {
                        ?>
                        <li>
                            <!--onclick="window.location.href='<?php echo base_url(); ?>admin/manage_booking'"-->
                            <a href="javascript:void(0);" class="dropdown-toggle">
                                <i class="fa fa-user"></i>
                                <span>Manage Driver</span>
                                <i class="fa fa-angle-right drop-icon"></i>
                            </a>
                            <ul class="submenu" style="display: none;">
                                <li>
                                    <a href="javascript:void(0);" onclick="window.location.href='<?php echo base_url(); ?>admin/add_driver'">
                                        Add Drivers
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    $url=base_url().'admin/manage_car_type';
                    if($actual_link==$url)
                    {
                        ?>
                        <li class="active">
                            <a href="javascript:void(0);" class="dropdown-toggle"
                               onclick="window.location.href='<?php echo base_url(); ?>admin/manage_car_type'">

                                <i class="fa fa-taxi"></i>
                                <span>Manage Car Type</span>
                                <i class="fa fa-angle-right drop-icon"></i>
                            </a>
                        </li>
                        <?php
                    }
                    else {
                        ?>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-toggle"
                               onclick="window.location.href='<?php echo base_url(); ?>admin/manage_car_type'">

                                <i class="fa fa-taxi"></i>
                            <span>Manage Car Type
</span>
                                <i class="fa fa-angle-right drop-icon"></i>
                            </a>
                        </li>
                        <?php
                    }
                   
                    ?>
                    
					<?php
                    $url=base_url().'admin/add_driver';
                    if($actual_link==$url)
                    {
                        ?>
                        <li class="active">
                            <a href="javascript:void(0);" class="dropdown-toggle"
                               onclick="window.location.href='<?php echo base_url();?>admin/add_driver'">

                                <i class="fa fa-cog"></i>
                                <span>driver_sign_up</span>
                                <i class="fa fa-angle-right drop-icon"></i>
                            </a>
                        </li>
                        <?php
                    }
                    else {
                        ?>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-toggle"
                               onclick="window.location.href='add_driver'">

                                <i class="fa fa-cog"></i>
                            <span>driver_sign_up
</span>
                                <i class="fa fa-angle-right drop-icon"></i>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
					
					<?php
                    $url=base_url().'admin/add_driver';
                    if($actual_link==$url)
                    {
                        ?>
                        <li class="active">
                            <a href="javascript:void(0);" class="dropdown-toggle"
                               onclick="window.location.href='<?php echo base_url();?>admin/add_driver'">

                                <i class="fa fa-cog"></i>
                                <span>driver_sign_up</span>
                                <i class="fa fa-angle-right drop-icon"></i>
                            </a>
                        </li>
                        <?php
                    }
                    else {
                        ?>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-toggle"
                               onclick="window.location.href='add_driver'">

                                <i class="fa fa-cog"></i>
                            <span>driver_sign_up
</span>
                                <i class="fa fa-angle-right drop-icon"></i>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </section>
    <div id="nav-col-submenu"></div>
</div>