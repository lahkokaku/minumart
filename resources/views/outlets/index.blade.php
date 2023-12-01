<x-layout>
    @foreach ($outlets as $outlet)
        <a href="{{route("beverage-orders.index", [$outlet->id])}}" > {{$outlet->name}}</a>
    @endforeach

</x-layout>