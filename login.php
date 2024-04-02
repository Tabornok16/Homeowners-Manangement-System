<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap');
    :root {
      --bs-font-sans-serif: 'Manrope', sans-serif;
      --bs-primary: orange; /* Change to orange */
      --bs-gray: #6c757d;
      --bs-danger: #dc3545;
      --bs-dark: #000;
    }

    /* Update blue text to orange */
    .text-primary {
      color: var(--bs-primary) !important;
    }

    /* Add close button styles */
    .close-button {
      position: absolute;
      top: 10px;
      right: 10px;
      color: blu;
      font-size: 20px;
      cursor: pointer;
    }

    /* Update the hover effect for the close button */
    .close-button:hover {
      color: orange;
    }

    .btn {
      --bs-btn-padding-y: 0.7rem;
      --bs-btn-padding-x: 3.5rem;
      --bs-btn-font-size: 1.25rem;
      --bs-btn-border-radius: 3.5rem;
    }

    .view-password {
      position: absolute;
      right: 0;
      top: 50%;
      transform: translateY(-50%);
      border: 1px solid transparent;
      background: none;
      z-index: 3;
      padding: 14px;
      cursor: pointer;
      color: orange; /* Set the icon color to orange */
    }

    .error {
      color: var(--bs-danger);
      font-size: 14px;
    }

    .custom-label {
      color: var(--bs-dark);
      font-weight: 500;
    }

    .form-control {
      &.custom-control {
        padding: 14px;
        border-bottom: 1px solid var(--bs-gray) !important;
      }
      &:focus {
        box-shadow: none;
        border-bottom: 1px solid var(--bs-primary) !important;
        & ~ .custom-label {
          color: var(--bs-primary);
        }
      }
      &.error {
        border: 1px solid var(--bs-danger);
        font-size: initial;
        color: initial;
      }
    }
  </style>
</head>
<body>
  <main class="bg-light">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-6" style="max-width:450px">
          <div class="card px-4 py-5 border-0 shadow position-relative">
            <span class="close-button" onclick="goBack()"><i class="fas fa-times"></i></span>
            <h4 class="text-primary text-center">LOGIN</h4>
            <form id="accountForm" class="mt-4" method="POST" action="login-action.php">
              <div class="mb-2">
                <div class="form-floating form-group mb-4">
                  <input type="text" class="form-control border-0 rounded-0 bg-transparent ps-0 custom-control" id="username" name="username" placeholder="Enter Username">
                  <label for="username" class="form-label ps-0 custom-label">Username</label>
                </div>
                <div class="form-group position-relative">
                  <div class="form-floating d-flex flex-wrap">
                    <input type="password" class="form-control border-0 rounded-0 bg-transparent ps-0 custom-control w-100" id="password" name="password" placeholder="password">
                    <label for="password" class="form-label ps-0 custom-label">Password</label>
                    <a class="input-group-text text-decoration-none view-password"><i class="fas fa-eye-slash"></i></a>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <a href="admin\contactus.php" class="text-decoration-none">Forget Password?</a>
              </div>
              <div class="mt-5 text-center"> 
                <button type="login" class="btn btn-primary btn-lg mb-3 btn-createAccount">LOGIN</button>
                <p class="text-center text-primary mt-1">Don't have an account? <a href="admin\contactus.php" class="text-decoration-none"><b>Contact Us.</b></a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  // Function to toggle password visibility
  $(".view-password").on('click', function () {
    var eye = $(this).children();
    var toggleInput = $(this).siblings();
    eye.toggleClass("fa-eye-slash fa-eye");
    var type = toggleInput.attr('type') === 'password' ? 'text' : 'password';
    toggleInput.attr('type', type);
  });

  // Function to go back to the previous page
  function goBack() {
    window.history.back();
  }
</script>
</body>
</html>
