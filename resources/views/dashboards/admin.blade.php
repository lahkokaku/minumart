<x-admin title="Admin Dashboard">
    {{ Auth::guard('admin')->user()->name }}
</x-admin>