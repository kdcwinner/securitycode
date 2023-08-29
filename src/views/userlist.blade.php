  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User List</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
          <a class="navbar-brand" href="{{ URL('/') }}">Security Code</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ route('configration')}}">Configuration</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('userlist')}}">Users <span class="sr-only">(current)</span></a>
                  </li>
                  
                </ul>
              </div>
            </nav>
          </div>
        </div>
    </nav>
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
        <div class="card">
            <div class="card-header">User List</div>
            <table class="table table-striped">
                <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Access Code</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{ $user['id'] }}</th>
      <td>{{ $user['name'] }}</td>
      <td>{{ $user['email'] }}</td>
      <td>@if ($user['securitycode']=='') N/A @else {{ $user['securitycode'] }} @endif </td>
       <td><button type="button" class="btn btn-primary btn_assign_code" id="{{ $user['id'] }}">Assign Access Code</button>
</td>
    </tr>
    @endforeach
    </tbody>
</table>
        </div>
    </div>    
</div>
<script type="text/javascript">
    
    $( document ).ready(function() {
        $(".btn_assign_code").on("click",function(){
            var uid = $(this).attr("id");
            $.ajax({
            type: 'post',
            url: "{{ route('assigncode') }}",
            data: { uid: uid},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                console.log(response);
                if(response.success == 200){
                    swal("SUCCESS!", "Code assigned successfully!","success",{
                        title:"SUCCESS",
                        text:"Code assigned successfully!",
                    });
                    setTimeout(function(){location.reload(); }, 1000);         
                }
            }
        });
        });
    });
</script> 

 <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script> <!-- added sweet alert library  -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
</body>
</html>