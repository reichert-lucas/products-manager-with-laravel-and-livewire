<x-button {{ $attributes->merge([
    'class' => 'text-sm px-4 py-2 rounded-lg text-white bg-red-500 hover:bg-red-600'
]) }}>
    {{$slot}}
</x-button>