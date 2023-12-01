<x-layout>
    <div class="container mt-5">
        @foreach ($beverages as $beverage)
            <x-card-beverage>
                <img src="/storage/beverage_photo/{{ $beverage->photo }}" alt="" class="img-fluid">

                <div class="p-4">
                    <h2 class="card-title fw-bold display-6 m-0"> {{ $beverage->name }} </h2>
                    <p class="card-desc"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis sint iusto
                        rerum minus cum reiciendis veniam error in rem officiis?</p>

                    <div class="d-flex gap-3 align-items-center mb-3">
                        <button class="btn btn-outline-danger btnDecrement"> - </button>

                        <input type="text" class="input-spinner counter text-center p-0 border border-0"
                            step="1" value="0" min="0" max="10"
                            style="; background:
                        transparent; padding: 0; max-width:1.5rem"
                            readonly />

                        <button class="btn btn-outline-success btnIncrement"> + </button>
                    </div>
                    <button class="btn btn-primary add-to-cart"  data-id="{{$beverage->id}}" data-price="{{$beverage->price}}" data-name="{{$beverage->name}}"> + Add to cart </button>
                </div>
            </x-card-beverage>
        @endforeach

        <div class="cart position-fixed  " style="right:10px; top:10px;" id="cart">
            <button type="button" class="btn btn-primary">
                Carts <span class="ms-1 badge bg-light text-dark" id="cart-length">0</span>
            </button></h1>
        </div>

        <div class="position-fixed bg-white p-4 shadow-sm rounded d-none"  style="right:20px; top:50px;" id="cart-detail">
            <table class="table" >
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                  </tr>
                </thead>
                <tbody id="show-cart">
                  
                  
                </tbody>
              </table>
              <div>
                <p> Total : <span class="fw-bold" id="price">Rp 0 </span></p>
              </div>
        </div>
        
        <form action="{{route('beverage-orders.store')}}" id="form" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="text" value="" hidden id="id" name="id">
            <input type="text" value="" hidden id="quantity" name="quantity">
            <input type="text" value="{{$outlet->id}}" hidden id="outlet_id" name="outlet_id">
            <input type="text" value="" hidden id="grand_total" name="grand_total">
            <button class="btn btn-outline-success rounded-pill w-100 mb-4" type="submit"> Confirm Order</button>
        </form>

    </div>
</x-layout>
