<section class="hero-wrap style1">
    <div class="container">
        <img src="{{asset('/')}}front-end/img/hero/hero-shape-1.png" alt="Image" class="hero-shape-one animationFramesTwo">
        <img src="{{asset('/')}}front-end/img/hero/hero-shape-2.png" alt="Image" class="hero-shape-two moveHorizontal">
        <img src="{{asset('/')}}front-end/img/hero/hero-shape-3.png" alt="Image" class="hero-shape-three bounce">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="hero-content" data-speed="0.06" data-revert="true">
                        <span data-aos="fade-up" data-aos-duration="1000"
                              data-aos-delay="200">FAST &amp; HASTLE FREE</span>
                    <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">The Most Powerful Money
                        Exchange Service In The World</h1>
                    <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">It is a long established
                        fact that a reader will be distracted by the reale he point of using Lorem Ipsum is that it
                        has a more-or-less normal valid equity.</p>
                    <a href="contact.html" class="btn style1" data-aos="fade-up" data-aos-duration="1000"
                       data-aos-delay="500">CONTACT US<i class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-currency-convert">
                    <div class="currency-converter-wrap">
                        <h5 class="text-center">Start Exchange</h5>

                        <form action="">
                            @csrf
                            <div class="form-group">
                                <label for="send_currency">Send</label>
                                <select name="send_currency" id="send_currency" required>
                                    <option value="">Select Currency</option>
                                    @foreach($send_currency as $item)
                                        <option value="{{$item->id}}" data-min="{{$item->min}}" data-max="{{$item->max}}">{{$item->name}} - {{$item->currency_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="receive_currency">Receive</label>
                                <select name="receive_currency" id="receive_currency" required>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="currency">Send Amount </label>
                                <input type="number" placeholder="Enter amount" id="send_amount" name="send_amount" required>
                            </div>
                            <div class="form-group">
                                <label for="currency">Receive Amount </label>
                                <input type="number" id="receive_amount" name="receive_amount" readonly required>
                            </div>
                            <button type="submit" class="btn style1">EXCHANGE NOW</button>
                        </form>

                    </div>
                    <div class="hero-currency-img" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <img src="{{asset('/')}}front-end/img/hero/hero-img-1.png" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
