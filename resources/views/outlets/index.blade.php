<x-guest title="Outlet List">
    <style>
        .outlet a {
            background-size: auto;
            background-repeat: no-repeat;
            background-position: center;
            aspect-ratio: 1 / 1;
            opacity: 0.2;
            transition: 0.7s
        }

        .outlet a:hover{
            opacity: 0.4;
        }
    </style>
    <section class="container py-5 my-5">
        <h2 class="text-gr-b3-b4">Please Select Your Preferred Outlet</h2>
        <hr>
        <div class="row">
            @foreach ($outlets as $outlet)
                <div class="col-md-4 outlet mb-4 d-flex justify-content-center position-relative " >
                    <a href="{{ route('beverage-orders.index', [$outlet->id]) }}"
                        class="w-100 border rounded-4 overflow-hidden bg-image border border-2" 
                        style="background-image: url('/storage/outlet_photo/{{ $outlet->photo }}'); ">
                    </a>
                    <div class="position-absolute w-100 text-center px-4"
                        style="left:50%;top:50%; transform:translate(-50%,-50%)">
                        <h2 class="fw-bold"> <a href="{{ route('beverage-orders.index', [$outlet->id]) }}"
                                class="text-decoration-none text-blue-4" style="opacity: 1"> {{ $outlet->name }}</a></h2>
                        <div class="fw-bold">{{ $outlet->address }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</x-guest>
