<?php

class Home extends Controller{
  public function index()
  {
    $data["judul"] = "Dashboard Showroom Cars";
    $data["jumlahCars"] = $this->model("carsModel")->countCars();
    $this->view("templates/header", $data);
    $this->view("home/index", $data);
    $this->view("templates/footer");
  }
}