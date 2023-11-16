@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- Horizontal Form -->
<div class="card card-info col-md-6 mx-auto mt-4">
   <div class="card-header">
     <h3 class="card-title">Kullanıcı Düzenleme</h3>
   </div>
   <!-- /.card-header -->
   <!-- form start -->
   
   <form class="form-horizontal" action="{{route('admin.update',[$admin])}}" method="POST">
       @csrf
     <div class="card-body">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" name="name" value="{{$admin->name}}">
            </div>
          </div>
       <div class="form-group row">
         <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
         <div class="col-sm-10">
           <input type="email" class="form-control" id="inputEmail3" name="email" value="{{$admin->email}}">
         </div>
       </div>
     </div>
     <!-- /.card-body -->
     <div class="card-footer">
       <button type="submit" class="btn btn-success">Update</button>
       <button type="submit" class="btn btn-default float-right">Cancel</button>
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
@endsection
