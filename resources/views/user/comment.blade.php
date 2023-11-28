@extends('user.layouts.master')
@push('css')
<style>
    .question-box {
        margin-top: 40px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 1200px;
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
<div class="container question-box">
<div class="row">
    @foreach ($questions as $question) 
        <div class="col-md-8"> 
            <p class="card-title" style="font-size: 35px;">         
                {{$question->user->name}}: {{$question->question}}
            </p>
            <div class="card-body">
                <p class="card-text text-danger">Comments:</p>
                @foreach ($question->comments as $comment)
                <div style="border: 1px solid black" class="mb-2">
                    <p class="bg-dark text-white p-2">
                        {{$comment->user->name}}
                        <span class="ml-4">{{ $comment->created_at }}</span>
                    </p>
                    <p class="p-2">{{$comment->content}}</p>
                </div>
            @endforeach
            
            </div>
        </div>
    @endforeach 
</div>

<form action="{{ route('user.commentPost', ['questionId' => $question->id]) }}" method="POST">
    @csrf
    <textarea name="content" cols="100" rows="4" placeholder="Enter text..."></textarea>
    <button type="submit" class="btn btn-primary">Sende Yorum Yap</button>
</form>


</div>
@endsection
