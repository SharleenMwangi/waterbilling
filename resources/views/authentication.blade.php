<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In & Sign Up Form</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<main>
    <div class="box">
        <div class="inner-box">
            <div class="forms-wrap">
                <!-- Sign In Form -->
                <form action="{{ route('login') }}" method="POST" class="sign-in-form">
                    @csrf
                    <div class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo">
                    </div>
                    <div class="heading">
                        <h2>Welcome Back</h2>
                        <h6>Not registered yet?</h6>
                        <a href="#" class="toggle">Sign Up</a>
                    </div>
                    <div class="actual-form">
                        <div class="input-wrap">
                            <input type="email" name="email" class="input-field" autocomplete="off" required />
                            <label>Email</label>
                        </div>
                        <div class="input-wrap">
                            <input type="password" name="password" minlength="4" class="input-field" autocomplete="off" required />
                            <label>Password</label>
                        </div>
                        <input type="submit" value="Sign In" class="sign-btn" />
                        <p class="text">
                            Forgotten your password?
                            <a href="#">Get help</a>
                        </p>
                    </div>
                </form>
            </div>

            <div class="carousel">
                <!-- Sign Up Form -->
                <form action="{{ route('register') }}" method="POST" class="sign-up-form">
                    @csrf
                    <div class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo">
                    </div>
                    <div class="heading">
                        <h2>Get Started</h2>
                        <h6>Already have an account?</h6>
                        <a href="#" class="toggle">Sign In</a>
                    </div>
                    <div class="actual-form">
                        <div class="input-wrap">
                            <input type="text" name="name" class="input-field" autocomplete="off" required />
                            <label>Name</label>
                        </div>
                        <div class="input-wrap">
                            <input type="email" name="email" class="input-field" autocomplete="off" required />
                            <label>Email</label>
                        </div>
                        <div class="input-wrap">
                            <input type="password" name="password" minlength="4" class="input-field" autocomplete="off" required />
                            <label>Password</label>
                        </div>
                        <input type="submit" value="Sign Up" class="sign-btn" />
                        <p class="text">
                           By signing up, I agree to the 
                            <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
