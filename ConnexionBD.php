<?php

//Cette classe permet de se connecter à la base de données

class ConnexionBD
{
    protected static $bdd;

    public static function initConnexion()
    {
        $dns = "mysql:host=localhost; dbname=top_culture_data_base";
        $user = "Mohcine";
        $password = "root93";
        try {
            self::$bdd = new PDO($dns, $user, $password);
        } catch (PDOException $e) {
            echo "Non co";
        }
    }
}

?>
<?php
ConnexionBD::initConnexion();
?>