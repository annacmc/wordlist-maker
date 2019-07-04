<html>
<head>
  <link rel="stylesheet" href="style.css" type="text/css">
      <?include 'functions.php';?>
</head>
<body>
<h1> French Wordlist Maker </h1>
<form method="post" action="./index.php" id="usrform">
<textarea name="text" placehold="Enter your text to translate here" form="usrform"></textarea>
<input type="submit" name="button" value="Submit"/>
</form>
<form>
  <table id = "translation-table">
    <?php
    $textResults = $_POST['text'];
    if(isset($_POST)){ ?>
<table id = "translation-table">
    <tr>
      <th></th>
      <th>French</th>
      <th>English</th>
    </tr>
<?php getWordList($textResults); } ?>
</table>

</form>
