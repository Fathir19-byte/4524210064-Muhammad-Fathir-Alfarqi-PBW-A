<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Selamat Datang di LaraPress</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;

            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 90%;
            max-width: 700px;
            background: white;

            padding: 50px 40px;
            border-radius: 16px;

            text-align: center;

            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        h1 {
            font-size: 32px;
            margin-bottom: 15px;
            color: #2563eb;
        }

        p {
            font-size: 17px;
            line-height: 1.6;
            color: #6b7280;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;

            padding: 12px 22px;
            border-radius: 8px;

            background: #2563eb;
            color: white;

            text-decoration: none;
            font-weight: bold;

            transition: 0.2s;
        }

        a:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Selamat Datang di LaraPress</h1>

        <p>
            Ini adalah halaman utama dari aplikasi blog kita.
            Temukan berbagai informasi dan artikel menarik di LaraPress.
        </p>

        <a href="/tentang-kami">
            Lihat Halaman Tentang Kami
        </a>

    </div>

</body>
</html>