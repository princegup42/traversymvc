<?php
class Pages extends Controller {
    public function __construct() {
        // echo 'Pages Loaded';
        $this->postModel = $this->model( 'Post' );
    }

    public function index() {
        $data = [
            'title' => 'Welcome',
        ];
        $this->view( 'pages/index', $data );
    }

    public function about() {
        $data = [
            'title' => 'Welcome About Page',
        ];
        $this->view( 'pages/about', $data );
    }
}