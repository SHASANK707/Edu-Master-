<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <style>
        /* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
a {
  text-decoration: none;
}
.header {
  position: fixed;
  height: 80px;
  width: 100%;
  z-index: 100;
  padding: 0 20px;
}
.nav {
  max-width: 1100px;
  width: 100%;
  margin: 0 auto;
}
.nav,
.nav_item {
  display: flex;
  height: 100%;
  align-items: center;
  justify-content: space-between;
}
.nav_logo,
.nav_link,
.button {
  color: #fff;
}
.nav_logo {
  font-size: 35px;
}
.nav_item {
  column-gap: 25px;
}
.nav_link:hover {
  color: #D9D9D9;
}
.button {
  padding: 6px 24px;
  border: 2px solid #fff;
  background: transparent;
  border-radius: 6px;
  cursor: pointer;
}
.button:active {
  transform: scale(0.98);
}
/* Home */
.home {
  position: relative;
  height: 100vh;
  width: 100%;
  background-image: url('/images/bg.jpg');
  background-size: cover;
  background-position: center;
}
.home::before {
  content: "";
  position: absolute;
  height: 100%;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 100;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s ease-out;
}
.home.show::before {
  opacity: 1;
  pointer-events: auto;
}
/* From */
.form_container {
  position: fixed;
  max-width: 500px;
  width: 100%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(1.2);
  z-index: 101;
  background: #fff;
  padding: 40px;
  border-radius: 14px;
  box-shadow: rgba(0, 0, 0, 0.1);
  opacity: 0;
  pointer-events: none;
  transition: all 0.4s ease-out;
}
.home.show .form_container {
  opacity: 1;
  pointer-events: auto;
  transform: translate(-50%, -50%) scale(1);
}
.signup_form {
  display: none;
}
.form_container.active .signup_form {
  display: block;
}
.form_container.active .login_form {
  display: none;
}
.form_close {
  position: absolute;
  top: 10px;
  right: 20px;
  color: #0B0217;
  font-size: 50px;
  opacity: 0.7;
  cursor: pointer;
}
.form_container h2 {
  font-size: 36px;
  color: #0B0217;
  text-align: center;
}
.input_box {
  position: relative;
  margin-top: 30px;
  width: 100%;
  height: 40px;
}
.input_box input {
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  padding: 0 30px;
  color: #000000;
  transition: all 0.2s ease;
  border-bottom: 1.5px solid #AAAAAA;
}
.input_box input:focus {
  border-color: #4E0043;
}
.input_box i {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  font-size: 30px;
  color: #707070;
}
.input_box i.email,
.input_box i.password {
  left: 0;
}
.input_box input:focus ~ i.email,
.input_box input:focus ~ i.password {
  color: #4A0050;
}
.input_box i.pw_hide {
  right: 0;
  font-size: 22px;
  cursor: pointer;
}
.option_field {
  margin-top: 14px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.form_container a {
  color: #540049;
  font-size: 12px;
}
.form_container a:hover {
  text-decoration: underline;
}
.checkbox {
  display: flex;
  column-gap: 8px;
  white-space: nowrap;
}
.checkbox input {
  accent-color: #3B092B;
}
.checkbox label {
  font-size: 12px;
  cursor: pointer;
  user-select: none;
  color: #0B0217;
}
.form_container .button {
  background: #410236;
  margin-top: 30px;
  width: 100%;
  padding: 10px 0;
  border-radius: 10px;
}
.login_signup {
  font-size: 12px;
  text-align: center;
  margin-top: 15px;
}
.hello{
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    height: 100vh; /* Full viewport height */
    width: 100%; /* Full width */
     /* Adjust as needed */
    color: #FFFFFF;
    font-size: 35px
}
/* .hello {
    width: 246px;
    overflow: hidden;
} */
.hello .text {
    position: relative;
    color: #4070F4;
    font-size: 60px;
    font-weight: 600;
}
.hello .text.first-text {
    color: #fff;
}
.text.sec-text::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    border-left: 2px solid #4070F4;
}
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <a href="#" class="nav_logo">EduMaster</a>
            <ul class="nav_items">
                {{-- <li class="nav_item">
                    <a href="#" class="nav_link">Home</a>
                    <a href="#" class="nav_link">Product</a>
                    <a href="#" class="nav_link">Services</a>
                    <a href="#" class="nav_link">Contact</a>
                </li> --}}
            </ul>
            <button class="button" id="form-open">Login</button>
        </nav>
    </header>
    <!-- Home -->
    <section class="home">
        <div class="hello">
            <h1>Education Management System</h1><br>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
            </svg>
        </div>
        <div class="form_container">
            <i class="uil uil-times form_close"></i>
            <!-- Login Form -->
            <div class="form login_form">
                <form action="{{ route('loginUser') }}" method="post">
                    @csrf
                    <h2>Login Form</h2>
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('error'))
                    <div class="invalid-feedback">{{ Session::get('error') }}</div>
                    @endif
                    <div class="input_box">
                        <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter your email" required />
                        <i class="uil uil-envelope-alt email"></i>
                        @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input_box">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your password" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                        @error('password')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="option_field">
                    </div>
                    <button class="button">Login Now</button>
                </form>
            </div>
        </div>
    </section>
    <script>
        const formOpenBtn = document.querySelector("#form-open"),
            home = document.querySelector(".home"),
            formContainer = document.querySelector(".form_container"),
            formCloseBtn = document.querySelector(".form_close"),
            signupBtn = document.querySelector("#signup"),
            loginBtn = document.querySelector("#login"),
            pwShowHide = document.querySelectorAll(".pw_hide");
        formOpenBtn.addEventListener("click", () => home.classList.add("show"));
        formCloseBtn.addEventListener("click", () => home.classList.remove("show"));
        pwShowHide.forEach((icon) => {
            icon.addEventListener("click", () => {
                let getPwInput = icon.parentElement.querySelector("input");
                if (getPwInput.type === "password") {
                    getPwInput.type = "text";
                    icon.classList.replace("uil-eye-slash", "uil-eye");
                } else {
                    getPwInput.type = "password";
                    icon.classList.replace("uil-eye", "uil-eye-slash");
                }
            });
        });
        signupBtn.addEventListener("click", (e) => {
            e.preventDefault();
            formContainer.classList.add("active");
        });
        loginBtn.addEventListener("click", (e) => {
            e.preventDefault();
            formContainer.classList.remove("active");
        });
        /* const text = document.querySelector(".sec-text");
const textLoad = () => {
    setTimeout(() => {
        text.textContent = "Developer";
    }, 0)
    setTimeout(() => {
        text.textContent = "Designer";
    }, 4000);
    setTimeout(() => {
        text.textContent = "Youtuber";
    }, 8000);
}
textLoad();
setInterval(textLoad, 12000); */
    </script>
</body>
</html>