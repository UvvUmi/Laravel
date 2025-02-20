<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kalendorius</title>
    </head>
    <body>
        @php
            $latinDay = [                
                "Monday" => "I",
                "Tuesday" => "II",
                "Wednesday" => "III",
                "Thursday" => "IV",
                "Friday" => "V",
                "Saturday" => "VI",
                "Sunday" => "VII"
            ];
        @endphp

        @for ($i = 1; $i <= 31; $i++)
            @if ($i <= 9)
                @php 
                    $date = "2025-03-0$i";
                    $weekday = $latinDay[date('l', strtotime($date))];
                @endphp
            @else
                @php 
                    $date = "2025-03-$i";
                    $weekday = $latinDay[date('l', strtotime($date))];
                @endphp
            @endif

            @if ($weekday == "VI" || $weekday == "VII")
                <div>{{$date}} <span style="color:red;">{{$weekday}}</span></div>
            @else
                <div>{{$date}} {{$weekday}}</div>
            @endif
        @endfor
    </body>
</html>