function fetchBookmarksData(where_clause, order_clause, loggedState) {
  if (where_clause == '') where_clause = "none";
  let send_clause = `get_data=1&where_clause=${where_clause}&order_clause=${order_clause}&heading=${heading}&restriction=${loggedState}&page=${pageNum}`;
  if(DEBUG) console.log(send_clause);
  xhttp.onload = function() {
    document.getElementById("data-container").innerHTML = this.responseText;
  }
  xhttp.open("POST", "table.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(send_clause);
}

function pageChange(page) {
  pageNum = page;
  fetchBookmarksData(where, order, loggedIn);
}


/// RUNS
checkLogin();
if (showData) {
  displayFilterform(loggedIn);
}
loginBtn.addEventListener("click", login);
logoutBtn.addEventListener("click", logout);
