<x-guest title="Minumart">
    <section id="hero" class="">
        <div class="m-0 pb-5">
            <div class="position-relative text-white">
                <div class="position-absolute bottom-50 start-50" data-aos="fade-left">
                    <h1 class="text-sm-start" style="font-size: 100px">Minumart</h1>
                    <p class="text-sm-start" style="font-size: 18px">It is best to start your day with a cup of coffee. <br>Discover the best flavours coffee you will everhave.</p>
                    <a href="{{ route('outlets.index') }}">
                        <button type="button" class="btn btn-primary btn-lg text-white" style="border-radius: 20px">Order Now</button>
                    </a>
                </div>
                <img src="https://images.unsplash.com/photo-1497515114629-f71d768fd07c?q=80&w=2084&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D " alt="" class="img-fluid block mx-auto w-100" >
            </div>

        </div>
        <div class="container py-5" data-aos="fade-right">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-6 pb-4 pt-4">
                    <h1>Fantastic Beverage Shop Story</h1> <hr>
                    <p class="my-3" style="text-align: justify; font-size:18px">
                        In the heart of a lively neighborhood, the enchanting aroma of beverage wafted through the air, beckoning patrons to the quaint sanctuary known as "Minumart." This beverage shop's journey unfolded like a rich tapestry, woven with passion by its visionary founder, Alex.
                        <br><br>
                        Minumart began as a modest venture, a dream painted in the hues of refreshing beverage. With every cup poured, the shop became a haven where conversations flowed like a gentle stream. From bleary-eyed mornings to vibrant evenings, Minumart evolved into a cultural epicenter, hosting art exhibitions, live performances, and community events.
                        <br><br>
                        As the seasons changed, so did Minumart's offerings, introducing unique blends that reflected the diversity of its patrons. The shop's ambiance mirrored the ebb and flow of life—a comforting constant in the midst of change. Through laughter, shared stories, and the comforting ritual of sipping warmth, Minumart etched its tale into the hearts of those who sought refuge within its welcoming walls.</p>

                    <button type="button" class="btn btn-blue-3 btn-lg" style="border-radius: 20px">Read More</button>
                </div>
                <div class="col-12 col-lg-6 pb-4">
                    <img src="https://images.unsplash.com/photo-1511920170033-f8396924c348?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid rounded-pill" width="500px" alt="">
                </div>
            </div>
        </div>


        <div class="container py-5" data-aos="fade-left">
            <h1 class="text-center pb-3">Testimonials</h1> <hr>
            {{-- <h1 class="text-center pb-3">Our Customer Says</h1> --}}
            <div class="row py-4">
                <div class="col text-center">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="card mb-3 text-white" style="background-color: #00B4D8">
                                    <div class="card-body py-3 mx-5" >
                                        <p>⭐⭐⭐⭐⭐</p>
                                        <p class="card-text mx-5">"Honey Green Tea are a game-changer! As a wellness enthusiast, I appreciate the calming blend of flavors that instantly transports me to a state of relaxation. Emma Thompson approves!"</p>
                                        <h5 class="card-title">Emma Thompson</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card mb-3 text-white" style="background-color: #00B4D8">
                                    <div class="card-body py-3 mx-5" >
                                        <p>⭐⭐⭐⭐⭐</p>
                                        <p class="card-text mx-5">"Choco Milk Tea innovative beverage line adds a burst of excitement to my daily routine. The vibrant flavors and smooth textures are unparalleled. Marcus Rodriguez gives it two thumbs up!"</p>
                                        <h5 class="card-title">Marcus Rodriguez</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card mb-3 text-white" style="background-color: #00B4D8">
                                    <div class="card-body py-3 mx-5" >
                                        <p>⭐⭐⭐⭐⭐</p>
                                        <p class="card-text mx-5">"Roasted Vanilla Milk Tea is my new go-to for a burst of freshness! The zesty combinations are simply delightful, and I love how it brightens up my day. Aisha Patel recommends it to anyone looking for a flavorful pick-me-up!"</p>
                                        <h5 class="card-title">Luna Rossi</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
            </div>
        </div>
    </section>
</x-guest>
