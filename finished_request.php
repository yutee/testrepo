<?php
require 'classControllers/init.php';
if (!isset($_SESSION["role"])) {
  header('Location:admin_login.php');
}
$sponsors = new Certificate;
$data = $sponsors->getAllFinishedRequest();
$status = $sponsors->finished();
if ($status) {
  header('location: finished_request.php');
  $_SESSION['status'] = "Action successful";
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Finished Certificate</title>
  <link rel="icon" type="img/png" href="images/hng-favicon.png">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

  <!--This contains the styling for the side bar -->
  <link href="css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

  <link href="css/newDashboard.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />


  <!-- This version required for Pagination -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style type="text/css">
    .card {
      height: 150px;
      background: #ccc;
      margin: 15px;
      padding: 10px;
      border-radius: 15px;
    }
  </style>

</head>

<body>
  <main class="reg">
    <div id="overlay"></div>
    <div id="export-modal">
      <div>
        <input type="radio" id="csv" name="exportOptions"><label for="csv">Export to CSV</label>
      </div>
      <div>
        <input type="radio" id="pdf" name="exportOptions"><label for="pdf">Export to PDF</label>
      </div>
      <p id="message"></p>
      <button type="button" class="exports" id="download">Download</button>
    </div>
    <input type="text" class="searchBox"><i class="fas fa-search"></i>
    <section id="overview-section">
      <!-- <h1>Dashboard</h1> -->

      <h2 class="cert processing">Finished Certificate Request </h2>
      <div class="mentor-buttons certificate">
        <a href="pending_request.php" class="btn btn-default">Pending Request</a>
        <a href="processing_request.php" class="btn btn-default reduce">Processing Request</a>
      </div>
      <!-- <section id="intern-section">
            Populated by `js/dashboard.js`
        </section> -->
      <?php
      if (isset($_SESSION['status'])) {
        echo $_SESSION['status'];
        unset($_SESSION['status']);
      }

      ?>

      <div>
        <div class="row cert-message">

          <?php
          if ($data == "0") {
            echo "<h2>There are no requests right now</h2>";
          } else {
            ?>
            <!--<div class="col-md-3">-->
            <!--    <a href="exports/export-to-excel-sponsors.php">-->
            <!--        <button type="button" id="export">Export to Spreadsheet</button>-->
            <!--    </a>-->
            <!--</div>-->
            <!-- <div class="col-md-3">

                    <a href="#" onclick="javascript:printDiv('printablediv')">
                        <button type="button" class="btn btn-primary btn-sm" id="export">Export to PDF</button>
                    </a> -->
        </div>
        <!-- <div id="printablediv" class="table-responsive"> -->
        <div id="printablediv" class="sponsors">
          <div class="scroll">
            <!-- <table id="my-table" class="table table-hover table-bordered mt-3 mb-1"> -->
            <table id="my-table" class="table table-hover sponsor-table certificate-table">
              <!-- <thead class="table-primary"> -->
              <thead>
                <tr>

                  <th data-heading="sn">SN
                    <!--<i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>-->
                  </th>
                  <th data-heading="name">Name
                    <!--<i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>-->
                  </th>
                  <th data-heading="email">Email
                    <!--<i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>-->
                  </th>
                  <th data-heading="slack_username">Slack_username
                    <!--<i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>-->
                  </th>
                  <th data-heading="year">Year
                    <!--<i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>-->
                  </th>
                  <th data-heading="file">File
                    <!--<i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>-->
                  </th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>

                <?= $data; ?>

              </tbody>
            </table>
          </div>
        </div>
      <?php
      }
      ?>
      <div class="buttonDiv">
        <!--<a href="exports/export-to-pdf-sponsors.php">-->
        <a href="#" onclick="javascript:printDiv('printablediv')">
          <button type="button" class="exports" id="export">Print</button>
        </a>
        <a href="#">
          <button type="button" class="exports" id="exportAs">Export</button>
        </a>
      </div>
      </div>
      </div>

      <!-- <button id="export">Export to Spreadsheet</button> -->

    </section>
    <section id="details-section">
      <div id="details-back" class="details-back">
        <div class="details-back">
          <!-- <a href="overview.html" id="newitem-go-back" title="Go back">
                    <div></div>
                </a> -->
        </div>
      </div>
      <div id="centralize">
        <h2>Certificate Details</h2>
        <em id="no-intern">No Details Selected</em>
        <br />

        <p class="details">Name: <span id="name"></span></p>
        <p class="details">Email: <span id="email"></span></p>
        <p class="details">Slack_username: <span id="slack_username"></span></p>
        <p class="details">Year: <span id="year"></span></p>
        <p class="details">File:<span id="file"></span></p>
        <!-- <div href="" id="details-return">Back to Overview</div> -->
        <div id="navigator">
          <i class="fas fa-chevron-left fa-2x left navigator"></i>
          <p class="details"><span id="sn"></span></p>
          <i class="fas fa-chevron-right fa-2x right navigator"></i>
        </div>
      </div>
    </section>
  </main>

  <input type="checkbox" id="mobile-bars-check" />
  <label for="mobile-bars-check" id="mobile-bars">
    <div class="stix" id="stik1"></div>
    <div class="stix" id="stik2"></div>
    <div class="stix" id="stik3"></div>
  </label>

  <?php include('fragments/sidebar.php'); ?>

</body>

</html>
<script src="js/jspdf.js"></script>
<script src="js/jspdf.plugin.autotable.min.js"></script>
<script src="js/paginator.js"></script>
<script type="text/javascript" src="js/sidebar.js"></script>
<script type="text/javascript" src="js/newDashboard.js"></script>