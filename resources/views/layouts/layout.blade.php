<html lang="ru">
<head>
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link href="/favicon.ico" rel="shortcut icon">

    <link rel="stylesheet" href="{{ mix('/assets/css/app.css') }}">
</head>

<body class="Site">
@yield('content')
</body>
</html>
