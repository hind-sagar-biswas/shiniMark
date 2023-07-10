async function fetchBookmarksData(where_clause, order_clause, loggedState) {
	console.log(loggedState);
	if (where_clause == "") where_clause = "none";
	let send_clause = `get_data=1&where_clause=${where_clause}&order_clause=${order_clause}&heading=${heading}&restriction=${loggedState}&page=${pageNum}`;
	if (DEBUG) console.log(send_clause);
	const { bookmarks, page, total, query } = await fetchBookmarks(send_clause);

	console.log(query);

	document.getElementById("data-container").innerHTML = '';
	for (let index = 0; index < bookmarks.length; index++) {
		const bookmark = bookmarks[index];
		await fetchBookmark(bookmark);
	}
}

async function fetchBookmark(bookmarkData) {
	const data = encodeURIComponent(JSON.stringify(bookmarkData));

	try {
		const response = await fetch("./templates/components/bookmark.php", {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: `bookmark=${data}`,
		});

		if (!response.ok) {
			throw new Error("Request failed");
		}

		const responseData = await response.text();
		document.getElementById("data-container").innerHTML += responseData;
	} catch (error) {
		console.error("Error:", error);
	}
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
