<?php
session_start();
//se non c'è la sessione registrata
if (!isset($_SESSION['autorizzato'])) {
  echo "<h1>Area riservata, accesso negato.</h1>";
  echo "Per effettuare il login clicca <a href='login.php'><font color='blue'>qui</font></a>";
  die;
}
 
//Altrimenti Prelevo il codice identificatico dell'utente loggato
session_start();
$cod = $_SESSION['autorizzato']; //id cod recuperato nel file di verifica
echo '<center>Benvenuto ' .$cod. '!!</center></br>';
echo "<center><a href='logout.php'>logout</a></center>";
?>

<!-- HTML here -->
<html>
	<head>
	<meta charset="UTF-8" />
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
	  $(document).ready(function(){
          $(".tab").hide();
          $("#home").show();
          $('.link').click(function(){ 
          	$("#wrapper").find($(this).attr('href')).show().siblings().hide();
			});
		 });
	  
	</script>
	</head>
	<body><center><h2>THE PULISHER</h2></center>
	<div align='center' style='background-color:blue; padding:4px;'>
		<span  style="background-color:orange; border:2px solid black; padding:4px;   width:150px"><a class="link" href='#home'>HOME</a></span>
		<span  style="background-color:orange; border:2px solid black; padding:4px;   width:150px"><a class="link" href='#task'>TASK</a></span>
		<span  style="background-color:orange; border:2px solid black; padding:4px;   width:150px"><a class="link" href='#valuta'>VALUTA</a></span>
		<span  style="background-color:orange; border:2px solid black; padding:4px;   width:150px"><a class="link" href='#stats'>STATISTICHE</a></span>
	</div>
	<hr/>
	<div id="wrapper">
		<div class="tab" id="home">
		<p align='justify'>
			Qui puoi gestire i tuoi task, valutare i task degli altri utenti, e controllare le statistiche!
		</p>
		</div>
		<div class="tab"  id="task">
			<p>task</p>
		</div>
		<div class="tab"  id="valuta">
			<p>valutazione</p>
		</div>
		<div class="tab"  id="stats">
			<p>statistiche</p>
		</div>
	</div>
	<hr/>
	</body>
</html>

