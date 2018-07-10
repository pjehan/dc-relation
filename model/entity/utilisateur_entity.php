<?php

function getUserByEmailPassword(string $email, string $password) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
            	  utilisateur.*,
                admin.id AS admin,
                etudiant.id AS etudiant,
                entreprise.id AS entreprise
            FROM utilisateur
            LEFT JOIN admin ON admin.id = utilisateur.id
            LEFT JOIN etudiant ON etudiant.id = utilisateur.id
            LEFT JOIN entreprise ON entreprise.id = utilisateur.id
            WHERE email = :email
            AND mot_de_passe = SHA1(:password);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    return $stmt->fetch();
}

function getOneUser(int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT *
            FROM utilisateur
            WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function insertUtilisateur(string $email, string $password, string $type) {
    /* @var $connection PDO */
    global $connection;

    $query = "INSERT INTO utilisateur (email, mot_de_passe, date_inscription)
                VALUES (:email, SHA1(:password), NOW());";

      /*$query = "INSERT INTO utilisateur(email, mot_de_passe, date_insciption)
              SELECT * FROM (SELECT ':email', :mot_de_passe, :date_insciption) AS tmp
              WHERE NOT EXISTS (
                SELECT email FROM utilisateur WHERE email = :email
              ) LIMIT 1;

            ";*/

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    $id = $connection->lastInsertId();

    if ($type == 'etudiant') {
      $query = "INSERT INTO etudiant (id) VALUES (:id);";
      $stmt = $connection->prepare($query);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
    }
}

function getAllEtudiants() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT utilisateur.email
              FROM
              utilisateur
              INNER JOIN etudiant
              ON etudiant.id = utilisateur.id

              ;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}
