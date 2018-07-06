<!DOCTYPE html>
<html>
<head>
<title>IAI Tank Game v1</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<style>
	#klasyfikacja td{
		height:15px;}
	#srodek{
		width:100px;}
	#board{
		background:#000;}
	#board td{
		width:25px;
		height:25px;}
	</style>
</head>
<body>


<div id="main">
	<h2>PHP Camp - IAI Tank</h2>
		<div id="refresh">
			<button type="button" name="btnStart">START GAME</button>
		</div>
</div>
	<script type="text/javascript">
	var start = false;
	
	$(document).ready(function(){
			$("button[name='btnStart']").click(function(){
				$.ajax({
					url: "StartGame.php", success: function(result){
					
					}
				});
				refreshTable(start);
			});
			
			
		});
	
	function refreshTable(start){
	    $('#refresh').load('GetTable.php', function(){
	       		setTimeout(refreshTable, 1000);
	    });
	}	

	</script>
	</body>
	</html>