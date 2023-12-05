<?php
$data = $fleet;
$aircraftID = $data->AircraftID;
$aircraftName = $data->AircraftName;
$aircraftType = $data->AircraftType;
$capacity = $data->Capacity;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aircraft</title>
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
                    confirmButtonText: "Yes, i consent to edit!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.form.submit();
                    }
                });
            }
        </script>


    <div class="container" style="margin-top: 1rem;">
        <h1>Edit Aircraft</h1>
        <form action="<?php echo base_url('plane/editFleetProc'); ?>" method="POST">
            <input type="hidden" name="aircraftID" value="<?php echo $aircraftID; ?>">
            <div class="form-group">
                <label for="aircraftName">Aircraft Name</label>
                <input type="text" class="form-control" id="aircraftName" name="aircraftName" value="<?php echo $aircraftName; ?>">
            </div>
            <div class="form-group">
                <label for="aircraftType">Aircraft Type</label>
                <input type="text" class="form-control" id="aircraftType" name="aircraftType" value="<?php echo $aircraftType; ?>">
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" value="<?php echo $capacity; ?>">
            </div>
            <button class="btn btn-primary" onclick="editConfirm(event)" value="Submit">Update</button>
            <a href="<?php echo base_url('admin/fleet') ?>" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>

</html>
