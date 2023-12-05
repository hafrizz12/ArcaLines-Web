<?php
$data = $routes;
$routeID = $data->RoutesID;
$originCity = $data->OriginCity;
$destinationCity = $data->DestinationCity;
$distance = $data->Distance;
$aircraftID = $data->AirCraftID;
$price = $data->price;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Route</title>
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
        <h1>Edit Route</h1>
        <form action="<?php echo base_url('routes/editProc'); ?>" method="POST">
            <input type="hidden" name="routeID" value="<?php echo $routeID; ?>">
            <div class="form-group">
                <label for="originCity">Origin City</label>
                <input type="text" class="form-control" id="originCity" name="originCity" value="<?php echo $originCity; ?>">
            </div>
            <div class="form-group">
                <label for="destinationCity">Destination City</label>
                <input type="text" class="form-control" id="destinationCity" name="destinationCity" value="<?php echo $destinationCity; ?>">
            </div>
            <div class="form-group">
                <label for="distance">Distance</label>
                <input type="number" class="form-control" id="distance" name="distance" value="<?php echo $distance; ?>">
            </div>
            <div class="form-group">
                <label for="price">AircraftID</label>
                <input type="number" class="form-control" id="aircraftID" name="aircraftID" value="<?php echo $aircraftID; ?>">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $price; ?>">
            </div>
            <button class="btn btn-primary" onclick="editConfirm(event)" value="Submit">Update</button>
            <a href="<?php echo base_url('admin/routes') ?>" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>

</html>
