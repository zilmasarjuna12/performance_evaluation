<?php
  class DatasetKenaikanGaji_model {
    public function __construct()
    {
      $this->db = new Database;
    }

    public function getAll() {
      $query = "SELECT * from dataset_kenaikangaji";

      $this->db->query($query);
      $this->db->execute();

      return $this->db->resultSet();
    }

    public function add($data) {
      $query = "INSERT INTO dataset_kenaikangaji (email, fullname, job_position, delivery_time, execution, team_work, innovation, naik_gaji)
        VALUES(:email, :fullname, :job_position, :delivery_time, :execution, :team_work, :innovation, :naik_gaji)
      ";

      try {
        $this->db->query($query);

        $this->db->bind('email', $data['email']);
        $this->db->bind('fullname', $data['name']);
        $this->db->bind('job_position', $data['job_position']);
        $this->db->bind('delivery_time', $data['delivery_time']);
        $this->db->bind('execution', $data['execution']);
        $this->db->bind('team_work', $data['team_work']);
        $this->db->bind('innovation', $data['innovation']);
        $this->db->bind('naik_gaji', $data['naik_gaji']);

        $this->db->execute();
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
  }