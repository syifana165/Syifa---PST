<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Feedback</title>
    <link rel="stylesheet" href="{{ asset('css/halaman.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('/assets/img/hh.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            width: 80vw;
            max-width: 600px;
            height: auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
        }

        h2 {
            text-align: center;
            color: black;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        label {
            font-weight: 600;
            margin-top: 10px;
            color: black;
        }

        input, textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background-color: white;
            color: black;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-submit {
            background-color: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            text-align: center;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .btn-back {
            background-color: #ff7043;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            text-align: center;
        }

        .btn-back:hover {
            background-color: #d84315;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Feedback</h2>
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf

            <label for="Nama">Nama:</label>
            <input type="text" id="Nama" name="Nama" required>

            <label for="Email">Email:</label>
            <input type="Email" id="Email" name="Email" required>

            <label for="Feedback">Feedback:</label>
            <textarea id="Feedback" name="Feedback" required></textarea>

            <div class="button-container">
                <button type="submit" class="btn-submit">💬 Kirim Feedback</button>
                <button type="button" class="btn-back" onclick="window.location.href='{{ route('v_halaman') }}'">⬅️ Kembali</button>
            </div>
        </form>
    </div>
</body>
</html>
