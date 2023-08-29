   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Configuration</title>
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
                    <a class="nav-link" href="{{ route('configration')}}">Configuration <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('userlist')}}">Users</a>
                  </li>
                  
                </ul>
              </div>
            </nav>
          </div>
        </div>
    </nav> <div class="container mt-3">

       <div class="card">
  <div class="card-header">
    Access Code Configuration
  </div>
  <div class="card-body">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <form class="row g-3" action="{{ route('saveconfigration')}}" method="post">
          @csrf  
  <div class="col-auto">
    <label for="code_length" class="visually-hidden">Code Length</label>
    <input type="text" min="6" max="10" class="form-control" onkeypress="return isNumberKey(event)" required="required" name="code_length" id="code_length" value="{{ $code_length }}" placeholder="Please enter length to generate access code" >
  </div>
  <div class="col-auto">
    <button type="button" id="id_set_access_length" class="btn btn-primary mb-3">Set Access Code Length</button>
  </div>
</form>
  </div>
</div>
  </div>
  <script type='text/javascript'>
   
    function isNumberKey(evt) {
      var charCode = (evt.which) ? evt.which : evt.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
    }
      $( document ).ready(function() {

        //$("#code_length").val(localStorage.getItem('code_length'));
        $("#id_set_access_length").on("click",function() {
            if($("#code_length").val() !="" && $("#code_length").val()!=0 && $("#code_length").val()>5 && $("#code_length").val()<11){
            localStorage.setItem("code_length", $("#code_length").val());
            swal("SUCCESS!", "Code Length set successfully!","success",{
                    title:"SUCCESS",
                    text:"Code Length set successfully!"
                });
            setTimeout(function(){location.reload(); }, 10000);

            $.ajax({
            type: 'post',
            url: "{{ route('saveconfigration') }}",
            data: { code_length: $("#code_length").val()},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(){
                //$('#create_new').html('....Please wait');
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
            },
            complete: function(response){
                //$('#create_new').html('Create New');
            }
        });
        }else{
              swal("ERROR!", "Please enter valid length. It allows only number & value must be between 5 and 11","warning",{
                    title:"ERROR",
                    text:"Please enter valid length. It allows only number",
                    icon:'https://dl.dropbox.com/s/qe98k2xvmqivxwz/google_apps.png',
              });

        }    
        });
});
  </script>
  <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script> <!-- added sweet alert library  -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
</body>
</html>