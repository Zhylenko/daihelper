<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dai helper</title>
</head>
<body>
    <br>let script=document.createElement("script");script.src="{{ asset('js/daihelper-es5.js') }}",document.body.appendChild(script);<br>
    <br>$.getScript("{{ asset('js/daihelper-es5.js') }}");<br>
</body>
</html>