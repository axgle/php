<?php
//putenv('PHPRC','.');
$pdo = new pdo("sqlite::memory:");
print_r($pdo);
 
echo $_SERVER["PHPRC"];
phpinfo();

print_r(ini_get_all());