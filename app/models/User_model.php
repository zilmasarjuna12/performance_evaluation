<?php 

class User_model {
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function auth($data) {
    $query = 'SELECT * from users where email=:email and password=:password';

    $this->db->query($query);
    $this->db->bind('email', $data['email']);
    $this->db->bind('password', $data['password']);

    $this->db->execute();
    $users =  $this->db->single();

    return $users;
  }

  public function getUser() {
    return $this->name;
  }
}