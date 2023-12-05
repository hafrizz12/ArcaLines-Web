<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcalines | Profile</title>
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
    channel.bind('user', function(data) {
    new Toast({message: data, type: 'danger', customButtons: [{text: 'Refresh data', onClick: function() { window.location.reload();}},]});
    });
</script>

<script>
            function editConfirm(event) {
                event.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "This will change the data value, such actions won't be recovered that easy.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, i consent to edit!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.form.submit();
                    }
                });
            }
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
              <a class="nav-link" href="<?php echo base_url('user'); ?>">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('user/booking') ?>">Find a trip</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/plane') ?>">Planes & Route</a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/ticket') ?>">My Tickets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/profile') ?>"><b>My Profile</b></a>
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
                                <a class="heading-sidebar-menu" href="<?php echo base_url('user/booking'); ?>">Find a trip</a>
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
                                <a class="heading-sidebar-active" href="<?php echo base_url('user/profile'); ?>">My Profile</a>
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
                                    <a class="heading-dashboard text-center fs-2">My Profile</a>
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
                    <div class="col-12 col-md-12" style="margin-top: 1rem;">
                        <h3 class="heading-dashboard"><?php echo strtoupper($name); ?></h3>
                        <p class="paragraph-dashboard">This is your profile, you can edit your profile here.</p>
                        <hr style="padding: 0rem; border: 2px solid #EFEFEF;">
                        <form action="<?php echo base_url('User/edit_profile'); ?>" method="POST" style="width: 50%;">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" style="width: 50%;" value="<?php echo $user->name; ?>">
                        <br>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" style="width: 50%;" value="<?php echo $user->email; ?>">
                        <br>
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" style="width: 50%;" value="<?php echo $user->phoneNumber;?>">
                        <br>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control" style="width: 50%;">
                        <button class="btn btn-primary" onclick="editConfirm(event)" style="margin-top: 1rem;">Update</button>
                        </form>
                        <br>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>