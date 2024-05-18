<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="space-y-8 md:grid md:grid-cols-3 lg:grid-cols-4 auto-rows-fr md:gap-12 md:space-y-0 ">
                        @if(null !== $breweries)
                            @foreach($breweries as $brewery)
                                <div class="rounded overflow-hidden shadow-lg">
                                    <div class="px-6 py-4">
                                        <div class="font-bold text-xl mb-2">{{ $brewery['name'] }}</div>
                                        <p class="text-gray-700 text-base">
                                            Brewery Type: {{ $brewery['brewery_type'] }}
                                        </p>
                                    </div>
                                    <div class="px-6 pt-4 pb-2">
                                        <a href="{{ $brewery['website_url'] }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Go to the website!</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="mt-6 flex justify-end sm:gap-0.5 md:gap-3">
                        @if($currentPage > 1)
                            <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0" href="{{ route('dashboard', ['page' => $currentPage - 1]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </a>
                        @endif
                        @if($currentPage > 4)
                            <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0" href="{{ route('dashboard', ['page' => 1]) }}">1</a>
                        @endif
                        @for($i = 2; $i >= 1; $i--)
                            @if($currentPage - $i > 0)
                                <a class="max-sm:hidden relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                                   href="{{ route('dashboard', ['page' => $currentPage - $i]) }}"
                                >{{ $currentPage - $i }}</a>
                            @endif
                        @endfor
                        <a class="relative bg-indigo-600 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-200 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                           href="{{ route('dashboard', ['page' => $currentPage]) }}">{{ $currentPage }}</a>
                        @for($i = 1; $i <= 2; $i++)
                            @if($currentPage + $i < $pages)
                                <a class="max-sm:hidden relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                                   href="{{ route('dashboard', ['page' => $currentPage + $i]) }}"
                                >{{ $currentPage + $i }}</a>
                            @endif
                        @endfor
                        @if($currentPage < $pages - 4)
                            <a class="max-sm:hidden relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                               href="#">...</a>
                        @endif
                        @if($currentPage != $pages)
                            <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                               href="{{ route('dashboard', ['page' => $pages]) }}">{{ $pages }}</a>
                        @endif
                        @if($currentPage < $pages)
                            <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                               href="{{ route('dashboard', ['page' => $currentPage + 1]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
