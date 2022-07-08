<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=yes" />
  <meta name="HandheldFriendly" content="true" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

  <!-- style -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title>ShiniMark | Personal Bookmark Site</title>

<!-- Favicon -->
	<meta name="msapplication-TileImage" content="assets/images/favicon.png"> <!-- Windows 8 -->
	<!--[if IE]><link rel="shortcut icon" href="assets/images/favicon.png"><![endif]-->
	<link rel="icon" type="image/png" href="assets/images/favicon.png">

</head>

<body>
  <?php 
require 'function.php';

  $chiky = new hind();
  $default_btn = "";

  if (isset($_POST['filtered'])) {
    $heading = "FILTERED BOOKMARKS";
    $default_btn = `<div class="container d-flex justify-content-center">
      <a href="index.php" class="btn btn-primary">DEFAULT</a>
    </div>`;

    $search_data = null;
    $category = null;
    $status = null;

    if (isset($_POST['search'])) {
      $search_data = $_POST['search'];
    }
    if (isset($_POST['category'])) {
      $category = $_POST['category'];
    }
    if (isset($_POST['status'])) {
      $status = $_POST['status'];
    }

    $condition = $_POST['condition'];
    $order = $_POST['order'];
    $sort = $_POST['sort'];
    $hind = $chiky->display_filtered_data($search_data, $category, $condition, $status, $sort, $order);
  } else {
    $default_btn = "";
    $heading = "BOOKMARKS";
    $hind = $chiky->display_data();
  }
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><span style="color:#0d0200">Shini</span><span style="color:#fc2003">Mark<span></a>
  </nav>
