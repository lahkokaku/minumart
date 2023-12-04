<x-user title="Finish Order">
    <div class="container my-5 py-5">
        <div class="mt-5 pt-5 mb-3 text-center">
            <span class="fa-stack fa-4x">
                <i class="fas fa-circle fa-stack-2x text-success"></i>
                <i class="fas fa-check fa-stack-1x fa-inverse"></i>
            </span>
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