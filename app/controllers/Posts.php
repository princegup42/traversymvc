<?php
class Posts extends Controller {
    public function __construct() {
        if ( !isLoggedIn() ) {
            redirect( 'users/login' );
        }

        $this->postModel = $this->model( 'Post' );
    }

    public function index() {
        // Get posts
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts,
        ];

        $this->view( 'posts/index', $data );
    }

    public function add() {
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            // Sanitize POST array
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            $data = [
                'title'     => trim( $_POST['title'] ),
                'body'      => trim( $_POST['body'] ),
                'user_id'   => trim( $_SESSION['user_id'] ),
                'title_err' => '',
                'body_err'  => '',
            ];

            // Validate data
            if ( empty( $data['title'] ) ) {
                $data['title_err'] = 'Please Enter Title';
            }
            if ( empty( $data['body'] ) ) {
                $data['body_err'] = 'Please Enter Body Text';
            }

            // Make sure no errors
            if ( empty( $data['title_err'] ) && empty( $data['body_err'] ) ) {
                // Validated
                if ( $this->postModel->addPost( $data ) ) {
                    flash( 'post_message', 'Post Added' );
                    redirect( 'posts' );
                } else {
                    die( 'Somethings went wrong' );
                }
            } else {
                // Load View with errors
                $this->view( 'posts/add', $data );
            }
        } else {
            $data = [
                'title' => '',
                'body'  => '',
            ];
        }

        $this->view( 'posts/add', $data );
    }
}