<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <!-- Yield --> </title>
    <!-- Bootstrap Assets CSS -->

    {{-- NOTICE THIS --}}
    <link rel="stylesheet" href="{{ url('assets/bootstrap5/css/bootstrap.min.css') }}">


    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    {{-- Bootstrap ICON --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://kit.fontawesome.com/f181524b5b.js" crossorigin="anonymous"></script>

    <style>
        body {
            position: relative;
        }
        .side:hover {
            background-color: #154893;
            padding-block: false;
        }
        .navbar {
            background-color: #1B54A9;
        }
        .navbar-brand {
            margin-left: 20px;
            font-size: 25px;
            font-weight: 600;
        }
        .clr {
            background-color: #003788;
            box-shadow: 10px 10px 20px 5px rgb(194, 194, 194);

        }
        .head {
            color: #ffffff;
        }
        .head:hover {
            color: #ffffff;
        }
        .content-wrap {
            min-height: 100%;
            padding-bottom: 50px;
        }
        footer {
            background-color: #616161;
            color: #fff;
            height: 50px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            text-align: center;
        }
        .foot{
            margin-bottom: 150px;
        }
        .dropHover:hover{
            color: #fff;
            background-color: #001C45;
        }
        .nav-link.active {
            background-color: #001C45; /* Adjust to your desired active background color */
            color: white !important; /* Ensure the text color is visible */
        }

    </style>
</head>
