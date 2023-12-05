<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
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
                    confirmButtonText: "Yes, I consent to edit!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.form.submit();
                    }
                });
            }
        </script>


    <div class="container" style="margin-top: 1rem;">
        <h1>Edit User</h1>
        <form action="<?php echo base_url('Users/editProc'); ?>" method="POST">
            <input type="hidden" name="userID" value="<?php echo $user->UserID; ?>">
            <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" style="width: 50%;" value="<?php echo $user->name; ?>">
                        <br>
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" class="form-control" style="width: 50%;" value="<?php echo $user->Username; ?>">
                        <br>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" style="width: 50%;" value="<?php echo $user->email; ?>">
                        <br>
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" style="width: 50%;" value="<?php echo $user->phoneNumber;?>">
                        <br>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control" style="width: 50%; margin-bottom: 1rem;">
            <button class="btn btn-primary" onclick="editConfirm(event)" value="Submit">Update</button>
            <a href="<?php echo base_url('admin/users') ?>" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>

</html>


                        