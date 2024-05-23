<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* The side navigation menu */
        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: hidden;
        }

        /* Sidebar links */
        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        /* Active/current link */
        .sidebar a.active {
            background-color: #04AA6D;
            color: white;
        }

        /* Links on mouse-over */
        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            width: 100%;
            z-index: 1;
            top: 0;
        }

        /* Page content */
        .content-container {
            margin-top: 56px; /* Height of the navbar */
            margin-left: 200px; /* Width of the sidebar */
            padding: 16px;
            height: calc(100vh - 56px); /* Height of the content area */
            overflow-y: auto;
        }

        /* Center the content */
        .center-content {
            width: 70%; /* 3/4 of the allocated space */
            margin-top: 16px; /* Adjust to avoid touching the navbar */
            position: absolute;
            left: 60%;
            transform: translateX(-50%);
        }

        /* On screens that are less than 700px wide, make the sidebar into a topbar */
        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .sidebar a {float: left;}
            .content-container {
                margin-left: 0;
                width: 100%;
            }
            .center-content {
                left: 0;
                transform: none;
            }
        }

        /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>     
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><h2>Student Management</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a class="active" href="{{ url('/') }}">Home</a>
        <a href="{{ url('/students') }}">Students</a>
        <a href="{{ url('/teachers') }}">Teachers</a>
        <a href="{{ url('/courses') }}">Courses</a>
        <a href="{{ url('/batches') }}">Batches</a>
        <a href="{{ url('/enrollments') }}">Enrollment</a>
        <a href="{{ url('/payments') }}">Payment</a>
    </div>

    <!-- Page content -->
    <div class="content-container">
        <div class="center-content">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-m
