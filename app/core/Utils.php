<?php 

  class Utils {
    public static function PrivatePage() {
      if ($_SESSION['status'] !== 'loged') {
        return header('Location: '. BASEURL . '/login');
      }
    }

    public static function GetUserId() {
      return $_SESSION['user']['id'];
    }

    public static function GetUser() {
      return $_SESSION['user'];
    }

    public static function GetRole() {
      return $_SESSION['user']['role'];
    }

    public static function GetUserName() {
      echo $_SESSION['user']['username'];
    }

    public static function GetRoleName() {
      echo $_SESSION['user']['role_name'];
    }
  }