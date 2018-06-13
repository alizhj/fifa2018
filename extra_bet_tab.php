<?php 
require "includes/db_connect.php";
session_start();
$user_id = $_SESSION["user_id"];
$tournament_id = $_GET['tour_id'];

$query1 = "SELECT team_name, team_id FROM teams";
$result1 = $db_connect->query($query1);

$result3 = $db_connect->query($query1);
$tournament_started = hasDateExpired("2018-06-14 17:00:00");

$result = mysqli_query($db_connect, "SELECT * FROM extra_bets WHERE user_id = '$user_id' AND tournament_id = '$tournament_id'");

while($row = mysqli_fetch_assoc($result)) {

	$team = $row["winning_team"];
	$player = $row["winning_player"];
}

while($row = mysqli_fetch_assoc($result3)) { 

	if($team == $row['team_id']){
		$teamName = $row['team_name'];
		break;
	}
}


	$extraBetQuery = "SELECT extra_bets.*, teams.team_name, teams.team_flag, users.user_name FROM extra_bets
					RIGHT JOIN teams
					ON teams.team_id = extra_bets.winning_team
					RIGHT JOIN users
					ON users.user_id = extra_bets.user_id
					WHERE tournament_id = $tournament_id";

	$extraBetResult = $db_connect->query($extraBetQuery);
			


?>
<input id="tour_id" type="hidden" value="<?php echo $tournament_id ?>">

		<div class="extra_bet_box">
<? if($tournament_started){
					?>
			<form action="includes/save_extra_bet.php" class="inline" method="post" role="form">
				<div class="form-group">
					<label for="player">Top scorer:</label>
					<input class="form-control" type="text" name="player" value="<?php echo $player; ?>"/>
				</div>
				<div class="form-group">
					<label for="winning_team">World Cup winner:</label>
					<select class="form-control" name="selected_team"> 
						<option value="-1">Choose team</option>
						<?php
						while($row = mysqli_fetch_assoc($result1)) { 
							$output = '<option '
								.($team == $row['team_id'] ? 'selected=selected' : '')
								. 'value='
								. $row['team_id']
								. '>'
								. $row['team_name']
								. '</option>';

								echo $output;
						} 
						?>
					</select>
				</div>
				

				<input class="btn btn-default" type="submit" value="Spara"/>
				<input type="hidden" name="prev_team" value="<?php echo $team; ?>" />
				<input type="hidden" name="tournament_id" value="<?php echo $tournament_id; ?>" />
				
			</form>	
			

			<div class="extraBetList">
				<table>
					<tr>
						<th>User</th>
						<th>Winning team</th>
						<th>Top Scorer</th>
					</tr>

					<?php
					while($row = mysqli_fetch_assoc($extraBetResult)) { 
						$user = $row["user_name"];
						$team = $row["team_name"];
						$player = $row["winning_player"];
						$flag = $row["team_flag"];
						?>
						<tr>
							<td><?php echo $user; ?></td>
							<td><?php echo $team; ?><img class="flag" src="img/flags/<?php echo $flag; ?>"/></td>
							<td><?php echo $player; ?></td>
						</tr>
						<?php
					}
					?>
			</table>
			</div>
		<?php
		} else {
		?>
			<div class="form-group">
			<label for="player">Top scorer:</label>
			<?php echo $player; ?>
		</div>
		<div class="form-group">
			<label for="winning_team">World Cup winner:</label>
			<?php echo $teamName; ?>								
		</div>
		<?php
		}
		?>
				

</div>






<script src="js/bet_checker.js"></script>