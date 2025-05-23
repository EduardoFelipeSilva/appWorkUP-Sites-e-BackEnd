<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="{{url('assets/img/adminImages/WU-icon.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="{{ url('assets/css/navbarAdmin.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/admin.css') }}">
  
  <title>Administrador | Usuários</title>
</head>

<body>


<div class="row">
@include('components.asideAdmin')

            
  <div class="col-9 mt-1">
  <ul class="nav-list list-group list-group-horizontal list-none p-2">
          <li class="p-1 d-flex flex-row justify-content-center"><span class="material-symbols-outlined p-1">
grid_view
</span><a href="{{ route('admin.dashboard') }}" class="text-dark p-1">Dashboard</a></li>
          <li class="p-2">/</li>
          <li class="p-1 d-flex flex-row justify-content-center"><span class="material-symbols-outlined p-1">
person
</span><a href="{{ route('usuarios.index') }}" class="text-dark p-1">Usuários</a></li>


        </ul>
    <div class="container md-4 mt-3">



    <div class="filtro-container">
   <h2>Filtros</h2>

   
  
   <div class="row d-flex align-items-center">
    <input type="text" placeholder="Buscar por nome..." id="searchInput2" class="col-6"> 


    <div class="dropdown m-2 p-0 col-1"> 
      <a class="oo  d-flex align-items-center justify-content-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         <i class="bi bi-funnel text-black fs-4 fw-bold"></i> 
   </a> 
   <ul class="dropdown-menu" aria-labelledby="statusDropdown" id="statusFilterMenu"> 
    <li><a class="dropdown-item" href="#" data-value="">Todos</a></li>
     <li><a class="dropdown-item" href="#" data-value="Ativo">Ativo</a></li> 
     <li><a class="dropdown-item" href="#" data-value="Pendente">Pendente</a></li>
      <li><a class="dropdown-item" href="#" data-value="Bloqueado">Bloqueado</a></li> 
    </ul>
   </div>

   <!-- <img src="{{ asset('assets/img/adminimages/undraw_learning_sketching_nd4f.svg') }}" alt="Imagem de Aprendizado" id="imagem-filtro" class="col-3"> -->
   </div>



    
    </div>

      <div class="tabela-container" style="max-height: 550px; overflow-y: auto; overflow-x: hidden;">

<div class="alinhar">



