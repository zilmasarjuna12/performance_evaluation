<?php

class Employee_model {
  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAll() {
    $query = 'SELECT e.id, e.fullname, u.email, j.name as job_position, e.job_level 
      from employees as e
      left join users as u
      on e.user_id = u.id
      left join job_positions as j
      on e.job_position_id = j.id
    ';
    
    $this->db->query($query);
    $this->db->execute();

    return $this->db->resultSet();
  }



  public function create($data) {
    $queryUser = "INSERT INTO users (email, password, role, created_at) VALUES(:email, :password, :role, :created_at)";
    $queryEmployee = 'INSERT INTO 
      employees (id, user_id, job_position_id, fullname, address, phone, gender, blood_type, marial_status, religion, birthday, join_date, job_level, created_at)
      VALUES (:id, :user_id, :job_position_id, :fullname, :address, :phone, :gender, :blood_type, :marial_status, :religion, :birthday, :join_date, :job_level, :created_at)
    ';

    $password = $this->randomPassword();
    $result['email'] = $data['email'];
    $result['password'] = $password;

    try {
      $this->db->root()->beginTransaction();
      $this->db->query($queryUser);

      $this->db->bind('email', $data['email']);
      $this->db->bind('role', $data['role']);
      $this->db->bind('password', $password);
      $this->db->bind('created_at', date("Y-m-d H:i:s"));
      $this->db->execute();
      $userId = $this->db->root()->lastInsertId();

      $birthday = new DateTime($data['birthday']);
      $joindate = new DateTime($data['join_date']);

      $this->db->query($queryEmployee);
      $this->db->bind('id', $data['id']);
      $this->db->bind('user_id', $userId);
      $this->db->bind('job_position_id', $data['job_position']);
      $this->db->bind('fullname', $data['fullname']);
      $this->db->bind('address', $data['address']);
      $this->db->bind('phone', $data['phone']);
      $this->db->bind('gender', $data['gender']);
      $this->db->bind('blood_type', $data['blood_type']);
      $this->db->bind('marial_status', $data['marial_status']);
      $this->db->bind('religion', $data['religion']);
      $this->db->bind('birthday', $birthday->format("Y-m-d H:i:s"));
      $this->db->bind('join_date', $joindate->format("Y-m-d H:i:s"));
      $this->db->bind('job_level', $data['job_level']);
      $this->db->bind('created_at', date("Y-m-d H:i:s"));

      $this->db->execute();

      $this->db->root()->commit();
    } catch (PDOException $e) {
      echo $e->getMessage();

      $this->db->root()->rollBack();
    }

    $result['count'] = $this->db->rowCount();

    return $result;
  }

  private function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
  }
}