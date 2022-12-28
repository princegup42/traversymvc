<?php
class Pages extends Controller {
    public function __construct() {
        // echo 'Pages Loaded';
    }

    public function index() {
        $data = [
            'title' => 'SharePosts',
        ];
        $this->view( 'pages/index', $data );
    }

    public function about() {
        $data = [
            'title' => 'About Page',
        ];
        $this->view( 'pages/about', $data );
    }
}