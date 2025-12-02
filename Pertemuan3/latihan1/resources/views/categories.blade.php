<x-layout>
    <x-slot:title>
        Categories
    </x-slot:title>
     <h1>Daftar Category</h1>
    @foreach ($categories as $category)
    <article>
        <h2>{{ $category->name }}</h2>
    </article>
    @endforeach
</x-layout>