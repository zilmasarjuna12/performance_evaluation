<?php

class JobPositions_model {
  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAll() {
    $query = 'SELECT * from job_positions';

    $this->db->query($query);
    $this->db->execute();
    
    return $this->db->resultSet();
  }
}