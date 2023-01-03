<?php
class Posts extends Controller {
    public function __construct() {
        // echo 'posts Loaded';
    }

    public function index() {
        $data = [
            'title'       => 'SharePosts',
            'description' => 'Simple Social Network build on the TraversyMVC PHP Framework.',
        ];
        $this->view( 'posts/index', $data );
    }

    public function about() {
        $data = [
            'title'       => 'About Page',
            'description' => 'App to share posts with other users',
        ];
        $this->view( 'posts/about', $data );
    }
}