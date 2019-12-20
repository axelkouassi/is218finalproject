<?php
require('model/database.php');
require('model/accounts_db.php');
require('model/questions_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'display_login';
    }
}

//Display login form login.php
switch ($action) {
    case 'display_login':
    {
        include('views/login.php');
        break;
    }

    //Login credentials
    case 'login': {
    $email = filter_input(INPUT_POST, 'email_address');
    $password = filter_input(INPUT_POST, 'password');

    if ($email == NULL || $password == NULL) {
        $error = "Email and Password not included.";
        include('errors/error.php');
    } else {
        $userId = get_user($email, $password);
        $firstName = return_fname($email, $password);
        $lastName = return_lname($email, $password);
        echo "User ID IS: $userId";
        if ($userId == false) {
            header("Location: .?action=display_registration");
        } else {
            header("Location: .?action=display_questions&userId=$userId&fname=$firstName&lname=$lastName");
        }
    }

    break;
}

    case 'display_questions': {
        $userId = filter_input(INPUT_GET, 'userId');
        $firstName = filter_input(INPUT_GET, 'fname');
        $lastName = filter_input(INPUT_GET, 'lname');
        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=display_login');
        } else {
            $questions = get_user_questions($userId);
            include('views/display_questions.php');
        }
        break;
    }


    case 'display_registration': {
        include('views/registration.php');
        break;
    }




    case 'display_question_form': {
        $userId = filter_input(INPUT_GET, 'userId');
        include('views/question_form.php');
        break;
    }

    default: {
        $error = 'Unknown Action';
        include('errors/error.php');
    }

}