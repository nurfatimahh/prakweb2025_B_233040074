<x-dasboard-layout>
    <x-slot:title>Edit Kategori</x-slot:title>

    <div class="max-w-3xl mx-auto px-6 py-8">
        <h1 class="text-2xl font-semibold mb-4">Edit Kategori</h1>

        <form action="{{ route('dashboard.categories.update', $category) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input name="name" value="{{ old('name', $category->name) }}" class="mt-1 block w-full rounded-md border border-gray-200 px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Slug (unique)</label>
                <input name="slug" value="{{ old('slug', $category->slug) }}" class="mt-1 block w-full rounded-md border border-gray-200 px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Image</label>
                @if($category->image)
                    <div class="mb-2"><img src="{{ Storage::disk('public')->url($category->image) }}" alt="" class="w-48 h-24 object-cover rounded"></div>
                @endif
                <input type="file" name="image" accept="image/*" class="mt-1 block w-full" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" class="mt-1 block w-full rounded-md border border-gray-200 px-3 py-2" rows="4">{{ old('description', $category->description) }}</textarea>
            </div>

            <div>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Simpan Perubahan</button>
                <a href="{{ route('dashboard.categories.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</x-dasboard-layout>
