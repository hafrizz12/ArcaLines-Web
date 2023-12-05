<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ArcaLines</title>
    <link rel="stylesheet" href="https://ireade.github.io/Toast.js/css/Toast.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../../css/arcalines-css-compiled.css">
    <link href="https://pro.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:opsz,wght@8..144,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
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
 <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 wide-div" style="background-color: #4D4E9B;">
                <div class="container-fluid d-flex justify-content-center align-items-center">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?php echo base_url('auth/loginProcess'); ?>" method="post">
                            <div class="container-fluid mobile-login" style="width: 100%">
                                <h3 class="heading-auth" style="color: white;">Sign in</h3>
                                <p class="heading-paragraph" style="color: white;">We need to verify you, beep bop.</p>
                                <label class="heading-paragraph" style="color: white; margin-bottom: 0.5rem; width: 380px">Email</label>
                                <input type="text" name="email" required  style="background-color: #eaeaec; border: 1px solid #eaeaec; color: #898d8e; text-indent: 10px; " class="form-control heading-paragraph" placeholder="Email">
                                <label class="heading-paragraph" style="color: white; margin-top: 0.5rem;">Password</label>
                                <input type="password" name="password" required  style="background-color: #eaeaec; border: 1px solid #eaeaec; color: #898d8e; text-indent: 10px; " class="form-control heading-paragraph" placeholder="Password">
                                <button class="btn btn-primary heading-paragraph" type="submit" style="width: 100%; margin-top: 1rem; background-color: #333085; border: none;">Sign in</button>
                                <a href="<?php echo base_url('auth/register'); ?>" class="heading-paragraph" style="text-decoration: none; color: white; margin-top: 1rem; display: block; text-align: center;">Don't have an account? <b>Register here</b></a>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
            </div>
            <div class="col-md-5 wide-div" style="padding: 12;">
                <div class="container-fluid d-flex justify-content-center mobile-login" style="background-color: #3B37FF;  width: 95%; border-radius: 1rem;">
                    <div class="row">
                        <div class="col-12">
                            <img src="https://is3.cloudhost.id/eventnimz-jktstrg/eventnimz-jktstrg/19/arcalines-cdn/logo-white%201.png" style="margin-top: 1rem; padding: 12px;">
                            <div class="container-fluid" style="width: 100%; margin-top: 10%;">
                                <h1 class="heading-auth" style="color: white;">A new era of travel, vacation.</h1>
                                <p class="heading-paragraph" style="color: white; margin-bottom: 15%;">Discover the world, take a break and live to enjoy. </p>
                                <div class="d-flex justify-content-center">
                                    <div class="card border-0 rounded-lg" style="background-color: #3A45AD; margin-bottom: 2rem; width: 75%;">
                                        <div class="card-body">
                                            <p class="card-text heading-paragraph" style="color: #ffffff;">"The prices and the service given were incredible, I'll be using this airline company for years to come!"</p>
                                            <h5 class="card-title heading-paragraph" style="color: #ffffff;">Smith John</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                <span class="badge bg-primary">5.0 Rating</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
