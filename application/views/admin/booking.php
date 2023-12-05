<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcalines | Bookings</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://is3.cloudhost.id/eventnimz-jktstrg/eventnimz-jktstrg/cdn-arcastorage/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-xVVam1KS4+Qt2OrFa+VdRUoXygyKIuNWUUUBZYv+n27STsJ7oDOHJgfF0bNKLMJF" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/arcalines-css-compiled.css">
    <link rel="stylesheet" href="https://ireade.github.io/Toast.js/css/Toast.min.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://eventnimz-jktstrg.is3.cloudhost.id/eventnimz-jktstrg/19/haf-school-stuff/test/Toast.js"></script>
<script>
    var pusher = new Pusher('fe9990dc44f96732023a', {
      cluster: 'ap1'
    });
    var on = false
    var channel = pusher.subscribe('arcalines');
    on = true
    channel.bind('admin', function(data) {
    new Toast({message: data, type: 'danger', customButtons: [{text: 'Refresh data', onClick: function() { window.location.reload();}},]});
    });
</script>

<?php
  if (isset($message)) {
    echo '
    <script>
    new Toast({message: "'. $message .'", type: "'. $status .'"});
    </script>
    ';
    $this->session->unset_userdata('message');
    $this->session->unset_userdata('status');
  }
  ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mobile" style="padding: 1rem;">
        <img src="../../../misc/vectors/arcalines-black.png">
        <button class="navbar-toggler" onclick="toggleNavbar()" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url('admin'); ?>"><b>Dashboard</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/planes') ?>">Planes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/routes') ?>">Route</a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/bookings') ?>">Bookings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/users') ?>">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
            </li>
            <h4 class="heading-sidebar-active">Hai, <b><?php echo $name; ?></b></h4>
          </ul>
        </div>
      </nav>
    <script>
        function toggleNavbar() {
            var x = document.getElementById("navbarNavDropdown");
            if (x.style.display === "none") {
                x.style.display = "block";
                setTimeout(function(){ x.style.opacity = "1"; }, 50); // Delay to ensure display:block has taken effect
            } else {
                x.style.opacity = "0";
                setTimeout(function(){ x.style.display = "none"; }, 500); // Delay to allow fade-out animation to complete
            }
        }
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 pc" style="padding: 0; background-color: #E9EBED; height: 100vh;">
                <div class="row" style="padding: 1rem;">
                    <div class="col-12" style="display: flex; justify-content: center;">
                        <img src="../../../misc/vectors/arcalines-black.png" style="margin-bottom: 1rem;">
                    </div>
                    <h3 class="heading-sidebar-admin">Overview</h3>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-1 col-md-2">
                                <img src="../../../misc/vectors/home.svg" style="height: 85%;">
                            </div>
                            <div class="col-10">
                                <a class="heading-sidebar-active" href="<?php echo base_url('admin'); ?>">Dashboard</a>
                            </div>
                        </div>
                    </div>
                    <h3 class="heading-sidebar-admin" style="margin-top: 1rem;">Manage</h3>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-1 col-md-2">
                                <i class="fas fa-plane" style="color: #121212;"></i>
                            </div>
                            <div class="col-10">
                                <a class="heading-sidebar-menu" href="<?php echo base_url('admin/planes'); ?>">Fleet/Planes</a>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 1rem;" class="col-12">
                        <div class="row">
                            <div class="col-1 col-md-2">
                                <i class="fas fa-map" style="color: #121212;"></i>
                            </div>
                            <div class="col-10">
                                <a class="heading-sidebar-menu" href="<?php echo base_url('admin/routes'); ?>">Routes</a>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 1rem;" class="col-12">
                        <div class="row">
                            <div class="col-1 col-md-2">
                                <i class="fas fa-ticket" style="color: #545454;"></i>
                            </div>
                            <div class="col-10">
                                <a class="heading-sidebar-menu" href="<?php echo base_url('admin/bookings'); ?>">Bookings</a>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 1rem;" class="col-12">
                        <div class="row">
                            <div class="col-1 col-md-2">
                                <i class="fas fa-user" style="color: #545454;"></i>
                            </div>
                            <div class="col-10">
                                <a class="heading-sidebar-menu" href="<?php echo base_url('admin/users'); ?>">Users</a>
                            </div>
                        </div>
                    </div>
                    <h3 class="heading-sidebar-admin" style="margin-top: 1rem;">Account</h3>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-1 col-md-2">
                                <i class="fas fa-user" style="color: #545454;"></i>
                            </div>
                            <div class="col-10">
                                <a class="heading-sidebar-menu" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col" style="padding: 0;">
                <div class="d-flex justify-content-space-between align-items-center">
                    <div class="container-fluid" style="padding: 0;">
                        <div class="container-fluid padding-pc">
                            <div class="row">
                                <div class="col-md-6 d-flex justify-content-start align-items-center">
                                    <a class="heading-dashboard text-center fs-2">Bookings</a>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                    <img class="pc" style="height: 80%; margin-right: 1rem;" src="../misc/vectors/notification-badge.svg" onclick="showNotification()">
                                    <script>
                                    function showNotification() {
                                        if (on) {
                                            new Toast({message: 'Push notification is on, new message', type: 'success'});
                                        } else {
                                            new Toast({message: 'Push notification is off, cannot receive new message', type: 'danger'});
                                        }
                                       
                                    }
                                    </script>
                                    <div style="margin-right: 1rem;" class="vertical-separator pc"></div>
                                    <img class="pc" style="height: 80%; margin-right: 1rem;" src="../../misc/vectors/solar_user-bold-duotone.svg">
                                    <div class="row pc" style="height: 100%; display: flex; align-self: center; align-items: center; justify-content: center;">
                                        <div class="col-12">
                                            <a class="heading-dashboard pc"><?php echo $name; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="padding: 0rem; border: 2px solid #EFEFEF;">
                    </div>
                </div>
                <div class="container-fluid padding-pc">
                    <div class="row d-flex justify-content-center" style="margin: 0;">
                        <div class="col-md-9" style="padding: 0;">
                            <div class="container-fluid" style="padding: 0;">
                                <div class="row" style="margin: 0;">
                                    <div class="col-md-4 mobile-overview">
                                        <div class="card" style="width: 90%;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-2 d-flex justify-content-center align-items-center" >
                                                        <i style="border: 7px #3F357D solid; background-color: #3F357D; border-radius: 3rem; color: white;" class="fas fa-ticket-alt"></i>
                                                    </div>
                                                    <div class="col-10">
                                                        <b class="heading-sidebar-active">Ticket Sales</b><br>
                                                        <h5 class="heading-overview-data-admin">IDR <?php echo number_format($sales, 0, ',', '.'); ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mobile-overview">
                            <div class="card" style="width: 90%;">
                                <div class="card-body">
                                    <h5 class="card-title heading-dashboard">Good Day!</h5>
                                    <p class="card-text">Wishing you a day full of sunny smiles and happy thoughts!</p>
                                </div>
                                <div class="card-footer text-muted">
                                    0 flights cancelled so far
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="heading-dashboard">Booking Log</h3>
                    <div class="col-12 col-md-9" style="margin: 0rem; height: 50vh; overflow-y: scroll;">
                                <?php
                                if (count($recentPassenger) > 0) {
                                    echo '
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Booking ID</th>
                                                <th scope="col">Booking Date</th>
                                                <th scope="col">Route</th>
                                                <th scope="col">Total Price</th>
                                                <th scope="col">Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    ';
                                    foreach ($recentPassenger as $passenger) {
                                        echo '
                                        <tr>
                                            <th scope="row">'. $passenger->BookingID .'</th>
                                            <td>'. $passenger->BookingDate .'</td>
                                            <td>'. $passenger->RouteID .'</td>
                                            <td>IDR '. number_format($passenger->TotalPrice, 0, ',', '.') .'</td>
                                            <td>'. $passenger->name .'</td>
                                        </tr>
                                        ';
                                    }
                                    echo '
                                        </tbody>
                                    </table>
                                    ';
                                } else {
                                    echo '
                                    <div class="alert alert-warning" role="alert">
                                        No recent bookings found.
                                    </div>
                                    ';
                                }
                                ?>
                                    <!-- Add more recent files here -->
                                  </div>
                            </div>R
                </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>