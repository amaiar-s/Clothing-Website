<?php
$databaseName = 'ARODRI24_labs';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'arodri24_writer';
$password = '%Z3E]m:_jf(n/fzX}O,;';

$pdo = new PDO($dsn, $username, $password);
if($pdo) print '<!-- Connection complete-->';
?>