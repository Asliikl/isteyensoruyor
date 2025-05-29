
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- Horizontal Form -->
<div class="card card-info col-md-6 mx-auto mt-4">
   <div class="card-header">
     <h3 class="card-title">Register Form</h3>
   </div>
   <!-- /.card-header -->
   <!-- form start -->
    <br>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form class="form-horizontal" action="{{ route('user.registerPost') }}" method="POST">
     @csrf
     <div class="form-group row mt-4">
         <label for="inputName" class="col-sm-2 col-form-label">Name</label>
         <div class="col-sm-10">
             <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">
         </div>
     </div>
     <div class="form-group row">
         <label for="inputSurname" class="col-sm-2 col-form-label">Surname</label>
         <div class="col-sm-10">
             <input type="text" class="form-control" id="inputSurname" name="surname" placeholder="Surname">
         </div>
     </div>
     <div class="form-group row">
         <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
         <div class="col-sm-10">
             <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
         </div>
     </div>
     <div class="form-group row">
         <label class="col-sm-2 col-form-label">Gender</label>
         <div class="col-sm-10">
             <input type="radio" id="female" name="gender" value="female"> Female
             <input type="radio" id="male" name="gender" value="male"> Male
         </div>
     </div>
     <div class="form-group row">
         <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
         <div class="col-sm-10">
             <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
         </div>
     </div>
     <div class="card-footer">
         <button type="submit" class="btn btn-success">Sign in</button>
         <button type="button" class="btn btn-default float-right"><a href="{{route('user.login')}}">Log in</a></button>
     </div>
    </form>


</div>
 <!-- /.card -->
 @if($errors->has('loginError'))
   <div class="alert alert-danger">
       {{ $errors->first('loginError') }}
   </div>
@endif
