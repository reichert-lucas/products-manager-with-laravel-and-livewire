@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'px-3 py-1.5 border rounded-lg shadow-sm outline-none focus:ring-2 focus:ring-primary-400 focus:outline-none focus:border-primary-400 transition-all duration-300']) !!}>
