<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ff7eb3, #1B54A9);
            color: #fff;
            overflow: hidden;
        }

        .container {
            text-align: center;
            animation: fadeIn 2s ease-in-out;
        }

        h1 {
            font-size: 8rem;
            margin: 0;
        }

        h2 {
            font-size: 2rem;
            margin: 1rem 0;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        a {
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            background: #fff;
            color: black;
            border-radius: 25px;
            transition: all 0.3s ease-in-out;
        }

        a:hover {
            background: #ff758c;
            color: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .bg-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .bg-animation span {
            position: absolute;
            display: block;
            width: 25px;
            height: 25px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: move 10s linear infinite;
        }

        @keyframes move {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-100px) rotate(180deg);
            }
            100% {
                transform: translateY(0) rotate(360deg);
            }
        }

        .bg-animation span:nth-child(1) {
            left: 10%;
            animation-duration: 12s;
        }

        .bg-animation span:nth-child(2) {
            left: 30%;
            animation-duration: 8s;
        }

        .bg-animation span:nth-child(3) {
            left: 50%;
            animation-duration: 14s;
        }

        .bg-animation span:nth-child(4) {
            left: 70%;
            animation-duration: 10s;
        }

        .bg-animation span:nth-child(5) {
            left: 90%;
            animation-duration: 16s;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Oops! Page Not Found</h2>
        <p>Halaman yang Anda cari tidak tersedia</p>
        <a href="{{ url('login') }}">Kembali ke Beranda</a>
    </div>
    <div class="bg-animation">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</body>
</html>
