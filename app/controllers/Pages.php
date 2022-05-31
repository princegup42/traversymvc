<?php
class Pages extends Controller
{
  public function __construct()
  {
    // echo 'Pages loaded';
  }

  public function index()
  {
    # code...
    $data = ['title' => 'Welcome'];
    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = ['title' => 'About Page'];
    $this->view('pages/about', $data);
  }
}
