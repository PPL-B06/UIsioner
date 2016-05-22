<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Learning Laravel!</h2>
<br>
<p>Berikut adalah list kuesioner yang tersedia, silahkan isi dengan akses http://uisioner.com</p>
<div>
    
    @foreach ($array as $key => $value)
	    @if($value > 0)
    		tersedia kuesioner untuk {{ $key }} sejumlah {{ $value }} form.<br>
	    @endif
    @endforeach
</div>

</body>
</html>