<?php
  class Penilaian_model {
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    public function add($data) {
      $query = "INSERT INTO 
        penilaian (delivery_time, delivery_time_comment, execution, execution_comment, team_work, team_work_comment, innovation, innovation_comment, created_by, periode_id, status_penilaian)
        VALUES (:delivery_time, :delivery_time_comment, :execution, :execution_comment, :team_work, :team_work_comment, :innovation, :innovation_comment, :created_by, :periode_id, :status_penilaian)
      ";

      try {
        $this->db->query($query);
        $this->db->bind("delivery_time", $data['delivery_time']);
        $this->db->bind("delivery_time_comment", $data['delivery_time_comment']);
        $this->db->bind("execution", $data['execution']);
        $this->db->bind("execution_comment", $data['execution_comment']);
        $this->db->bind("team_work", $data['team_work']);
        $this->db->bind("team_work_comment", $data['team_work_comment']);
        $this->db->bind("innovation", $data['innovation']);
        $this->db->bind("innovation_comment", $data['innovation_comment']);
        $this->db->bind("created_by", $data['created_by']);
        $this->db->bind("periode_id", $data['periode_id']);
        $this->db->bind("status_penilaian", "submitted");
        $this->db->execute();
      } catch (PDOException $e) {
        echo $e->getMessage();
      }

      $result['count'] = $this->db->rowCount();

      return $result;
    }

    public function getPenilaianByUserID($periodeId, $userID) {
      $query = 'SELECT * from penilaian where penilaian.created_by = :user_id and penilaian.periode_id = :periode_id' ;
     
      $this->db->query($query);
      $this->db->bind('user_id', $userID);
      $this->db->bind('periode_id', $periodeId);
      $this->db->execute();

      return $this->db->single();;
    }

    public function getPenilaianAndResultByUserID($periodeId, $userID) {
      $query = 'SELECT *, p.id as penilaian_id, rn.result as naik_gaji, rc.result as classification from penilaian as p
        left join result_classification as rc
        on rc.id = p.result_classification_id
        left join result_naik_gaji as rn
        on rn.id = p.result_naik_gaji_id
        where p.created_by = :user_id and p.periode_id = :periode_id' ;
     
      $this->db->query($query);
      $this->db->bind('user_id', $userID);
      $this->db->bind('periode_id', $periodeId);
      $this->db->execute();

      return $this->db->single();;
    }

    public function getAllEmployeeAndPenilaian($periode_id) {
      $query = "SELECT *, users.id as user_id, j.name as job, p.id as penilaian_id from users
        left join job_positions as j
        on users.job_position_id = j.id
        left join penilaian as p
        on p.created_by = users.id
        left join periodes as per
        on per.id = p.periode_id 
        WHERE users.role = 'karyawan'
      ";

      $this->db->query($query);
      $this->db->bind('periode_id', $periode_id);
      $this->db->execute();

      return $this->db->resultSet();
    }

    public function edit($data) {
      $query = "UPDATE penilaian 
        SET delivery_time = :delivery_time, 
            delivery_time_comment = :delivery_time_comment, 
            execution = :execution, 
            execution_comment = :execution_comment, 
            team_work = :team_work, 
            team_work_comment = :team_work_comment, 
            innovation = :innovation, 
            innovation_comment = :innovation_comment, 
            status_penilaian = :status_penilaian
        WHERE penilaian.id = :id
      ";

      try {
        $this->db->query($query);
        $this->db->bind("delivery_time", $data['delivery_time']);
        $this->db->bind("delivery_time_comment", $data['delivery_time_comment']);
        $this->db->bind("execution", $data['execution']);
        $this->db->bind("execution_comment", $data['execution_comment']);
        $this->db->bind("team_work", $data['team_work']);
        $this->db->bind("team_work_comment", $data['team_work_comment']);
        $this->db->bind("innovation", $data['innovation']);
        $this->db->bind("innovation_comment", $data['innovation_comment']);
        $this->db->bind("status_penilaian", "submitted");
        $this->db->bind("id", $data['id']);
        $this->db->execute();
      } catch (PDOException $e) {
        echo $e->getMessage();
      }

      $result['count'] = $this->db->rowCount();

      return $result;
    }

    public function getAllEmployeeAndPenilaianAndResult($periode_id) {
      $query = "SELECT *, users.id as user_id, j.name as job, p.id as penilaian_id, rn.result as naik_gaji, rc.result as classification from users
        left join job_positions as j
        on users.job_position_id = j.id
        left join penilaian as p
        on p.created_by = users.id
        left join periodes as per
        on per.id = p.periode_id AND p.periode_id = :periode_id
        left join result_classification as rc
        on rc.id = p.result_classification_id
        left join result_naik_gaji as rn
        on rn.id = p.result_naik_gaji_id
        WHERE users.role = 'karyawan'
      ";

      $this->db->query($query);
      $this->db->bind('periode_id', $periode_id);
      $this->db->execute();

      return $this->db->resultSet();
    }

    public function editWithApprove($data) {


      $query = "UPDATE penilaian 
        SET delivery_time = :delivery_time, 
            delivery_time_comment = :delivery_time_comment, 
            execution = :execution, 
            execution_comment = :execution_comment, 
            team_work = :team_work, 
            team_work_comment = :team_work_comment, 
            innovation = :innovation, 
            innovation_comment = :innovation_comment, 
            approved_by = :approved_by,
            result_classification_id = :classification_id,
            result_naik_gaji_id = :naik_gaji_id,
            status_penilaian = :status_penilaian
        WHERE penilaian.id = :id
      ";

      $queryNaikGaji = "INSERT INTO 
        result_naik_gaji (result)
        VALUES (:result)
      ";

      $queryClassification = "INSERT INTO
        result_classification (result)
        VALUES (:result)
      ";

      try {
        $this->db->root()->beginTransaction();
        $this->db->query($queryNaikGaji);
        $this->db->bind('result', $data['naik_gaji']);
        $this->db->execute();
        $naikGajiId = $this->db->root()->lastInsertId();

        $this->db->query($queryClassification);
        $this->db->bind('result', $data['classification']);
        $this->db->execute();
        $classificationId = $this->db->root()->lastInsertId();

        $this->db->query($query);
        $this->db->bind("delivery_time", $data['delivery_time']);
        $this->db->bind("delivery_time_comment", $data['delivery_time_comment']);
        $this->db->bind("execution", $data['execution']);
        $this->db->bind("execution_comment", $data['execution_comment']);
        $this->db->bind("team_work", $data['team_work']);
        $this->db->bind("team_work_comment", $data['team_work_comment']);
        $this->db->bind("innovation", $data['innovation']);
        $this->db->bind("innovation_comment", $data['innovation_comment']);
        $this->db->bind("approved_by", $data['approved_by']);
        $this->db->bind("naik_gaji_id", $naikGajiId);
        $this->db->bind("classification_id", $classificationId);
        $this->db->bind("status_penilaian", "approved");

        $this->db->bind("id", $data['id']);
        $this->db->execute();

        $this->db->root()->commit();
      } catch (PDOException $e) {
        echo $e->getMessage();
        $this->db->root()->rollBack();
      }

      $result['count'] = $this->db->rowCount();

      return $result;
    }

    public function approve($data) {
      $query = "UPDATE penilaian 
        SET approved_by = :appoved_by
            result_classification_id = :classification_id
            result_naik_gaji_id = :naik_gaji_id
        WHERE penilaian.id = :id
      ";

      $queryNaikGaji = 'INSERT INTO result_naik_gaji (result) VALUES (:result)';
      $queryClassification = 'INSERT INTO result_classification (result) VALUES (:result)';


      try {
        $this->db->root()->beginTransaction();

        $this->db->query($queryNaikGaji);
        $this->db->bind('result', $data['result_naik_gaji']);
        $this->db->execute();
        $naikGajiId = $this->db->root()->lastInsertId();

        $this->db->query($queryClassification);
        $this->db->bind('result', $data['result_classification']);
        $this->db->execute();
        $classificationId = $this->db->root()->lastInsertId();

        $this->db->query($query);
        $this->db->bind("id", $data['id']);
        $this->db->bind("approved_by", $data['user_id']);
        $this->db->bind("classification_id", $classificationId);
        $this->db->bind("naik_gaji_id", $naikGajiId);
        $this->db->execute();

        $this->db->root()->commit();

      } catch (PDOException $e) {
        echo $e->getMessage();
        $this->db->root()->rollBack();
      }

      $result['count'] = $this->db->rowCount();

      return $result;
    }

    public function getById($id) {
      $query = 'SELECT * from penilaian where penilaian.id = :id';
      $queryUser = 'SELECT *, j.name as job_name from users 
        left join job_positions as j
        on users.job_position_id = j.id
        where users.id = :user_id
      ';

      $this->db->query($query);
      $this->db->bind('id', $id);
      $this->db->execute();
      $penilaian = $this->db->single();

      $this->db->query($queryUser);
      $this->db->bind('user_id', $penilaian['created_by']);
      $this->db->execute();
      $created_by = $this->db->single();

      $penilaian['created_by'] = $created_by;

      return $penilaian;
    }
 
    public function getDetailResult($id) {
      $query = 'SELECT *, p.id as penilaian_id, rn.result as naik_gaji, rc.result as classification, per.name as periode_name from penilaian as p
        left join periodes as per
        on per.id = p.periode_id
        left join result_classification as rc
        on rc.id = p.result_classification_id
        left join result_naik_gaji as rn
        on rn.id = p.result_naik_gaji_id
        where p.id = :id
      ';

      $this->db->query($query);
      $this->db->bind('id', $id);
      $this->db->execute();

      return $this->db->single();
    }
  }