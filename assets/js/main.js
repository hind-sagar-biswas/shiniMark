async function fetchBookmarksData(where_clause, order_clause, loggedState) {
	document.getElementById("filter-form-container").innerHTML =
		'<center><h3 class="text-danger mt-5 mb-5"><i class="fa-solid fa-spinner fa-spin-pulse fa-lg"></i> LOADING...</h3></center>';
	if (where_clause == "") where_clause = "none";
	let send_clause = `get_data=1&where_clause=${where_clause}&order_clause=${order_clause}&heading=${heading}&restriction=${loggedState}&page=${pageNum}`;
	if (DEBUG) console.log(send_clause);

	const { bookmarks, stories, total_stories, current, pages, query } = await fetchBookmarks(send_clause);
	paginate({ stories, total_stories, current, pages });

	document.getElementById("data-container").innerHTML = "";
	for (let index = 0; index < bookmarks.length; index++) {
		const bookmark = bookmarks[index];
		await fetchBookmark(bookmark);
	}
	displayFilterform(loggedIn);
	for (let index = 0; index < bookmarks.length; index++) {
		const bookmark = bookmarks[index];
		const url = bookmark.link;
		if (url) setImage(bookmark.id, url);
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
			body: `bookmark=${data}&restriction=${loginData}&mode=card`,
		});

		if (!response.ok) {
			throw new Error("Request failed");
		}

		const responseData = await response.text();
		document.getElementById("data-container").innerHTML += responseData;
	} catch (error) {
		if (DEBUG) console.error("Error:", error);
	}
}

async function setImage(id, url) {
	const metadata = await fetchMetadata(url);

	if (metadata) {
		const imgSource = getImgData(metadata);

		const imageElement = document.getElementById(`image-${id}`);
		if (imageElement && imgSource) {
			imageElement.src = imgSource;
		} else if (DEBUG) console.log(id, imgSource);
	}
}

function getImgData(metadata) {
	const probableKeys = [
		"twitter:image",
		"og:image",
		"og:image:url",
		"twitter:image:src",
	];

	let found = null;
	if (DEBUG) console.log(metadata);

	for (let index = 0; index < probableKeys.length; index++) {
		const key = probableKeys[index];
		const object = metadata.find((item) => {
			return (
				(item.hasOwnProperty("name") && item.name === key) ||
				(item.hasOwnProperty("property") && item.property === key)
			);
		});
		if (object) {
			found = object;
			break;
		}
	}
	return found ? found.content : null;
}

function paginate(data) {
	console.log(data);
	data = encodeURIComponent(JSON.stringify(data));
	xhttp.onload = function () {
		const slots = document.querySelectorAll('.pagination-slot');
		slots.forEach(slot => {
			slot.innerHTML = this.responseText;
		});
	};
	xhttp.open("POST", "./templates/components/pagination.php");
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(`data=${data}`);
}

function pageChange(page) {
	pageNum = page;
	fetchBookmarksData(where, order, loggedIn);
}

/// RUNS
checkLogin();
if (showData) {
	fetchBookmarksData(where, order, loggedIn);
}
loginBtn.addEventListener("click", login);
logoutBtn.addEventListener("click", logout);
