<?
/*
###########################################################
#                                                         #
#   php EMOJI CAPCHA creato da greco395.com               #
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

<?
// MOSTRA IL CAPCHA
 echo "".$capcha['primo_a_testo']."+".$capcha['secondo_a_testo'].""; 
?>
