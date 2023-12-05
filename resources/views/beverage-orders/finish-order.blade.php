<x-user title="Finish Order">
    <div class="container py-5 " >
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="/storage/assets/waiting.webp" class="img-fluid   w-100 d-block mx-auto" alt="waiting">
            </div>
        </div>
        <h5 class="text-center fs-2 mb-3">Your Order has been successfuly added. We have notified our staff about this. Please check your order status in the Dashboard. Catch you soon!</h5>
        <div class="row w-50 m-auto mb-5">
            <div class="col">
                <a href="/" class="btn btn-blue-3-outline w-100"> 
                    Home
                </a>
            </div>
            <div class="col">
                <a href="{{ route('dashboards.user') }}" class="btn btn-blue-3 w-100"> 
                    Dashboard
                </a>
            </div>
        </div>
    </div>
    
</x-user>