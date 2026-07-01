@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>{{ $note->title }}</h3>

            <div>
                <a href="{{ route('notes.edit', $note) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <a href="{{ route('notes.index') }}" class="btn btn-secondary btn-sm">
                    Back
                </a>
            </div>
        </div>

        <div class="card-body">

            <p class="text-muted">
                Created:
                {{ $note->created_at->format('F d, Y h:i A') }}
            </p>

            <hr>

            <p style="white-space: pre-line;">
                {{ $note->content }}
            </p>

        </div>

        <div class="card-footer">

            <form action="{{ route('notes.destroy', $note) }}" method="POST">

                @csrf
                @method('DELETE')

                <button
                    class="btn btn-danger"
                    onclick="return confirm('Delete this note?')">
                    Delete Note
                </button>

            </form>

        </div>

    </div>

</div>
@endsection