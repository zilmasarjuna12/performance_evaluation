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

  public function getAll() {
    $query = 'SELECT *, j.name as job from users
      left join job_positions as j
      on users.job_position_id = j.id 
    ';

    $this->db->query($query);
    $this->db->execute();

    return $this->db->resultSet();
  }

  public function edit($data) {
    $query = "UPDATE users u
      SET u.email = :email,
          u.role = :role
      WHERE u.id = :id
    ";

    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('role', $data['role']);
    $this->db->execute();

    $result['count'] = $this->db->rowCount();

    return $result;
  }

  public function getById($id) {
    $query = 'SELECT * from users WHERE users.id = :id';

    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->single();
  }
}