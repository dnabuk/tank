<!DOCTYPE html>
<html>
<head>
<title>IAI Tank Game v1</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script></head>
<style>
	#klasyfikacja td{
		height:15px;}
		#klasyfikacja td:first-child{
		background:#CF9;}
	#klasyfikacja tr:first-child{
		background:#CFF;}
	#srodek{
		width:100px;}
	#board{
		background:#000;}
	#board td{
		width:25px;
		height:25px;
	}
	#console button{
		height:50px;
		width:50px;
		background:#C06;
		}
	</style>
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

				$("button[name='btnStart']").click(function(){
					alert('test');
				});
			});
			
			
		});
	
	function refreshTable(start){
	    $('#refresh').load('GetTable.php', function(){
	       		setTimeout(refreshTable, 1000);
				$("button").click(function(){
					id = this.id;
					$.ajax({
						url: "Attack.php?id=" + id, success: function(result){
						}
					});
				});
	    });
	}	

</script>
</body>
</html>