<?php

class Home extends Controller {
  public function index() {
    Utils::PrivatePage();

    $data['judul'] = 'Home';
    // $data['nama'] = $this->model('User_model')->getUser();

    echo Utils::GetRole();
    $this->view('home/index', $data);
  }
}