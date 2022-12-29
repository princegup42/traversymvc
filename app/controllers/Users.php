<?php

class Users extends Controller {
    # code...
    public function __construct() {
        # code...
    }

    public function register() {
        //Check for POST
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            //Process form
            //Sanitize POST data
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            //Init data
            $data = [
                'name'                 => trim( $_POST['name'] ),
                'email'                => trim( $_POST['email'] ),
                'password'             => trim( $_POST['password'] ),
                'confirm_password'     => trim( $_POST['confirm_password'] ),
                'name_err'             => '',
                'email_err'            => '',
                'password_err'         => '',
                'confirm_password_err' => '',
            ];

            // Validate Email
            if ( empty( $data['email'] ) ) {
                $data['email_err'] = 'Please Enter Email';
            }

            // Validate Name
            if ( empty( $data['name'] ) ) {
                $data['name_err'] = 'Please Enter Name';
            }
            // Validate Password
            if ( empty( $data['password'] ) ) {
                $data['password_err'] = 'Please Enter Password';
            } elseif ( strlen( $data['password'] ) < 6 ) {
                $data['password_err'] = 'Password must be at least 6 Characters';
            }

            // Validate Password
            if ( empty( $data['confirm_password'] ) ) {
                $data['confirm_password_err'] = 'Please COnfirm Password';
            } else {
                if ( $data['password'] != $data['confirm_password'] ) {
                    # code...
                    $data['confirm_password_err'] = 'Passwords do Not Match';
                }
            }

            // Make Sure Errors are empty
            if ( empty( $data['email_err'] ) && empty( $data['name_err'] ) && empty( $data['password_err'] ) && empty( $data['confirm_password_err'] ) ) {
                //Validated
                die( 'Success' );
            } else {
                // Load view with errors
                $this->view( 'users/register', $data );
            }
        } else {
            //Init data
            $data = [
                'name'                 => '',
                'email'                => '',
                'password'             => '',
                'confirm_password'     => '',
                'name_err'             => '',
                'email_err'            => '',
                'password_err'         => '',
                'confirm_password_err' => '',
            ];

            $this->view( 'users/register', $data );
        }
    }

    public function login() {
        //Check for POST
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            //Init data
            $data = [
                'email'        => trim( $_POST['email'] ),
                'password'     => trim( $_POST['password'] ),
                'email_err'    => '',
                'password_err' => '',
            ];

            // Validate Email
            if ( empty( $data['email'] ) ) {
                $data['email_err'] = 'Please Enter Email';
            }

            // Validate Password
            if ( empty( $data['password'] ) ) {
                $data['password_err'] = 'Please Enter Password';
            }

            // Make Sure Errors are empty
            if ( empty( $data['email_err'] ) && empty( $data['password_err'] ) ) {
                //Validated
                die( 'Success' );
            } else {
                // Load view with errors
                $this->view( 'users/login', $data );
            }

        } else {
            //Init data
            $data = [
                'email'        => '',
                'password'     => '',
                'email_err'    => '',
                'password_err' => '',

            ];

            $this->view( 'users/login', $data );
        }
    }
}