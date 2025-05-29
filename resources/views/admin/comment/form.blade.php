@extends('admin.layouts.master')

@section('content')
    <div class="container" style="padding-top: 25px; max-width: 700px;">
        <div class="card shadow-sm">
            <div class="card-header bg-gradient-maroon text-white">
                <h4 class="mb-0">Edit Comment</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('comment.update', [$comment]) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="content">Comment Content</label>
                        <input
                            type="text"
                            id="content"
                            name="content"
                            class="form-control"
                            value="{{ old('content', $comment->content) }}"
                            required
                            placeholder="Enter comment content">
                    </div>

                    <div class="form-group mt-3">
                        <label for="user_id">Question Owner</label>
                        <select
                            id="user_id"
                            name="user_id"
                            class="form-control"
                            required>
                            @foreach ($allUsers as $user)
                                <option value="{{ $user->id }}" {{ $user->id == old('user_id', $comment->user_id) ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="question_id">Question Content</label>
                        <select
                            id="question_id"
                            name="question_id"
                            class="form-control"
                            required>
                            @foreach ($allQuestions as $question)
                                <option value="{{ $question->id }}" {{ $question->id == old('question_id', $comment->question_id) ? 'selected' : '' }}>
                                    {{ $question->question }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="container mt-3" style="max-width: 700px;">
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endsection
