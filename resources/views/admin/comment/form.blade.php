@extends('admin.layouts.master')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- Horizontal Form -->
<div class="card card-info col-md-10 mx-auto mt-3">
   <div class="card-header">
     <h3 class="card-title mx-2">Yorum  Düzenleme</h3>
   </div> 
   <form class="form-horizontal" action="{{route('comment.update',[$comment])}}" method="POST">
    @csrf 
    <div class="card-body">
       <div class="form-group row">
         <label for="inputEmail3" class="col-sm-2 col-form-label">Comment Content</label>
         <div class="col-sm-10">
           <input type="text" class="form-control" id="inputEmail3" name="content" value="{{$comment->content}}">
         </div>
       </div>
       
       <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Question Owner</label>
        <div class="col-sm-10">
          <select name="user_id" class="form-control">
            @foreach ($allUsers as $user) 
                <option @if($user->id == $comment->user_id) selected @endif value="{{ $user->id }}">{{ $user->name}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Question Content</label>
        <div class="col-sm-10">
            <select name="question_id" class="form-control">
                @foreach ($allQuestions as $question) 
                    <option @if($question->id == $comment->question_id) selected @endif value="{{ $question->id }}">{{ $question->question}}</option>
                @endforeach
            </select>
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
