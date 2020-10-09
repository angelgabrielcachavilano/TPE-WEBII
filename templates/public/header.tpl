<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{BASE_URL}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Beer House</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light rounded-pill">
                    <!-- Image and text -->
                    <nav class="navbar navbar-light ">
                        <a class="navbar-brand" href="{BASE_URL}home">
                            <img src="images/logo.png" width="100" height="100" class="d-inline-block align-top" alt="" loading="lazy">
                        </a>
                    </nav>

                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link text-danger" href="{BASE_URL}home">HOME </a>
                            <a class="nav-link text-danger" href="{BASE_URL}showBeer">CERVEZAS</a>
                            <a class="nav-link text-danger" href="{BASE_URL}showCategories">TIPOS</a>
                            <a class="nav-link text-danger" href="{BASE_URL}contactanos">CONTACTANOS</a>

                        </div>
                        {if LOGUEADO === true}
                        <a class="badge badge-pill badge-warning logou" href="{BASE_URL}logout">LOGOUT</a> {/if} {if LOGUEADO === false}
                        <a class="badge badge-pill badge-success logou" href="{BASE_URL}login">LOGIN</a> {/if}
                    </div>
                </nav>
            </div>
        </div>