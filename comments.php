<?php
require "header.php";
$data = json_decode(file_get_contents(
    "https://smarttracks.org/test/students/favor/API/controller/Admin/getAllComments.php"));
$comments = $data->Comments;
if (isset($_SESSION))
    print_r(session_encode());
else
    session_start();
?>
    <script type="text/javascript">
        var x = document.getElementsByTagName("title")[0];
        x.innerHTML = "Comments";
        document.querySelector('title');
    </script>
    <script type="text/javascript">
        var x = document.getElementsByTagName("title")[0];
        x.innerHTML = "Comments";
        document.querySelector('title');
    </script>
    <nav class="navbar navbar-default   bg-dark navbar-dark">
        <a class="navbar-brand" href="#"> <img src="images/FullColor_IconOnly_1024x1024_72dpi.png" alt="" class="img1">
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto rightText">
                <li class="nav-item active">
                    <a class="nav-link" href="main.php">Restaurants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users.php">Users<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comments.php">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Reports.php">Reports</a>
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
                <h2>Comments</h2>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['del_message'])) {
                    set_time_limit(5);
                    echo '<div id="alert" class="alert alert-success " role="alert">' . $_SESSION['del_message'] . '</div>
                            <script type="text/javascript"> 
                                setTimeout(function () { 
                                // Closing the alert 
                                $(\'#alert\').alert(\'close\'); 
                            }, 5000); 
                        </script> ';
                }
                ?>
                <table class="table table-bordered" id="tab">
                    <tr>
                        <th>Restaurant Name</th>
                        <th>User name</th>
                        <th>Content</th>
                        <th>Time</th>
                        <th>Operation</th>
                    </tr>
                    <?php foreach ($comments as $result): ?>
                        <tr>
                            <td> <?php echo $result->restaurant_name ?></td>
                            <td> <?php echo $result->user_name ?></td>
                            <td><?php echo $result->content ?></td>
                            <td><?php echo $result->time ?></td>
                            </td>
                            <td>
                                <a href="http://localhost/AdminDashBoard/API/controller/Admin/deleteComment.php?id=<?php echo $result->id ?>"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

<?php
require "footer.php";
?>