<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Audit Logs</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Minimal styling (no dependency) --}}
    {{-- <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            vertical-align: top;
        }

        th {
            background: #f1f5f9;
        }

        pre {
            white-space: pre-wrap;
            font-size: 12px;
        }

        .btn {
            padding: 6px 10px;
            border: 1px solid #ccc;
            text-decoration: none;
            font-size: 13px;
            border-radius: 4px;
            margin-left: 5px;
        }

        .btn-outline-secondary {
            color: #333;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }
    </style> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
