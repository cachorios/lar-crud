@props([
    'name' => '',
    'leadingAddOn' => false,

])

@php
if( $attributes['wire:model'])
    $name = $attributes['wire:model'];
elseif ($attributes['wire:model.live'])
    $name = $attributes['wire:model.live'];
elseif ($attributes['wire:model.blur'])
    $name = $attributes['wire:model.blur'];
else
    $name = $attributes['name'];

@endphp


@if ($leadingAddOn)

    <div class="flex rounded-md shadow-sm  w-full">
        <span
            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
            {{ $leadingAddOn }}
        </span>
        <input
            {!! $attributes->merge(
            ['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm' . ($leadingAddOn ? ' rounded-none rounded-r-md' : '')]) !!}
            name="{{ $name }}">
    </div>
    <x-input-error for="{{ $name }}" class="mt-2"/>
@else
    <div class="flex   w-full">

        <input
            {!! $attributes->merge(
            ['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm' . ($leadingAddOn ? ' rounded-none rounded-r-md' : '')]) !!}
            name="{{ $name }}">
    </div>
    <x-input-error for="{{ $name }}" class="mt-2"/>
@endif