</div>








        <table class="table" id="myTable">
        <thead class="table-dark">
            <tr>
              <th class="fw-bold">Id</th>
              <th class="fw-bold">Usuário</th>
              <th>
                <div class="d-flex align-items-center">
                  <span class="material-symbols-outlined">alternate_email</span>
                  <p class="m-0 fw-bold">E-mail</p>
                </div>
              </th>
              <th>
                <div class="d-flex flex-row">
                  <span class="material-symbols-outlined">autorenew</span>
                  <p class="m-0 fw-bold">Status</p>
                </div>
              </th>
              <th>
                <div class="d-flex btn-acoes align-items-center">
                  <span class="material-symbols-outlined">keyboard_double_arrow_down</span>
                  <p class="m-0 fw-bold">Ações</p>
                  


                </div>
              </th>
            </tr>
          </thead>
          <tbody>
    @forelse($usuarios as $u) 
        <tr>
            <td class="p-3">{{ $u->idUsuario }}</td>
            <td class="d-flex flex-row align-items-center">
                <!-- <div class="user-initials rounded-circle text-white d-flex justify-content-center align-items-center ms-3" style="width: 45px; height: 45px;">
                    {{ strtoupper(substr($u->nomeUsuario, 0, 1)) }}{{ strtoupper(substr(explode(' ', $u->nomeUsuario)[1] ?? '', 0, 1)) }}
                </div>   -->
                <div class="d-flex modal-imagem justify-content-center">
                <img src="{{$u->fotoUsuario}}" alt=""  width="50px" height="50px" class="rounded-pill object-fit: cover">

          </div>
                <a href="" class="visualizar-link m-0" data-bs-toggle="modal" data-bs-target="#visualizarModal"
       data-id="{{ $u->idUsuario }}"
       data-nome="{{ $u->nomeUsuario }}"
       data-username="{{ $u->usernameUsuario }}"
       data-nasc="{{ $u->nascUsuario }}"
       data-email="{{ $u->emailUsuario }}"
       data-contato="{{ $u->contatoUsuario }}"
       data-cidade="{{ $u->cidadeUsuario }}"
       data-estado="{{ $u->estadoUsuario }}"
       data-logradouro="{{ $u->logradouroUsuario }}"
       data-cep="{{ $u->cepUsuario }}"
       data-numero="{{ $u->numeroLograUsuario }}"
       data-sobre="{{ $u->sobreUsuario }}"
       data-formacao="{{ $u->formacaoCompetenciaUsuario }}"
       data-dataFormacao="{{ $u->dataFormacaoCompetenciaUsuario }}"
       data-createdAt="{{ $u->created_at }}"
       >
        {{ $u->nomeUsuario }}
    </a>
  
              
            </td>
            <td class="p-3">{{ $u->emailUsuario }}</td>
            <td class="p-3">
                <span class="badge rounded-pill d-inline 
                    @switch($u->status->tipoStatus)
                        @case('Ativo')
                            badge-ativo
                            @break
                        @case('Pendente')
                            badge-pendente
                            @break
                        @case('Bloqueado')
                            badge-bloqueado
                            @break
                        @default
                            badge-default
                    @endswitch">
                    {{ $u->status->tipoStatus }}
                </span>
            </td>
            <td class="p-3">
                <form action="{{ route('usuarios.delete', $u->idUsuario) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Realmente deseja excluir esse usuário?')" type="submit" class="btn btn-outline-danger btn-sm"><span class="bi-slash-circle"></span></button>
                </form>
                <form action="{{ route('usuarios.aprovar', $u->idUsuario) }}" method="POST" class="d-inline">
                    @csrf
                    @method('POST')
                    <button onclick="return confirm('Realmente deseja aprovar esse usuário?')" type="submit" class="btn btn-outline-success btn-sm"><span class="bi bi-check2"></span></button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">Nenhum usuário encontrado.</td>
        </tr>
    @endforelse
</tbody>

        </table>
        <div class="no-results" id="noResults">
              <img src="{{url('assets/img/adminImages/not-found.png')}}" alt="">
              <p>Nenhum registro encontrado.</p>
            </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Criar administrador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/formAdmin" enctype="multipart/form-data" class="">
