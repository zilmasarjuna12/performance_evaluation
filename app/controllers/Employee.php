<?php
  class Employee extends Controller {
    public function index() {
      Utils::PrivatePage();
      $data['judul'] = 'Home';

      $data['employees'] = $this->model('Employee_model')->getAll();
      $data['job_positions'] = $this->model('JobPositions_model')->getAll();

      $this->view('employee/index', $data);
    }

    public function penilaian() {
      Utils::PrivatePage();
      $data['judul'] = 'Home';

      $data['periode'] = $this->model('Periode_model')->getActive();
      $data['users'] = $this->model('Penilaian_model')->getAllEmployeeAndPenilaian($data['periode']['id']);

      $this->view('employee/penilaian', $data);
    }

    public function create() {
      Utils::PrivatePage();
      $result = $this->model('Employee_model')->create($_POST);

      if ($result['count'] > 0) {
        Flasher::setFlash('berhasil', 'ditambah', 'success', 'Karyawan');
        header('Location: ' . BASEURL . '/employee');
        exit;
      } else {
        Flasher::setFlash('gagal', 'ditambah', 'danger', 'Karyawan');
        header('Location: ' . BASEURL . '/employee');
        exit;
      }
    }
    
    public function edit() {
      Utils::PrivatePage();
      $result = $this->model('Employee_model')->edit($_POST);

      if ($result['count'] > 0) {
        Flasher::setFlash('berhasil', 'diedit', 'success', 'Karyawan');
        header('Location: ' . BASEURL . '/employee');
        exit;
      } else {
        Flasher::setFlash('gagal', 'diedit', 'danger', 'Karyawan');
        header('Location: ' . BASEURL . '/employee');
        exit;
      }
    }

    public function getdetail() {
      echo json_encode($this->model('Employee_model')->getUserById($_POST['id']));
    }
  }