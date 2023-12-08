<x-layout title="{{ $title }}">
    <x-navbar></x-navbar>
    <div>
        {{ $slot }}
    </div>
    {{-- <x-footer></x-footer> --}}
</x-layout>