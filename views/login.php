<?php include('abstract_views/header.php'); ?>

    <!-- Form for PHP -->
    <form action="index.php" method="post" id="login_form" class ="form">
        <input type="hidden" name="action" value="login">

        <h1 id="login_header">Login Form</h1>
        <p style="color: red; ">* Required Fields</p><br>
        <div id="login_data">
            <div class="form-group">
                <label for="login_email_address">Email</label><span style="color: red; ">*</span>
                <input type="email" name="email_address" class="form-control" id="login_email_address">
            </div><br>

            <div class="form-group">
                <label for="login_password">Password</label><span style="color: red; ">*</span>
                <input type="password" name="password" class="form-control" id="login_password">
            </div>

        </div><br>

        <div id="login_button">
            <label>&nbsp;</label>
            <input type="submit" class="btn btn-default btn-block" value ="Login" id="login_submit_button"><br>
        </div>

    </form>
</main>
<?php include('abstract_views/footer.php'); ?>