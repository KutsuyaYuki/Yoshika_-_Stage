<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

global $db;

if ($input['action'] == 'edit') {
/* NAW Query */

$query_naw = $db->query('
UPDATE `naw`
   SET `roepnaam` = :roepnaam,
       `achternaam` = :achternaam
 WHERE `id` = :id');

$query_naw_params = array(
    ':roepnaam' => $input['roepnaam'],
    ':achternaam' => $input['achternaam'],
    ':id' => $input['id']
);

try {
// These two statements run the query against your database table.
    $stmt = $db->prepare($query_naw);
    $result = $stmt->execute($query_naw_params);
} catch (PDOException $ex) {
// Note: On a production website, you should not output $ex->getMessage().
// It may provide an attacker with helpful information about your code.
    die("Failed to run query: " . $ex->getMessage());
}

/* NAW Query END */

/* Categorie Query */

$query_categorie = $db->query('
UPDATE `category`
   SET `categorie` = :categorie
 WHERE `id` = :id');

$query_categorie_params = array(
    ':categorie' => $input['categorie'],
    ':id' => $input['id']
);

try {
// These two statements run the query against your database table.
    $stmt = $db->prepare($query_categorie);
    $result = $stmt->execute($query_categorie_params);
} catch (PDOException $ex) {
// Note: On a production website, you should not output $ex->getMessage().
// It may provide an attacker with helpful information about your code.
    die("Failed to run query: " . $ex->getMessage());
}

}
/* Categorie Query END */

    //$db->query("UPDATE naw SET roepnaam='" . $input['roepnaam'] . "', achternaam='" . $input['achternaam'] . "' WHERE id='" . $input['id'] . "'");
    //$db->query("UPDATE category SET category='" . $input['categorie'] . "' WHERE id='" . $input['id'] . "'");
echo json_encode($input);