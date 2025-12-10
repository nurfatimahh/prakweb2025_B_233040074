{{-- Header with search and Add Post Button --}}
<div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center gap-4 bg-neutral-primary
gradient-to-r from-blue-50 to-indigo-50">
    <from method="GET" action="{{ route('dashboard.index') }}" class="flex-1">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" name="search" id="table-search"
                class="bg-neutral-primary border border-gray-300 text-gray-900 text-sm rounded-base focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Search for items" value="{{ request('search') }}">
        </div>
    </from>
        <a href="{{ route('dashboard.create') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-base font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Add Post
        </a>
</div>
{{-- Table --}}
<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Published At
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
            @forelse ($posts as $post)
                <tr class="bg-neutral-primary border-b border-default">
                    <td class="px-6 py-4">
                        {{ $posts->firstItem() +$loop->index }}
                    </td>
                    <th scope="row"
                        class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        {{ $post->title }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $post->category->name ??'Uncategorized' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('dashboard.show',$post->slug) }}"
                            class="text-blue-600 hover:underline">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                <td colspan="6" class="px-6 py12 text-center text-grey-500"> No posts yet. <a href="{{ route('dashboard.create')}}"
                    class="text-blue-600 hover:underline">Create one</a>
                        </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<th scope="col" class="px-6 py-3 font-medium">Image</th>

<td class="px-6 py-4">
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-16 h-16 object-cover rounded-base">
    @else
        <span class="text-gray-500">No Image</span>
    @endif
</td>

{{-- Pagination --}}
@if ($posts->hasPages())
    <div class="mt-4 mx-4">

        <nav aria-label="Page navigation">
            <ul class="flex items-center space-x-1">

                {{-- Previous Button --}}
                @if ($posts->onFirstPage())
                    <li>
                        <span class="flex items-center justify-center text-gray-400 bg-gray-100 border border-gray-300 cursor-not-allowed font-medium rounded-base text-sm px-3 py-1.5">
                            Previous
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $posts->previousPageUrl() }}"
                        class="flex items-center justify-center text-body bg-neutral-secondary box-border border border-default-medium hover:bg-neutral-tertiary text-heading font-medium rounded-base text-sm px-3 py-1.5 focus:outline-none">
                            Previous
                        </a>
                    </li>
                @endif

                {{-- Page Numbers --}}
                @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                    @if ($page == $posts->currentPage())
                        <li>
                            <span class="flex items-center justify-center text-white bg-brand-primary border border-brand-primary font-medium rounded-base text-sm px-3 py-1.5">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}"
                            class="flex items-center justify-center text-body bg-neutral-primary box-border border border-default-medium hover:bg-neutral-secondary font-medium rounded-base text-sm px-3 py-1.5 focus:outline-none">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach

                {{-- Next Button --}}
                @if ($posts->hasMorePages())
                    <li>
                        <a href="{{ $posts->nextPageUrl() }}"
                        class="flex items-center justify-center text-body bg-neutral-secondary box-border border border-default-medium hover:bg-neutral-tertiary text-heading font-medium rounded-base text-sm px-3 py-1.5 focus:outline-none">
                            Next
                        </a>
                    </li>
                @else
                    <li>
                        <span class="flex items-center justify-center text-gray-400 bg-gray-100 border border-gray-300 cursor-not-allowed font-medium rounded-base text-sm px-3 py-1.5">
                            Next
                        </span>
                    </li>
                @endif

            </ul>
        </nav>

    </div>
@endif
