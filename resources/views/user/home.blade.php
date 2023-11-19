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
 
</style>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="question-box">
            <form action="{{ route('user.questionPost') }}" method="POST">
                @csrf 
                <textarea name="question" id="" cols="120" rows="3" placeholder="enter text..."></textarea>
                <button type="submit">Ask Question <i class="fa fa-question" aria-hidden="true"></i></button>
            </form>
        </div>
        
    </div>
    
    <br class="mt-4 mx-4">
    <h2>SORULAR</h2><br>
    <div class="row">
        @foreach ($questions as $question) 
            <div class="col-md-4"> 
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Owner: {{$question->user->name}}</h5>
                        <p class="card-text">Content: {{$question->question}}</p>
                        <a href="#" class="btn btn-primary">Yorum yap</a>
                    </div>
                    <a href="" class="mx-4">Yorumlara git</a>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection

@push('js') 
@endpush