<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .container
      {
        color: aliceblue;
        background: black;
        display: flex;
        justify-content: center;
        align-items: center
      }
      h1{
        color: white;
      }
    </style>
    <title>Login</title>
  </head>
  <body>
      
      <div class="container">
        <form method="POST" action="{{url('/login')}}" enctype="multipart/form-data"><br><br>
            @csrf
        <h1>Login</h1>
        <div class="form-group mb-9">
          <label for="exampleInputEmail1">Enter Username</label>
          <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" name="username">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small><br>
          <span class="text-danger">
              @error('username')
                {{$message}} 
              @enderror
          </span><br><br>
        </div>
        {{-- <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          <span class="text-danger">
              @error('password')
                {{$message}}
              @enderror
          </span><br>
        </div> --}}
        <div class="form-group mb-9">
          <label for="exampleInputPassword1">Email</label>
          <input type="email" class="form-control" id="exampleInputPassword1" placeholder="email" name="email">
          <span class="text-danger">
              @error('email')
                {{$message}}
              @enderror
          </span><br>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checkbox">
          <label class="form-check-label" for="exampleCheck1">Check me out</label><br>
          <span class="text-danger">
            @error('checkbox')
              {{$message}}
            @enderror
        </span><br>
        </div>
        <button type="submit" class="btn btn-outline-danger">Submit</button>
        <br><br>
      </form>
   </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>