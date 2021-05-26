<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Covid HelpLine</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Shree Mahaveer Jan Seva Samiti</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#!">
                                Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="verify.html">Upload</a></li>
                        <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="verify.html">Sign In</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "enroll";
        
            //create connetion
            $conn = new mysqli($servername,$username,$password,$database);
        
            //check connection
            if($conn->connect_error){
                die("connection failed" . $conn->connect_error);
            }
        ?>

        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-md-12">
                    <!-- <h1 class="my-4">
                        Jain
                        <small>Helping</small>
                    </h1> -->
                    <!-- Blog post-->
                    <?php 
                        $sql = "SELECT File_Name, Messages, Status, Category FROM register";
                        $result = $conn->query($sql);
                        $Category = $_GET['Category'];

                        if ($result->num_rows > 0) {
                            while ($rows = $result->fetch_assoc()){
                                if ($rows["Status"] == 1 && $rows['Category'] == $Category){
                                $file = $rows['File_Name'];
                                $msg = $rows['Messages'];
                                
                                echo '<div class="card mb-4 my-4" style="flex-direction: column;">
                                <div class="slideshow-container my-4">
                                    <!-- image division -->
                                    <div class="mySlides " style = "display: block;">
                                        <img class="card-img-top" src="uploads/' . $rows['File_Name'] . '"alt="Card image cap" />
                                    </div>                       
                                </div>
                                <!-- message division -->
                                <div class="card-body">
                                    <!-- <h2 class="card-title">Indore Helping Hand</h2> -->
                                    <p class="card-text align-self-center">'
                                        . $rows['Messages'] . '
                                    </p>
                                </div>';
                                }
                               echo "</div>"; 
                            }
                        }

                        $conn->close();
                    ?>
                    <!-- <div class="card mb-4 my-4" style="flex-direction: column;">
                        <div class="slideshow-container my-4"> -->
                            <!-- image division -->
                            <!-- <div class="mySlides ">
                                <img class="card-img-top" src="uploads/" alt="Card image cap" />
                            </div> -->
                            <!-- <div class="mySlides ">
                                <img class="card-img-top" src="assets/indore helping hand/img (2).jpeg" alt="Card image cap" />
                            </div>                            
                            <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1, 0)">&#10095;</a> -->
                        <!-- </div> -->
                        <!-- message division -->
                        <!-- <div class="card-body"> -->
                            <!-- <h2 class="card-title">Indore Helping Hand</h2> -->
                            <!-- <p class="card-text align-self-center">
                            </p> -->
                            <!-- <a class="btn btn-primary" href="indore-helping.html">Go to page →</a> -->
                        <!-- </div> -->
                        <!-- <div class="card-footer text-muted">
                            Posted on January 1, 2021 by
                            <a href="#!">Start Bootstrap</a>
                        </div> -->
                    <!-- </div> -->
                    <!-- <div class="card mb-4 my-4" style="flex-direction: column;">
                        <div class="slideshow-container my-4"> -->
                            <!-- image division -->
                            <!-- <div class="">
                                <img class="card-img-top" src="uploads/" alt="Card image cap" />
                            </div> -->
                            <!-- <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1, 0)">&#10095;</a> -->
                        <!-- </div> -->
                        <!-- message division -->
                        <!-- <div class="card-body"> -->
                            <!-- <h2 class="card-title">Indore Helping Hand</h2> -->
                            <!-- <p class="card-text align-self-center">
                            </p> -->
                            <!-- <a class="btn btn-primary" href="indore-helping.html">Go to page →</a> -->
                        <!-- </div> -->
                        <!-- <div class="card-footer text-muted">
                            Posted on January 1, 2021 by
                            <a href="#!">Start Bootstrap</a>
                        </div> -->
                    <!-- </div> -->
                    <!-- Blog post-->
                    <!-- <div class="card mb-4">
                        <div class="slideshow-container my-4">
                            <div class="mySlides2 ">
                                <img class="card-img-top" src="assets/please help and support/img (1).jpeg" alt="Card image cap" />
                            </div>
                            <div class="mySlides2 ">
                                <img class="card-img-top" src="assets/please help and support/img (2).jpeg" alt="Card image cap" />
                            </div>
                            <div class="mySlides2 ">
                                <img class="card-img-top" src="assets/please help and support/img (3).jpeg" alt="Card image cap" />
                            </div>
                            <div class="mySlides2 ">
                                <img class="card-img-top" src="assets/please help and support/img (4).jpeg" alt="Card image cap" />
                            </div>
                            <a class="prev" onclick="plusSlides(-1, 1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1, 1)">&#10095;</a>
                        </div>
                        <div class="card-body">
                            <h2 class="card-title">Please Help & Support</h2>
                            <p class="card-text">Find out here who need your help and require some support from you. All those who need any type of support can put their requirments here <a href="#">Click here</a> . Our volunteers team would be 
                            happy to extend help to the possilble. Find out supporting volunteers near you <a href="#">Click here</a></p>
                            <a class="btn btn-primary" href="please-help.html">Go to page →</a>
                        </div> -->
                        <!-- <div class="card-footer text-muted">
                            Posted on January 1, 2021 by
                            <a href="#!">Start Bootstrap</a>
                        </div> -->
                    <!-- </div> -->
                    <!-- Blog post-->
                    <!-- <div class="card mb-4">
                        <div class="slideshow-container my-4">
                            <div class="mySlides3 ">
                                <img class="card-img-top" src="assets/donate and raise/img (1).jpeg" alt="Card image cap" />
                            </div> -->
                            <!-- <div class="mySlides3 ">
                                <img class="card-img-top" src="assets/donate and raise/img (2).jpeg" alt="Card image cap" />
                            </div> -->
                            <!-- <div class="mySlides3 ">
                                <img class="card-img-top" src="assets/donate and raise/img (3).jpeg" alt="Card image cap" />
                            </div>
                            <div class="mySlides3 ">
                                <img class="card-img-top" src="assets/donate and raise/img (4).jpeg" alt="Card image cap" />
                            </div>
                            <div class="mySlides3 ">
                                <img class="card-img-top" src="assets/donate and raise/img (5).jpeg" alt="Card image cap" />
                            </div>
                            <div class="mySlides3 ">
                                <img class="card-img-top" src="assets/donate and raise/img (6).jpeg" alt="Card image cap" />
                            </div>
                            <div class="mySlides3 ">
                                <img class="card-img-top" src="assets/donate and raise/img (7).jpeg" alt="Card image cap" />
                            </div>
                            <a class="prev" onclick="plusSlides(-1, 2)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1, 2)">&#10095;</a>
                        </div>
                        <div class="card-body">
                            <h2 class="card-title">Donate or Raise Funds</h2>
                            <p class="card-text">If you wish to donate for medical and family support or want to provide direct help to the needy please do it. In this pandemic time, your support 
                            is life saving to some one <a href="#">Click here</a> . If required financial support for hospital bills or society wellfare programme click here <a href="#">Click here</a></p>
                            <a class="btn btn-primary" href="donate-raise.html">Go to page →</a>
                        </div> -->
                        <!-- <div class="card-footer text-muted">
                            Posted on January 1, 2021 by
                            <a href="#!">Start Bootstrap</a>
                        </div> -->
                    <!-- </div> -->
                    <!-- Pagination-->
                    <!-- <ul class="pagination justify-content-center mb-4">
                        <li class="page-item"><a class="page-link" href="#!">← Older</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">Newer →</a></li>
                    </ul> -->
                </div>
                <!-- Side widgets-->
                <!-- <div class="col-md-4"> -->
                    <!-- Search widget-->
                    <!-- <div class="card my-4">
                        <h5 class="card-header" style="padding-top: 0.75rem;">Search</h5>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Search for..." />
                                <span class="input-group-append"><button class="btn btn-secondary" type="button">Go!</button></span>
                            </div>
                        </div>
                    </div> -->
                    <!-- Categories widget-->
                    <!-- <div class="card my-4">
                        <h5 class="card-header" style="padding-top: 0.75rem;">Categories</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Hospital</a></li>
                                        <li><a href="#!">Ambulance</a></li>
                                        <li><a href="#!">Oxygen</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Plasma</a></li>
                                        <li><a href="#!">Injection</a></li>
                                        <li><a href="#!">Medicine</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Side widget-->
                    <!-- <div class="card my-4">
                        <h5 class="card-header" style="padding-top: 0.75rem;">Home Quarantine Support</h5>
                        <div class="card-body"><ul class="list-unstyled mb-0">
                            <li><a href="#">Food services, Tiffin</a></li>
                            <li><a href="#">Grocery</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruits</a></li>
                            <li><a href="#">Sanitization Service</a></li>
                            <li><a href="#">Household Supporting Service</a></li>                            
                        </ul></div>
                    </div> -->
                <!-- </div> -->
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!-- <script src="js/scripts.js"></script> -->
    </body>
</html>
