<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Daniilas Komogorcevas PS23">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Collatz(Skaičius: {{$sequence[0]}})</title>
    </head>
    <body>
        <div>Jūsų įvestas skaičius: {{$sequence[0]}}</div>
        @for($i = 1; $i < $arr_count; $i++)
            <div>{{$sequence[$i]}}</div>
        @endfor
        <div>Elementų masyvo ilgis: {{$arr_count}}</div>
    </body>
</html>