@extends('layouts.app')

@section('contents')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>YOUR BLOG HERE!!</title>
    <style type="text/css">
       
        #box{
            background-color: teal;
            margin: auto;
            width:400px;
            height:530px;
            padding:20px;
        }
         </style>
  </head>
  <body>
    
<div id="box">
   <form method="post" action="{{url('/addblog')}}">
    @csrf
    <textarea id="" cols="33" rows="1" placeholder="Write here" name="title"></textarea><br>
    <textarea  id="" cols="33" rows="15" placeholder="Write here" name="description"></textarea><br>
    <button type="submit" class="btn btn-outline-danger">Submit Blog</button>
    </div>
   
   
  </body>
</html>
@endsection