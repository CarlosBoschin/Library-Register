@extends('main')

<script rel="stylesheet" src="assets/js/jquery-3.6.0.min.js"></script>

<div>
  <ul>
    <li><a href=""><i class="fa fa-home"></i>&nbsp;Home</a></li>
    <li style="float:right"><a class="active" id="logout"><i class="fa fa-sign-out"></i>&nbsp;Sair</a></li>
  </ul>
</div>

<div style="padding: 20px">
  
  <div class="row" style="margin-top: -22px">
    <div class="col-md-9"></div>
    <div class="col-md-3">
      <h5><i class="fa fa-sun-o" aria-hidden="true"></i> Clima</h5>
      <p id="weatherId"></p>
    </div>
  </div>

  <div class="container-table">

    <div class="row">
      <div class="col-md-8">
        <h3 style="margin-left: 30px;"><i class="fa fa-book" aria-hidden="true"></i> Registro de Livros</h3>
      </div>
      <div class="col-md-4">
        <button class="btn" style="float: right; background-color:#47b3ea; color:white" id="cadastrarModal" type="button" data-toggle="modal" data-target="#cadastrarNovo">Cadastrar Novo</button>
      </div>
    </div><br>

    <div style="padding: 20px">
      <table id="tableHome" class="display nowrap" style="width:100%">
        <thead>
          <td>Código</td>
          <td>Título</td>
          <td>Autor</td>
          <td>Páginas</td>
          <td>Criado em</td>
          <td>Ações</td>
        </thead>
      </table>
    </div>
  
  </div>
</div>

<!-- Modal Cadastrar  -->
<div class="modal fade" id="cadastrarNovo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar Livro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="titulo">Título:</label>
          <input type="text" class="form-control" id="titulo">
          <small style="color: red" class="form-text" id="field1">Campo obrigatório!</small>
        </div>

        <div class="form-group">
          <label for="descricao">Descrição:</label>
          <textarea maxlength="500" rows="4" cols="4" class="form-control" id="descricao"></textarea>
          <small class="form-text text-muted">Até 500 caracteres.</small>
        </div>

        <div class="row form-group">
          <div class="col-md-8">
            <label for="autor">Autor:</label>
            <input type="text" class="form-control" id="autor">
            <small style="color: red" class="form-text" id="field2">Campo obrigatório!</small>
          </div>
          <div class="col-md-4">
            <label for="paginas">Páginas:</label>
            <input type="number" class="form-control" id="paginas">
            <small style="color: red" class="form-text" id="field3">Campo obrigatório!</small>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="storeBook" type="button" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Visualizar  -->
<div class="modal fade" id="visualizarModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-book" aria-hidden="true"></i> Detalhes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="titulo">Título:</label>
          <input type="text" disabled class="form-control" id="titulo_visu">
        </div>

        <div class="form-group">
          <label for="descricao">Descrição:</label>
          <textarea maxlength="500" disabled rows="4" cols="4" class="form-control" id="descricao_visu"></textarea>
        </div>

        <div class="row form-group">
          <div class="col-md-8">
            <label for="autor">Autor:</label>
            <input type="text" disabled class="form-control" id="autor_visu">
          </div>
          <div class="col-md-4">
            <label for="paginas">Páginas:</label>
            <input type="number" disabled class="form-control" id="paginas_visu">
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar  -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="titulo">Título:</label>
          <input type="text" class="form-control" id="titulo_edit">
          <small style="color: red" class="form-text" id="field1_edit">Campo obrigatório!</small>
        </div>

        <div class="form-group">
          <label for="descricao">Descrição:</label>
          <textarea maxlength="500" rows="4" cols="4" class="form-control" id="descricao_edit"></textarea>
        </div>

        <div class="row form-group">
          <div class="col-md-8">
            <label for="autor">Autor:</label>
            <input type="text" class="form-control" id="autor_edit">
            <small style="color: red" class="form-text" id="field2_edit">Campo obrigatório!</small>
          </div>
          <div class="col-md-4">
            <label for="paginas">Páginas:</label>
            <input type="number" class="form-control" id="paginas_edit">
            <small style="color: red" class="form-text" id="field3_edit">Campo obrigatório!</small>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="editBook" type="button" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>

</body>

