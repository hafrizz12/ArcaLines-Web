<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcalines | Find a Trip</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://is3.cloudhost.id/eventnimz-jktstrg/eventnimz-jktstrg/cdn-arcastorage/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-xVVam1KS4+Qt2OrFa+VdRUoXygyKIuNWUUUBZYv+n27STsJ7oDOHJgfF0bNKLMJF" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
    channel.bind('user', function(data) {
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
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('user'); ?>"><b>Dashboard</b></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url('user/booking') ?>">Find a trip</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/plane') ?>">Planes & Route</a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/ticket') ?>">My Tickets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/profile') ?>">My Profile</a>
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
                                <a class="heading-sidebar-menu" href="<?php echo base_url('user'); ?>">Dashboard</a>
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
                                <a class="heading-sidebar-active" href="<?php echo base_url('user/booking'); ?>">Find a trip</a>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 1rem;" class="col-12">
                        <div class="row">
                            <div class="col-1 col-md-2">
                                <i class="fas fa-map" style="color: #121212;"></i>
                            </div>
                            <div class="col-10">
                                <a class="heading-sidebar-menu" href="<?php echo base_url('user/plane'); ?>">Planes & Route</a>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 1rem;" class="col-12">
                        <div class="row">
                            <div class="col-1 col-md-2">
                                <i class="fas fa-ticket" style="color: #545454;"></i>
                            </div>
                            <div class="col-10">
                                <a class="heading-sidebar-menu" href="<?php echo base_url('user/ticket'); ?>">My Tickets</a>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 1rem;" class="col-12">
                        <div class="row">
                            <div class="col-1 col-md-2">
                                <i class="fas fa-user" style="color: #545454;"></i>
                            </div>
                            <div class="col-10">
                                <a class="heading-sidebar-menu" href="<?php echo base_url('user/profile'); ?>">My Profile</a>
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
                                    <a class="heading-dashboard text-center fs-2">Book Your Trip</a>
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
                                    <img class="pc" style="height: 80%; margin-right: 1rem;" src="../../../misc/vectors/solar_user-bold-duotone.svg">
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
                        <div class="col-md-12" style="padding: 0;">
                            <div class="container-fluid" style="padding: 0;">
                                <div class="row" style="margin: 0;">
                                    <div class="col-md-3 mobile-overview">
                                        <div class="card" style="width: 90%;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-2 d-flex justify-content-center align-items-center" >
                                                        <i style="border: 7px #3F357D solid; background-color: #3F357D; border-radius: 3rem; color: white;" class="fas fa-ticket-alt"></i>
                                                    </div>
                                                    <div class="col-10">
                                                        <b class="heading-sidebar-active">Active Booking</b><br>
                                                        <h5 class="heading-overview-data-admin"><?php echo $totalActiveBooking; ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    <div class="col-12 col-md-9" style="margin-top: 1rem;">
                        <h2 class="heading-dashboard">Find the best trip</h2>
                        <select class="select2 form-select form heading-overview-data-admin" style="width: 100%; margin-top: 1rem;" id="origin">
                            <option value="0">Origin</option>
                            <?php
                            foreach ($routes as $route) {
                            ?>
                            <option value="<?php echo $route->RoutesID ?>"><?php echo $route->OriginCity . ' -> ' . $route->DestinationCity; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <script>
                        $('.select2').on('select2:select', function (e) {
                                    var data = e.params.data;
                                    var id = data.id;
                                    $(document).ready(function() {
                                        $.ajax({
                                            url: "<?php echo base_url('routes/getRoutes'); ?>",
                                            type: "POST",
                                            data: {id: id},
                                            success: function(data) {
                                                var card = $('.card-woah');
                                                card.empty(); 
                                                var booking = JSON.parse(data);
                                                console.log(booking);
                                                
                                                if (booking.routes) {
                                                    var fromandTo = $("<h3>").addClass("card-title heading-overview-data-admin").text(booking.routes.OriginCity + ' to ' + booking.routes.DestinationCity);
                                                    var model  = $("<p>").addClass("card-text").text(booking.routes.AircraftName);
                                                    var price  = $("<p>").addClass("card-text").text(booking.routes.price + ' IDR/pax');
                                                    var numberPicker = $("<input>").addClass("form-control").attr("type", "number").attr("min", "1").attr("max", "3").attr("id", "seatCount").attr("placeholder", "Seat count")
                                                    numberPicker.css("width", "50%");
                                                    var btnBuy = $("<a>").addClass("btn btn-primary").text("Buy");
                                                    btnBuy.css("margin-top", "1rem");
                                                    btnBuy.css("color", "white")
                                                    btnBuy.on('click', function(e) {
                                                        e.preventDefault();
                                                        var seatCount = numberPicker.val();
                                                        var location = booking.routes.OriginCity + ' to ' + booking.routes.DestinationCity;

                                                        Swal.fire({
                                                            title: "Confirm Purchase",
                                                            text: "You are about to purchase " + seatCount + " ticket(s) for the route " + location + ". Do you want to proceed?",
                                                            icon: "warning",
                                                            showCancelButton: true,
                                                        })
                                                        .then((willBuy) => {
                                                            if (willBuy.isConfirmed) {
                                                                window.location.href = "<?php echo base_url('booking/purchase'); ?>" + "?id=" + booking.routes.RoutesID +"&quantity=" + seatCount;
                                                            } else {
                                                                Swal.fire({
                                                                    title: "Cancelled",
                                                                    text: "Your purchase has been cancelled",
                                                                    icon: "error",
                                                                    showCancelButton: false,
                                                                    buttons: false,
                                                                    dangerMode: true,
                                                                });
                                                            }
                                                        });
                                                    });
                                                    card.append(fromandTo, model, price, numberPicker, btnBuy);
                                                } else {
                                                    var noData = $("<p>").addClass("card-title").text("No data found");
                                                    card.append(noData);
                                                }
                                            }
                                    })});
                                    })
                        </script>
                            <div class="card" style="margin-top: 1rem;">
                                <div class="card-body card-woah">
                                </div>
                            </div>
                    </div>



                    <div class="col-12 col-md-9" style="margin-top: 1rem;">
                        <h3 class="heading-dashboard">Recent Bookings</h3>
                        <div class="recent-files d-flex flex-nowrap" style="overflow-x: auto;">
                                    <?php
                                    if (!$bookings) {
                                        echo '<h5 class="heading-overview-data-admin">No recent bookings</h5>';
                                    }
                                    foreach ($bookings as $pass) {
                                    ?>
                                    <div class="col-md-3 col-6" style="margin-right: 1rem;">
                                        <div class="card">
                                            <div class="card-body">
                                              <h5 class="card-title heading-overview-data-admin" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $pass->OriginCity; ?> to <?php echo $pass->DestinationCity; ?></h5>
                                              <a><?php echo $pass->AircraftName; ?></a>
                                              <p>IDR <?php echo number_format($pass->TotalPrice, 0, ',', '.') ?></p>
                                              <a><?php echo $name; ?></a>
                                              <p><?php echo $pass->SeatCount; ?> Passengers</p>
                                              <p class="card-text"><small class="text-muted"><?php echo $pass->BookingDate; ?></small></p>
                                            </div>
                                          </div>
                                    </div>
                                    <?php 
                                    }
                                    ?>
                                  </div>
                            </div>
                </div>
                </div>
            </div>
            <script>

            $(document).ready(function() {
                $('.select2').select2();
            });
            </script>
        </div>
    </div>


</body>
</html>