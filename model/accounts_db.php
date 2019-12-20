<?php
function get_user($email, $password) {
    global $db;
    $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user = $statement->fetch();
    $isValidLogin = count($user) > 0;
    if (!$isValidLogin) {
        $statement->closeCursor();
        return false;
    } else {
        $userId = $user['id'];
        $statement->closeCursor();
        return $userId;
    }
}

// Create new user
function create_new_user($first_name, $last_name, $birthday, $email,$password ) {
    global $db;
    // SQL Query
    $query = 'INSERT INTO accounts
          (email, fname, lname, birthday, password)
          VALUES
          (:email, :fname, :lname, :birthday, :password)';
     //Create PDO Statement
     $statement = $db->prepare($query);
    //Bind Form Values to SQL
    $statement -> bindValue(':fname',$first_name);
    $statement -> bindValue(':lname',$last_name);
    $statement -> bindValue(':birthday',$birthday);
    $statement -> bindValue(':email',$email);
    $statement -> bindValue(':password',$password);
    //Execute the SQL Query
    $statement->execute();
    //Close the database connection
    $statement -> closeCursor();
}

// Function to return first name
function return_fname($email_address, $password) {
    global $db;
    // SQL Query
    $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
    //Create PDO Statement
    $statement = $db->prepare($query);

    //Bind Form Values to SQL
    $statement->bindValue(':email', $email_address);
    $statement->bindValue(':password', $password);

    //Execute the SQL Query
    $statement->execute();

    //Fetch All data
    $user = $statement->fetch();

    $isValidLogin = count($user) > 0;

    if (!$isValidLogin) {
        $statement->closeCursor();
        return false;
    } else {
        $firstName = $user['fname'];
        $statement->closeCursor();
        return $firstName;
    }
}

// Function to return last name
function return_lname($email_address, $password) {
    global $db;
    // SQL Query
    $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
    //Create PDO Statement
    $statement = $db->prepare($query);

    //Bind Form Values to SQL
    $statement->bindValue(':email', $email_address);
    $statement->bindValue(':password', $password);

    //Execute the SQL Query
    $statement->execute();

    //Fetch All data
    $user = $statement->fetch();

    $isValidLogin = count($user) > 0;

    if (!$isValidLogin) {
        $statement->closeCursor();
        return false;
    } else {
        $lastName = $user['lname'];
        $statement->closeCursor();
        return $lastName;
    }
}
