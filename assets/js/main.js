const xhttp = new XMLHttpRequest();
const DEFAULT_QUERY = "SELECT * FROM hinds ORDER BY id DESC";
const DEFAULT_LOG = 'N';
const DEFAULT_PAGE = "1";

//SELECT
let loginBtn = document.getElementById('login-button');
let logoutBtn = document.getElementById('logout-button');
let loginBtnCont = document.getElementById('login-button-container');
let logoutBtnCont = document.getElementById('logout-button-container');

let user, pwd, search, category, condition, statys, sort, order;
let query = DEFAULT_QUERY;
let loggedIn = DEFAULT_LOG;
let pageNum = DEFAULT_PAGE;
let filtered = "N";

let loginData = localStorage.getItem("loginData");
console.log(loginData);

function checkLogin() {
  if (loginData != 'null' && loginData == 'Y') {
    loggedIn = "Y";
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

  if (user != "ShiniGami2004" || pwd != "#ashed@2004") {
    alert("Inwalid usernaame or password")
  }else{
    if (typeof(Storage) !== "undefined") {
      localStorage.setItem("loginData", "Y");
      loginData = localStorage.getItem("loginData");
      checkLogin();
    }else {
      loggedIn = 'Y';
    }
    displayData(query, filtered, loggedIn);
  }
}

function logout() {
  if (typeof(Storage) !== "undefined") {
      localStorage.setItem("loginData", "N");
      loginData = localStorage.getItem("loginData");
      checkLogin();
  }
  loggedIn = 'N';

  displayData(query, filtered, loggedIn);
}

function getFormData() {
  search =  document.forms["filter-form"]["search"].value;
  category = document.forms["filter-form"]['category'].value;
  condition = document.forms["filter-form"]['condition'].value;
  status = document.forms["filter-form"]['status'].value;
  sort = document.forms["filter-form"]['sort'].value;
  order = document.forms["filter-form"]['order'].value;
}

function displayData(query, filtered, loginState) {
  let limitQuery = query + " " + limiter();
  xhttp.onload = function() {
    document.getElementById("data-container").innerHTML =
      this.responseText;
  }
  xhttp.open("POST", "table.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(`q=${query}&lq=${limitQuery}&f=${filtered}&l=${loginState}&p=${pageNum}`);
}

function filterData() {
  getFormData();

  var where_query = null;
  var order_query = `ORDER BY ${sort} ${order} `;

  query = "SELECT * FROM hinds ";

  //if (search != null || search != '' ) {
  if (search.length > 0) {
    where_query = `WHERE name LIKE '%${search}%' `;
  } else {
    where_query = " ";
  }

  if (category != 'CATEGORY' || status != 'STATUS') {
    if (where_query == " ") {
      where_query = "WHERE ";
    } else if (where_query != " ") {
      where_query = `${where_query} AND `;
    }
    if (category != 'CATEGORY' && status != 'STATUS') {
      where_query = `${where_query} category='${category}' ${condition} status='${status}' `;
    } else if (category != 'CATEGORY') {
      where_query = `${where_query} category='${category}' `;
    } else {
      where_query = `${where_query} status='${status}' `;
    }
  }

  query = `${query} ${where_query} ${order_query} `;

  filtered = "Y";
  displayData(query, filtered, loggedIn);
  return false;
}

function limiter() {
  let limit_query = "LIMIT 50 ";
  if (pageNum > 1) {
    init_val = (pageNum - 1) * 50;
    limit_query = ` LIMIT ${init_val}, 50 `;
  }
  return limit_query;
}

function blockSubmit() {
  return false;
}

function getDefault(){
  query = DEFAULT_QUERY;
  filtered = "N";
  displayData(query, filtered, loggedIn);
}

function pageChange(page) {
  pageNum = page;
  console.log(pageNum)
  displayData(query, filtered, loggedIn);
}

checkLogin();
displayData(query, filtered, loggedIn);
loginBtn.addEventListener("click", login);
logoutBtn.addEventListener("click", logout);