<script>
  getBooks();
  weather();
  var Books = [];

  var current_id;

  function weather()
  {
    $.ajax({
      type: "GET",
      url: '{{url("api/weather")}}',
      success: function(data)
      {
        $("#weatherId").html(data.city + ' <b>|</b> ' + data.temp +'°C <b>|</b>  ' + data.description);
      },
      error: function(data) 
      {
        console.log('Não foi possivel carregar o clima');
      }
    });
  }

  function getBooks()
  {
    $.ajax({
      type: "GET",
      url: '{{url("api/getBooks")}}',
      success: function(data)
      {
        Books = data;
        let Books_array = [];
        
        data.forEach(
          (book, index)=>{
            Books_array.push([book.id,book.title,book.author,book.pages,book.created_at,`<i class="fa fa-eye" onclick="visualizar(${index})" title="Visualizar"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil" onclick="editar(${index})" title="Editar"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-trash" onclick="deletar(${index})" title="Deletar"></i>`]);
          }
        );

        $('#tableHome').DataTable().destroy();

        $('#tableHome').DataTable({
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.2/i18n/pt_br.json"
          },
          "scrollY": "500px",
          "lengthChange": false,
          "dom": '<"pull-left"f><"pull-right"l>tip',
          "rowReorder": {
              "selector": 'td:nth-child(2)'
          },
          "responsive": true,
          "data": Books_array,
        });
      },
      error: function(data) 
      {
        window.location.href = "/";
      }
    });
  }

  $("#field1").hide();
  $("#field2").hide();
  $("#field3").hide();

  $("#field1_edit").hide();
  $("#field2_edit").hide();
  $("#field3_edit").hide();

  $(document).ready(function(){
      $('#cadastrarModal').click(function()
      {
        $('#titulo').val("");
        $('#descricao').val("");
        $('#autor').val("");
        $('#paginas').val("");

        $("#field1").hide();
        $("#field2").hide();
        $("#field3").hide();
      });
  });

  $("#storeBook").click(function()
  {
    var titulo = $('#titulo').val();
    var descricao = $('#descricao').val();
    var autor = $('#autor').val();
    var paginas = $('#paginas').val();

    $("#field1").hide();
    $("#field2").hide();
    $("#field3").hide();

    if(!titulo)
    {
      $("#field1").show();
      $("#titulo").focus();
    }
    else if(!autor)
    {
      $("#field2").show();
      $("#autor").focus();
    }
    else if(!paginas)
    {
      $("#field3").show();
      $("#paginas").focus();
    }
    else
    { 
      $('#cadastrarNovo').modal('hide');

      $.ajax({
        type: "POST",
        url: '{{url("api/storeBook")}}',
        data: {
          'title': titulo,
          'description': descricao,
          'author': autor,
          'pages': paginas
        },
        success: function(data)
        {
          getBooks();

          Swal.fire({
              title: 'Sucesso!',
              text: 'O livro foi cadastrado com sucesso.',
              icon: 'success',
              confirmButtonText: 'OK'
          })
        },
        error: function(data) 
        {
          if(data.status == 401 || data.status == 500)
          {
            Swal.fire({
              title: 'Ops!',
              text: 'Tente novamente mais tarde.',
              icon: 'error',
              confirmButtonText: 'OK'
            })
          }
        }
      });
    }
  });

  $("#logout").click(function()
  {
    $.ajax({
      type: "GET",
      url: '{{url("api/logout")}}',
      success: function(data)
      {
        window.location.href = "/";
      },
      error: function(data) 
      {
        window.location.href = "/";
      }
    });
  });   

  function visualizar(index)
  {
    let book = Books[index];

    $('#titulo_visu').val(book.title);
    $('#descricao_visu').val(book.description);
    $('#autor_visu').val(book.author);
    $('#paginas_visu').val(book.pages);

    $('#visualizarModal').modal('show');
  };  

  function editar(index)
  {
    let book = Books[index];

    current_id = book.id;

    $("#field1_edit").hide();
    $("#field2_edit").hide();
    $("#field3_edit").hide();

    $('#titulo_edit').val(book.title);
    $('#descricao_edit').val(book.description);
    $('#autor_edit').val(book.author);
    $('#paginas_edit').val(book.pages);

    $('#editarModal').modal('show');
  };  

  function deletar(index)
  {
    let book = Books[index];
    let book_id = book.id;

    Swal.fire({
    title: 'Deseja realmente excluir?',
    showCancelButton: true,
    confirmButtonText: 'Excluir',
    cancelButtonText: 'Cancelar',
    }).then((result) => 
    {
      if(result.isConfirmed) 
      {
        $.ajax({
          type: "POST",
          url: '{{url("api/deletar")}}',
          data: {
            'id': book_id,
          },
          success: function(data)
          {
            getBooks();

            Swal.fire({
                title: 'Deletado!',
                text: 'O livro foi excluído com sucesso.',
                icon: 'success',
                confirmButtonText: 'OK'
              })
          },
          error: function(data) 
          {
            Swal.fire({
              title: 'Ops!',
              text: 'Tente novamente mais tarde.',
              icon: 'error',
              confirmButtonText: 'OK'
            })
          }
        });
      }
    })
  };  

  $(document).ready( function () {
    $('#tableHome').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.11.2/i18n/pt_br.json"
        },
        "scrollY": "500px",
        "lengthChange": false,
        "dom": '<"pull-left"f><"pull-right"l>tip',
        "rowReorder": {
            "selector": 'td:nth-child(2)'
        },
        "responsive": true
      });
  });

  $("#editBook").click(function()
  {
    let id_edit = $('#id_edit').val();
    let titulo_edit = $('#titulo_edit').val();
    let descricao_edit = $('#descricao_edit').val();
    let autor_edit = $('#autor_edit').val();
    let paginas_edit = $('#paginas_edit').val();

    $("#field1_edit").hide();
    $("#field2_edit").hide();
    $("#field3_edit").hide();

    if(!titulo_edit)
    {
      $("#field1_edit").show();
      $("#titulo_edit").focus();
    }
    else if(!autor_edit)
    {
      $("#field2_edit").show();
      $("#autor_edit").focus();
    }
    else if(!paginas_edit)
    {
      $("#field3_edit").show();
      $("#paginas_edit").focus();
    }
    else
    { 
      $('#editarModal').modal('hide');

      console.log(id_edit);
      $.ajax({
        type: "PUT",
        url: '{{url("api/editBook")}}',
        data: {
          'id': current_id,
          'title': titulo_edit,
          'description': descricao_edit,
          'author': autor_edit,
          'pages': paginas_edit
        },
        success: function(data)
        {
          getBooks();

          Swal.fire({
              title: 'Sucesso!',
              text: 'O livro foi editado com sucesso.',
              icon: 'success',
              confirmButtonText: 'OK'
          })
        },
        error: function(data) 
        {
          if(data.status == 401 || data.status == 500)
          {
            Swal.fire({
              title: 'Ops!',
              text: 'Tente novamente mais tarde.',
              icon: 'error',
              confirmButtonText: 'OK'
            })
          }
        }
      });
    }
  });

</script>



