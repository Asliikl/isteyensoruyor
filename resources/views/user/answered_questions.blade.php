@extends('user.layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Your Comments</h2>
        @if($comments->isEmpty())
            <p>You have not made any comments yet.</p>
        @else
            <div class="row">
                @foreach($comments as $comment)
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <div></div>
                                    <small class="text-muted">Commented on: {{ $comment->created_at->format('Y-m-d') }}</small>
                                </div>
                                <h5 class="card-title bg-dark text-white p-2">Question by: {{ $comment->question->user->name }}</h5>
                                <p class="card-text"><strong>Question:</strong> {{ $comment->question->question }}</p>
                                <p class="card-text"><strong>Your Comment:</strong> {{ $comment->content }}</p>
                                <a href="{{ route('user.questionGetAll', ['questionId' => $comment->question->id]) }}" class="btn btn-primary">Go to Comments</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
