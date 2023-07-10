function checkLogin() {
	if (loginData != "null" && loginData == "1") {
		loggedIn = "1";
		loginBtnCont.style.display = "none";
		logoutBtnCont.style.display = "block";
		allBtn.style.display = "block";
	} else {
		loginBtnCont.style.display = "block";
		logoutBtnCont.style.display = "none";
		allBtn.style.display = "none";
	}
}

function login() {
	let user = document.forms["login"]["login-un"].value;
	let pwd = document.forms["login"]["login-pwd"].value;

	tryLogin(user, pwd);
}

function logout() {
	if (typeof Storage !== "undefined") {
		localStorage.setItem("loginData", "0");
		loginData = localStorage.getItem("loginData");
		checkLogin();
	}
	loggedIn = "0";

	location.reload();
	if (showData) fetchBookmarksData(where, order, loggedIn);
	if (showData) displayFilterform(loggedIn);
}

function tryLogin(user, password) {
	xhttp.onload = function () {
		if (this.responseText != "1") {
			alert("Invalid usernaame or password! Try again.......");
		} else {
			if (typeof Storage !== "undefined") {
				localStorage.setItem("loginData", "1");
				loginData = localStorage.getItem("loginData");
				checkLogin();
			} else {
				loggedIn = "1";
			}
			if (showData) fetchBookmarksData(where, order, loggedIn);
			if (showData) displayFilterform(loggedIn);

			location.reload();
		}
	};
	xhttp.open("POST", "login.php");
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(`login=1&user=${user}&password=${password}`);
}