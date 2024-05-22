<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="m-0 fs-3">{{ __("Welcome, ") }}<span class="fw-bold">{{ Auth::user()->name }}{{ __("!")}}</span> {{__("Have you read something new?") }}</p>
                </div>
            </div>

            <!-- Include the create form -->
            <div class="mt-4">
                @include('books.create', ['genres' => $genres])
            </div>

            <!-- Include the books index -->
            <div class="mt-8">
                @include('books.index', ['books' => $books])
            </div>
        </div>
    </div>
</x-app-layout>
