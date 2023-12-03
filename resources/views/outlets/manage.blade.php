<x-admin title="Manage Outlet">
    <div class="container mt-5 py-5">
        <x-card>
            <h3 class="text-uppercase fw-bold text-blue-4 mb-4" style="letter-spacing: 0.1em">Outlets List</h3>
            <a href="{{route('outlets.create')}}" class="btn btn-blue-3 mb-3">Add New Outlet</a>
            @if ($outlets->count())
            <div class="table-responsive py-2">
                <table class="table table-striped table-bordered" id="dataTables">
                    <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Open Time</th>
                        <th scope="col">Closed TIme</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($outlets as $outlet)
                        <tr>
                            <th>{{$outlet->id}}</th>
                            <th>{{$outlet->name}}</th>
                            <td>{{$outlet->address}}</td>
                            <td>{{$outlet->open_time}}</td>
                            <td>{{$outlet->closed_time}}</td>
                            <td>{{$outlet->is_open == 1 ? "Open" : "Closed"}}</td>
                            <td class="d-flex justify-content-center gap-2 h-100 align-items-center"> 
                                <a  href="{{ env('APP_URL') . '/storage/outlet_photo/' . $outlet->photo }}" target="_blank">
                                    <button class="btn btn-primary rounded btn-sm" title="photo" id ="photo">
                                        <i class="fa-solid fa-image"></i>
                                    </button>
                                </a>
                                <a  href="{{ route('outlets.edit', $outlet->id) }}">
                                    <button class="btn btn-primary rounded btn-sm" title="Edit" id ="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                </a>
                                <form  action="{{ route('outlets.update-status', $outlet->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn {{ $outlet->is_open == 1 ? 'btn-success' : 'btn-warning' }} rounded btn-sm" type="submit" title="Update Status" id ="Update Status">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </form>
                                <a  href="#" data-bs-toggle ="modal" data-bs-target="#modal{{$outlet->id}}">
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

    @foreach ($outlets as $outlet)
      <div class="modal fade p-5" id="modal{{$outlet->id}}" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered ">
              <div class="modal-content rounded-20 border-0 shadow p-5">
                  <div class="modal-headers mb-4">
                  <span class="fa-stack fa-4x d-block mx-auto" >
                      <i class="fas fa-circle fa-stack-2x text-danger"></i>
                      <i class="fas fa-exclamation fa-stack-1x fa-inverse"></i>
                  </span>
                  </div>
                  <div class="body mb-3">
                  <h1 class="fw-bold fs-3 text-center" > Are you sure want to delete "<span class="fw-bolder text-danger">{{$outlet->name}}</span>"? </h1>
                  <p class="text-warning"> note: this action can't be undone  </p>
                  </div>
                  <div class="footers">
                      <div class="row">
                      <div class="col">
                          <button type="button" class="btn btn-secondary w-100"  data-bs-dismiss="modal">Back</button>
                      </div>
                      <div class="col">
                          <form method="POST" action="{{route('outlets.destroy',$outlet->id)}}">
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
