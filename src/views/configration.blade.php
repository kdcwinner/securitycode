<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Access Code Configuration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>

</head>

<body>
    <div class="container mt-3">

       <div class="card">
  <div class="card-header">
    Access Code Configuration
  </div>
  <div class="card-body">
    <form class="row g-3">
  
  <div class="col-auto">
    <label for="code_length" class="visually-hidden">Code Length</label>
    <input type="text" min="6" max="10" class="form-control" onkeypress="return isNumberKey(event)" required="required" id="code_length" placeholder="Please enter length to generate access code" >
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

        $("#code_length").val(localStorage.getItem('code_length'));
        $("#id_set_access_length").on("click",function() {
            if($("#code_length").val() !="" && $("#code_length").val()!=0 && $("#code_length").val()>5 && $("#code_length").val()<11){
            localStorage.setItem("code_length", $("#code_length").val());
            swal("SUCCESS!", "Code Length set successfully!","success",{
                    title:"SUCCESS",
                    text:"Code Length set successfully!"
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
</body>
</html>