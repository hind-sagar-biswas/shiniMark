function displayFilterform(loggedState) {
	xhttp.onload = function () {
		document.getElementById("filter-form-container").innerHTML = this.responseText;
	};
	xhttp.open("POST", "filterform.php");
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(`get-filterform=1&restriction=${loggedState}`);
}

function getFormData() {
	searchTerm = document.forms["filter-form"]["search"].value;
	fCategory = document.forms["filter-form"]["category"].value;
	fCondition = document.forms["filter-form"]["condition"].value;
	fStatus = document.forms["filter-form"]["status"].value;
	fReadingStatus = document.forms["filter-form"]["reading_status"].value;
	fSortBy = document.forms["filter-form"]["sort"].value;
	fOrder = document.forms["filter-form"]["order"].value;
}
function blockSubmit() {
	return false;
}

function filterData() {

	getFormData();
	heading = "FILTERED BOOKMARKS";

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

	if (fCategory != "none" || fStatus != "none") {
		if (where_query == null) {
			where_query = "WHERE ";
		} else {
			where_query = `${where_query} AND `;
		}

		if (fCategory != "none" && fStatus != "none") {
			where_query = `${where_query} (b.category_id = '${fCategory}' ${fCondition} b.status_id = '${fStatus}') `;
		} else if (fCategory != "none") {
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

	fetchBookmarksData(where, order, loggedIn);
	return false;
}

function getDefault() {
	where = "";
	order = " ORDER BY b.id DESC ";
	fetchBookmarksData(where, order, loggedIn);
}
