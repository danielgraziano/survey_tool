<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Survey Tool</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Form</a></li>
                    <li><a href="results.php">Results</a></li>
                    <li><a href="source.php">Source</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>
    <div style="text-align: center">
        <h3>
            Hello, welcome to the Survey Tool developed by Daniel Graziano!
        </h3>
    </div>

    <div style="text-align: center">
        <h4>
            Please feel free to enter test data and explore this survey tool.
        </h4>
    </div>

    <form id="myform" method="post">
        <label for="firstName">First Name:*</label><br/>
        <label for="firstName" id="firstNameError" style="display: none;">This field is required.</label>
        <input type="text" class="form-control" name="firstName" id="firstName" maxlength="25"/><br/>
        <label for="lastName">Last Name:*</label><br/>
        <label for="lastName" id="lastNameError" style="display: none;">This field is required.</label>
        <input type="text" class="form-control" name="lastName" id="lastName" maxlength="40"/><br/>
        <label for="email">Email Address:*</label><br/>
        <label for="email" id="emailError" style="display: none;">This field is required.</label>
        <input type="text" class="form-control" name="email" id="email" maxlength="50"/><br/>

        <p>* Required</p>
        <input type="submit" class="btn btn-success" value="Submit" id="submit">
    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!--This whole javascript and AJAX thing is new to me... I needed to investigate to get working correctly-->

<script type="text/javascript">
    $(function () {
        //hides the error messages on page load
        $("label#firstNameError").hide();
        $("label#lastNameError").hide();
        $("label#emailError").hide();
        //runs after the submit button is clicked
        $("#submit").click(function () {
            //sets variables and then checks to see if the field is empty
            var email = $("input#email").val();
            if (email == "") {
                $("label#emailError").show();
                $("input#email").focus();
            } else {
                $("label#emailError").hide();
            }
            var lastName = $("input#lastName").val();
            if (lastName == "") {
                $("label#lastNameError").show();
                $("input#lastName").focus();
            } else {
                $("label#lastNameError").hide();
            }
            var firstName = $("input#firstName").val();
            if (firstName == "") {
                $("label#firstNameError").show();
                $("input#firstName").focus();
            } else {
                $("label#firstNameError").hide();
            }
            if (firstName == "" || lastName == "" || email == "") {
                return false;
            }
            var dataString = 'firstName=' + firstName + '&lastName=' + lastName + '&email=' + email;
            $.ajax({
                type: "POST",
                url: "form.php",
                data: dataString,
                success: function () {
                    $('#myform').html("<div id='message'></div>");
                    $('#message').html("<div class='alert alert-success' style='text-align: center'><strong>Survey Submitted!</strong> You can view the results under the Results tab " +
                        "above!</div>")
                        .hide()
                        .fadeIn(400, function () {
                            $('#message');
                        });
                }
            });
            return false;
        });
    });
</script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['firstName']) && !empty($_POST['firstName']) && isset($_POST['lastName']) && !empty($_POST['lastName']) && isset($_POST['email']) && !empty
        ($_POST['email'])
    ) {
        $firstname = ($_POST['firstName']);
        $lastname = ($_POST['lastName']);
        $email = ($_POST['email']);
        $connection = mysqli_connect('localhost', 'danielgr_survey', 'PASSWORD', 'danielgr_projects_survey_tool');
        mysqli_query($connection, "INSERT INTO users(first_name,last_name,email) VALUES('$firstname','$lastname','$email')");
    }
}
