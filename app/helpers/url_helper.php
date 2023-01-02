<?php

/**
 * Simple page redirect function
 *
 * @param [type] $page
 * @return void
 */
function redirect( $page ) {
    header( 'location: ' . URLROOT . '/' . $page );
}