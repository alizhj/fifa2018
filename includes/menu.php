                                                                                                                                                                                                                                                                                                <nav class="navbar navbar-default">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="user_dash.php">Scoreboard & Bets</a></li>
            <li><a href="team_groups.php">Groups & Games</a></li>
            <li><a href="results.php">Results</a></li>
            <li><a href="spelregler.php">Playrules</a></li>
        </ul>

        <ul class="nav navbar-nav logout">
            <?php 
            if(isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == 'true'){ 
                ?>
                <li>Admin: <?php echo $_SESSION['user_name']; ?></li>
                <li><a href="logout.php">Log out</a></li>
                <?php echo $_SESSION['admin_loggedin'];?>
                <?php 
            }
            else if(isset($_SESSION['user_loggedin']) && $_SESSION['user_loggedin'] == 'true'){
                ?>
                <li><a href="logout.php">Log out</a></li>
                <?php 
            }?>  
        </ul>
    </div><!-- /.navbar-collapse -->

</nav>