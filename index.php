<?php // authenticate3.php
require_once ('dbcontroller.php');
$database = new DBController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Company Name</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand order-lg-0">Company Name</a>

            <div class="nav-buttons order-lg-2">
                <button type="button" class="btn position-relative pt-0"><i class="bi bi-cart fs-4 text-secondary"></i></a></button>
                <button type="button" class="btn position-relative pt-0"><a href="login.php"><i class="bi bi-person-circle fs-4 text-secondary"></i></button>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-lg-1" id="navmenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item">
                        <a href="#" class="nav-link px-4 py-2">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#products" class="nav-link px-4 py-2">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link px-4 py-2">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Carousel -->
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/banner1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/banner2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/banner3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      
    <!-- Showcase -->
    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1>Become a <span class="text-warning">Web Developer</span></h1>
                    <p class="lead my-4">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                    </p>
                    <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#enroll">Button</button>
                </div>
                <img class="img-fluid w-50 d-none d-sm-block" src="img/showcase.svg" alt="">
            </div>
        </div>
    </section>
    
    <!-- Newsletter -->
    <section class="bg-primary text-light p-5">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center">
                <h3 class="mb-3 mb-md-0">Sign Up For Our Newsletter</h3>
                <div class="input-group news-input">
                    <input type="text" class="form-control" placeholder="Enter Email" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-dark btn-lg" type="button" id="button-addon2">Button</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Boxes -->
    <section class="p-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-laptop"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                Virtual
                            </h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae alias odio eius, rerum dolorum quisquam.
                            </p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-person-square"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                Hybrid
                            </h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae alias odio eius, rerum dolorum quisquam.
                            </p>
                            <a href="#" class="btn btn-dark">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                In Person
                            </h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae alias odio eius, rerum dolorum quisquam.
                            </p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Learn Section -->
    <section id="products" class="p-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                    <img src="img/fundamentals.svg" alt="" class="img-fluid">
                </div>
                <div class="col-md p-5">
                    <h2>Learn The Fundamentals</h2>
                    <p class="lead">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim nisi dignissimos quisquam? Corporis, aliquam nisi!
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo deleniti iure mollitia, assumenda dolor sequi?
                    </p>
                    <a href="#" class="btn btn-light mt-3">
                        <i class="bi bi-chevron-right"></i>Read More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="p-5 bg-dark text-light">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md p-5">
                    <h2>Learn React</h2>
                    <p class="lead">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim nisi dignissimos quisquam? Corporis, aliquam nisi!
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo deleniti iure mollitia, assumenda dolor sequi?
                    </p>
                    <a href="#" class="btn btn-light mt-3">
                        <i class="bi bi-chevron-right"></i>Read More
                    </a>
                </div>
                <div class="col-md">
                    <img src="img/react.svg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Question Accordion -->
    <section id="questions" class="p-5">
        <div class="container">
            <h2 class="text-center mb-4">
                Frequently Asked Questions
            </h2>
            <div class="accordion accordion-flush" id="questions">
                <!-- Item 1 -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-one" aria-expanded="false" aria-controls="flush-collapseOne">
                      Accordion Item #1
                    </button>
                  </h2>
                  <div id="question-one" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#questions">
                    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus nam porro totam, dolores sequi doloremque distinctio doloribus beatae veniam, deserunt, ad cupiditate tempore ab nostrum. Velit aperiam eaque alias molestias esse accusantium, neque voluptates, corporis eum deserunt rem asperiores? Sit.
                    </div>
                  </div>
                </div>
                <!-- Item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-two" aria-expanded="false" aria-controls="flush-collapseOne">
                        Accordion Item #2
                      </button>
                    </h2>
                    <div id="question-two" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#questions">
                      <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus nam porro totam, dolores sequi doloremque distinctio doloribus beatae veniam, deserunt, ad cupiditate tempore ab nostrum. Velit aperiam eaque alias molestias esse accusantium, neque voluptates, corporis eum deserunt rem asperiores? Sit.
                      </div>
                    </div>
                  </div>
                <!-- Item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-three" aria-expanded="false" aria-controls="flush-collapseOne">
                        Accordion Item #3
                      </button>
                    </h2>
                    <div id="question-three" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#questions">
                      <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus nam porro totam, dolores sequi doloremque distinctio doloribus beatae veniam, deserunt, ad cupiditate tempore ab nostrum. Velit aperiam eaque alias molestias esse accusantium, neque voluptates, corporis eum deserunt rem asperiores? Sit.
                      </div>
                    </div>
                  </div>
                <!-- Item 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-four" aria-expanded="false" aria-controls="flush-collapseOne">
                        Accordion Item #4
                      </button>
                    </h2>
                    <div id="question-four" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#questions">
                      <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus nam porro totam, dolores sequi doloremque distinctio doloribus beatae veniam, deserunt, ad cupiditate tempore ab nostrum. Velit aperiam eaque alias molestias esse accusantium, neque voluptates, corporis eum deserunt rem asperiores? Sit.
                      </div>
                    </div>
                  </div>
              </div>
        </div>
    </section>

    <section id="instructors" class="p-5 bg-primary">
        <div class="container">
            <h2 class="text-center text-white">
                Our Instructors
            </h2>
            <p class="lead text-center text-white mb-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, consequatur!
            </p>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <img src="https://randomuser.me/api/portraits/men/29.jpg" class="rounded-circle mb-3" alt="">
                            <h3 class="card-title mb-3">
                                John Doe
                            </h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. A accusantium dolore tenetur quam, et minima!
                            </p>
                            <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <img src="https://randomuser.me/api/portraits/women/29.jpg" class="rounded-circle mb-3" alt="">
                            <h3 class="card-title mb-3">
                                Jane Doe
                            </h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. A accusantium dolore tenetur quam, et minima!
                            </p>
                            <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <img src="https://randomuser.me/api/portraits/men/10.jpg" class="rounded-circle mb-3" alt="">
                            <h3 class="card-title mb-3">
                                Steve Gomez
                            </h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. A accusantium dolore tenetur quam, et minima!
                            </p>
                            <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <img src="https://randomuser.me/api/portraits/women/2.jpg" class="rounded-circle mb-3" alt="">
                            <h3 class="card-title mb-3">
                                Lisa Smith
                            </h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. A accusantium dolore tenetur quam, et minima!
                            </p>
                            <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact & Map -->
    <section class="p-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md">
                    <h2 class="text-center mb-4">
                        Contact Info
                    </h2>
                    <ul class="list-group list-group-flush lead">
                        <li class="list-group-item">
                            <span class="fw-bold">
                                Main Location:
                            </span>
                            50 Main Street Boston MA
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">
                                Phone Number:
                            </span>
                            012-4432521
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">
                                Email:
                            </span>
                            companyname@gmail.com
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">
                                Main Location:
                            </span>
                            50 Main Street Boston MA
                        </li>
                    </ul>
                </div>
                <div class="col-md">
                    <div id="map"><img src="images/map.svg" alt=""></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy 2022 Company Name</p>
            <a href="#" class="position-absolute bottom-0 end-0 p-5"><i class="bi bi-arrow-up-circle h1"></i></a>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="lead">Fill out this form and we will get back to you</p>
                <form>
                    <div class="mb-3">
                        <label for="first-name" class="col-form-label">First Name:</label>
                        <input type="text" class="form-control" id="first-name">
                    </div>
                    <div class="mb-3">
                        <label for="last-name" class="col-form-label">Last Name:</label>
                        <input type="text" class="form-control" id="last-name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">Phone:</label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>