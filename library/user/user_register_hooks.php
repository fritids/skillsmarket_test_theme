<?php

/* User register hooks only */

add_action('user_register', 'sm_register');

function sm_register($user_id) {

    if ( isset( $_POST['first_name'] ) )
        update_user_meta($user_id, 'first_name', $_POST['first_name']);

}