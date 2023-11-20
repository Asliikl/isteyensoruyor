@extends('user.layouts.master')
@push('css')
<style>
    .question-box {
        margin-top: 40px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 600px;
        padding: 20px;
        box-sizing: border-box;
    }
    .question-box textarea {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: none;
    }
    .question-box button {
        background-color: #4caf50;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }
    .card-title{
        font: bold;
        color: #4caf50
    }
 
</style>
@endpush

@section('content')
<div class="container">
<div class="row">
    @foreach ($comments as $comment) 
        <div class="col-md-4"> 
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-title">Owner: {{$comment->user->name}}</p>
                    <p class="card-text">Question: {{$comment->question->question}}</p>
                    <p class="card-text">Comment : {{$comment->content}}</p>
                </div>
            </div>
            <a href="{{route ('user.commentGetAll')}}" class="btn btn-primary">Sende Yorum Yap</a>
        </div>
        
    @endforeach
</div>
</div>
@endsection