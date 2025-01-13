document.getElementById('register-form').addEventListener('submit', function (event) {
  event.preventDefault();

  const name = document.getElementById('name').value.trim();
  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value.trim();
  const confirmPassword = document.getElementById('confirm-password').value.trim();

  const errorName = document.getElementById('error-name');
  const errorEmail = document.getElementById('error-email');
  const errorPassword = document.getElementById('error-password');
  const errorConfirmPassword = document.getElementById('error-confirm-password');

  let isValid = true;


  [errorName, errorEmail, errorPassword, errorConfirmPassword].forEach((error) => {
    error.style.display = 'none';
    error.textContent = '';
  });


  if (!name) {
    errorName.style.display = 'block';
    errorName.textContent = 'Name is required!';
    isValid = false;
  }

  if (!email) {
    errorEmail.style.display = 'block';
    errorEmail.textContent = 'Email is required!';
    isValid = false;
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    errorEmail.style.display = 'block';
    errorEmail.textContent = 'Invalid email format!';
    isValid = false;
  }

  if (!password) {
    errorPassword.style.display = 'block';
    errorPassword.textContent = 'Password is required!';
    isValid = false;
  } else if (password.length < 6) {
    errorPassword.style.display = 'block';
    errorPassword.textContent = 'Password must be at least 6 characters long!';
    isValid = false;
  }

  if (!confirmPassword) {
    errorConfirmPassword.style.display = 'block';
    errorConfirmPassword.textContent = 'Confirm Password is required!';
    isValid = false;
  }

  if (password !== confirmPassword) {
    errorConfirmPassword.style.display = 'block';
    errorConfirmPassword.textContent = 'Passwords do not match!';
    isValid = false;
  }

  if (!isValid) {
    return;
  }

  fetch('php/register.php', {
		method: 'POST',
		headers: {
		'Content-Type': 'application/x-www-form-urlencoded',
		},
		body: new URLSearchParams({
		name: name,
		email: email,
		password: password,
		confirmPassword: confirmPassword
		})
	})
    .then((response) => response.json())
    .then((data) => {
      if (data.status === 'error') {
        if (data.message === 'Email already exists') {
          errorEmail.innerText = 'This email is already registered.';
          errorEmail.style.display = 'block';
        } else {
          swal({
            title: 'Error!',
            text: data.message,
            icon: 'error',
            button: 'OK',
          });
        }
      } else if (data.status === 'success') {
        swal({
          title: 'Success!',
          text: data.message,
          icon: 'success',
          button: 'OK',
        }).then(() => {
          document.getElementById('register-form').reset();
          window.location.href = './register_login.php';
        });
      }
    })
    .catch((error) => {
      console.error('Error:', error);
      swal({
        title: 'Unexpected Error',
        text: 'An unexpected error occurred. Please try again later.',
        icon: 'error',
        button: 'OK',
      });
    });
});
