<?php

class Login extends Controller{
  public function index()
  {
    $this->view("Login/index");
  }

  public function loginUser()
  {
    if ($this->model("Login_model")->login($_POST) > 0){
      header("Location:" . BASEURL . "/Product");
      exit;
    } else{
      Flasher::setFlash('Anda', 'gagal', 'login', 'danger');
      header('Location:' . BASEURL);
      exit;
    }
  }
}