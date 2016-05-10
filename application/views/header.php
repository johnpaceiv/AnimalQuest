<?php
    //Search Engine Optimization Will Be Setup Here
    $uri = $this->uri->uri_string();

    if($uri == "/" || "main/logout"){
        $page_title = "Home";
    };
    if($uri == "friendsList/results"){
        $page_title = "Search Results";
    };
    if($uri == "admin/admin_dashboard"){
        $page_title = "Rescue Dashboard";
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0"/>
    <title>Animal Quest | <?php echo $page_title;?></title>
    <link rel="stylesheet" href="<?php if($this->uri->total_segments() == 3 && $this->uri->slash_segment(2) != "details/"){echo '../../css/bootstrap-theme.css';}else{echo '../../../css/bootstrap-theme.css';}?>"/>
    <link rel="stylesheet" href="<?php if($this->uri->total_segments() == 3 && $this->uri->slash_segment(2) != "details/"){echo '../../css/bootstrap.css';}else{echo '../../../css/bootstrap.css';}?>"/>
    <link rel="stylesheet" href="<?php if($this->uri->total_segments() == 3 && $this->uri->slash_segment(2) != "details/"){echo '../../css/jquery-ui.css';}else{echo '../../../css/jquery-ui.css';}?>"/>
    <link rel="stylesheet" href="<?php if($this->uri->total_segments() == 3 && $this->uri->slash_segment(2) != "details/"){echo '../../css/jquery-ui.structure.css';}else{echo '../../../css/jquery-ui.structure.css';}?>"/>
    <link rel="stylesheet" href="<?php if($this->uri->total_segments() == 3 && $this->uri->slash_segment(2) != "details/"){echo '../../css/jquery-ui.theme.css';}else{echo '../../../css/jquery-ui.theme.css';}?>"/>
    <script src="<?php if($this->uri->total_segments() == 3  && $this->uri->slash_segment(2) != "details/"){echo '../../js/jquery.js';}else{echo '../../../js/jquery.js';}?>"></script>
    <script src="<?php if($this->uri->total_segments() == 3 && $this->uri->slash_segment(2) != "details/"){echo '../../js/jquery-ui.js';}else{echo '../../../js/jquery-ui.js';}?>"></script>
    <script src="<?php if($this->uri->total_segments() == 3 && $this->uri->slash_segment(2) != "details/"){echo '../../js/bootstrap.js';}else{echo '../../../js/bootstrap.js';}?>"></script>
    <script src="<?php if($this->uri->uri_string() == "friendsList/results"){echo '../../js/angularJs/angular.js';}?>"></script>
    <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700|Raleway:400,100,200,300,500,600,700,800,900|Cinzel:400,700,900|Archivo+Black|Rock+Salt|Quattrocento+Sans:400,400italic,700,700italic|Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php if($this->uri->total_segments() == 3 && $this->uri->slash_segment(2) != "details/"){echo '../../css/global_styles.css';}else{echo '../../../css/global_styles.css';}?>"/>
    <link rel="stylesheet" href="<?php if($this->uri->uri_string() == ""){echo '../../css/home-styles.css';}if($this->uri->uri_string() == "main/logout"){echo '../../../css/home-styles.css';}
                                       if($this->uri->uri_string() == "admin/admin_dashboard"){echo '../../../css/admin-styles.css';}if($this->uri->uri_string() == "friendsList/results"){echo '../../../css/friends-styles.css';}if($this->uri->slash_segment(2) == "details/"){echo '../../../css/details-styles.css';}
    ?>"/>
</head>
<body ng-app="aqApp" ng-controller="aq_controller">
<header>
    <!-- GLOBAL NAVIGATION -->
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img alt="Brand" class="logo hidden-xs" src="<?php if($this->uri->total_segments() == 3 && $this->uri->slash_segment(2) != "details/"){echo '../../img/AnimalQuestLogo.png';}else{echo '../../../img/AnimalQuestLogo.png';}?>">
                    <img alt="Brand" class="mobileLogo logo hidden-sm logo hidden-md hidden-lg" src="<?php if($this->uri->total_segments() == 3 && $this->uri->slash_segment(2) != "details/"){echo '../../img/AnimalQuestMobileLogo.png';}else{echo '../../../img/AnimalQuestMobileLogo.png';}?>">
<!--                    <p>--><?php //if($this->uri->slash_segment(2)!= "details/"){echo "success";}else{echo 'failiure';};?><!--</p>-->
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li ><a href="<?php if($this->uri->total_segments() == 0){echo '#';}if($this->uri->slash_segment(2) == "details/"){echo '../../';}else{echo '../';}?>"><?php if($this->uri->total_segments() == 0 || $this->uri->uri_string() == 'main/logout'){ echo '<span class="current">Home</span>';}else{echo 'Home';}?></a></li>
                    <li><a href="#"><?php if($this->uri->uri_string() == 'friendsList/results'){ echo '<span class="current">Friends List</span>';}else{echo 'Friends List';}?></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php if($this->uri->total_segments() == 0 || $this->uri->uri_string() == 'main/logout'){echo '#';}elseif($this->uri->slash_segment(2) == "details/"){echo '../../main/logout';}else{echo '../main/logout';}?>"><?php if(($this->uri->total_segments() == 0 || $this->uri->uri_string() == 'main/logout' || $_SESSION['status'] == 0) && $_SESSION['status'] == 0){echo '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>';}else{echo 'Logout';}?></a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- End Global Navigation -->
</header>
