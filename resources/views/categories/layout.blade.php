<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>XEN</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
    body{
    background-color: #ffcccc	;
    }
     .container{
    background: #ffffff;
    padding: 4%;
    border-top-left-radius: 0.5rem;
    border-bottom-left-radius: 0.5rem;
    }
	.table{
		
		background: #00bfff;}
		
    </style>
  </head>
  <body>
 @include('layouts.header')
 
    <div class="container">
	
      <br><br>
	 
      @yield('content')
    </div>
	
  </body>
</html>