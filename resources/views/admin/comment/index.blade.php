@extends('admin.layouts.master')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mt-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Comments Table</h3>
                    <form class="form-inline ml-auto" method="GET" action="{{ route('comment.index') }}">
                        <input
                            type="text"
                            name="table_search"
                            class="form-control form-control-sm mr-2"
                            placeholder="Search"
                            value="{{ request('table_search') }}"
                        >
                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <div class="card-body table-responsive bg-light p-0">
                    <table class="table table-hover text-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Comment Content</th>
                            <th>Owner</th>
                            <th>Question Content</th>
                            <th class="text-center" colspan="2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ Str::limit($comment->content, 40) }}</td>
                                <td>{{ optional($comment->user)->name ?? 'Silinmiş kullanıcı' }}</td>
                                <td>{{ Str::limit($comment->question->question, 40) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('comment.edit', $comment) }}" class="btn btn-sm btn-success mr-1">Düzenle</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('comment.delete', $comment) }}" method="POST" onsubmit="return confirm('Silmek istediğinize emin misiniz?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
