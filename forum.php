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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="mainnew.js"></script>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets\img\icons\networklogo2.png">
  <link rel="manifest" href="assets/img/icons/site.webmanifest">
  <link rel="mask-icon" href="assets/img/icons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
</head>
<style>
  h2{
    margin-left: .5em;
    font-family: 'Montserrat';
    font-weight: bold;
    margin-top: 1em;
    color: white;
    margin-bottom: -1em;
  }
  h3{
    font-family: 'Montserrat';
    font-weight: bold;
    color: white;
  }
  .panel-body{
    background-color: rgba(22,27,34,.7);
    border-radius: 20px;
  }
  .panel-default{
    background-color: rgba(22,27,34,.7);
    border-radius: 20px;
  }

</style>

    <!--wag pi
    <script>
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script> -->
<body>

  <!-- Sidenav -->
  <?php
    $activePage = 'page6';
  require_once('partials/_sidebar.php');
  ?>
      <div style="background-image: url(assets/img/theme/GenerateBG.png); background-size: 100%; background-repeat: repeat-y;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-5"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>

  <!-- Main content -->
  <div class="main-content">
    <h2>Network Layout Assessment General Discussions</h2>
    <!-- Modal -->
    <div id="ReplyModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Reply Question</h4>
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
              <div class="modal-body">
                <form name="frm1" method="post">
                  <input type="hidden" id="commentid" name="Rcommentid">
                  <div class="form-group">
                    <input type="hidden" name="Rname" value="<?php echo "$admin->admin_name" ?>">
                  </div>
                  <div class="form-group">
                    <label for="comment">Write your reply:</label>
                    <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
                  </div>
                  <input type="button" id="btnreply" name="btnreply" class="btn btn-primary" value="Reply">
                </form>
              </div>
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-12">
        <div class="panel panel-default" style="margin-top:50px; background-color: transparent; border: none;">
          <div class="panel-body">
            <h3>Community forum</h3>
            <hr>
            <form name="frm" method="post">
              <input type="hidden" id="commentid" name="Pcommentid" value="0">
              <div class="form-group">
                <input type="hidden" class="form-control" name="name" value="<?php echo "$admin->admin_name" ?>">
              </div>
              <div class="form-group">
                <label for="comment" style="color: white; font-family: Montserrat;">Write your question:</label>
                <textarea class="form-control" rows="5" name="msg" required></textarea>
              </div>
              <input type="button" id="butsave" name="save" class="btn btn-success" value="Send" style="width: 6em; border-radius: 12px; font-weight: bold; font-family: Montserrat;">
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
            <table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:20px">
              <tbody id="record">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
  </div>
</div>

</body>

</html>
