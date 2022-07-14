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
    $query = 'SELECT *, users.id as user_id, j.name as job from users
      left join job_positions as j
      on users.job_position_id = j.id 
    ';

    $this->db->query($query);
    $this->db->execute();

    return $this->db->resultSet();
  }

  public function getAllEmployee() {
    $query = "SELECT *, j.name as job, users.id as user_id from users
      left join job_positions as j
      on users.job_position_id = j.id
      WHERE users.role = 'karyawan'
    ";

    $this->db->query($query);
    $this->db->execute();

    return $this->db->resultSet();
  }

  public function add($data) {
    $query = "INSERT INTO users (email, password, role, job_position_id, fullname, created_at)
      VALUES(:email, :password, :role, :job_position_id, :fullname, :created_at)
    ";

    try {
      $this->db->query($query);

      $this->db->bind('email', $data['email']);
      $this->db->bind('password', 'Ottodigital01');
      $this->db->bind('role', $data['role']);
      $this->db->bind('job_position_id', $data['job_position']);
      $this->db->bind('fullname', $data['fullname']);
      $this->db->bind('created_at', date("Y-m-d H:i:s"));

      $this->db->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

    $result['count'] = $this->db->rowCount();
    
    return $result;
  }

  public function edit($data) {
    $query = "UPDATE users u
      SET u.email = :email,
          u.role = :role
          u.password = :password
          u.job_position_id = :job_position_id
          u.fullname = :fullname
          u.updated_at = :updated_at
      WHERE u.id = :id
    ";

    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('password', $data['password']);
    $this->db->bind('role', $data['role']);
    $this->db->bind('job_position_id', $data['job_position_id']);
    $this->db->bind('fullname', $data['fullname']);
    $this->db->bind('employee_id', $data['employee_id']);
    $this->db->bind('created_at', date("Y-m-d H:i:s"));

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