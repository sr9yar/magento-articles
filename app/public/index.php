<?php echo "hello<br>";

try{
  $dbh = new pdo( 'mysql:host=mysql:3306;dbname=root',
                  'root',
                  'root',
                  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  echo "mysql connection test: true<br>";
  //die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
  echo "mysql connection test: false<br><br><br><br><br>";
  //die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}

phpinfo(); 


$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);



