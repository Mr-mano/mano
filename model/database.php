<?php
require_once __DIR__ . "/../config/parameters.php";

// Création de la connexion à la base de données
try {
    $bdd = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_HOST, DB_USER, DB_PASS, [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4', lc_time_names = 'fr_FR'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}


// Fonctions

function getAllEntities(string $table){
	global $bdd;

	$query= "SELECT * FROM $table";
	$req = $bdd->prepare($query);
	$req->execute();
	return $req->fetchAll();
}

function insertEntity(string $table, array $record){
    global $bdd;
    $query = "INSERT INTO $table (";

    foreach ($record as $key => $item) {
        $query .= $key . ',';
    }
    $query = rtrim($query,",") . ")";
    $query .= " VALUES (";

    foreach($record as $key => $item) {
        $query .= ':' . $key . ',';
    }
    $query = rtrim($query,",") . ")";
    $stmt = $bdd->prepare($query);

    foreach($record as $key => $item) {
        $stmt->bindValue(":" . $key , $item);
    }
    $stmt->execute();
    return $bdd->lastInsertId();
}

function updateEntity(string $table, int $id, array $values){
	global $bdd;
	$errcode = null;
	$query = "UPDATE $table SET ";
	foreach ($values as $key => $value) {
		$query .= "$key = :$key, ";
	}
	$query = rtrim($query, ", ");
	$query .= " WHERE id = :id";
	$stmt = $bdd->prepare($query);
	foreach ($values as $key => $value) {
		$stmt->bindValue(":$key", $value);
	}
	$stmt->bindParam(":id", $id);
	try {
		$stmt->execute();
	} catch (PDOException $ex) {
		$errcode = $ex->getCode();
	}
	return $errcode;
}

/** Count * sur une table donnée en paramètre
 * @param string $table Nom de la table
 * @return int
 */
function delete(string $table, int $id){
    global $bdd;
    $errcode = NULL;
    $query = " DELETE FROM $table WHERE id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(":id", $id);
    try{
        $stmt->execute();
    } catch (PDOException $exception) {
        $errcode = $exception->getCode();
    }
    return $errcode; 
}


function getById(int $id, string $table) {
    global $bdd;
    $query = "SELECT * FROM $table WHERE $table" . ".id = :id;";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

/** Récupère les photos liées a creation_site
 * @param int $id id de creation_site
 * @return array
 */
function getAllCreationSiteImage(int $id){
    global $bdd;
    $query = " SELECT creation_site.id, image_site.id, image_rea, alt_img
                FROM creation_site
                INNER JOIN image_site on creation_site.id = image_site.creation_site_id
                WHERE image_site.creation_site_id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getAllCreationSiteTechno(int $id){
    global $bdd;
    $query = "SELECT creation_site.id, techno_site.id, techno
                FROM creation_site
                INNER JOIN techno_site on creation_site.id = techno_site.creation_site_id
                WHERE techno_site.creation_site_id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getAllCreationSite(){
    global $bdd;
    $query = "SELECT *
                FROM creation_site
                ORDER BY date_creation DESC";
    $req = $bdd->prepare($query);
	$req->execute();
	return $req->fetchAll();
}




