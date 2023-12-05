
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://ireade.github.io/Toast.js/css/Toast.min.css">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
            width: 300px;
            margin: 0 auto;
            margin-top: 50px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://eventnimz-jktstrg.is3.cloudhost.id/eventnimz-jktstrg/19/haf-school-stuff/test/Toast.js"></script>
<?php
  if (isset($message)) {
    echo '
    <script>
    new Toast({message: "'. $message .'", type: "danger"});
    </script>
    ';
    $this->session->unset_userdata('message');
}
?>
    <form action="<?php echo base_url('auth/login'); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</body>
</html>
