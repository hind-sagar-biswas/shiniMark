async function fetchBookmarks(body) {
	const API_URL = `http://localhost:8888/shiniMark/api/bookmarks/`;
	try {
		const response = await fetch(API_URL, {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: body,
		});
		const data = await response.json();
		// Process the retrieved metadata data
		console.log(data);
	} catch (error) {
		// Handle any errors that occur during the request
		console.error(error);
	}
}