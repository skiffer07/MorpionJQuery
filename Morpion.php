<!DOCTYPE html>
<html>
<head>
	<title></title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<style type="text/css">
		table{
			margin-top: auto;
			margin-left: auto;
			background: none;
		}
		td{
			height: 50px;
			width: 50px;
			background: rgba(209,232,218, .3);
		}
		td.Player1{
			background: url("cross.png") no-repeat center;
			background-size: 40px 40px; 
			background-color: rgba(209,232,218, .3);
		}
		td.Player2{
			background: url("circle.png") no-repeat center;
			background-size: 40px 40px;	
			background-color: rgba(209,232,218, .3);
		}
	</style>
	<form onsubmit="return CreateMorpion()" method="post" id="formid">
		Player 1 : <input type="text" id="NP1" name="player1"> - Player 2 : <input type="text" name="player2" id="NP2"> 
		<input type="submit" name="valid">
	</form>
<table id="tablemorpion">
	
</table>

<script type="text/javascript">
	
		player1 = true;
		player2 = false;	

	function CreateMorpion()
	{
		NameP1 = $("#NP1").val();
		NameP2 = $("#NP2").val();
		Table = $("#tablemorpion");
		$("#tablemorpion tr").remove();
		Init(3,3);

		return false;

	}
	function Init(NbRow, NbCells)
	{

		var Row ="<tr>";
		var Cells ="";
		for (var i = 0; i < NbCells; i++) {
			Cells += "<td></td>";
		}
		Row +=Cells+"</tr>";
		for (var i = 0; i < NbRow; i++) {
			Table.append(Row);
		}

		$("td").attr("click","false");
		$("td").click(function(event){
			if($(this).attr("click") == "false"){
			$(this).attr("click","true");
			var Ligne = $(this).parent().index();
			var Colonne = $(this).index();
				if(player1 == true && player2 == false){
					player1 = false;
					player2 = true;
					$(this).attr("class","Player1");
					testWin("Player1",NameP1);
				}
				else if(player2 == true && player1 == false){
					player1 = true;
					player2 = false;
					$(this).attr("class","Player2");
					testWin("Player2",NameP2);	
				}				
			}
			
		});
	}

	function testWin(Player, Name){
		for (var i = 0; i < 3; i++) {
			if($("table tr:eq("+i+") td:eq(0)").attr("class") == Player && $("table tr:eq("+i+") td:eq(1)").attr("class") == Player && $("table tr:eq("+i+") td:eq(2)").attr("class") == Player){
					$("td").attr("click","true");
					alert(Name+" Win !");
			}
			if($("table tr:eq(0) td:eq("+i+")").attr("class") == Player && $("table tr:eq(1) td:eq("+i+")").attr("class") == Player && $("table tr:eq(2) td:eq("+i+")").attr("class") == Player){
					$("td").attr("click","true");
					alert(Name+" Win !");
			}			
		}
		if($("table tr:eq(0) td:eq(0)").attr("class") == Player && $("table tr:eq(1) td:eq(1)").attr("class") == Player && $("table tr:eq(2) td:eq(2)").attr("class") == Player){
					$("td").attr("click","true");
					alert(Name+" Win !");
			}			
		if($("table tr:eq(0) td:eq(2)").attr("class") == Player && $("table tr:eq(1) td:eq(1)").attr("class") == Player && $("table tr:eq(2) td:eq(0)").attr("class") == Player){
					$("td").attr("click","true");
					alert(Name+" Win !");
			}			

	}
</script>
</body>
</html>
