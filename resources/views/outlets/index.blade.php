<x-guest title="Outlet List">
    <style>
        .outlet a {
            background-size: auto;
            background-repeat: no-repeat;
            background-position: center;
            aspect-ratio: 1 / 1;
            opacity: 0.5;
            transition: 0.7s
        }

        .outlet a:hover{
            opacity: 1
        }
    </style>
    <section class="container py-5 my-5">
        <h1> Please Select Outlet Bellow </h1>
        <hr>
        <div class="row">
            @foreach ($outlets as $outlet)
                <div class="col-md-6 outlet mb-4 d-flex justify-content-center position-relative " >
                    <a href="{{ route('beverage-orders.index', [$outlet->id]) }}"
                        class=" w-100 border  rounded-pill overflow-hidden bg-image border border-2" 
                        style="background-image: url('/storage/outlet_photo/{{ $outlet->photo }}'); ">
                    </a>
                    <div class="position-absolute w-100 text-center"
                        style="left:50%;top:50%; transform:translate(-50%,-50%)">
                        <h1 class=" fw-bold"> <a href="{{ route('beverage-orders.index', [$outlet->id]) }}"
                                class="text-decoration-none  text-dark" style="opacity: 1"> {{ $outlet->name }}</a></h1>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</x-guest>
