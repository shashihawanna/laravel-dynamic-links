<x-app-layout>
    @section('title')
    <title> {{ __('Dashboard') }}</title>
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div class="flex justify-between mb-4">
                        <h1 class="text-lg font-bold text-gray-800 dark:text-gray-200">Created Pages List</h1>
                        <a href="{{ route('pages.create') }}" class="text-green-600 hover:text-green-900 ml-4">
                            <x-secondary-button id='create-btn'>
                                Create Page
                            </x-secondary-button>
                        </a>
                    </div>
                    <table id="pagesTable" class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    SR No.
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Title
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Url
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $index => $page)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $page->title }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $page->slug }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <!-- Action Buttons -->
                                    <a href="{{ route('pages.show', $page->slug) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">
                                        <x-primary-button id='show-btn'>
                                            Show
                                        </x-primary-button>
                                    </a>
                                    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-secondary text-green-600 hover:text-green-900 ml-4">
                                        <x-secondary-button id='edit-btn'>
                                            Edit
                                        </x-secondary-button>
                                    </a>

                                    <!-- Delete Form -->
                                    <form action="{{ route('pages.destroy', $page) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this page?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-4">
                                            <x-danger-button id='delete-btn'>
                                                Delete
                                            </x-danger-button>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @section('js')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#pagesTable').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 2
                }],
                "pageLength": 10,
                "language": {
                    "emptyTable": "No records found."
                }
            });
        });
    </script>
    @endsection
</x-app-layout>