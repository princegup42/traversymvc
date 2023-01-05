<?php
class Pages extends Controller {
    public function __construct() {
        // echo 'Pages Loaded';
    }

    public function index() {
        if ( isLoggedIn() ) {
            redirect( 'posts' );
        }
        $data = [
            'title'       => 'SharePosts',
            'description' => 'Simple Social Network build on the TraversyMVC PHP Framework.',
        ];
        $this->view( 'pages/index', $data );
    }

    public function about() {
        $data = [
            'title'       => 'About Page',
            'description' => 'App to share posts with other users',
        ];
        $this->view( 'pages/about', $data );
    }
}