<x-admin title="Manage Beverage">
    <div class="container mt-5 py-5">
        <x-card>
            <h3 class="text-uppercase fw-bold  text-gradient mb-4" style="letter-spacing: 0.1em">beverages List </h3>
            <a href="{{route('beverages.create')}}" class="btn btn-blue-3 mb-3">Add New beverages</a>
            @if ($beverages->count())
            <div>
                <small>Press 'Enter' to save the quantity after changing it</small>
            </div>
            <div class="table-responsive py-2">
                <table class="table table-striped table-bordered" id="dataTables">
                    <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Name</th>
                        <th scope="col">Outlet</th>
                        <th scope="col" class="col-1">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($beverages as $beverage)
                        <tr>
                            <th>{{$beverage->id}}</th>
                            <td>{{$beverage->beverageType->name}}</td>
                            <th>{{$beverage->name}}</th>
                            <td>{{$beverage->outlet->name}}</td>
                            <td>
                                <form action="{{ route('beverages.update-quantity', $beverage->id) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" value="{{ $beverage->quantity }}" name="quantity" class="form-control h-50">
                                    <button type="submit" hidden></button>
                                </form>
                            </td>
                            <td>{{$beverage->price}}</td>
                            <td>{{$beverage->rating}}</td>
                            <td class="d-flex justify-content-center gap-2 h-100 align-items-center"> 
                                <a  href="{{ env('APP_URL') . '/storage/beverage_photo/' . $beverage->photo }}" target="_blank">
                                    <button class="btn btn-primary rounded btn-sm" title="delete" id ="delete">
                                        <i class="fa-solid fa-image"></i>
                                    </button>
                                </a>
                                <a  href="{{ route('beverages.edit', $beverage->id) }}">
                                    <button class="btn btn-primary rounded btn-sm" title="delete" id ="delete">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                </a>
                                <a  href="#" data-bs-toggle ="modal" data-bs-target="#modal{{$beverage->id}}">
                                    <button class="btn btn-danger rounded btn-sm" title="delete" id ="delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
              @else <hr> <p class="text-center"> No Data</p>
            @endif    
        </x-card>
    </div>

    @foreach ($beverages as $beverage)
      <div class="modal fade p-5" id="modal{{$beverage->id}}" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered ">
              <div class="modal-content rounded-20 border-0 shadow p-5">
                  <div class="modal-headers mb-4">
                  <span class="fa-stack fa-4x d-block mx-auto" >
                      <i class="fas fa-circle fa-stack-2x text-danger"></i>
                      <i class="fas fa-exclamation fa-stack-1x fa-inverse"></i>
                  </span>
                  </div>
                  <div class="body mb-3">
                  <h1 class="fw-bold fs-3 text-center" > Are you sure want to delete "<span class="fw-bolder text-danger">{{$beverage->name}}</span>"? </h1>
                  <p class="text-warning"> note: this action can't be undone  </p>
                  </div>
                  <div class="footers">
                      <div class="row">
                      <div class="col">
                          <button type="button" class="btn btn-secondary w-100"  data-bs-dismiss="modal">Back</button>
                      </div>
                      <div class="col">
                          <form method="POST" action="{{route('beverages.destroy',$beverage->id)}}">
                          <input type="hidden" name="_method" value = "DELETE">
                              <button class="btn btn-danger rounded w-100"    title="delete">
                              Delete
                              </button>
                          @csrf
                          </form>
                      </div>
                      </div>  
                  </div>
              </div>
          </div>  
      </div>  
    @endforeach
</x-admin>
