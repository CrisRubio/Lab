<?php
    define('DB_NAME', 'al375866_ei1036_42');
    define('DB_USER', 'al375866');
    define('DB_PASSWORD', '20912335E');
    define('DB_HOST', "db-aules.uji.es");
    define('DB_CHARSET', 'utf8');
    define('DB_COLLATE', '');
    global $pdo;

    if (!isset($pdo)){
    try{
        $pdo = new PDO("pgsql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    }
    catch (PDOException $e) {
		$pdo = new PDO('sqlite::memory:',null,null,array(PDO::ATTR_PERSISTENT => true));
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        include_once("sqlite_test.php");
  }
}

    header('Content-Type: application/json');
    $result = $pdo->prepare("SELECT * FROM productos");
    $result->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
?>