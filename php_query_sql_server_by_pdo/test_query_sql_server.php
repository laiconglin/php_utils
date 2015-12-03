<?php
$ip = "127.0.0.1";
$user = "user";
$pass = "pass";
$port = "1433";
$db_name = "db";

try {
	$dbh = new PDO("dblib:host={$ip}:{$port};dbname={$db_name}", $user, $pass);

	$sql = "select * from table_a";
	$sth = $dbh->prepare($sql);
	$sth->execute();
    $result = array();
	while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }

	$sql = "select top 10 * from table_b ORDER BY id ASC";
	$sth = $dbh->prepare($sql);
	$sth->execute();
    $result = $sth->fetchAll();
} catch (PDOException $e) {
	die("failed to get db handle:" . $e->getMessage());
}
