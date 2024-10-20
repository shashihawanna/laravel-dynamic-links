<x-app-layout>
    @section('title')
    <title> {{ __('Edit Page: ') . $page->title }}</title>
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/grapes.min.css') }}">
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Page: ') . $page->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="p-12 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

            <section>
                <form action="{{ route('pages.update', $page->slug) }}" method="POST" class="mt-6 space-y-6">
                    @csrf
                    @method('PUT') <!-- Method override for update -->
                    <div>
                        <x-input-label for="title" :value="__('Page Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title', $page->title) }}" required />
                    </div>
                    <div id="gjs" style="height: 500px; border: 1px solid #ccc;"></div>

                    <div class="flex items-center gap-4">
                        <x-primary-button id='update-btn'>{{ __('Update Page') }}</x-primary-button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary text-green-600 hover:text-green-900 ml-4">
                            <x-secondary-button id='cancel-btn'>
                                Cancel
                            </x-secondary-button>
                        </a>
                    </div>

                </form>
            </section>

        </div>
    </div>

    @section('js')

    <script src="{{ asset('js/grapes.min.js') }}"></script>
    <script src="{{ asset('js/grapesjs-blocks-basic.js') }}"></script>
    <script src="{{ asset('js/grapesjs-navbar.js') }}"></script>
    <script src="{{ asset('js/grapesjs-plugin-forms.js') }}"></script>
    <script src="{{ asset('js/grapesjs-tui-image-editor.js') }}"></script>
    <script src="{{ asset('js/grapesjs-tabs.min.js') }}"></script>
    <script src="{{ asset('js/grapesjs-plugin-export.js') }}"></script>
    <script src="{{ asset('js/grapesjs-component-countdown.js') }}"></script>
    <script src="{{ asset('js/grapesjs-blocks-flexbox.js') }}"></script>
    <script src="{{ asset('js/grapesjs-tooltip.js') }}"></script>
    <script src="{{ asset('js/grapesjs-custom-code.js') }}"></script>
    <script src="{{ asset('js/grapesjs-indexeddb.js') }}"></script>
    <script src="{{ asset('js/grapesjs-parser-postcss.js') }}"></script>
    <script src="{{ asset('js/builder.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $('#update-btn').click(function(e) {
            e.preventDefault();
            const title = $('#title').val();
            const content = editor.getHtml();
            $.ajax({
                url: "{{ route('pages.update', $page->id) }}",
                method: 'PUT',
                data: {
                    title: title,
                    content: content,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    alert('Page updated successfully! Access it at /pages/' + response.page.slug);
                },
                error: function(error) {
                    alert('Error updating page.');
                }
            });
        });
        editor.setComponents({!! json_encode($page->content) !!}); 
    </script>
    @endsection
</x-app-layout>