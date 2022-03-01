
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>data ENTRY</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
      .container
      {
          background: rgb(241, 147, 147)
      }
      h1
      {
        display: flex;
        justify-content: center;
        align-items: center
      }
  </style>
</head>
<body>
{{-- <h1>Hello-Bootstrap</h1> --}}
<div class="container">
    <h1>All Blogs</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>@sortablelink('id')</th>
                <th>@sortablelink('title')</th>
                <th>@sortablelink('description')</th>
                <th>@sortablelink('status')</th>
                {{-- <th>@sortablelink('status')</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($detail as $item)               
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    {{-- <td>{{$item->phone}}</td> --}}
                    <td>                                               
                         @if ($item->status=="active")   
                         <a href="{{url('/showblogs',$item->id)}}">
                            <button type="button" class="btn btn-success">Active</button>
                        </a>  
                        @endif  

                          @if ($item->status=="archive")   
                         <a href="{{url('/showblogs',$item->id)}}">
                            <button type="button" class="btn btn-warning">Archive</button>
                        </a>               
                        @endif 

                        @if ($item->status=="draft")   
                         <a href="{{url('/showblogs',$item->id)}}">
                            <button type="button" class="btn btn-danger">Draft</button>
                        </a>  
                         @endif      

                        </td>
                              
                                                      
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class=" justify-center">
        <span>
            {{$detail->links()}}
        </span>
        <style>
        .w-5{
            display: none;
        }
        </style>
    </div>
    {{-- {!! $item->appends(\Request::except('show'))->render() !!} --}}
</div>
</body>
</html>