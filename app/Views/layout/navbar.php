<!-- Navbar -->
<!-- Bootstrap CSS -->
<link rel="icon" type="image/png" href="<?= base_url('/images/logo/logo1.png'); ?>">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/homestyle.css'); ?>">
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        
        <!-- Left: Logo -->
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <img src="<?= base_url('images/logo/logo1.png'); ?>" alt="GENSYS CARES" class="logo">
        </a>

        <!-- Center: Navbar Links -->
        <?php 
$request = service('request'); 
$segment = $request->getUri()->getSegment(1);
?>

<div class="collapse navbar-collapse justify-content-center" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link <?= ($segment == '') ? 'active' : '' ?>" href="<?= site_url('/') ?>">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($segment == 'announcement') ? 'active' : '' ?>" href="<?= site_url('announcement') ?>">ANNOUNCEMENT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($segment == 'about') ? 'active' : '' ?>" href="<?= site_url('about') ?>">ABOUT US</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($segment == 'contact') ? 'active' : '' ?>" href="<?= site_url('contact') ?>">CONTACT</a>
        </li>
    </ul>
</div>


        <!-- Profile Icon -->
<!-- Right Side: Profile/Logout -->
<div class="user-icon">
    <?php if (session()->has('user_id')): ?>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle d-flex align-items-center" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= base_url('images/logo/profile.png'); ?>" alt="User" class="me-2">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li class="dropdown-header fw-bold text-center"><?= session()->get('user_name'); ?></li> <!-- User's Name -->
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#manageModal">Manage</a></li>
                <li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a></li>
            </ul>
        </div>
    <?php else: ?>
        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
            <img src="<?= base_url('images/logo/profile.png'); ?>" alt="User Login">
        </a>
    <?php endif; ?>
</div>

<!-- Manage Account Modal -->
<div class="modal fade" id="manageModal" tabindex="-1" aria-labelledby="manageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded-3">
            <div class="modal-header border-0">
                <h5 class="modal-title text-primary" id="manageModalLabel">Manage Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/auth/updateProfile') ?>" method="POST">
                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" value="<?= session()->get('user_name'); ?>" placeholder="Enter your full name">
                    </div>

                    <div class="mb-4">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control form-control-lg" id="current_password" name="current_password" required placeholder="Enter current password">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Leave blank to keep current password">
                    </div>
                    
                    <div class="mb-4">
                        <label for="confirm_password" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control form-control-lg" id="confirm_password" name="confirm_password" placeholder="Leave blank to keep current password">
                    </div>

                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add this CSS to make it more modern -->
<style>
    .modal-content {
        background: linear-gradient(to bottom, #91B7D1 10%, #FAF7E5 100%);
        border-radius: 15px;
    }

    .modal-header {
        background: linear-gradient(to bottom, #91B7D1 100%, #FAF7E5 0%);
        color: white;
        border-radius: 15px 15px 0 0;
    }

    .modal-title {
        font-weight: bold;
    }

    .form-control {
        border-radius: 10px;
        box-shadow: none;
        border: 1px solid #ced4da;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .modal-footer .btn {
        border-radius: 50px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .modal-body {
        padding-top: 20px;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }
</style>


<!-- Toast Notifications -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <?php if(session()->getFlashdata('success')): ?>
        <div class="toast show bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= session()->getFlashdata('success'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="toast show bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Error</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= session()->getFlashdata('error'); ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let toastElList = [].slice.call(document.querySelectorAll('.toast'));
        let toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl);
        });
        toastList.forEach(toast => toast.show());
    });
</script>


