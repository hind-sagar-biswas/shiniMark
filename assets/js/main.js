const xhttp = new XMLHttpRequest();
const DEFAULT_LOG = '0';
const DEFAULT_PAGE = "1";
const showData = true;

//SELECT
let loginBtn = document.getElementById('login-button');
let logoutBtn = document.getElementById('logout-button');
let loginBtnCont = document.getElementById('login-button-container');
let logoutBtnCont = document.getElementById('logout-button-container');

let user, pwd;  // marked
let searchTerm, fCategory, fCondition, fStatus, fReadingStatus, fSortBy, fOrder;
let where = "";
let order = " ORDER BY b.id DESC ";
let loggedIn = DEFAULT_LOG;
let pageNum = DEFAULT_PAGE;
let heading = 'BOOKMARKS';

let loginData = localStorage.getItem("loginData");

function checkLogin() {
  if (loginData != 'null' && loginData == '404') {
    loggedIn = "404";
    loginBtnCont.style.display = "none";
    logoutBtnCont.style.display = "block";
  }else{
    loginBtnCont.style.display = "block";
    logoutBtnCont.style.display = "none";
  }
}

function login() {
  user =  document.forms["login"]["login-un"].value;
  pwd = document.forms["login"]['login-pwd'].value;

  tryLogin(user, pwd);
}

function logout() {
  if (typeof(Storage) !== "undefined") {
      localStorage.setItem("loginData", "0");
      loginData = localStorage.getItem("loginData");
      checkLogin();
  }
  loggedIn = '0';

  if(showData) displayData(where, order, loggedIn);
  if(showData) displayFilterform(loggedIn);
}

function getFormData() {
  searchTerm =  document.forms["filter-form"]["search"].value;
  fCategory = document.forms["filter-form"]['category'].value;
  fCondition = document.forms["filter-form"]['condition'].value;
  fStatus = document.forms["filter-form"]['status'].value;
  fReadingStatus = document.forms["filter-form"]["reading_status"].value;
  fSortBy = document.forms["filter-form"]['sort'].value;
  fOrder = document.forms["filter-form"]['order'].value;
}

function displayData(where_clause, order_clause, loggedState) {
  if (where_clause == '') where_clause = "none";
  let send_clause = `get_data=1&where_clause=${where_clause}&order_clause=${order_clause}&heading=${heading}&restriction=${loggedState}&page=${pageNum}`;
  console.log(send_clause);
  xhttp.onload = function() {
    document.getElementById("data-container").innerHTML = this.responseText;
  }
  xhttp.open("POST", "table.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(send_clause);
}

function displayFilterform(loggedState) {
  xhttp.onload = function() {
    document.getElementById("filter-form-container").innerHTML = this.responseText;
    displayData(where, order, loggedIn);
  }
  xhttp.open("POST", "filterform.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(`get-filterform=1&restriction=${loggedState}`);
}

function tryLogin(user, password) {
	xhttp.onload = function () {
		if (this.responseText != '1') {
			alert("Invalid usernaame or password! Try again.......");
		} else {
			if (typeof Storage !== "undefined") {
				localStorage.setItem("loginData", "404");
				loginData = localStorage.getItem("loginData");
				checkLogin();
			} else {
				loggedIn = "404";
			}
			if (showData) displayData(where, order, loggedIn);
			if (showData) displayFilterform(loggedIn);
		}
	};
	xhttp.open("POST", "login.php");
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(`login=1&user=${user}&password=${password}`);
}

function filterData() {
  getFormData();
  heading = 'FILTERED BOOKMARKS';

  let where_query = null;
  let order_query = null;
  if (fSortBy != "none") {
		order_query = ` ORDER BY b.${fSortBy} ${fOrder} `;
	}

  if (searchTerm.length > 0) {
		where_query = `WHERE b.name LIKE '%${searchTerm}%' `;
	} else {
		where_query = null;
	}

  if (fCategory != 'none' || fStatus != 'none') {
    if (where_query == null) {
      where_query = "WHERE ";
    } else {
      where_query = `${where_query} AND `;
    }
    
    if (fCategory != 'none' && fStatus != 'none') {
      where_query = `${where_query} (b.category_id = '${fCategory}' ${fCondition} b.status_id = '${fStatus}') `;
    } else if (fCategory != 'none') {
      where_query = `${where_query} b.category_id = '${fCategory}' `;
    } else {
      where_query = `${where_query} b.status_id = '${fStatus}' `;
    }
  }

  if (fReadingStatus != "none") {
    if (where_query == null) {
			where_query = "WHERE ";
		} else {
			where_query = `${where_query} AND `;
		}

    let readStatusCondition = null;
    switch (fReadingStatus) {
			case "catched_up":
				readStatusCondition = "b.latest = b.current";
				break;
			case "reading":
				readStatusCondition = "(b.current < b.latest AND b.current > 0)";
				break;
			case "not_started":
				readStatusCondition = "b.current = 0";
				break;

			default:
        readStatusCondition = null;
				break;
		}

    where_query = `${where_query} ${readStatusCondition} `;
	}

  if (where_query != null) where = where_query;
  if (order_query != null) order = order_query;
    
  displayData(where, order, loggedIn);
  return false;
}

function blockSubmit() {
  return false;
}

function getDefault(){
  where = '';
  order = " ORDER BY b.id DESC ";
  displayData(where, order, loggedIn);
  displayFilterform(loggedIn);
}

function pageChange(page) {
  pageNum = page;
  displayData(where, order, loggedIn);
}


/// RUNS
checkLogin();
if (showData) {
  displayFilterform(loggedIn);
}
loginBtn.addEventListener("click", login);
logoutBtn.addEventListener("click", logout);
