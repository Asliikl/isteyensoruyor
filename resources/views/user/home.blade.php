@extends('user.layouts.master')

@push('css')
<style>

    .question-box {
        margin-top: 40px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width:1200px;
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
                <p style="color:#4caf50;font-size: 18px;">Do you want to ask a question?</p>
                <textarea name="question" id="" cols="120" rows="3" placeholder="enter text..."></textarea>
                <button type="submit">Ask Question<i class="fa fa-question" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
    <br class="mt-2 mx-2">

    @if(session('success'))
        <div id="success-message" style="padding: 15px; margin: 20px 0; background-color: #d4edda; color: #155724; border-radius: 5px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <br class="mt-4 mx-4">
    <h2>Questions</h2><br>
    <div class="row">
        @foreach ($questions as $question)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <div></div>
                            <small class="text-danger">Posted on: {{ $question->created_at->format('Y-m-d') }}</small>
                        </div>
                        <h5 class="card-title bg-gradient-gray pr-1 pl-1">Owner: {{$question->user->name}}</h5>
                        <p class="card-text">Question Content: {{$question->question}}</p>
                        <a href="{{ route('user.questionGetAll', ['questionId' => $question->id]) }}" class="btn btn-primary">Go to Comments</a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('js')
    <script>
        setTimeout(() => {
            const msg = document.getElementById('success-message');
            if (msg) msg.remove();
        }, 3000);
    </script>
@endpush
