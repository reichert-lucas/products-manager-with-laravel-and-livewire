<x-button {{ $attributes->merge([
    'class' => 'text-sm px-4 py-2 rounded-lg bg-white-500 hover:bg-white-600'
]) }}>
    {{$slot}}
</x-button>