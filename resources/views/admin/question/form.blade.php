@extends('admin.layouts.master')

@section('content')
    <div class="container" style="padding-top: 25px; max-width: 700px;">
        <div class="card shadow-sm">
            <div class="card-header bg-gradient-maroon text-white">
                <h4 class="mb-0">Soru Düzenleme</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('question.update', [$question]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="question">Question Content</label>
                        <input
                            type="text"
                            id="question"
                            name="question"
                            class="form-control"
                            value="{{ old('question', $question->question) }}"
                            required
                            placeholder="Soru içeriğini giriniz">
                    </div>

                    <div class="form-group mt-3">
                        <label for="user_id">Question Owner</label>
                        <select
                            id="user_id"
                            name="user_id"
                            class="form-control"
                            required>
                            @foreach ($allUsers as $user)
                                <option value="{{ $user->id }}" {{ $user->id == old('user_id', $question->user_id) ? 'selected' : '' }}>
                                    {{ $user->name }}
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
