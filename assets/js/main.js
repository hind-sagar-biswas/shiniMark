function fetchBookmarksData(where_clause, order_clause, loggedState) {
  if (where_clause == '') where_clause = "none";
  let send_clause = `get_data=1&where_clause=${where_clause}&order_clause=${order_clause}&heading=${heading}&restriction=${loggedState}&page=${pageNum}`;
  if(DEBUG) console.log(send_clause);
  const {bookmarks, page, total} = fetchBookmarks(send_clause);
  //   document.getElementById("data-container").innerHTML = this.responseText;
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
