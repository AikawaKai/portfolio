<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
include("connessione_db.php");
include("config.php"); 
//mi collego
$db = "host=localhost port=5432 dbname=thepulisher user=postgres password=postgres";
$dbconn3 = pg_connect($db) or die('Could not connect: ' . pg_last_error());
if($dbconn3)
{
 
	//variabili POST con anti sql Injection
	$username=pg_escape_string($_POST['username']); //faccio l'escape dei caratteri dannosi
	$password=pg_escape_string(md5($_POST['password'])); //sha1 cifra la password anche qui in questo modo corrisponde con quella del db
	 
	$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
	$result = pg_query($dbconn3, $query);
	$row = pg_fetch_row($result);  
	 
	/*Prelevo l'identificativo dell'utente */
	/* Effettuo il controllo */
	if ($row[0] == NULL) 
		$trovato = 0 ;
	else 
		$trovato = 1;  
	 
	/* Username e password corrette */
	if($trovato == 1) 
	{
	 /*Registro la sessione*/
	 
	  	$_SESSION['autorizzato'] = $row[1];
	 
	  /*Registro il codice dell'utente*/
	 echo "accesso in corso...";
	 /*Redirect alla pagina riservata*/
	 	echo '<script language=javascript>document.location.href="privato.php"</script>'; 
 
	 } 
	 else 
	 {
		 echo "Username e password errati, redirect alla pagina di login";
	   	  //echo '<script language=javascript>document.location.href="info.php"</script>'; 
		 echo '<script language=javascript>document.location.href="index.html"</script>';
		 
		
	 }
}
else
{
	echo "dbconnect failed";
}
?>