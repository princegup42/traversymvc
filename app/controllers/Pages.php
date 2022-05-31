<?php
class Pages extends Controller
{
  public function __construct()
  {
    echo 'Pages loaded';
  }

  public function index()
  {
    # code...
    $this->view('hello');
  }

  public function about($id = null) {
    echo 'sfasf';
    echo $id;
  }
}
