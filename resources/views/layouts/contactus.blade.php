@extends('layouts.app')

@section('contents')
<html>
<head>
<title>Sign Up</title>
<style type="text/css">
#text{
	height: 25px;
	border-radius: 5px;
	padding:4px;
	border: solid thin #aaa;
	width:100%;
}
#button{
	padding:10px;
	width: 100px;
	color:white;
	background-color: green;
	border: 1px solid white;
	font-size:20px;
}
#box{
	background-color: teal;
	margin: auto;
	width:450px;
    height:700px;
	padding:20px;
}
label{
	font-size:20px;
	color: white;
	font-family: serif;
}
</style>
</head>
<body>
<div id="box">
<form method="post" action="contactus">
	@csrf
<div style="font-size:35px;margin:8px;color:white;font-family:sans-serif;"><b>CONTACT US</b></div>

<label> Name </label>
<input id="text" type="text" name="name"><br><br>
<label> email </label>
<input id="text" type="text" name="email"><br><br>

<!---<label class="form-label" for="message">Message</label>
    <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;"></textarea><br><br>--->

<input id="button" type="submit" value="Contact"><br><br>
<a href="{{url('/home')}}" style="color:white;"> Back to Home Page </a><br><br>
</form>
</div>
</body>
</html>
@endsection