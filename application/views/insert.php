<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <br>
  <div id="message"></div>
  <br>
  <div class="container">
    <form class="form-horizontal" id="user_form">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Name:</label>
        <div class="col-sm-10">          
          <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
        </div>
      </div>
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <script>
    $(document).ready(function(){
      $('#user_form').on('submit',function(event){
        event.preventDefault();
        var email = $('#email').val();
        var name = $('#name').val();
        if (email != '' && name != '') {
          $.ajax({
            url:"<?php echo base_url()?>insert-user-data",
            method:"POST",
            data:
            {
              email:email,
              name:name
            },
            success:function(response){
            $('#message').html('<h3 class="text-success text-center">Data Inserted</h3>');
            $('#name').val('');
            $('#email').val('');
          }
        });
        }
      });
    });
  </script>
</body>
</html>
