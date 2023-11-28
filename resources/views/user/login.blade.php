
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <!-- Horizontal Form -->
 <div class="card card-info col-md-6 mx-auto mt-4">
    <div class="card-header">
      <h3 class="card-title">Login Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    
    <form class="form-horizontal" action="{{route('user.loginPost')}}" method="POST">
        @csrf
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
          </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-success ">Login</button>
        <button type="button" class="btn btn-default float-right"><a href="{{route('user.register')}}">Register</a></button>
      </div>
      <!-- /.card-footer -->
    </form>
</div>
  <!-- /.card -->
  @if($errors->has('loginError'))
    <div class="alert alert-danger">
        {{ $errors->first('loginError') }}
    </div>
@endif