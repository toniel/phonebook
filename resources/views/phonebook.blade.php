<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Phonebook</title>
</head>
<body>
    <div id="app">
        <div class="container">
            <my-header></my-header>
            <router-view></router-view>
            <my-footer></my-footer>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
