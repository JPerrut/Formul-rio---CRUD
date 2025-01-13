document.getElementById("login-form").addEventListener("submit", function(event) {
	event.preventDefault();

	const email = document.getElementById("email-login").value.trim();
	const password = document.getElementById("password-login").value.trim();
	const rememberMe = document.getElementById("remember-me").checked;
	const errorMessageDiv = document.getElementById("error-message-login");

	errorMessageDiv.style.display = 'none';

	if (!email || !password) {
		 errorMessageDiv.style.display = 'block';
		 errorMessageDiv.textContent = "Por favor, preencha todos os campos!";
		 return;
	}

	fetch("php/login.php", {
		 method: "POST",
		 headers: {
			  "Content-Type": "application/x-www-form-urlencoded",
		 },
		 body: `email-login=${encodeURIComponent(email)}&password-login=${encodeURIComponent(password)}&remember-me=${rememberMe ? "1" : ""}`
	})
	.then(response => response.text())
	.then(data => {
		 if (data === "success") {
			  window.location.href = "../Home_Logged/home_logged.php";
		 } else {
			  errorMessageDiv.style.display = 'block';
			  errorMessageDiv.textContent = data;
		 }
	})
	.catch(error => {
		 console.error("Erro:", error);
		 errorMessageDiv.style.display = 'block';
		 errorMessageDiv.textContent = "Ocorreu um erro inesperado!";
	});
});
