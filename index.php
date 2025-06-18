<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    
    <?php
    if(isset($_POST['submit'])){
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img
            src="https://ih1.redbubble.net/image.5069278054.4482/raf,360x360,075,t,fafafa:ca443f4786.jpg"
            style="height: 90px; border-radius: 15px"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/majorP2.0/about.php">About Us</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Features
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="/majorP2.0/lectures.php">Lectures</a>
                </li>
                <li><a class="dropdown-item" href="/majorP2.0/books.php">Books</a></li>
                <li>
                  <a class="dropdown-item" href="/majorP2.0/kirtans.php">Kirtans</a>
                </li>
                <li><hr class="dropdown-divider" /></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/majorP2.0/contact.php">Contact Us</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input
              class="form-control me-4"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success me-2" type="submit">
              Search
            </button>
              <?php if (isset($_SESSION['user_email'])): ?>
                    <!-- Show Logout Button if Logged In -->
                    <a href="logout.php" class="btn btn-outline-danger me-2">Logout</a>
                <?php else: ?>
                    <!-- Show Login & Signup Buttons if Not Logged In -->
                    <button class="btn btn-outline-primary me-2" type="button" data-bs-toggle="modal"
                            data-bs-target="#loginModal">Login</button>
                    <button class="btn btn-outline-warning me-2" type="button" data-bs-toggle="modal"
                            data-bs-target="#signupModal">SignUp</button>
                <?php endif; ?>
          </form>
        </div>
      </div>
    </nav>

    <div class="container">
      <!-- Modal -->
      <div
        class="modal fade"
        id="loginModal"
        tabindex="-1"
        aria-labelledby="loginModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="loginModalLabel">Login</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form action="/majorP2.0/login.php" method="POST">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name = "email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We never share your email with anyone.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name = "password">
  </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
             
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              
    <form action="/majorP2.0/xyz.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail2" name="email" required>
            <div id="emailHelp" class="form-text">We never share your email with anyone.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" name="password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_pass" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword4" name="confirm_pass" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Create Account</button>
    </form>
  
</div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         </div>
        </div>
    </div>
</div>
    </div>

    <div
      id="carouselExampleAutoplaying"
      class="carousel slide carousel-fade"
      data-bs-ride="carousel"
      style="margin-bottom: 4rem"
    >
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            src="https://media.istockphoto.com/id/1273903569/photo/idols-of-hindu-god-jagannath-balaram-and-goddess-subhadra-beautifully-decorated-on-the-altar.jpg?s=2048x2048&w=is&k=20&c=qnmCgIKFF86Ol19g7ZBvIRLRn_5f5uPONXru0JJz9-A="
            class="d-block w-100"
            alt="..."
            style="object-fit: cover; height: 60vh"
          />
          <div class="carousel-caption d-none d-md-block">
            <h5>Welcome to our website</h5>
            <p>Sri Sri Jagannath Baladeva Subhadra.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="https://images.unsplash.com/photo-1641913625440-158406784a9f?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            class="d-block w-100"
            alt="..."
            style="object-fit: cover; height: 60vh"
          />
          <div class="carousel-caption d-none d-md-block">
            <h5>Explore the divine sprituality</h5>
            <p>Sri Sri Krishna Balaram</p>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="https://images.unsplash.com/photo-1621355310264-03958a95f6d1?q=80&w=1544&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            class="d-block w-100"
            alt="..."
            style="object-fit: cover; height: 60vh"
          />
          <div class="carousel-caption d-none d-md-block">
            <h5>Dive into Divinity</h5>
            <p>Sri Sri Radha Shyamsundar.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="https://media.gettyimages.com/id/929254898/photo/a-c-bhaktivedanta-swami-prabhupadas-mausoleum-in-vrindavan.jpg?s=2048x2048&w=gi&k=20&c=l82TSDbs_LLdIEM1A-IjOBS6uMinsQr2-BT6SvUXCyg="
            class="d-block w-100"
            alt="..."
            style="object-fit: cover; height: 60vh"
          />
          <div class="carousel-caption d-none d-md-block">
            <h5>Under the Knowledge and Wisdom Of</h5>
            <p>HDG AC. BhaktiVedanta Swami Prabhupada</p>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="https://media.gettyimages.com/id/929254068/photo/left-altar-of-krishna-balaram-temple.jpg?s=2048x2048&w=gi&k=20&c=YBTgVdMj9o8j1nnfc5qbHLW2Pf5lnuyAz0Xxq4cChNs="
            class="d-block w-100"
            alt="..."
            style="object-fit: cover; height: 60vh"
          />
          <div class="carousel-caption d-none d-md-block">
            <h5>Experience the divine bliss</h5>
            <p>Sri Sri Gaur Nitai</p>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="https://media.gettyimages.com/id/929254706/photo/samadhi-shrine.jpg?s=2048x2048&w=gi&k=20&c=h--R5tJ5nhxQkSorfXvpIlQbsAyQgCORxG-DhagRVGE="
            class="d-block w-100"
            alt="..."
            style="object-fit: cover; height: 60vh"
          />
          <div class="carousel-caption d-none d-md-block">
            <h5>Bliss, Knowledge & Eternity</h5>
            <p>Iskcon Vrindavan</p>
          </div>
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="container marketing">
      <!-- Three columns of text below the carousel -->
      <div class="row" style="text-align: center; margin-bottom: 4rem">
        <div class="col-lg-4">
          <img
            class="bd-placeholder-img rounded-circle"
            width="140"
            height="140"
            src = "https://i.pinimg.com/736x/90/f3/56/90f356722e2fd43ed1633fe7f84d0fbe.jpg"
          >
       
          
          <h2 class="fw-normal">A.C Bhaktivedanta Swami Srila Prabhupada</h2>
          <p>
            The founder Acharya of International Society of Krishna Consiousness.
          </p>
          
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img
            class="bd-placeholder-img rounded-circle"
            width="140"
            height="140"
            role="img"
           
            src = "https://i.pinimg.com/736x/86/d7/0e/86d70e0e6f8aa9ce820f80505f2e716a.jpg"
          >
            
          <h2 class="fw-normal">Srila BhaktiSiddhanta Saraswati Thakur Prabhupada</h2>
          <p>
           Founder of Gaudiya Math & spritual master of A.C BhaktiVedanta Swami Prabhupada.
          </p>
         
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img
            class="bd-placeholder-img rounded-circle"
            width="140"
            height="140"
            src = "https://i.pinimg.com/736x/97/97/fb/9797fb31b3c8ecefd33b6efe02cc8a18.jpg"
          >
            
           <h2 class="fw-normal">Lord Sri Chaitanya Mahaprabhu</h2>
          <p>
           Lord Krishna as Sri Chaitanya Mahaprabhu who started Bhakti Movement.
          </p>
          
        </div>
        <!-- /.col-lg-4 -->
      </div>
      <!-- /.row -->

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider" />

      <div class="row featurette">
        <div class="col-md-7 my-auto">
          <h2 class="featurette-heading fw-normal lh-1 fs-1">
            Eternity. We are not this body.
            <span class="text-body-secondary">.</span>
          </h2>
          <p class="lead">
            "The living entity is eternal. He is never born and he never dies. He is eternally existent."
          </p>
        </div>
        <div class="col-md-5 my-auto">
          <img
            class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto rounded-4"
            width="500"
            height="500"
           
            src = "https://i.pinimg.com/736x/3c/ba/bb/3cbabbecbfc32536d5e81637fd8835ca.jpg"
          >
            
        </div>
      </div>

      <hr class="featurette-divider" />

      <div class="row featurette">
        <div class="col-md-7 order-md-2 my-auto">
          <h2 class="featurette-heading fw-normal lh-1 fs-1">
            Bliss. Bliss is the natural condition of the spirit soul. 
            <span class="text-body-secondary"></span>
          </h2>
          <p class="lead">
            "Material pleasure is flickering, but spiritual bliss is eternal and ever-increasing. That is the difference."
          </p>
        </div>
        <div class="col-md-5 order-md-1 my-auto">
          <img
            class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto rounded-4"
            width="500"
            height="500"
            xmlns="http://www.w3.org/2000/svg"
            role="img"
            aria-label="Placeholder: 500x500"
            preserveAspectRatio="xMidYMid slice"
            focusable="false"
            src = "https://i.pinimg.com/736x/76/60/2c/76602c7b03bf2b0c9cde66f077a4a5b5.jpg"
          >
          
        </div>
      </div>

      <hr class="featurette-divider" />

      <div class="row featurette">
        <div class="col-md-7 my-auto">
          <h2 class="featurette-heading fw-normal lh-1 fs-1">
            Knowledge. 
            <span class="text-body-secondary"></span>
          </h2>
          <p class="lead">
      Real knowledge means to understand oneself as a spirit soul, and to understand Kṛṣṇa.
          </p>
        </div>
        <div class="col-md-5 my-auto">
          <img
            class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto rounded-4"
            width="500"
            height="500"
            xmlns="http://www.w3.org/2000/svg"
            role="img"
            aria-label="Placeholder: 500x500"
            preserveAspectRatio="xMidYMid slice"
            focusable="false"
            src ="https://i.pinimg.com/736x/19/3d/60/193d602c807321c9840ec5744ac8f1d2.jpg"
          >
            <title>Placeholder</title>
            <rect
              width="100%"
              height="100%"
              fill="var(--bs-secondary-bg)"
            ></rect>
            
          </svg>
        </div>
      </div>

      <!-- /END THE FEATURETTES -->
    </div>
    <div class="container">
      <footer
        class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top"
      >
        <div class="col-md-4 d-flex align-items-center">
          <a
            href="/"
            class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1"
          >
            <img
              src="https://ih1.redbubble.net/image.5069278054.4482/raf,360x360,075,t,fafafa:ca443f4786.jpg"
              style="height: 90px; border-radius: 15px"
          /></a>
          <span class="mb-3 mb-md-0 text-body-secondary"
            >© 2025 International Society for Krishna Consiousness, Inc</span
          >
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
          <li class="ms-3">
            <a class="text-body-secondary" href="#"
              ><svg class="bi" width="24" height="24">
                <use xlink:href="#twitter"></use></svg>
            </a>
          </li>
          <li class="ms-3">
            <a class="text-body-secondary" href="#"
              ><svg class="bi" width="24" height="24">
                <use xlink:href="#instagram"></use></svg>
            </a>
          </li>
          <li class="ms-3">
            <a class="text-body-secondary" href="#"
              ><svg class="bi" width="24" height="24">
                <use xlink:href="#facebook"></use></svg>
            </a>
          </li>
        </ul>
      </footer>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>  