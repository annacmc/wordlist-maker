<?php

function getWordList($file){
// Get contents of txt file //
//$file = file_get_contents('text.txt');

// Set all words to lowecase //
$file = strtolower ( $file ) ;

// Strip punctuation except for ' //
$file = preg_replace("/[^a-zA-Z\'\Ç\ç\é\É\â\Â\ê\Ê\Î\î\Ô\ô\û\Û\à\À\è\È\ù\Ù\ë\Ë\ï\Ï\ü\É\s]/", "", $file);

// split file contents by whitespace //
$file_words = preg_split('/\s+/', $file);

// Remove dupicate words //
$file_words = array_unique($file_words);

// Remove words with less than 3 chars //
$file_words= array_filter($file_words,function($v){ return strlen($v) > 3; });

// Remove empty values //
$file_words = array_filter($file_words);

// Sort words alphabetically //
sort($file_words);

// count words
$file_count = count($file_words);

// wordlist For loop
for ($i=0; $i < $file_count; $i++){

// Define variables for pre & post translated strings
$textString = $file_words[$i];
$translatedString = translateText($textString);

// Add to the array
$translation_array[$textString] = $translatedString;

// End append array loop
}

// Display results Loop
foreach($translation_array as $textString => $translatedString) {
?>
<tr>
  <td class="checkbox-col">
  <input type="checkbox" id="<?php echo $i; ?>" name="keepTranslation" checked></td>
  <td class="lang1-cold">
<?php

// Output translations
 echo $textString . "</td> <td class='lang2-col'>";
 echo $translatedString;
 echo "</td></tr>";

// end display loop
}

// return array of translations
return $translation_array;

// create CSV
createCsv($translation_array);

// end function
}

function translateText($text){
  //function to communicate with Google translate API and output string translation

 $apiKey = 'AIzaSyASuu8TH3MRuv0g-yeKi0qoEYrH6Hc25Fo';
 $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=fr&target=en';
 $handle = curl_init($url);
 curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE);
 curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, FALSE);
 curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
 $response = curl_exec($handle);
 $responseDecoded = json_decode($response, true);

 curl_close($handle);

$results = print_r($responseDecoded['data']['translations'][0]['translatedText'], true);
return $results;
}



?>
