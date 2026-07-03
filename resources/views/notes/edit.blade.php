@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-6 px-2 sm:px-6 lg:px-8">
    <div class="w-full max-w-xl bg-white p-6 sm:p-8 rounded-2xl shadow-md border border-gray-100">

        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Note</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('notes.update', $note) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold mb-1" for="title">Title</label>
                <input
                    id="title"
                    type="text"
                    name="title"
                    class="block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-gray-800 py-2 px-3 text-base transition sm:text-sm"
                    value="{{ old('title', $note->title) }}"
                    required
                    autocomplete="off"
                    placeholder="Enter title">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1" for="content">Content</label>
                <textarea
                    id="content"
                    name="content"
                    rows="6"
                    class="block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-gray-800 py-2 px-3 text-base transition sm:text-sm resize-none"
                    required
                    placeholder="Enter your note">{{ old('content', $note->content) }}</textarea>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 mt-6">
                <button type="submit" class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors">
                    Update Note
                </button>
                <a href="{{ route('notes.index') }}"
                   class="w-full sm:w-auto border border-gray-300 text-gray-700 hover:text-indigo-600 hover:border-indigo-400 font-semibold py-2 px-6 rounded-lg text-center transition-colors">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>
@endsection