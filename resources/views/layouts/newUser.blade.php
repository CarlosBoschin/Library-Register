@extends('main')

<div class="wrapper">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="logo-image">
      <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i> Novo Usuário</h2>
    </div>

    <!-- Login Form -->
    <form class="form-group login">
        <label>Nome:</label>
        <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome" style="margin-bottom:20px">
        <label>E-mail:</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="E-mail" style="margin-bottom:20px">
        <label>Senha:</label>
        <input type="password" id="password" class="form-control" name="password" placeholder="password" style="margin-bottom:20px">
        <label>Confirmar senha:</label>
        <input type="password" id="password2" class="form-control" name="password2" placeholder="Senha" style="margin-bottom:20px">
    </form>
    <input type="submit" value="Cadastrar" style="margin-top:-47px">

  </div>
</div>

<script>
    
</script>