<?php
  class Login extends Controller {
    public function index() {
      if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] === 'loged') {
          header('Location: '. BASEURL . '/home');

          return null;
        } 
      }

      $this->view('login/index');
    }

    public function auth() {
      $data['user'] = $this->model('User_model')->auth($_POST);

      if ($data['user']) {
        $_SESSION['status'] = 'loged';
        $_SESSION['user'] = $data['user'];
        header('Location: '. BASEURL . '/home');
      } else {
        echo "masukan username dengan benar";
      }
    }
  }
?>