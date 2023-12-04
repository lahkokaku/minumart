<x-guest title="Outlet List">
    <section class="container py-5 my-5">
        @foreach ($outlets as $outlet)
            <a href="{{route("beverage-orders.index", [$outlet->id])}}" > {{$outlet->name}}</a>
        @endforeach
    </section>

</x-guest>