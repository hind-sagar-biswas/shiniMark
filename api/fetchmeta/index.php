<?php
// Composer's autoloader
require __DIR__ . "/../../vendor/autoload.php";

use DiDom\Document;

header("Content-Type: application/json");

// Validate the request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405); // Method Not Allowed
	echo json_encode(['error' => 'Only POST requests are allowed.']);
	exit;
}

// Get the URL from the POST request
$url = $_POST['url'];

// Validate the URL
if (empty($url)) {
	http_response_code(400); // Bad Request
	echo json_encode(['error' => 'URL parameter is missing.']);
	exit;
}


// Create a Document instance based on the webpage URL
$document = new Document($url, true);

// Extract metadata using appropriate HTML elements and classes
$metadata = $document->find("meta");

// Initialize an empty array to store the extracted metadata
$data = [];

// Loop through the metadata elements and extract relevant information
foreach ($metadata as $element) {
	$name = $element->getAttribute("name");
	$property = $element->getAttribute("property");
	$content = $element->getAttribute("content");

	// Add the extracted metadata to the data array
	$data[] = [
		"name" => $name,
		"property" => $property,
		"content" => $content
	];
}

// Output the extracted metadata as JSON
echo json_encode($data, JSON_PRETTY_PRINT);
