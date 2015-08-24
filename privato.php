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
echo 'Benvenuto ' .$cod. '!!</br>';
echo "<a href='logout.php'>logout</a>";
?>
