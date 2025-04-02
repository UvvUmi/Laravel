Sveiki, Administratoriau!

Buvo sukurtas naujas studentas su šiais duomenimis:
@foreach($newData as $key => $value)
{{ ucfirst($key).": ".$value }}
@endforeach<br>
@php date_default_timezone_set('Europe/Riga'); echo "Kūrimo laikas ir data ".date("Y-m-d h:i:s") @endphp

OK 200