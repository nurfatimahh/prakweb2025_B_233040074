@props(['categories'])

    {{-- Form Body --}}
    <form action="{{ route('dashboard.store')}}" method="POST">
        @csrf
        <div class="grid gap-6 md:grid-cols-2">
        {{-- Title --}}
        <div class="md:col-span-2">
            <label for="title" class="block mb-2.5 text-sm font-medium text-heading">
                Title
            </label>
            <input type="text" name="title" id="title"
                class="bg-neutral-secondary-medium border border-default text-heading text-sm rounded-base focus:ring-primary-soft outline-none focus:border-primary-soft block w-full p-2.5 placeholder:text-body"
                placeholder="Enter post title" />
        </div>

        {{-- Category --}}
        <div class="md:col-span-2">
            <label for="category_id" class="block mb-2.5 text-sm font-medium text-heading">
                Category
            </label>

            <select name="category_id" id="category_id"
                class="bg-neutral-secondary-medium border border-default text-heading text-sm rounded-base focus:ring-primary-soft outline-none focus:border-primary-soft block w-full p-2.5 placeholder:text-body"
                required>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- Excerpt --}}
        <div class="md:col-span-2">
            <label for="excerpt" class="block mb-2.5 text-sm font-medium text-heading">
                Excerpt
            </label>
            <textarea name="excerpt" id="excerpt" rows="3"
                class="block w-full p-2.5 text-sm text-heading bg-neutral-secondary-medium rounded-base border border-default focus:ring-primary-soft focus:border-primary-soft placeholder:text-body"
                placeholder="Write a short summary of your post">{{ old('excerpt') }}</textarea>
        </div>

        {{-- Body --}}
        <div class="md:col-span-2">
            <label for="body" class="block mb-2.5 text-sm font-medium text-heading">
                Body
            </label>
            <textarea name="body" id="body" rows="7"
                class="block w-full p-2.5 text-sm text-heading bg-neutral-secondary-medium rounded-base border border-default focus:ring-primary-soft focus:border-primary-soft placeholder:text-body"
                placeholder="Write your post content">{{ old('body') }}</textarea>
        </div>

    </div>

    {{-- Footer --}}
    <div class="flex items-center space-x-2 border-t border-default pt-4 md:pt-6 mt-6">

        <button type="submit"
            class="inline-flex items-center justify-center px-4 py-2 rounded-base bg-primary text-white text-sm font-medium hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary-soft">
            Save
        </button>

        <a href="{{ route('dashboard.index') }}"
            class="inline-flex items-center justify-center px-4 py-2 rounded-base border border-default bg-neutral-secondary-medium text-heading text-sm font-medium hover:bg-neutral-secondary hover:text-heading">
            Cancel
        </a>
    </div>

    {{-- Image Upload --}}
    <div class="col-span-2">
        <label for="image" class="block mb-2.5 text-sm font-medium text-heading">
            Upload Image
        </label>
        <input type="file" name="image" id="image"
            class="bg-neutral-secondary-medium border border-default text-heading text-sm rounded-base focus:ring-primary-soft outline-none focus:border-primary-soft block w-full p-2.5 placeholder:text-body" />
    </div>
</form>

{{-- contoh  --}}
<div>
    @error('nama_field')
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

{{-- implemetasi pada field title --}}
<div class="col-span-2">
    <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Title</label>
    <input type="text" name="title" id="title"
class="bg-neutral-secondary-medium border border-default text-heading text-sm rounded-base focus:ring-primary-soft outline-none focus:border-primary-soft block w-full p-2.5 placeholder:text-body">
    @error('title')
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror

    @error('nama_field') border-red-600 @enderror
    @error('nama_field') @else border-default-medium @enderror