Sveiki, Administratoriau!<br>
Buvo atnaujinti egzistuojantys duomenys.<br>
<br>Prieš atnaujinimą:<br>
@foreach($previousData as $key => $value)
{{ ucfirst($key).": ".$value }}<br>
@endforeach
<br>Atnaujinti duomenys:<br>
@foreach($modifiedData as $key => $value)
{{ ucfirst($key).": ".$value }}<br>
@endforeach
<br>
@php date_default_timezone_set('Europe/Riga'); echo "Keitimo laikas ir data ".date("Y-m-d h:i:s") @endphp
<br>
OK 200