<?php
class Pages extends Controller {
    public function __construct() {
        // echo 'Pages Loaded';
    }

    public function index() {
        # code...
        echo 'index...';
        $this->view( 'Hello...' );
    }

    public function about( $id ) {
        echo $id;
    }
}