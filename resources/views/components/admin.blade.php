<x-layout title="{{ $title }}">
    <x-navbar-admin></x-navbar-admin>
    <x-sidebar-admin></x-sidebar-admin>
    <div>
        {{ $slot }}
    </div>
</x-layout>