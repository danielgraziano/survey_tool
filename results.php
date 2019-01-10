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
                <a class="navbar-brand" href="form.php">Survey Tool</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="form.php">Form</a></li>
                    <li class="active"><a href="#">Results</a></li>
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
            This is the results from the SQL query, it shows all the data entered from the survey form.
        </h4>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $connection = mysqli_connect('localhost', 'danielgr_survey', 'PASSWORD', 'danielgr_projects_survey_tool');
            $sql = "SELECT * FROM users";
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                while ($value = $result->fetch_assoc()) {
                    echo '<td style="text-align: left;">' . $value['first_name'] . '</td>';
                    echo '<td style="text-align: left;">' . $value['last_name'] . '</td>';
                    echo '<td style="text-align: left;">' . $value['email'] . '</td>';
                    echo '</td>';
                    echo '</tr>';
                    echo '</tbody>';
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
