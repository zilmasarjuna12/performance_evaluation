<?php
  class DatasetClassification_model {
    public function __construct()
    {
      $this->db = new Database;
    }

    public function getAll() {
      $query = "SELECT * from dataset_classification";

      $this->db->query($query);
      $this->db->execute();

      return $this->db->resultSet();
    }

    public function getAllTraining() {
      $query = "SELECT * from dataset_classification_training";

      $this->db->query($query);
      $this->db->execute();

      return $this->db->resultSet();
    }

    public function add($data) {
      $query = "INSERT INTO dataset_classification (email, fullname, job_position, delivery_time, execution, team_work, innovation, penilaian)
        VALUES(:email, :fullname, :job_position, :delivery_time, :execution, :team_work, :innovation, :penilaian)
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
        $this->db->bind('penilaian', $data['penilaian']);

        $this->db->execute();
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function addTraining($data) {
      $query = "INSERT INTO dataset_classification_training (email, fullname, job_position, delivery_time, execution, team_work, innovation, penilaian)
        VALUES(:email, :fullname, :job_position, :delivery_time, :execution, :team_work, :innovation, :penilaian)
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
        $this->db->bind('penilaian', $data['penilaian']);

        $this->db->execute();
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function addTesting($data) {
      $query = "INSERT INTO dataset_classification_testing (email, fullname, job_position, delivery_time, execution, team_work, innovation, penilaian)
        VALUES(:email, :fullname, :job_position, :delivery_time, :execution, :team_work, :innovation, :penilaian)
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
        $this->db->bind('penilaian', $data['penilaian']);

        $this->db->execute();
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function getAllTesting() {
      $query = "SELECT * from dataset_classification_testing";

      $this->db->query($query);
      $this->db->execute();

      return $this->db->resultSet();
    }

    public function getOutTraining($target) {
      $query = 'SELECT * from dataset_classification_training
        where penilaian = :target
      ';

      $this->db->query($query);
      $this->db->bind('target', $target);

      $this->db->execute();

      return $this->db->rowCount();
    }

    public function getOut($target) {
      $query = 'SELECT * from dataset_classification
        where penilaian = :target
      ';

      $this->db->query($query);
      $this->db->bind('target', $target);

      $this->db->execute();

      return $this->db->rowCount();
    }

    public function getKK($column, $value, $target) {
      $query = "SELECT * from dataset_classification where `$column`=:value and penilaian=:target";

      $this->db->query($query);
      $this->db->bind('target', $target);
      $this->db->bind('value', $value);


      $this->db->execute();

      return $this->db->rowCount();
    }

    public function getKKTraining($column, $value, $target) {
      $query = "SELECT * from dataset_classification_training where `$column`=:value and penilaian=:target ";

      $this->db->query($query);
      $this->db->bind('target', $target);
      $this->db->bind('value', $value);

      $this->db->execute();

      return $this->db->rowCount();
    }
  }