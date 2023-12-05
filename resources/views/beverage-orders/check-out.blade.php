<x-layout>
    <div class="container-md my-5 w-100" > 
        <div class="row bg-dark-blue px-4 py-4 rounded ">
            <div class="col ">
                <div class="card rounded p-4 bg-light-blue m-0">
                    <h1 class="fw-bold m-0 text-white"> Your Order</h1>
                    <hr class="border border-1 border-dark">
                    @for ($i = 0; $i < count($id); $i++)
                        @php
                            $beverage = $beverages->where("id", $id[$i])->first() 
                        @endphp
                         
                        <div class=" w-100 rounded mb-4 bg-white row p-2 py-3 mx-auto justify-content-between align-items-center ">
                            <div class="col-6">
                                <img src="/storage/beverage_photo/{{ $beverage->photo }}"alt="" class="img-fluid rounded shadow">
                            </div>
                            <div class="col-6">
                                <h5 class="fw-bold"> {{$beverage->name}}</h5>
                                <div class="d-flex justify-content-between">
                                    <p>Price</p>
                                    <p>Rp {{$beverage->price}}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Quantity</p>
                                    <p> {{$quantity[$i]}}</p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p>Beverage Type</p>
                                    <p>{{$beverage->beverageType->name}}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Outlet</p>
                                    <p>{{$beverage->outlet->name}}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Total</p>
                                    <p>Rp {{$beverage->price * $quantity[$i]}}</p>
                                </div>
                            </div>
                        </div>
                    @endfor

                    <hr class="border border-1 border-dark mt-0 mb-3" >
                    <div class="d-flex text-white justify-content-between">
                        <h3> Grand Total</h1>
                        <h3 class="fw-bold"> Rp {{$grandTotal}}</h3>
                    </div>
                </div>
            </div>

            <form action="{{route("beverage-orders.checkout")}}" class="mt-3" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="text" hidden name="beverage_id" value="{{implode(",",$id)}}">
                <input type="text" hidden name="outlet_id" value="{{$outlet->id}}">
                <input type="text" hidden name="quantity" value="{{implode(",",$quantity)}}">
                <input type="text" hidden name="grand_total" value="{{$grandTotal   }}">
                
                <button type="submit" class="btn bg-light-blue text-white rounded-pill w-100 btn-info"> 
                    Continue 
                </button>
                
            </form>
        </div>
    </div>
</x-layout>
