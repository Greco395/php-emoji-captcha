<?
/*
###########################################################
#                                                         #
#   php EMOJI CAPCHA creato da greco395.com               #
#                                                         #
#   Syle bootstrap ( https://github.com/twbs/bootstrap )  #
#                                                         #
###########################################################
*/

// CAPCHA IN EMOJI
function capcha()
{
    $numero['primo']           = (rand(0,9));
    $numero['secondo']         = (rand(0,9));
    $numero['primo_a_testo']   = numero_a_emoji($numero['primo']);
    $numero['secondo_a_testo'] = numero_a_emoji($numero['secondo']);
    $numero['risultato']       = $numero['primo']+$numero['secondo'];
    
    return $numero;
}

// Numero in emoji
function numero_a_emoji($numero)
{
    switch ($numero)
    {
        case "0":
            return "0️⃣";
        case "1":
            return "1️⃣";
        case "2":
            return "2️⃣";
        case "3":
            return "3️⃣";
        case "4":
            return "4️⃣";
        case "5":
            return "5️⃣";
        case "6":
            return "6️⃣";
        case "7":
            return "7️⃣";
        case "8":
            return "8️⃣";
        case "9":
            return "9️⃣";
    }
}

// CRIPTO IL RISULTATO
function hash_value($value){
  $key = "scrivere qui almeno 15 caratteri alfanumerici a caso";
  $hashed_value = hash("SHA256", $value . $key);
  return $hashed_value;
}

// varibili
$capcha = capcha();
$risultato = $capcha['risultato'];


// input ricevuti dal utente
$input = $_POST['input'];
$token = $_POST['token'];

// variabili criptati
$encode_risultato = hash_value($risultato);


// Controllo se il capcha è corretto
if(hash_value($input) == $token){
    $capcha_result = "CAPCHA RISOLTO";
}else{
    $capcha_result = "CAPCHA NON CORRETTO";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>php Emoji Capcha</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta author="greco395.com">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--
###########################################################
#                                                         #
#   php Emoji Capcha creato da greco395.com               #
#                                                         #
#   Syle bootstrap ( https://github.com/twbs/bootstrap )  #
#                                                         #
###########################################################
-->
<div class="jumbotron text-center">
  <h1>EMOJI CAPCHA</h1>
  <p>Scrivi il risultato del capcha e premi invio.</p> 
</div>
  
<div class="container">
    <h2>
        <? 
          // MOSTRO IL RISULTATO DEL CAPCHA
          if(!empty($_POST['input'])){ 
                           echo $capcha_result;
           }
        ?>
    </h2>

  <div class="row">
      <form action="" method="POST">
            <center><h3>
             <? 
               // INPUT NASCOSTO CON IL RISULTATO DEL CAPCHA CRIPTATO
               echo '<input type="hidden" name="token" value="'.$encode_risultato.'">';
               // MOSTRO IL CALCOLO DA FARE
               echo "".$capcha['primo_a_testo']."+".$capcha['secondo_a_testo'].""; 
             ?>
            </h3></center>
            <br>
           <input type="text" class="form-control" placeholder="Risultato Capcha" name="input">
           <br>
        <button type="submit" class="btn btn-block btn-info"><span class="glyphicon glyphicon-send"></span>  INVIA</button>
      </form>
  </div>
</div>
<br><br><center><a href="http://kinguser.me/projects.html">tutti i progetti e il codice sorgente di questo</a></center>


</body>
</html>
