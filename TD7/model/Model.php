<?php
require_once (File::build_path(array("config", "Conf.php")));

class Model {
  public static $pdo;

  public static function Init() {
      $hostname = Conf::getHostname();
      $database_name = Conf::getDatabase();
      $login = Conf::getLogin();
      $password = Conf::getPassword();

      try {
          self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
          self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
          if (Conf::getDebug()) {
              echo $e->getMessage(); // affiche un message d'erreur
          }
          else {
              echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
          }
          die();
      }
  }

  public static function selectAll() {
      try {
          $table_name = static::$object;
          $class_name = "Model" . ucfirst(static::$object);

          $rep = Model::$pdo->query("SELECT * FROM " . $table_name);
          $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
          return $rep->fetchAll();
      } catch(PDOException $e) {
          if (Conf::getDebug()) {
              echo $e->getMessage(); // affiche un message d'erreur
          }
          else {
              echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
          }
          die();
      }
  }

  public static function select($primary_value) {
      try {
          $table_name = static::$object;
          $class_name = "Model" . ucfirst(static::$object);
          $primary_key = static::$primary;

          $sql = "SELECT * FROM " . $table_name . " WHERE " . $primary_key . "=:primary";
          $req_prep = Model::$pdo->prepare($sql);

          $values = array("primary" => $primary_value,);
          $req_prep->execute($values);

          $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
          $tab_voit = $req_prep->fetchAll();
      } catch(PDOException $e) {
          if (Conf::getDebug()) {
              echo $e->getMessage(); // affiche un message d'erreur
          }
          else {
              echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
          }
          die();
      }

      if (empty($tab_voit))
            return false;
        return $tab_voit[0];
  }

  public static function delete($primary_value) {
      try {
          $table_name = static::$object;
          $primary_key = static::$primary;

          $sql = "DELETE FROM " . $table_name . " WHERE " . $primary_key . "=:primary";
          $req_prep = Model::$pdo->prepare($sql);

          $values = array('primary' => $primary_value);
          $req_prep->execute($values);
      } catch(PDOException $e) {
          if (Conf::getDebug()) {
              echo $e->getMessage(); // affiche un message d'erreur
          }
          else {
              echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
          }
          die();
      }
  }

  public static function update($data) {
      try {
          $table_name = static::$object;
          $primary_key = static::$primary;

          $sql = "UPDATE " . $table_name . " SET ";
          foreach ($data as $key => $value) {
              $sql .= $key . " = :" . $key . ', ';
          }
          $sql = rtrim($sql, ', ') . " WHERE " . $primary_key . " = :" . $primary_key;
          
          $req_prep = Model::$pdo->prepare($sql);
          $req_prep->execute($data);
      } catch(PDOException $e) {
          if (Conf::getDebug()) {
              echo $e->getMessage(); // affiche un message d'erreur
          }
          else {
              echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
          }
          die();
      }
  }

  public static function save($data) {
      try {
          $table_name = static::$object;
          $primary_key = static::$primary;

          $sql = "INSERT INTO " . $table_name . " (";
          foreach ($data as $key => $value){
              $sql .= $key . ', ';
          }

          $sql = rtrim($sql, ', ') . ") VALUES (";
          foreach ($data as $key => $value) {
              $sql .= ":" . $key . ', ';
          }
          $sql = rtrim($sql, ', ') . ")";

          $req_prep = Model::$pdo->prepare($sql);
          $req_prep->execute($data);
      } catch(PDOException $e) {
          if (Conf::getDebug()) {
              echo $e->getMessage(); // affiche un message d'erreur
          }
          else {
              echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
          }
          die();
      }
  }
}

Model::Init();
?>
