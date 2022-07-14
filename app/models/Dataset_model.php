<?php

  class Dataset_model {
    public function __construct()
    {
      $this->db = new Database;
    }

    public function getOut($target) {
      $query = 'SELECT * from dataset
        where penilaian = :target
      ';

      $this->db->query($query);
      $this->db->bind('target', $target);

      $this->db->execute();

      return $this->db->rowCount();
    }

    public function getKK($column, $value, $target) {
      $query = "SELECT * from dataset where `$column`=:value and penilaian=:target";

      $this->db->query($query);
      $this->db->bind('target', $target);
      $this->db->bind('value', $value);


      $this->db->execute();

      return $this->db->rowCount();
    }

    public function getAll() {
      $query = "SELECT * from dataset";

      $this->db->query($query);
      $this->db->execute();

      return $this->db->resultSet();
    }
  }