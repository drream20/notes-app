@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">

        <div class="card-header">
            <h3>Edit Note</h3>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('notes.update', $note) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $note->title) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Content</label>

                    <textarea
                        name="content"
                        rows="6"
                        class="form-control"
                        required>{{ old('content', $note->content) }}</textarea>
                </div>

                <button class="btn btn-success">
                    Update Note
                </button>

                <a href="{{ route('notes.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </form>
        </div>
    </div>
</div>
@endsection