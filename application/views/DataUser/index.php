<div class="container mt-5">
     
</div>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Blank Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Data User</h2>
                <p>Anda dapat mengelola data user</p>
                <table class="table table-striped border" id="listUserTable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                    </thead>
                <tbody id="listUser">
            <!-- Untuk menampilkan datanya, menggunakan JQuery + AJAX -->
                </tbody>
                </table>
                <div><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#addUserModal"><span class="fa fa-plus"></span> Add New</a></div><br>
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Example Card</h5>
              <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<form id="saveUserForm" method="post">
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
               <label class="col-md-2 col-form-label">Username*</label>
               <div class="col-md-10">
                   <input type="text" name="username" id="username" class="form-control" required>
               </div>
          </div>
          <div class="form-group row">
              <label class="col-md-2 col-form-label">Email*</label>
              <div class="col-md-10">
                 <input type="text" name="email" id="email" class="form-control" required>
              </div>
          </div>
          <div class="form-group row">
               <label class="col-md-2 col-form-label">Password*</label>
               <div class="col-md-10">
                  <input type="text" name="password" id="password" class="form-control" required>
               </div>
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
   </div>
  </div>
</form>
  <script>
      // save new user record
$('#saveUserForm').submit('click', function () {
    var Username = $('#username').val();
    var UserEmail = $('#email').val();
    var UserPassword = $('#password').val();
    $.ajax({
        type: "POST",
        url: "user/simpanData",
        dataType: "JSON",
        data: { username: Username, email: UserEmail, password: UserPassword },
        success: function (data) {
           $('#username').val("");
           $('#email').val("");
           $('#password').val("");
           $('#addUserModal').modal('hide');
           listUsers();
     }
   });
   return false;
});
      $(document).ready(function () {
        listUsers();
        $('#listUserTable').dataTable({
        "bPaginate": false,
        "bInfo": false,
        "bFilter": false,
        "bLengthChange": false,
        "pageLength": 5
        });
    // list all user in datatable
        function listUsers() {
        $.ajax({
            type: 'ajax',
            url: 'user/tampilkanData',
            async: false,
            dataType: 'json',
            success: function (data) {
                var html = '';
                var i;
                var no = 1;
            for (i = 0; i < data.length; i++) {
                html += '<tr id="' + data[i].id + '">' +
                    '<td>' + no++ + '</td>' +
                    '<td>' + data[i].username + '</td>' +
                    '<td>' + data[i].email + '</td>' +
                    '<td style="text-align:right;">' +
                    '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="' + data[i].id + '" data-username="' + data[i].username + '"data-email="' + data[i].email + '">Edit</a>' + ' ' +
                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="' + data[i].id + '">Delete</a>' +
                    '</td>' +
                    '</tr>';
        }
        $('#listUser').html(html);
    }

    });
    }


  </script>