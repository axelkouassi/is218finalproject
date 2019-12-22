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


switch ($action) {

    //Display login form login.php
    case 'display_login':
    {
        include('views/login.php');
        break;
    }


    //Login credentials validation
    case 'login':
    {
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

    // Display registration form
    case 'display_registration': {
        include('views/registration.php');
        break;
    }

    //Registration form validation
    case 'register': {
        // Getting input data from users
        $first_name = filter_input(INPUT_POST,'first_name');
        $last_name = filter_input(INPUT_POST,'last_name');
        $birthday = filter_input(INPUT_POST,'birthday');
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'password');

        if ($first_name == NULL || $last_name == NULL || $birthday == NULL || $email == NULL || $password == NULL) {
            $error = "Fields cannot be blank";
            include('errors/error.php');
        }

        else {
            $newUser = create_new_user($first_name, $last_name, $birthday, $email, $password );
            header("Location: .?action=display_login");
        }

        break;
    }

    // Display user's questions, first and last name
    case 'display_questions':
    {
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

    // Delete user's questions, first and last name
    case 'delete_question':{
        $userId = filter_input(INPUT_GET, 'userId');
        $firstName = filter_input(INPUT_GET, 'fname');
        $lastName = filter_input(INPUT_GET, 'lname');

        $question_id = filter_input(INPUT_POST, 'question_id', FILTER_VALIDATE_INT);
        if ($question_id == NULL || $question_id == FALSE) {
            $error = "Missing or incorrect question id or user id.";
            include('errors/errors/error.php');
        } else {
            delete_question($question_id);
            header("Location: .?action=display_questions&userId=$userId&fname=$firstName&lname=$lastName");
        }
        break;
    }

    //Display edit question form
    case 'display_edit_question_form':
    {
        $userId = filter_input(INPUT_GET, 'userId');
        $firstName = filter_input(INPUT_GET, 'fname');
        $lastName = filter_input(INPUT_GET, 'lname');

        $question_name = filter_input(INPUT_GET, 'question_name');
        $question_body = filter_input(INPUT_GET, 'question_body');
        $question_skills = filter_input(INPUT_GET, 'question_skills');

        $question_id = filter_input(INPUT_POST, 'question_id', FILTER_VALIDATE_INT);

        $question_name = filter_input(INPUT_POST, 'question_name');
        $question_body = filter_input(INPUT_POST, 'question_body');
        $question_skills = filter_input(INPUT_POST, 'question_skills');

        if ($question_id == NULL || $question_id == FALSE) {
            $error = "Missing or incorrect question id or user id.";
            include('errors/errors/error.php');
        } else {
            include('views/question_form_edit.php');
        }

        break;
    }


    // Edit user's questions, first and last name
    case 'edit_question':{
        $userId = filter_input(INPUT_GET, 'userId');
        $firstName = filter_input(INPUT_GET, 'fname');
        $lastName = filter_input(INPUT_GET, 'lname');
        $question_id = filter_input(INPUT_GET, 'question_id');

        // Getting input data from users
        $question_name = filter_input(INPUT_POST, 'question_name');
        $question_body = filter_input(INPUT_POST, 'question_body');
        $question_skills = filter_input(INPUT_POST, 'question_skills');

        if ($question_name == NULL || $question_body == NULL || $question_skills == NULL) {
            $error = "Fields cannot be empty.";
            include('errors/error.php');
        }
        else if ($question_id == NULL || $question_id == FALSE) {
            $error = "Missing or incorrect question id or user id.";
            include('errors/errors/error.php');
        }
        else {
            edit_question($question_id, $question_name, $question_body, $question_skills);
            header("Location: .?action=display_questions&userId=$userId&fname=$firstName&lname=$lastName&question_id=$question_name");
        }

        break;
    }


    //Display of question form
    case 'display_question_form':
    {
        $userId = filter_input(INPUT_GET, 'userId');
        $firstName = filter_input(INPUT_GET, 'fname');
        $lastName = filter_input(INPUT_GET, 'lname');
        include('views/question_form.php');
        break;
    }

    //Receive question form data
    case 'new_question':
    {
        $userId = filter_input(INPUT_GET, 'userId');
        $firstName = filter_input(INPUT_GET, 'fname');
        $lastName = filter_input(INPUT_GET, 'lname');

        // Getting input data from users
        $question_name = filter_input(INPUT_POST, 'question_name');
        $question_body = filter_input(INPUT_POST, 'question_body');
        $question_skills = filter_input(INPUT_POST, 'question_skills');

        if ($question_name == NULL || $question_body == NULL || $question_skills == NULL) {
            $error = "Fields cannot be empty.";
            include('errors/error.php');
        } else {
            $newQuestion = create_question($userId, $question_name, $question_body, $question_skills);
            echo "User ID IS: $userId";
            if ($userId == false) {
                header("Location: .?action=display_login");
            } else {
                header("Location: .?action=display_questions&userId=$userId&fname=$firstName&lname=$lastName");
            }
        }

    }

    default: {
        $error = 'Unknown Action';
        include('errors/error.php');
    }


}