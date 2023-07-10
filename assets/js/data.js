const xhttp = new XMLHttpRequest();
const DEBUG = false;
const DEFAULT_LOG = "0";
const DEFAULT_PAGE = "1";
const showData = true;

//SELECT
let allBtn = document.getElementById("all-websites");
let loginBtn = document.getElementById("login-button");
let logoutBtn = document.getElementById("logout-button");
let loginBtnCont = document.getElementById("login-button-container");
let logoutBtnCont = document.getElementById("logout-button-container");

// let user, pwd;
let searchTerm, fCategory, fCondition, fStatus, fReadingStatus, fSortBy, fOrder;
let where = "";
let order = " ORDER BY b.id DESC ";
let loggedIn = DEFAULT_LOG;
let pageNum = DEFAULT_PAGE;
let heading = "BOOKMARKS";

let loginData = localStorage.getItem("loginData");