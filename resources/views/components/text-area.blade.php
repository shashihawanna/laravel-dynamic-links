<textarea 
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }} 
    rows="{{ $rows ?? 3 }}">{{ $slot ?? old($name) }}</textarea>