@csrf

  <div class="row mb-3">

  @error('nomeAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
    <div class="form-group col-md-4 form__group field">
      <label for="inputEmail4" class="form_label">Nome do administrador</label>
      <input type="text" class="form-control custom-input" id="inputEmail4" placeholder="Nome do ADM" name="nomeAdmin" value="{{ old('nomeAdmin') }}" required>
    </div>

    @error('usernameAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
    <div class="form-group col-md-4 form__group field ">
    <label for="inputAddress" class="form_label">Nome de usuário</label>
    <input type="text" class="form-control custom-input" id="inputAddress" placeholder="nome.sobrenome" value="{{ old('usernameAdmin') }}"  name="usernameAdmin" required>
  </div>


  @error('senhaAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
  <div class="form-group col-md-4 form__group field">
      <label for="inputPassword4" class="form_label">Senha</label>
      <input type="password" class="form-control  custom-input" id="inputPassword4" placeholder="Senha" value="{{ old('senhaAdmin') }}"  name="senhaAdmin" required>
    </div>

  </div>


 <div class="row mb-3">

 @error('emailAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
  <div class="form-group col-md-5 form__group field">
    <label for="inputAddress2" class="form__label">E-mail</label>
    <input type="email" class="form-control custom-input" id="inputAddress2" name="emailAdmin" placeholder="email" value="{{ old('emailAdmin') }}">
  </div>

 
  
  @error('contatoAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
    <div class="form-group col-md-3 form__group field">
      <label for="inputCity" class="form__label" class="">Contato</label>
      <input type="number" class="form-control custom-input custom-input" id="inputPhone" name="contatoAdmin" value="{{ old('contatoAdmin') }}" placeholder="(00) 0000-0000" required>

  </div>

<div class="form-group col-md-4 mb-3">
  <label for="fotoAdmin">Imagem do administrador</label>
  <input type="file" name="fotoAdmin" id="fotoAdmin" class="form-control custom-input" accept="image/*" />
  <label for="fotoAdmin" class="custom-file-label"></label>
</div>

    </div>
<!-- Modal -->
<div class="modal" id="visualizarModal" tabindex="-1" aria-labelledby="visualizarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-width-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visualizarModalLabel">Detalhes do Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Seção de Identificação -->
                <div class="row mb-3">
                    <div class="d-flex">
                        <h6 class="me-2">Identificação</h6>
                        <i class="bi bi-file-person-fill"></i>
                    </div>
                    <div class="col-md-6">
                        <p><strong>ID:</strong> <span id="idUsuario"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Nome:</strong> <span id="nomeUsuario"></span></p>
                    </div>
                </div>
                <!-- Seção de Contato -->
                <div class="row mb-3">
                    <div class="d-flex">
                        <h6 class="me-2">Contato</h6>
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Username:</strong> <span id="usernameUsuario"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Data de Nascimento:</strong> <span id="nascUsuario"></span></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Email:</strong> <span id="emailUsuario"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Contato:</strong> <span id="contatoUsuario"></span></p>
                    </div>
                </div>
                <!-- Seção de Informações Adicionais -->
                <div class="row mb-3">
                    <div class="d-flex">
                        <h6 class="me-2">INFO. ADICIONAIS</h6>
                        <i class="bi bi-info-square-fill"></i>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Sobre:</strong> <span id="sobreUsuario"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Formação:</strong> <span id="formacaoCompetenciaUsuario"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Data da Formação:</strong> <span id="dataFormacaoCompetenciaUsuario"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Data Criação Perfil:</strong> <span id="created_at"></span></p>
                    </div>
                </div>
                <!-- Seção de Localização -->
                <div class="row mb-3">
                    <div class="d-flex">
                        <h6 class="me-2">LOCALIZAÇÃO</h6>
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Cidade:</strong> <span id="cidadeUsuario"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Estado:</strong> <span id="estadoUsuario"></span></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Logradouro:</strong> <span id="logradouroUsuario"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>CEP:</strong> <span id="cepUsuario"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Número:</strong> <span id="numeroLograUsuario"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.visualizar-link');
    links.forEach(link => {
      link.addEventListener('click', function(event) {
        const nome = link.getAttribute('data-nome');
        const email = link.getAttribute('data-email');
        
        document.getElementById('nomeUsuario').textContent = nome;
        document.getElementById('emailUsuario').textContent = email;
      });
    });
  });
</script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.visualizar-link');
    links.forEach(link => {
      link.addEventListener('click', function(event) {
        const nome = link.getAttribute('data-nome');
        const email = link.getAttribute('data-email');
        
        document.getElementById('nomeUsuario').textContent = nome;
        document.getElementById('emailUsuario').textContent = email;
      });
    });
  });
</script>

<script>
const sidebarlinks = document.querySelectorAll('.item-nav');

// Adicionando eventos
sidebarlinks.forEach(link => {
  link.addEventListener('click', function() {
    // Removendo classe
    sidebarlinks.forEach(item => item.classList.remove('link-aside-active'));


    this.classList.add('link-aside-active')
  })
})

  // Adiciona um evento de entrada ao campo de busca
  document.getElementById('searchInput2').addEventListener('input', function() {
    const filter = this.value.toLowerCase(); // Valor digitado na barra de busca
    const rows = document.querySelectorAll('#myTable tbody tr'); // Todas as linhas da tabela
    let visibleRows = 0; // Contador de linhas visíveis
    const noResults = document.getElementById('noResults');

    // Itera por todas as linhas da tabela para verificar se devem ser exibidas ou ocultadas
    rows.forEach(row => {
      const textContent = row.textContent.toLowerCase();
      if (textContent.includes(filter)) {
        row.style.display = ''; // Exibe a linha
        visibleRows++; // Incrementa o contador de linhas visíveis
        
      } else {
        row.style.display = 'none'; // Oculta a linha
         
      }  
      noResults.style.display = (visibleRows > 0) ? 'none' : 'block';
    });



  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.visualizar-link');
    links.forEach(link => {
      link.addEventListener('click', function(event) {
        event.preventDefault();
        const id = link.getAttribute('data-id');
        const nome = link.getAttribute('data-nome');
        const username = link.getAttribute('data-username');
        const nasc = link.getAttribute('data-nasc');
        const email = link.getAttribute('data-email');
        const contato = link.getAttribute('data-contato');
        const cidade = link.getAttribute('data-cidade');
        const estado = link.getAttribute('data-estado');
        const logradouro = link.getAttribute('data-logradouro');
        const cep = link.getAttribute('data-cep');
        const numero = link.getAttribute('data-numero');
        const sobre = link.getAttribute('data-sobre');
        const formacao = link.getAttribute('data-formacao');
        const dataFormacao = link.getAttribute('data-dataFormacao');
        const createdAt = link.getAttribute('data-createdAt');
        
        document.getElementById('idUsuario').textContent = id;
        document.getElementById('nomeUsuario').textContent = nome;
        document.getElementById('usernameUsuario').textContent = username;
        document.getElementById('nascUsuario').textContent = nasc;
        document.getElementById('emailUsuario').textContent = email;
        document.getElementById('contatoUsuario').textContent = contato;
        document.getElementById('cidadeUsuario').textContent = cidade;
        document.getElementById('estadoUsuario').textContent = estado;
        document.getElementById('logradouroUsuario').textContent = logradouro;
        document.getElementById('cepUsuario').textContent = cep;
        document.getElementById('numeroLograUsuario').textContent = numero;
        document.getElementById('sobreUsuario').textContent = sobre;
        document.getElementById('formacaoCompetenciaUsuario').textContent = formacao;
        document.getElementById('dataFormacaoCompetenciaUsuario').textContent = dataFormacao;
        document.getElementById('created_at').textContent = createdAt;

        const modal = new bootstrap.Modal(document.getElementById('visualizarModal')); modal.show()
      });
    });
  });
  
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownItems = document.querySelectorAll("#statusFilterMenu .dropdown-item");
        const tableRows = document.querySelectorAll("#myTable tbody tr");
        const clearButton = document.getElementById("clearFilters");

        dropdownItems.forEach(item => {
            item.addEventListener("click", function (e) {
                e.preventDefault(); // Evita o redirecionamento padrão
                const selectedStatus = this.getAttribute("data-value");

                // Filtrar as linhas
                tableRows.forEach(row => {
                    const statusCell = row.querySelector("td:nth-child(4) .badge");
                    if (!statusCell) return;

                    const status = statusCell.textContent.trim();
                    row.style.display = selectedStatus === "" || status === selectedStatus ? "" : "none";
                });

                // Atualizar o texto do botão dropdown
                const dropdownButton = document.getElementById("statusDropdown");
                dropdownButton.textContent = this.textContent;
            });
        });

        // Botão de limpar filtros
        clearButton.addEventListener("click", function () {
            tableRows.forEach(row => row.style.display = ""); // Mostra todas as linhas
            document.getElementById("statusDropdown").textContent = "Selecione o Status";
        });
    });
</script>

<script src="script.js"></script>


</body>
</html>