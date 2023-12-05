<!DOCTYPE html>
<html>
<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

?>

<head>
  <title>Network Layout Assesment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="main4.js"></script>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets\img\icons\networklogo2.png">
  <link rel="manifest" href="assets/img/icons/site.webmanifest">
  <link rel="mask-icon" href="assets/img/icons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
</head>

    <!--wag pi
    <script>
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script> -->

    <style>

  h3{
    font-family: 'Montserrat';
    font-weight: bold;
    color: white;
  }
  .panel-body{
    background-color: rgba(22,27,34, .7);
    border-radius: 20px;
  }

</style>

<body>

  <!-- Sidenav -->
  <?php
    $activePage = 'page6';
  require_once('partials/_sidebar.php');
  ?>

  <!-- Main content -->
  <div class="main-content">
  <div class="main-content" style="background-image: url(assets/img/theme/ForumBG.png); background-size: cover; height: 100vh;">
  <div class="navbar navbar-default">
  <div class="container-fluid">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="navbar-brand" style="font-size: 24px;">Network Layout Assessment Forum</div>
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav" style="font-size: 12px;">
        <li><a href="forum.php">General Discussion</a></li>
        <li><a href="forumlayplans.php">Layout Plans</a></li>
        <li><a href="forumprod.php">Products</a></li>
        <li><a href="forumisp.php">ISP</a></li>
        <li class="active"><a href="forumnet.php">Networking</a></li>
      </ul>
    </div>
  </div>
</div>  
    <!-- Modal -->
    <div id="ReplyModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal" style="background-color: black; border-color: white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <?php
          if (isset($_SESSION['admin_id'])) {
            $admin_id = $_SESSION['admin_id'];
            //$login_id = $_SESSION['login_id'];
            $ret = "SELECT * FROM admin WHERE admin_id = ?";
            $stmt = $mysqli->prepare($ret);
            $stmt->bind_param('s', $admin_id);
            $stmt->execute();
            $res = $stmt->get_result();

            while ($admin = $res->fetch_object()) {
          ?>
              <div class="modal-body" style="background-color: black;">
                <form name="frm1" method="post">
                  <input type="hidden" id="commentid" name="Rcommentid">
                  <div class="form-group">
                    <input type="hidden" name="Rname" value="<?php echo "$admin->admin_name" ?>">
                  </div>
                  <div class="form-group">
                   <h4 style="color: white; font-family: Montserrat;">Reply to a Question</h4>
                    <textarea placeholder="Write your Reply..." class="form-control" rows="5" name="Rmsg" style="resize: none; color: white; background-color: black; border-color: white"  required></textarea>
                  </div>
                  <input type="button" id="btnreply" name="btnreply" class="btn" value="Reply" style="background-color: #7ed957; color: white; font-weight: bold; font-family: Montserrat;">
                </form>
              </div>
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-12" style="margin-top: -2em;">
        <div class="panel panel-default" style="margin-top:30px; background-color: transparent; border: none;">
          <div class="panel-body">
            <h3>Community Forum</h3>
            <form name="frm" method="post">
              <input type="hidden" id="commentid" name="Pcommentid" value="0">
              <div class="form-group">
                <input type="hidden" class="form-control" name="name" value="<?php echo "$admin->admin_name" ?>">
              </div>
               <div class="form-group">
                <textarea placeholder="Write your Question..." class="form-control" rows="5" name="msg" style="resize: none; overflow-y: scroll; background-color: black; color: white; border-color: white;" required></textarea>
              </div>
              <input type="button" id="butsave" name="save" class="btn btn-success" value="Post" style="width: 6em; border-radius: 12px; font-weight: bold; font-family: Montserrat;">
            </form>
          </div>
        </div>
      </div>
    </div>
       <?php
            }
          }
          ?>
    <div class="form-row">
      <div class="col-md-12">
        <div class="panel panel-default" style="margin-top:10px; background-color: transparent; border: none;">
          <div class="panel-body">
           <h3 style="margin-bottom: 1em;">Recent Thread</h3>
            <div class="table-content" style="overflow-y: scroll; max-height: 252px;">
             <table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:20px">
              <tbody id="record">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

</html>
