<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hallyuin</title>

    <!-- CSS-->
    <link href="css/main-style.css" rel="stylesheet" type="text/css">
    <!-- Custom fonts-->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> -->

    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Custom styles-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-fluid">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container margin-10">
                <a class="navbar-brand" href="#">
                    <img src="assets/logo.png" alt="Bootstrap" width="100">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <form class="d-flex mx-auto w-75" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <div class="cart-icon">
                                <a class="nav-link" href="cart.php">
                                    <img src="assets/online-shopping.png" alt="">
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <img src="assets/heart.png" alt="">
                            </a>
                        </li>
                        <li class="nav-item separator">
                            <span>|</span>
                        </li>
                        <li class="nav-item dropdown divider">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#" id="logoutButton">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Carousel section -->
        <section id="card-carousel" class="py-4 overflow-hidden my-4">
            <div class="container">
                <div class="container position-relative margin-top-20">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-start">
                            <!-- Card contents (same as provided) -->
                            <div class="card-carousel me-2 position-relative">
                                <img src="assets/book-1.jpeg" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                        <button>See product</button>
                                    </div>
                                </div>
                            </div>
                            <!-- card content -->
                            <div class="card-carousel me-2 position-relative">
                                <img src="assets/book-2.jpeg" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                        <button>See product</button>
                                    </div>
                                </div>
                            </div>

                            <!-- card content -->
                            <div class="card-carousel me-2 position-relative">
                                <img src="assets/disc-1.jpeg" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                        <button>See product</button>
                                    </div>
                                </div>
                            </div>

                            <!-- card content -->
                            <div class="card-carousel me-2 position-relative">
                                <img src="assets/disc-2.jpeg" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                        <button>See product</button>
                                    </div>
                                </div>
                            </div>

                            <!-- card content -->
                            <div class="card-carousel me-2 position-relative">
                                <img src="assets/acc-1.jpeg" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                        <button>See product</button>
                                    </div>
                                </div>
                            </div>

                            <!-- card content -->
                            <div class="card-carousel me-2 position-relative">
                                <img src="assets/bag-2.jpeg" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                        <button>See product</button>
                                    </div>
                                </div>
                            </div>
                            <!-- card content -->
                            <div class="card-carousel me-2 position-relative">
                                <img src="assets/bag-2.jpeg" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                        <button>See product</button>
                                    </div>
                                </div>
                            </div>
                            <!-- card content -->
                            <div class="card-carousel me-2 position-relative">
                                <img src="assets/bag-2.jpeg" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                        <button>See product</button>
                                    </div>
                                </div>
                            </div>
                            <!-- card content -->
                            <div class="card-carousel me-2 position-relative">
                                <img src="assets/bag-2.jpeg" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                        <button>See product</button>
                                    </div>
                                </div>
                            </div>
                            <!-- card content -->
                            <div class="card-carousel me-2 position-relative">
                                <img src="assets/bag-2.jpeg" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                        <button>See product</button>
                                    </div>
                                </div>
                            </div>
                            <!-- card content -->
                            <div class="card-carousel me-2 position-relative">
                                <img src="assets/bag-2.jpeg" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                        <button>See product</button>
                                    </div>
                                </div>
                            </div>
                            <!-- card content -->
                            <div class="card-carousel me-2 position-relative">
                                <img src="assets/bag-2.jpeg" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                        <button>See product</button>
                                    </div>
                                </div>
                            </div>
                            <!-- card content -->
                            <div class="card-carousel me-2 position-relative">
                                <img src="assets/bag-2.jpeg" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                        <button>See product</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button class="button-arrow-left position-absolute start-0 top-50 translate-middle-y">
                        <img src="assets/left-arrow.png" alt="">
                    </button>
                    <button class="button-arrow-right position-absolute end-0 top-50 translate-middle-y">
                        <img src="assets/right-arrow.png" alt="">
                    </button>
                </div>
            </div>
        </section>



        <!-- Categories -->
        <section id="categories" class="py-5">
            <div class="container-fluid bg-category">
                <div class="center-container text-center mb-4">
                    <h2><span class="underline-decor">Categories</span></h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6 col-md-2 text-center mb-3">
                        <div class="category-icon mb-2">
                            <img src="assets/quarter-note.png" alt="Album Icon">
                        </div>
                        <div class="category-title">Album</div>
                    </div>
                    <div class="col-6 col-md-2 text-center mb-3">
                        <div class="category-icon mb-2">
                            <img src="assets/kpop.png" alt="Merchandise Icon">
                        </div>
                        <div class="category-title">Merchandise</div>
                    </div>
                    <div class="col-6 col-md-2 text-center mb-3">
                        <div class="category-icon mb-2">
                            <img src="assets/photobook.png" alt="Photobook Icon">
                        </div>
                        <div class="category-title">Photobook</div>
                    </div>
                    <div class="col-6 col-md-2 text-center mb-3">
                        <div class="category-icon mb-2">
                            <img src="assets/vinyl.png" alt="Disc/DVD Icon">
                        </div>
                        <div class="category-title">Disc/DVD</div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Section product-->
        <section>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <!-- Product Card -->
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Fancy Product</h5>
                                    <!-- Product price-->
                                    $40.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="#">View options</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Special Item</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    $18.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Sale Item</h5>
                                    <!-- Product price-->
                                    $25.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Popular Item</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    $40.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Sale Item</h5>
                                    <!-- Product price-->
                                    $25.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Fancy Product</h5>
                                    <!-- Product price-->
                                    $120.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="#">View options</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Special Item</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    $18.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Popular Item</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    $40.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Connect the JS file -->
        <script src="js/index.js"></script>

        <script src="js\carousel.js"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

        <!-- jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-qFOQ9YFAeGj1gDOuUD61g3D+tLDv3u1ECYWqT82WQoaWrOhAY+5mRMTTVsQdWutbA5FORCnkEPEgU0OF8IzGvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <!-- owl carousel script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 5,
                        nav: true,
                        loop: false
                    }
                }
            })
        </script>

</body>

</html>