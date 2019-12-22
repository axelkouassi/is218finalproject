<?php

// Get all user's questions
function get_user_questions($ownerId) {
    global $db;

    $query = 'SELECT * FROM questions WHERE ownerId = :ownerId';

    $statement = $db->prepare($query);

    $statement->bindValue(':ownerId', $ownerId);
    $statement->execute();

    $questions = $statement->fetchAll();
    $statement->closeCursor();
    return $questions;

}


// Get specific question
function get_question($question_id) {
    global $db;

    $query = 'SELECT * FROM questions WHERE id = :question_id';

    $statement = $db->prepare($query);

    $statement->bindValue(':question_id', $question_id);
    $statement->execute();

    $question = $statement->fetch();
    $statement->closeCursor();
    return $question;
}

// Create question
function create_question($userId, $question_name, $question_body, $question_skills) {
    global $db;
    $query = 'INSERT INTO questions (ownerid, title, body, skills ) 
              VALUES (:ownerID, :question_name, :question_body, :question_skills)';
    $statement = $db->prepare($query);
    $statement -> bindValue(':ownerID', $userId);
    $statement -> bindValue(':question_name', $question_name);
    $statement -> bindValue(':question_body', $question_body);
    $statement -> bindValue(':question_skills', $question_skills);
    $statement->execute();
    $statement->closeCursor();
}

// Edit a question
function edit_question($questionID, $question_name, $question_body, $question_skills) {
    global $db;
    $query = 'UPDATE questions  
              SET title = :question_name, body = :question_body, skills = :question_skills
              WHERE id = :questionID';
    $statement = $db->prepare($query);
    $statement->bindValue(':questionID', $questionID);
    $statement -> bindValue(':question_name', $question_name);
    $statement -> bindValue(':question_body', $question_body);
    $statement -> bindValue(':question_skills', $question_skills);
    $statement->execute();
    $statement->closeCursor();
}

// Delete a  question
function delete_question($questionID) {
    global $db;
    $query = 'DELETE FROM questions  
              WHERE id = :questionID';
    $statement = $db->prepare($query);
    $statement->bindValue(':questionID', $questionID);
    $statement->execute();
    $statement->closeCursor();
}

?>