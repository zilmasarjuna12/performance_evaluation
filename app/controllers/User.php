<?php
  class User extends Controller {
    public function index() {
      Utils::PrivatePage();
      $data['judul'] = 'Home';

      $data['users'] = $this->model('User_model')->getAll();

      $this->view('user/index', $data);
    }

    public function edit() {
      Utils::PrivatePage();

      $result = $this->model('User_model')->edit($_POST);

      if ($result['count'] > 0) {
        Flasher::setFlash('berhasil', 'diedit', 'success', 'Pengguna');
        header('Location: ' . BASEURL . '/user');
        exit;
      } else {
        Flasher::setFlash('gagal', 'diedit', 'danger', 'Pengguna');
        header('Location: ' . BASEURL . '/user');
        exit;
      }
    }

    public function getdetail() {
      echo json_encode($this->model("User_model")->getById($_POST['id']));
    }
  }