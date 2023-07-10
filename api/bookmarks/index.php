<?php

header("Content-Type: application/json");

// Validate the request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Only POST requests are allowed.']);
    exit;
}

// GET BOOKMAEKS DATA
if ($_POST['get_data'] == 1) {
    $restriction = intval($_POST['restriction']);
    $page = (!isset($_POST['page'])) ? 1 : intval($_POST['page']);
    $heading = $_POST['heading'];

    $where_clause = ($_POST['where_clause'] == 'none') ? ' ' : $_POST['where_clause'];

    $bottomLimit = ($page - 1) * 50;
    $topLimit = $page * 50;
    $limitClause = " LIMIT $bottomLimit, $topLimit";

    require __DIR__ . '/../../functions.php';
    $mark = new ShiniMark();

    $baseQuery = $mark->getBaseQuery();
    $query = $mark->getQuery($baseQuery, $where_clause, $_POST['order_clause'], $limitClause);
    $queryForCount = $mark->getQuery('SELECT id FROM bookmarks AS b ', $where_clause, $_POST['order_clause'], '');

    $bookmarks = $mark->getBookmarkList($query);
    $bookmarksCount = $mark->getBookmarkCount($queryForCount);

    $data = [
        "bookmarks" => $bookmarks,
        "total" => $bookmarksCount,
        "page" => $page
    ];

    echo json_encode($data, JSON_PRETTY_PRINT);
}