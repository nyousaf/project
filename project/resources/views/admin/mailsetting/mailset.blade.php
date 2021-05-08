@extends('layouts.admin')
@section('content')
<div class="dashboard-block" style="margin-bottom: 50px;">
  <form class="col-md-8" action="{{ route('mail.update') }}" method="POST">
    {{ csrf_field() }}
    <br>
    <br>
    <label for="MAIL_FROM_NAME">Sender Name:</label>
    <input type="text" name="MAIL_FROM_NAME" value="{{ $env_files['MAIL_FROM_NAME'] }}"  class="form-control">
    <br>
    <label for="MAIL_DRIVER">Mail Driver: (ex. smtp,mail)</label>
    <input type="text" name="MAIL_DRIVER" value="{{ $env_files['MAIL_DRIVER'] }}" class="form-control">
    <br>
    <label for="MAIL_HOST">Mail Host: (ex. ex. smtp.mailtrap.io)</label>
    <input type="text" name="MAIL_HOST" value="{{ $env_files['MAIL_HOST'] }}" class="form-control">
    <br>
    <label for="MAIL_PORT">Mail PORT: (ex. 467,2525)</label>
    <input type="text" name="MAIL_PORT" value="{{ $env_files['MAIL_PORT'] }}" class="form-control">
    <br>
    <label for="MAIL_USERNAME">Mail Username: (ex. info@example.com)</label>
    <input type="text" name="MAIL_USERNAME" value="{{ $env_files['MAIL_USERNAME'] }}" class="form-control">
    <br>

      <div class="row">
        <div class="col-md-11">
          <label for="MAIL_PASSWORD">Mail Password:</label>
          <input type="password" value="{{ $env_files['MAIL_PASSWORD'] }}" name="MAIL_PASSWORD" class="form-control" id="password-field">
        </div>
        <div  style="margin-left:-25px;margin-top:50px;" class="col-md-1">
           <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
        </div>
      </div>

    
     
   <br>
    <label for="MAIL_ENCRYPTION">Mail Encryption: (ex. SSL/TLS)</label>
    <input type="text" value="{{ $env_files['MAIL_ENCRYPTION'] }}" name="MAIL_ENCRYPTION" class="form-control">
    <br>
    <input type="submit" class="btn btn-md btn-success">
  </form>
</div>




@endsection





@section('scripts')
<script type="text/javascript">
  
  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

</script>

@endsection