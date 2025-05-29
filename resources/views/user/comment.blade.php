@extends('user.layouts.master')
@push('css')
    <style>
        .question-box {
            margin-top: 40px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            max-width: 800px;
            padding: 20px;
            box-sizing: border-box;
            position: relative;
            margin-left: auto;
            margin-right: auto;
        }
        .question-header {
            border: 1px solid #4caf50;
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            position: relative;
        }

        .header-top {
            font-weight: 700;
            font-size: 18px;
            color: #27ae60;
        }

        .date {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 14px;
            color: rgba(0,0,0,0.4);
            user-select: none;
        }

        .question-text {
            font-size: 22px;
            font-weight: 600;
            color: #34495e;
            margin-top: 10px;
        }

        .question-header .info {
            font-weight: 700;
            font-size: 18px;
            color: #27ae60;
        }

        .comments {
            margin-left: 30px;
        }

        .comment-box {
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .my-comment {
            background-color: #e8f5e9;
        }

        .comment-header {
            background-color: #333;
            color: #fff;
            padding: 8px 12px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }

        .comment-content {
            padding: 10px 12px;
            font-size: 16px;
        }

        .comment-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
            margin-bottom: 10px;
        }

        .comment-form button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
@endpush

@section('content')
    <div class="container question-box">

        @foreach ($questions as $question)
            <div class="question-header">
                <div class="header-top">
                     <div class="info">Owner: {{ $question->user->name }}</div>
                    <div class="date">{{ $question->created_at}}</div>
                </div>
                <p class="question-text">{{ $question->question }}</p>
            </div>

            <div class="comments">
                <p style="color: red; font-weight: 600;">Comments:</p>
                @foreach ($question->comments as $comment)
                    <div class="comment-box @if($comment->user_id == session('user')->id) my-comment @endif">
                        <div class="comment-header">
                            <span>{{ $comment->user->name }}</span>
                            <span>{{ $comment->created_at->format('Y-m-d H:i') }}</span>
                        </div>
                        <p class="comment-content">{{ $comment->content }}</p>
                    </div>
                @endforeach
            </div>

            <form action="{{ route('user.commentPost', ['questionId' => $question->id]) }}" method="POST" class="comment-form">
                @csrf
                <textarea name="content" cols="100" rows="4" placeholder="Enter text..."></textarea>
                <button type="submit" class="btn btn-primary">Post a comment</button>
            </form>

            <hr style="margin: 40px 0;">
        @endforeach

    </div>
@endsection
