<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>SignUp!</title>
    <style>
      .container
      {
        color: white;
        background: black;
        display: flex;
        justify-content: center;
        align-items: center
      }
      h1{
        color: white;
      }
    </style>
  </head>
  <body>
      <div class="container">
        <form class="" method="post" action="{{url('/signup')}}" enctype="multipart/form-data">
            @csrf
            <h1>Enter Your details!!!</h1>
            <div class="form-row">
              <div class="form-group col-md-9">
                <label for="">Name</label>
                <input type="name" class="form-control" id="" placeholder="Enter Your Name" name="name">
                <span class="text-danger">
                    @error('name')
                    {{$message}}
                @enderror</span>
              </div>
              <div class="form-group col-md-9">
                  <label for="">Email</label>
                  <input type="email" class="form-control" id="" placeholder="Enter Your Email" name="email">
                  <span class="text-danger">@error('email')
                    {{$message}}
                  @enderror</span>
                </div>
                <div class="form-group col-md-9">
                    <label for="inputEmail4">Phone</label>
                    <input type="tel" class="form-control" id="" placeholder="Enter Your Contact" name="phone">
                    <span class="text-danger">@error('phone')
                        {{$message}}
                    @enderror</span>
                    </div>
                <div class="form-group col-md-9">
                  <label for="">Username</label>
                  <input type="name" class="form-control" id="" placeholder="Enter Your Username" name="username">
                  <span class="text-danger">
                      @error('username')
                      {{$message}}
                  @enderror</span>
                </div>
              <div class="form-group col-md-9">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Enter Your Password" name="password">
                <span class="text-danger">
                    @error('password')
                    {{$message}}
                @enderror</span>
              </div>
            </div>
             <br>
             <br>
            <button type="submit" class="btn btn-outline-danger">Register</button>
            <br>
            <br>
          </form>
      </div>

  </body>
</html>