<x-admin title="User Dashboard">
    {{ Auth::guard('web')->user()->name }}
</x-admin>