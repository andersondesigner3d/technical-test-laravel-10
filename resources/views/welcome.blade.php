@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Technical Test - Laravel 10:</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Users List
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Email</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($paginatedItems as $user)
                <tr>
                  <td>{{$user['id']}}</td>
                  <td>{{$user['name']}}</td>
                  <td>{{$user['age']}}</td>
                  <td>{{$user['email']}}</td>
                  <td style="text-align: right">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button data-id="{{$user['id']}}" data-name="{{$user['name']}}" data-age="{{$user['age']}}" data-email="{{$user['email']}}" type="button" id="editButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" onclick='editModal(this)'>Edit</button>
                      <button data-id="{{$user['id']}}" data-name="{{$user['name']}}" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick='deleteModal(this)'>Delete</button>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <nav>
        <ul class='pagination justify-content-center'>
          <li class='page-item'><a class='page-link' href='?page=1'>&laquo;</a></li>
          @php      
              for ($pag_ant = $currentPage - $max_links; $pag_ant <= $currentPage - 1; $pag_ant++) { 
                  if ($pag_ant >=1) {
                      echo "<li class='page-item'><a class='page-link' href='?page=$pag_ant'>$pag_ant</a></li>";
                  }
              }
              echo "<li class='page-item active'><a class='page-link' href='?page=$currentPage'>$currentPage</a></li>";
              for ($pag_dep = $currentPage + 1; $pag_dep <= $currentPage + $max_links; $pag_dep++) { 
                  if ($pag_dep <= $numPages) {
                      echo "<li class='page-item'><a class='page-link' href='?page=$pag_dep'>$pag_dep</a></li>";
                  }
              }
          @endphp
          <li class='page-item'><a class='page-link' href='?page={{$numPages}}'>&raquo;</a></li>
        </ul>
      </nav>
    </div>
  </div>  

  <!-- Edit Modal -->
  <div class="modal" tabindex="-1" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit the user: ID(<span id="idUser"></span>)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST">
          @csrf
          <div class="modal-body">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" required>
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" step="1" required>
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required>
            <input type="hidden" id="idUserHidden">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Edit Modal -->

  <!-- Delete Modal -->
  <div class="modal" tabindex="-1" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete the user: ID(<span id="idUserDelete"></span>)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST">
          @csrf
          <div class="modal-body">
            <p>Are you sure you want to delete <strong><span id="nameDelete"></span></strong>?</p>
            <input type="hidden" id="idUserHidden2">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Delete Modal -->

</div>

<script>

  //Age mask
  const inputNumero = document.getElementById("age");  
  
  inputNumero.addEventListener("input", function() {
    
    inputNumero.value = inputNumero.value.replace(/[^0-9-]/g, "");    
    inputNumero.value = inputNumero.value.replace(/^0+/g, "");    
    inputNumero.value = inputNumero.value.replace(/^-?(\d*)/, "$1");  
    
    if (inputNumero.value !== "") {
      inputNumero.value = parseInt(inputNumero.value, 10);
    }

  });

  //Edit modal
  function editModal(componente){
      idUser = componente.getAttribute("data-id");
      nameUser = componente.getAttribute("data-name");
      ageUser = componente.getAttribute("data-age");
      emailUser = componente.getAttribute("data-email");
      document.getElementById("idUserHidden").value =idUser;
      document.getElementById("name").value =nameUser;
      document.getElementById("age").value =ageUser;
      document.getElementById("email").value =emailUser;
      document.getElementById("idUser").innerHTML = idUser;
  }

  //Delete modal
  function deleteModal(componente){
      idUser = componente.getAttribute("data-id");
      nameUserDelete = componente.getAttribute("data-name");
      document.getElementById("idUserHidden2").value =idUser;
      document.getElementById("nameDelete").innerHTML = nameUserDelete;
      document.getElementById("idUserDelete").innerHTML = idUser;
  }  

</script>

@endsection