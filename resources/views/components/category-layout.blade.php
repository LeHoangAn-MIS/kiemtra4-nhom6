<!DOCTYPE html>
<html>
<head>
    <title>{{ $title ?? 'Quản lý danh mục' }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body{
            font-family: Arial, sans-serif;
        }
        .main-box{
            width: 95%;
            margin: 20px auto;
        }
        .page-title{
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td{
            border: 1px solid #333;
            padding: 8px;
            vertical-align: middle;
        }
        table th{
            text-align: center;
            font-weight: bold;
        }
        .btn-sm{
            padding: 4px 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="main-box">
        {{ $slot }}
    </div>
</body>
</html>