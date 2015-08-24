<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
include("connessione_db.php");
include("config.php"); 
//mi collego
$db = "host=localhost port=5432 dbname=thepulisher user=postgres password=postgres";
$dbconn3 = pg_connect($db);

 
//variabili POST con anti sql Injection
$username=pg_escape_string($_POST['username']); //faccio l'escape dei caratteri dannosi
$password=pg_escape_string(md5($_POST['password'])); //sha1 cifra la password anche qui in questo modo corrisponde con quella del db
 
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
$result = pg_query($dbconn3, $query);
$riga= pg_fetch_array($result, 0, PGSQL_NUM);  
 
/*Prelevo l'identificativo dell'utente */
$cod=$riga['username'];


/* Effettuo il controllo */
if ($cod == NULL) $trovato = 0 ;
else $trovato = 1;  
 
/* Username e password corrette */
if($trovato === 1) {
 
 /*Registro la sessione*/
  session_register('autorizzato');
 
  $_SESSION["autorizzato"] = 1;
 
  /*Registro il codice dell'utente*/
  $_SESSION['cod'] = $cod;
 
 /*Redirect alla pagina riservata*/
   echo '<script language=javascript>document.location.href="privato.php"</script>'; 
 
} else {
 
/*Username e password errati, redirect alla pagina di login*/
 //echo '<script language=javascript>document.location.href="index.html"</script>';
while ($row = pg_fetch_row($result)) {
  echo "id: $row[0]  Utente: $row[1]";
  echo "<br />\n";
}
}
?>