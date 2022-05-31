<?php
class Pages
{
  public function __construct()
  {
    echo 'Pages loaded';
  }

  public function index()
  {
    # code...
  }

  public function about($id = null) {
    echo 'sfasf';
    echo $id;
  }
}
