<x-button {{ $attributes->merge([
    'class' => 'text-sm px-4 py-2 rounded-lg text-white bg-primary-500 hover:bg-primary-600'
]) }}>
    {{$slot}}
</x-button>