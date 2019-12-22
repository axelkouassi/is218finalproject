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
                    <td><form action="index.php?&userId=<?php echo $userId ?>&fname=<?php echo $firstName ?>&lname=<?php echo $lastName ?>&question_id=<?php echo $question['id'] ?>&question_name=<?php echo $question_name=$question['title'] ?>&question_body=<?php echo $question_body=$question['body'] ?>&question_skills=<?php echo $question_skills=$question['skills'] ?>" method="post">
                            <input type="hidden" name="action" value="display_edit_question_form">
                            <input type="hidden" name="question_id" value="<?php echo $question['id']; ?>">
                            <input type="hidden" name="userId" value="<?php echo $question['ownerid']; ?>">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                    <td><form action="index.php?&userId=<?php echo $userId ?>&fname=<?php echo $firstName ?>&lname=<?php echo $lastName ?>" method="post">
                            <input type="hidden" name="action" value="delete_question">
                            <input type="hidden" name="question_id" value="<?php echo $question['id']; ?>">
                            <input type="hidden" name="userId" value="<?php echo $question['ownerid']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>

    </div>

    <!-- Link to get to question form with additional data being sent about userID, first name and last name -->
    <a href=".?action=display_question_form&userId=<?php echo $userId ?>&fname=<?php echo $firstName ?>&lname=<?php echo $lastName ?>">Add Questions</a><br><br>


<?php include('abstract_views/footer.php'); ?>