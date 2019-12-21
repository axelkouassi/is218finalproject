<?php include('abstract_views/header.php'); ?>

<div class = "display">
    <main>
        <h1>Displaying of User's Questions</h1>

        <!-- Displaying User's First and Last Name -->
        <label>First Name: </label>
        <span><?php echo $firstName; ?></span><br>

        <label>Last Name: </label>
        <span><?php echo $lastName; ?></span><br>

    </main>

    <!-- Display Questions -->
    <h1>Questions</h1>
    <div>
        <table>
            <tr>
                <th>Question Name</th>
                <th>Body</th>
                <th>Skills</th>
            </tr>
            <?php foreach($questions as $question) : ?>
                <tr>
                    <td><?php echo $question['title']; ?></td>
                    <td><?php echo $question['body']; ?></td>
                    <td><?php echo $question['skills']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>

    </div>

    <!-- Link to get to question form with additional data being sent about userID, first name and last name -->
    <a href=".?action=display_question_form&userId=<?php echo $userId ?>&fname=<?php echo $firstName ?>&lname=<?php echo $lastName ?>">Add Questions</a><br><br>


<?php include('abstract_views/footer.php'); ?>