<x-dasboard-layout>
    <x-slot:title>
        Edit Feature
    </x-slot:title>

    <div class="max-w-3xl mx-auto px-6 py-8">
        <h1 class="text-2xl font-semibold mb-4">Edit Feature</h1>

        <form action="{{ route('dashboard.features.update', $feature) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700">Key</label>
                <input name="key" value="{{ old('key', $feature->key) }}" class="mt-1 block w-full rounded-md border border-gray-200 px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input name="title" value="{{ old('title', $feature->title) }}" class="mt-1 block w-full rounded-md border border-gray-200 px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" class="mt-1 block w-full rounded-md border border-gray-200 px-3 py-2" rows="4">{{ old('description', $feature->description) }}</textarea>
            </div>

            <div>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Simpan Perubahan</button>
                <a href="{{ route('dashboard.features.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</x-dasboard-layout>
