$(document).ready(function(){

	if($('#tournament_select').length !== 0){
	
		var tour_id = $('#tournament_select > option:selected').val();
		$('#tab-content1').load( 'tournaments_single.php?tour_id='+tour_id );
		$('#tab-content2').load( 'includes/betting.php?tour_id='+tour_id );
		$('#tab-content3').load( 'extra_bet_tab.php?tour_id='+tour_id );
	
		$('#tournament_select').change(function(){
			tour_id = ($(this,'>option:selected').val());
		});
		
		$('#btn_select_tournament').click(function(){

			$('#tab-content1').load( 'tournaments_single.php?tour_id='+tour_id );
			$('#tab-content2').load( 'includes/betting.php?tour_id='+tour_id );
			$('#tab-content3').load( 'extra_bet_tab.php?tour_id='+tour_id );
		});
	}else if($('#tour_heade').length !== 0){

		var tour_id = $('#tournament_id').val();
		$('#tab-content1').load( 'tournaments_single.php?tour_id='+tour_id );
		$('#tab-content2').load( 'includes/betting.php?tour_id='+tour_id );
		$('#tab-content3').load( 'extra_bet_tab.php?tour_id='+tour_id );

	} 
	


});
