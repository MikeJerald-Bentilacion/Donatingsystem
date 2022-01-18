<?php
	echo '
	    <aside class="left-side sidebar-offcanvas">
            <section class="sidebar">
                <div class="user-panel"> 
                    <div class="pull-left info">
                        <h4>Welcome, '.$_SESSION['role'].'</h4>
                    </div>
                </div>
                    ';
                    if($_SESSION['role'] == "Administrator"){
                        echo '
                    <ul class="sidebar-menu">
                        <li>
                            <a href="../dashboard/background.php">
                                <i class="fa fa-home"></i> <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="../dashboard/dashboard.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="../donor/donor.php">
                                <i class="fa fa-user"></i> <span>Donor</span>
                            </a>
                        </li>
                        <li>
                            <a href="../rider/rider.php">
                                <i class="fa fa-user"></i> <span>Rider</span>
                            </a>
                        </li>
                        <li>
                            <a href="../item/item.php">
                                <i class="fa fa-file"></i> <span>Item</span>
                            </a>
                        </li>
                        <li>
                            <a href="../schedule/schedule.php">
                                <i class="fa fa-file"></i> <span>Schedule</span>
                            </a>
                        </li>
                    </ul>';
                    }
                    elseif($_SESSION['role'] == "Rider"){
                        echo '
                        <ul class="sidebar-menu">
                            <li>
                                <a href="../item/item.php">
                                    <i class="fa fa-file"></i> <span>Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="../schedule/schedule.php">
                                    <i class="fa fa-file"></i> <span>Schedule</span>
                                </a>
                            </li>
                        </ul>';
                    }
                    elseif(isset($_SESSION['Donor'])){
                        echo '
                        <ul class="sidebar-menu">
                            <li>
                                <a href="../item/item.php">
                                    <i class="fa fa-file"></i> <span>Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="../schedule/schedule.php">
                                    <i class="fa fa-file"></i> <span>Schedule</span>
                                </a>
                            </li>
                        </ul>';
                    }
                    else{
                        echo '
                        <ul class="sidebar-menu">
                            <li>
                                <a href="../item/item.php">
                                    <i class="fa fa-file"></i> <span>Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="../schedule/schedule.php">
                                    <i class="fa fa-file"></i> <span>Schedule</span>
                                </a>
                            </li>
                        </ul>';
                    }
                echo '
            </section>
        </aside>
	';
?>