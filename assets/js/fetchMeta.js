async function fetchMetadata(url) {
	const API_URL = `http://localhost:8888/shiniMark/api/fetchmeta/`;
	try {
		const response = await fetch(API_URL, {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: `url=${encodeURIComponent(url)}`,
		});
		const data = await response.json();
		// Process the retrieved metadata data
		console.log(data);
	} catch (error) {
		// Handle any errors that occur during the request
		console.error(error);
	}
}
