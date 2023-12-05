<x-layout title="{{ $title }}">
    <x-navbar-user></x-navbar-user>
    <x-sidebar-user></x-sidebar-user>
    <div >
        {{ $slot }}
    </div>
</x-layout>