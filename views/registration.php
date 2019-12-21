<?php include('abstract_views/header.php'); ?>

<div>
    <main>


        <form action="index.php" method="post" id="registration_form" class ="form">
            <input type="hidden" name="action" value="register">

            <h1 id="login_header">Registration Form</h1>
            <p style="color: red; ">* Required Fields</p><br>
            <div id="login_data">
                <div class="form-group">
                    <label for="fname">First Name</label><span style="color: red; ">*</span><br>
                    <input type="text" name="first_name" class="form-control" id="fname">
                </div><br>

                <div class="form-group">
                    <label for="lname">Last Name</label><span style="color: red; ">*</span><br>
                    <input type="text" name="last_name" class="form-control" id="lname">
                </div><br>

                <div class="form-group">
                    <label for="date">Birthday</label><span style="color: red; ">*</span><br>
                    <input type="date" name="birthday" class="form-control" id="date">
                </div><br>

                <div class="form-group">
                    <label for="email">Email</label><span style="color: red; ">*</span><br>
                    <input type="email" name="email" class="form-control" id="email">
                </div><br>

                <div class="form-group">
                    <label for="password">Password</label><span style="color: red; ">*</span><br>
                    <input type="password" name="password" class="form-control" id="password">
                </div><br>

            </div>

            <div id="login_button">
                <label>&nbsp;</label>
                <input type="submit" class="btn btn-default btn-block" value ="Register"><br>
            </div>
        </form>
    </main>
</div>

<?php include('abstract_views/footer.php'); ?>