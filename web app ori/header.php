<?php
session_start();
?>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" >White Rabbit</a>
    </div>

    <form name="frmUser" method="post" action="">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li><a href="#">Home</a></li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        
        <li><p class="navbar-text navbar-right"><?php
        if($_SESSION["adminuser"]) {
          ?>
          Hi <?php echo $_SESSION["adminuser"]; ?></p> </li><li> <a href="logout.php" tite="Logout" >Logout</a>
          <?php
          }
          ?></li> 

        
      <!--
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign In <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>-->
      </ul>
    </div><!-- /.navbar-collapse -->
  </form>
  </div><!-- /.container-fluid -->
</nav>