<x-dasboard-layout xmlns:x-slot="http://www.w3.org/1999/xhtml">
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <h1 class="text-4xl font-bold text-gray-800 mb-4">haiiii</h1>

    {{-- Success Alert --}}
    @if(session('success'))
    <div class="flex items-center p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft border-success-subtle" role="alert">
        <svg class="w-4 h-4 me-2 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11v5m-0.5-5H10m2.5-.8h.01M12 1.8 9.9 0 9 1.8Z"/>
        </svg>
        <p class="flex-1"><span class="font-medium me-1">Success!</span> {{ session('success') }}</p>
        <button type="button" onclick="this.parentElement.remove()" class="ms-auto -mx-1.5 -my-1.5 bg-success-soft text-success-foreground rounded-base focus:ring-2 
        focus:ring-success-subtle p-1.5 hover:bg-success-soft inline-flex items-center justify-center h-8 w-8">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif

    @include('component.table')
</x-dasboard-layout>