<?php
require "header.php";
if (isset($_SESSION))
    print_r(session_encode());
else
    session_start();
$data = json_decode(file_get_contents(
    "https://smarttracks.org/test/students/favor/API/controller/Admin/rReport.php"));
$rest_count = $data->Restaurant_count;
$data = json_decode(file_get_contents(
    "https://smarttracks.org/test/students/favor/API/controller/Admin/cReport.php"));
$Users_count = $data->Users_count;

$data = json_decode(file_get_contents(
    "https://smarttracks.org/test/students/favor/API/controller/Admin/coReport.php"));
$Comments_count = $data->Comments_count;
?>
    <script type="text/javascript">
        var x = document.getElementsByTagName("title")[0];
        x.innerHTML = "Report";
        document.querySelector('title');
    </script>
    <nav class="navbar navbar-default  bg-dark navbar-dark">
        <a class="navbar-brand" href="#"> <img src="images/FullColor_IconOnly_1024x1024_72dpi.png" alt="" class="img1">
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto rightText">
                <li class="nav-item">
                    <a class="nav-link" href="main.php">Restaurants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comments.php">Comments</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Reports.php">Reports<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/AdminDashBoard/">logOut</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Report</h2>
            </div>
            <div class="card-body">
                <p style=" font-family: 'Times New Roman', Times, serif;
                            font-size: 50px;
                            font-style: oblique;
                            padding: 8px;
                            color: #092d88;"
                >Restaurant Count:
                    <span style=" font-family: 'Times New Roman', Times, serif;
                            font-size: 30px;
                            font-style: oblique;
                            padding: 16px;
                            color: #0d8809;
                            margin-left: 15%;"

                    ><?php echo $rest_count ?></span>
                </p>
                <p style=" font-family: 'Times New Roman', Times, serif;
                            font-size: 50px;
                            font-style: oblique;
                            color: #092d88;
                            padding: 8px;">Users Count:
                    <span style=" font-family: 'Times New Roman', Times, serif;
                            font-size: 30px;
                            font-style: oblique;
                            padding: 16px;
                            color: #0d8809;
                            margin-left: 25%;"><?php echo $Users_count ?></span></p>
                <p style=" font-family: 'Times New Roman', Times, serif;
                            font-size: 50px;
                            font-style: oblique;
                            color: #092d88;
                            padding: 8px;">Comments Count:
                    <span style=" font-family: 'Times New Roman', Times, serif;
                            font-size: 30px;
                            font-style: oblique;
                            color: #0d8809;
                            padding: 16px;
                            margin-left: 15%;"><?php echo $Comments_count ?></span></p>
            </div>
        </div>
    </div>
<?php
require "footer.php";
?>