<?php include 'includes/header.php'; ?>

<script src="js/ajax.min.js"></script>

	<div id="main-wrapper">
		<form id="registrationform" action="reg_user.php" method="post">

			<label>Username</label><br>
			<input type="text" id="uName" name="username">
			<!--The div contains the driffrent images that will toggle if the valuse of input is correct or not.-->
			<div class="picture"><img src="img/checked.png" class="hideImg" id="uchecked"><img src="img/unchecked.png" class="hideImg" id="uunchecked"></div>
			<!--The p tag will contain the error messages for what is wrong with the value in input-->
			<p id="message">&nbsp;</p>

			<label>Password</label><br>
			<input type="password" id="psw" name="password">
			<!--The div contains the driffrent images that will toggle if the valuse of input is correct or not.-->
			<div class="picture"><img src="img/checked.png" class="hideImg" id="pswchecked"><img src="img/unchecked.png" class="hideImg" id="pswunchecked"></div>
			<!--The p tag will contain the error messages for what is wrong with the value in input-->
			<p id="pswMsg">&nbsp;</p>
			
			<label>Email</label><br>
			<input type="email" id="email" name="email">
			<div class="picture"><img src="img/checked.png" class="hideImg" id="echecked"><img src="img/unchecked.png" class="hideImg" id="eunchecked"></div><br>

			<label>Repeat email</label><br>
			<input type="email" id="email_check">
			<div class="picture"><img src="img/checked.png" class="hideImg" id="ecchecked"><img src="img/unchecked.png" class="hideImg" id="ecunchecked"></div>
			
			</br>

			<?php 
			$query = "SELECT * FROM tournament";
			$result = mysqli_query($db_connect, $query);
			?>
			<label for="torunamentGroup">Choose Tournamnet:</label>
			<select class="form-control" name="selected_tournament"> 
				<option value="-1" selected="selected">Choose tournament</option>
				<?php
				while($row = mysqli_fetch_assoc($result)) { 
					$output = '<option '
						. 'value='
						. $row['tournament_id']
						. '>'
						. $row['tournament_name']
						. '</option>';

						echo $output;
				} 
				?>
			</select>


			<!--The div contains the driffrent images that will toggle if the valuse of input is correct or not.-->
			<!--The p tag will contain the error messages for what is wrong with the value in input-->
			<p id="emailMsg">&nbsp;</p>
			
			<input type="submit" id="send" value="Submit">

		</form>
		<p id="big-message">&nbsp;</p>

	</div>