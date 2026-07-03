<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Notes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen p-2 sm:p-4 md:p-8 font-sans">
    <div class="max-w-5xl mx-auto">
        
        <!-- Mobile-first header design -->
        <header class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-8 gap-4">
            <div class="flex flex-col">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">My Notes</h1>
                <p class="text-xs sm:text-sm text-gray-500 mt-1">Organize your thoughts efficiently.</p>
            </div>
            <a href="{{ route('notes.create') }}" class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg shadow-sm transition-colors duration-200 flex justify-center items-center gap-2 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                <span class="block">New Note</span>
            </a>
        </header>

        <!-- Responsive card grid -->
        <main class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
            
            @forelse($notes as $note)
                <article class="bg-white p-4 sm:p-5 rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-indigo-300 transition-all duration-200 flex flex-col h-56 sm:h-64">
                    <div class="flex-1 flex flex-col">
                        <h2 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 truncate" title="{{ $note->title }}">
                            {{ $note->title }}
                        </h2>
                        <p class="text-gray-600 text-xs sm:text-sm leading-relaxed line-clamp-4 wrap-break-word flex-1">
                            {{ $note->content }}
                        </p>
                    </div>
                    
               
                    <footer class="flex flex-col sm:flex-row justify-between items-start sm:items-center text-xs text-gray-400 mt-4 pt-4 border-t border-gray-50 gap-2 sm:gap-0">
                        <span class="mb-1 sm:mb-0">{{ $note->created_at->format('M d, Y') }}</span>
                        <div class="flex items-center gap-2 sm:gap-3">
                            <a href="{{ route('notes.edit', $note) }}" class="text-indigo-500 hover:text-indigo-700 font-medium transition-colors">Edit</a>
                            <form action="{{ route('notes.destroy', $note) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium transition-colors">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </footer>
                </article>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center bg-white rounded-xl border border-dashed border-gray-300 py-10 sm:py-16 px-4 sm:px-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 sm:h-16 sm:w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-gray-500 font-medium text-base">No notes found.</p>
                    <p class="text-gray-400 text-xs sm:text-sm mt-1 text-center">Click "New Note" to create your first one.</p>
                </div>
            @endforelse

        </main>
    </div>
</body>
</html>