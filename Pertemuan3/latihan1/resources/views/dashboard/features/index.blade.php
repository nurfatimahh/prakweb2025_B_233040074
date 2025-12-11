<x-dasboard-layout>
    <x-slot:title>
        Manajemen Features
    </x-slot:title>

    <div class="max-w-5xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Manajemen Features</h1>
            <a href="{{ route('dashboard.features.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Buat Feature</a>
        </div>

        @if(session('success'))
            <div class="mb-4 text-sm text-green-700 bg-green-50 p-3 rounded">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Key</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Title</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($features as $f)
                        <tr>
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $f->key }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $f->title }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">
                                <a href="{{ route('dashboard.features.edit', $f) }}" class="text-indigo-600 hover:underline mr-3">Edit</a>
                                <form action="{{ route('dashboard.features.destroy', $f) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-dasboard-layout>
