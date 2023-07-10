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
		// console.log(await response.text());
		return await response.json();
	} catch (error) {
		console.error(error)
		return null;
	}
}