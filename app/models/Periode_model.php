<?php 

class Periode_model {
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getActive() {
    $query = 'SELECT * from periodes WHERE periodes.is_active = 1';

    $this->db->query($query);

    $this->db->execute();
    
    return $this->db->single();
  }

  public function getAll() {
    $query = 'SELECT * from periodes';

    $this->db->query($query);
    $this->db->execute();
    
    return $this->db->resultSet();
  }

  public function getAllPublished() {
    $query = 'SELECT * from periodes where periodes.is_published = 1';

    $this->db->query($query);
    $this->db->execute();
    
    return $this->db->resultSet();
  }

  public function getDetail($id) {
    $query = 'SELECT * from periodes WHERE periodes.id = :id';

    $this->db->query($query);
    $this->db->bind("id", $id);

    $this->db->execute();
    
    return $this->db->single();
  }

  public function add($data) {
    $query = "INSERT INTO periodes (name) VALUES(:name)";

    try {
      $this->db->query($query);

      $this->db->bind("name", $data['name']);

      $this->db->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

    $result['count'] = $this->db->rowCount();

    return $result;
  }

  public function start($id) {
    $query = "UPDATE periodes p
      SET p.is_active = 1
      WHERE p.id = :id
    ";

    try {
      $this->db->query($query);

      $this->db->bind("id", $id);

      $this->db->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

    $result['count'] = $this->db->rowCount();

    return $result;
  }

  public function publish($id) {
    $query = "UPDATE periodes p
      SET p.is_published = 1
      WHERE p.id = :id
    ";

    try {
      $this->db->query($query);

      $this->db->bind("id", $id);

      $this->db->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

    $result['count'] = $this->db->rowCount();

    return $result;
  }
}