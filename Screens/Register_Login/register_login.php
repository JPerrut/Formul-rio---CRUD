<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/324b71f187.js" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <title>Registration Screen</title>

  <link rel="stylesheet" href="../general_styling/css/style.css">

  <link rel="stylesheet" href="css/body.css">
  <link rel="stylesheet" href="css/container.css">
  <link rel="stylesheet" href="css/form-container.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/form-title.css">
  <link rel="stylesheet" href="css/inputContainer.css">
  <link rel="stylesheet" href="css/notices.css">
  <link rel="stylesheet" href="css/terms.css">
  <link rel="stylesheet" href="css/buttons.css">
  <link rel="stylesheet" href="css/social-group.css">
  <link rel="stylesheet" href="css/overlay-container.css">
  <link rel="stylesheet" href="css/overlay.css">

  <script src="js/overlay.js" defer></script>

</head>
<body> 
  <main class="container" id="container">
    <div class="form-container">
      <form action="php/login.php" method="post" class="form form-login">
        <h2 class="form-title">Connect your account</h2>
        <div class="box-inputContainer">
          <div class="inputContainer">
            <input type="text" name="email" class="inputUser" id="email" placeholder="E-mail" >
            <i class="fa-solid fa-envelope icons"></i>
          </div>
          
          <div class="inputContainer">
            <input type="password" name="password" class="inputUser" id="password" placeholder="Password">
            <i class="fa-solid fa-lock icons"></i>
          </div>
        </div>
        
        <div class="notices">
          <div class="remember">
            <input type="checkbox" name="check-box" id="check-box">
              <i class="fa-solid fa-check check"></i>
            </input>
            <label for="check-box">Remember me</label>
          </div>
          
          <a href="#">Forgot password?</a>
        </div>

        <input type="submit" name="submit" value="Log in" id="submit">
        <div class="social-group">
          <div class="social-text">
            <div class="bar"></div>
            <p>or login with</p>
            <div class="bar"></div>
          </div>
          <div class="social-media">
            <a href="#" class="social-icon-group">
              <i class="fab fa-facebook-f social-icon"></i>
            </a>
            <a href="#" class="social-icon-group">
              <i class="fab fa-google social-icon"></i>
            </a>
            <a href="#" class="social-icon-group">
              <i class="fab fa-linkedin-in social-icon"></i>
            </a>
          </div>
        </div>
      </form>

      <form action="php/register.php" method="post" class="form form-register">
        <h2 class="form-title">Create your account</h2>
        <div class="box-inputContainer">

          <div class="inputContainer">
            <input type="text" name="name" class="inputUser" id="name" placeholder="Name">
            <i class="fa-solid fa-user icons"></i>
          </div>
        
          <div class="inputContainer">
            <input type="text" name="email" class="inputUser" id="email" placeholder="E-mail">
            <i class="fa-solid fa-envelope icons"></i>
          </div>
          
          <div class="inputContainer">
            <input type="password" name="password" class="inputUser" id="password" placeholder="Password">
            <i class="fa-solid fa-lock icons"></i>
          </div>
          
          <div class="inputContainer">
            <input type="password" name="confirm-password" class="inputUser" placeholder="Confirm password" id="confirm-password">
            <i class="fa-solid fa-lock icons"></i>
          </div>
          <p class="terms">By registering, you accept our <span class="color-terms">terms of use</span> and <span class="color-terms">privacy policy</span></p>
        </div>
        
      
        <input type="submit" name="submit" value="Sign up" id="submit">
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <img src="../../images/Register_login/logo.png" alt="Logo 'Perrut'">
        <div class="text-overlay">
          <h2>Already registered?</h2>
          <h3>Access your account!</h3>
        </div>
        <button class="open-login" id="open-login">Log in</button>
      </div>
      
      <div class="overlay">
        <img src="../../images/Register_login/logo.png" alt="Logo 'Perrut'">
        <div class="text-overlay">
          <h2>Don't have an account?</h2>
          <h3>Create your account now</h3>
        </div>
        <button class="open-register" id="open-register">Sign up</button>
      </div>
    </div>
  </main>
</body>
</html>