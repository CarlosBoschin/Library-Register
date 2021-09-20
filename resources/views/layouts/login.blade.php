@extends('main')
<script rel="stylesheet" src="assets/js/jquery-3.6.0.min.js"></script>

<div class="wrapper">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="logo-image">
      <h2><i class="fa fa-book" aria-hidden="true"></i> Livraria</h2>
    </div>

    <!-- Login Form -->
    <form class="form-group login">
        <label>Login:</label>
        <input type="email" id="login" class="form-control" name="login" placeholder="login" style="margin-bottom:20px">
        <label>Senha:</label>
        <input type="password" id="password" class="form-control" name="login" placeholder="password">
    </form>
    <input type="submit" id="loginExec" value="Entrar" style="margin-top:-47px">

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Esqueceu a senha?</a>
    </div>

  </div>
</div>

<script>

  $("#loginExec").click(function(){
      var name = $('#login').val();
      var pass = $('#password').val();

      $.ajax({
        type: "POST",
        url: '{{url("api/login")}}',
        data: {
          'email': name,
          'password': pass
        },
        success: function(data)
        {
          window.location.href = "/home";
        },
        error: function(data) 
        {
          if(data.status == 401)
          {
            Swal.fire({
              title: 'Ops!',
              text: 'Usuário ou senha inválidos.',
              icon: 'warning',
              confirmButtonText: 'OK'
            })
          }
        }
      })
  });   

</script>