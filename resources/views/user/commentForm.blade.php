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
            <form action="{{route('user.commentPost')}}" method="POST">
                @csrf 
                <textarea name="content" id="" cols="120" rows="3" placeholder="enter text..."></textarea>
               <button class="btn btn-primary">Add Comment</button>
            </form>
        </div>       
    </div>
</div>
@endsection