<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body d-flex p-0">
                <!-- Left Side: Login Form -->
                <div class="login-form">
                    <div class="logo">
                        <img src="<?= base_url('images/logos/logo.png'); ?>" alt="Logo" class="logo">
                    </div>
                    <h2 class="text-center mb-4">Login</h2> 
                    <form id="loginForm" action="<?= base_url('auth/login'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control input-style" placeholder="Type here your email..." required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control input-style" placeholder="Type here your password..." required>
                        </div>

                        <!-- reCAPTCHA -->
                        <div class="mb-3 d-flex justify-content-center">
                            <div class="g-recaptcha" data-sitekey="6Ld5OQUrAAAAAPS5b5fKIPh_fxw4XfNFk-7GURC-"></div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input type="checkbox" id="rememberMe" class="form-check-input">
                                <label for="rememberMe" class="form-check-label">Remember Me</label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn login-btn">Login</button>
                        </div>
                        <p class="text-center mt-3">Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Register</a></p>
                        <p class="text-center mt-3"><a href="#">Terms of Service</a></p>
                    </form>
                </div>

                <!-- Right Side: Social Login -->
                <div class="social-login">
                    <p class="text-light text-center mb-3">or Login with</p>
                    <button class="btn social-btn google"><img src="<?= base_url('images/logo/google.png'); ?>" alt=""> Google</button>
                    <button class="btn social-btn facebook"><img src="<?= base_url('images/logo/fb.svg'); ?>" alt=""> Facebook</button>
                    <button class="btn social-btn microsoft"><img src="<?= base_url('images/logo/microsoft.png'); ?>" alt=""> Microsoft</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Include Google reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let loginForm = document.querySelector("#loginForm");

    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();

        let recaptchaResponse = grecaptcha.getResponse(); // Get reCAPTCHA response

        if (!recaptchaResponse) {
            alert("Please verify the reCAPTCHA before logging in.");
            return;
        }

        let formData = new FormData(this);
        formData.append("g-recaptcha-response", recaptchaResponse);

        fetch("<?= base_url('auth/login'); ?>", {
            method: "POST",
            headers: { "X-Requested-With": "XMLHttpRequest" },
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                window.location.href = data.redirect;
            } else {
                alert("Error: " + data.message);
                grecaptcha.reset(); // Reset reCAPTCHA if login fails
            }
        })
        .catch(error => {
            console.error("Fetch Error:", error);
        });
    });
});
</script>






<!--register modal-->
<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center p-0">
                <div class="register-form p-4">
                    <div class="text-center mb-3">
                        <img src="<?= base_url('images/logo/logo1.png'); ?>" alt="Logo" class="logo">
                    </div>
                    <form id="registerForm" action="<?= base_url('auth/register'); ?>" method="POST">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="registerName" class="form-label">Full Name</label>
                            <input type="text" name="name" id="registerName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email</label>
                            <input type="email" name="email" id="registerEmail" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" name="password" id="registerPassword" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirmPassword" class="form-control" required>
                        </div>
                         <!-- reCAPTCHA -->
                         <div class="mb-3 d-flex justify-content-center">
                            <div class="g-recaptcha" data-sitekey="6Ld4OQUrAAAAAFy5ZxigZ4K0fn1w0m9qlFbb2Ae5"></div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    <p class="text-center mt-3">Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let registerForm = document.querySelector("#registerForm");

    registerForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        let recaptchaResponse = grecaptcha.getResponse(); // Get reCAPTCHA response

        let formData = new FormData(this);
        formData.append("g-recaptcha-response", recaptchaResponse); // Append reCAPTCHA response to form data

        console.log("Submitting registration form..."); // Debugging log to check

        // Send AJAX request to submit the form
        fetch(this.action, {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest" // Ensure CI treats it as an AJAX request
            },
            body: formData,
        })
        .then(response => response.json()) // Expect JSON response
        .then(data => {
            console.log(data); // Log the full response to inspect its structure
            if (data.status === "success") {
                alert("Registration successful!");
                window.location.reload(); // Reload the page after successful registration
            } else {
                // Check if data.message is an object or string
                let errorMessage = typeof data.message === "object" ? JSON.stringify(data.message) : data.message;
                alert("Error: " + errorMessage); // Show error message
                grecaptcha.reset(); // Reset reCAPTCHA if registration fails
            }
        })
        .catch(error => {
            console.error("Fetch Error:", error); // Log any errors that occur during fetch
            alert("An error occurred while submitting the form. Please try again.");
        });
    });
});

</script>


        <!-- Mobile Menu Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
