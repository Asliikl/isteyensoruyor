@extends('user.layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>My Questions</h2>

        @if($questions->isEmpty())
            <p>You haven't asked any questions yet.</p>
        @else
            <div class="row">
                @foreach($questions as $question)
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="card-title">Question: {{ $question->question }}</h5>
                                    <small class="text-muted">{{ $question->created_at->format('Y-m-d') }}</small>
                                </div>
                                <a href="{{ route('user.questionGetAll', ['questionId' => $question->id]) }}" class="btn btn-primary btn-sm">View Comments</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
