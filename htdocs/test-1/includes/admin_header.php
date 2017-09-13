<header  id="header-navbar">
    <div class="container" >
        

        <div  class="clearfix">
            <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>

            <div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
                <ul class="nav navbar-nav pull-left">
                    <li>
                        <a class="btn" id="make-small-nav">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="nav-no-collapse pull-right" id="header-nav">
                <ul class="nav navbar-nav pull-right">
                    <li class="mobile-search">
                        <a class="btn">
                            <i class="fa fa-search"></i>
                        </a>

                        <div class="drowdown-search">
                            <form role="search">
                                <div class="form-group">
                                    <input type="text" id="example1" class="form-control" placeholder="Search...">
                                    <i class="fa fa-search nav-search-icon"></i>
                                </div>
                            </form>
                        </div>

                    </li>
                    <?php
                    $sql="SELECT * FROM `adminlogin` WHERE role='admin'";
                    $qry=mysql_query($sql);
                    $data=mysql_fetch_array($qry);
                    ?>
                   
                </ul>
            </div>
        </div>
    </div>
</header>