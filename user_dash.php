<?php include 'includes/header.php';

if($_SESSION['user_loggedin'] != 'true') {
	header("Location: index.php");
}

?>
<div class="container-fluid">
	<div class="row">

		<div class="wrapper col-sm-12">
			<?php include 'includes/menu.php'; ?>
			<h1>Welcome <?php echo $_SESSION['user_name']; ?></h1>
			<?php include 'bet.php' ?>
		</div>	
	</div>
</div>

<div class="container-fluid">
	<div class="row">

		<ul class="tabs">
		    <li class="tab1 active">
		        <input type="radio" name="tabs" id="tab1" checked/>
		        <label for="tab1">Scoreboard</label>
		        <div id="tab-content1" class="tab-content">
		        </div>
		    </li>
		  
		    <li class="tab2">
		        <input type="radio" name="tabs" id="tab2" />
		        <label for="tab2">Bet</label>
		        <div id="tab-content2" class="tab-content">

		        </div>
		    </li>

		    <li class="tab3">
		        <input type="radio" name="tabs" id="tab3" />
		        <label for="tab3">Extra bets</label>
		        <div id="tab-content3" class="tab-content">

		        </div>
		    </li>
		</ul>

		<br style="clear: both;" />
	</div><!-- #row -->
</div><!-- #container-fluid -->
		

<?php include 'includes/footer.php' ?>
<script src="js/user_dash_script.js"></script>