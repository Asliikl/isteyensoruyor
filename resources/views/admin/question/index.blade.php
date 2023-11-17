@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Questions Table</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive bg-light p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>Question ID</th>
                <th>Content</th>
                <th>Owner</th>
                <th colspan="2" style="text-align:center">Actions</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($questions as $question) 
              <tr>
                <td>{{$question->id}}</td>
                <td>{{$question->question}}</td>
                <td>{{$question->user->name}}</td>
                <td class="text-center"><a href="{{route('question.edit',[$question])}}"><button class="btn btn-success">Düzenle</button></a></td>
                <td class="text-center"><a href="{{route('question.delete',[$question])}}"><button class="btn btn-danger">Sil</button></a></td>
            </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
@endsection