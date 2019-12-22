<?php include('abstract_views/header.php'); ?>

    <main>
        <form action="index.php?&userId=<?php echo $userId ?>&fname=<?php echo $firstName ?>&lname=<?php echo $lastName ?>&question_id=<?php echo $question_id ?>" method="post" class ="form">
            <input type="hidden" name="action" value="edit_question">

            <h1>New Question Form</h1>
            <p style="color: red; ">* Required Fields</p><br>
            <div id="login_data">
                <div class="form-group">
                    <label for="question_name">Question Name</label><span style="color: red; ">*</span><br>
                    <input type="text" name="question_name" value="<?php echo $question_name ?>" class="form-control" id="question_name">
                </div><br>

                <div class="form-group">
                    <label for="question_body">Question Body</label><span style="color: red; ">*</span><br>
                    <textarea type="text" name="question_body" placeholder="<?php echo $question_body ?>" class="form-control" id="question_body" rows="5"></textarea>
                </div><br>

                <div class="form-group">
                    <label for="question_skills">Questions Skills</label><span style="color: red; ">*</span><br>
                    <input type="text" name="question_skills"  value="<?php echo $question_skills ?>"class="form-control" id="question_skills">
                    <p style="color: red; ">Enter at least 2 skills, separated by a comma.</p><br>
                </div>

            </div>

            <div id="login_button">
                <label>&nbsp;</label>
                <input type="submit" class="btn btn-default btn-block" value ="Submit Question"><br>
            </div>


        </form>
    </main>

<?php include('abstract_views/footer.php'); ?>