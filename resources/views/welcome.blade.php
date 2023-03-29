@extends('layouts.app')

@section('content')

    @include('includes.front-end.sections.slider')

    <div class="feature-wrap style1 pt-100 pb-75 bg-whisper">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-10 offset-lg-1">
                    <div class="section-title style1 text-center mb-40">
                        <span>MOST POPULAR CURRENCY TOOLS</span>
                        <h2>Set Up &amp; Exchange Money From Your Cards In A Minute</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1000"
                     data-aos-delay="200">
                    <div class="feature-card style1">
                        <div class="feature-icon">
                            <i class="flaticon-hand"></i>
                        </div>
                        <h3><a href="send-money.html">Money Transfer</a></h3>
                        <p>Lorem ipsum dolor sit amet ametus conso tetur ading elitor fugit piatur iusto provid.</p>
                        <a href="send-money.html" class="link style1">Send Money <i
                                class="ri-arrow-right-s-line"></i></a>
                    </div>
                </div>
                <div class=" col-xxl-3 col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1000"
                     data-aos-delay="300">
                    <div class="feature-card style1">
                        <div class="feature-icon">
                            <i class="flaticon-pie-chart"></i>
                        </div>
                        <h3><a href="chart.html">Curreny Charts</a></h3>
                        <p>Lorem ipsum dolor sit amet ametus conso tetur ading elitor fugit piatur iusto provid.</p>
                        <a href="chart.html" class="link style1">View Charts<i class="ri-arrow-right-s-line"></i></a>
                    </div>
                </div>
                <div class=" col-xxl-3 col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1000"
                     data-aos-delay="400">
                    <div class="feature-card style1">
                        <div class="feature-icon">
                            <i class="flaticon-notification"></i>
                        </div>
                        <h3><a href="alerts.html">Rate Alerts</a></h3>
                        <p>Lorem ipsum dolor sit amet ametus conso tetur ading elitor fugit piatur iusto provid.</p>
                        <a href="alerts.html" class="link style1">Create Alerts<i class="ri-arrow-right-s-line"></i></a>
                    </div>
                </div>
                <div class=" col-xxl-3 col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1000"
                     data-aos-delay="500">
                    <div class="feature-card style1">
                        <div class="feature-icon">
                            <i class="flaticon-user-3"></i>
                        </div>
                        <h3><a href="register.html">Create Account</a></h3>
                        <p>Lorem ipsum dolor sit amet ametus conso tetur ading elitor fugit piatur iusto provid.</p>
                        <a href="register.html" class="link style1">Get Started <i
                                class="ri-arrow-right-s-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about-wrap style1 ptb-100">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-6 about-img-wrap" data-aos="fade-up" data-aos-duration="1000"
                             data-aos-delay="200">
                            <img src="{{asset('/')}}front-end/img/about/about-shape-4.png" alt="Image" class="about-shape-one bounce">
                            <div class="about-img">
                                <img src="{{asset('/')}}front-end/img/about/about-img-1.jpg" alt="Image">
                            </div>
                            <div class="about-img">
                                <img src="{{asset('/')}}front-end/img/about/about-img-2.jpg" alt="Image">
                            </div>
                        </div>
                        <div class="col-6 about-img-wrap lgm-70" data-aos="fade-down" data-aos-duration="1000"
                             data-aos-delay="300">
                            <img src="{{asset('/')}}front-end/img/shape-1.png" alt="Image" class="about-shape-two moveHorizontal">
                            <div class="about-img">
                                <img src="{{asset('/')}}front-end/img/about/about-img-3.jpg" alt="Image">
                            </div>
                            <div class="about-img">
                                <img src="{{asset('/')}}front-end/img/about/about-img-4.jpg" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div class="about-content">
                        <div class="content-title style1">
                            <span>ABOUT US</span>
                            <h2>Transfer &amp; Exchange Your Money Anytime Inthis World</h2>
                            <p>Best Strategic planning dolor sit amet consectetur adipiscing elit. Scel erus isque
                                ametus odio velit auctor nam elit nulla eget sodales dui pulvinar dolor strategic
                                planning dolor sit sectetur morethe.</p>
                        </div>
                        <div class="feature-item-wrap">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="flaticon-clicking"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Powerful Mobile &amp; Online App</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent
                                        sapien pellen tesque .</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="flaticon-alarm"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Brings More Transperency &amp; Speed</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent
                                        sapien pellen tesque.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="flaticon-setting"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Special For Multiple User Capabilities</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent
                                        sapien pellen tesque.</p>
                                </div>
                            </div>
                        </div>
                        <a href="about.html" class="btn style1">READ MORE<i class="ri-arrow-right-s-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="exchange-table-wrap pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="section-title style1 text-center mb-40">
                        <span>LIVE EXCHANGE RATES</span>
                        <h2>Exchange Money Across The World In Real Time With Lowest Fees</h2>
                    </div>
                </div>
            </div>
            <div class="exchange-table">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">
                            <div class="inverse">
                                <span>Inverse</span>
                                <input type="checkbox" id="switch"/>
                                <label for="switch">Toggle</label>
                            </div>
                        </th>
                        <th scope="col">Amount</th>
                        <th scope="col">Change(24h)</th>
                        <th scope="col">Chart(24h)</th>
                        <th scope="col"><span class="action"><i class="ri-edit-line"></i>Edit</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="country-flag">
                                <img src="{{asset('/')}}front-end/img/flag/usa.png" alt="Image">
                                US Dollar
                            </div>
                        </td>
                        <td>
                            120.54
                        </td>
                        <td>
                            <span class="text-green">+0.50%</span>
                        </td>
                        <td>
                            <img src="{{asset('/')}}front-end/img/chart-img/chart-1.png" alt="Image">
                        </td>
                        <td>
                            <button class="btn style1" type="button"><i class="ri-send-plane-line"></i>Send</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="country-flag">
                                <img src="{{asset('/')}}front-end/img/flag/japan.png" alt="Image">
                                Japanees Yen
                            </div>
                        </td>
                        <td>
                            134.76
                        </td>
                        <td>
                            <span class="text-green">+0.24%</span>
                        </td>
                        <td>
                            <img src="{{asset('/')}}front-end/img/chart-img/chart-2.png" alt="Image">
                        </td>
                        <td>
                            <button class="btn style1" type="button"><i class="ri-send-plane-line"></i>Send</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="country-flag">
                                <img src="{{asset('/')}}front-end/img/flag/uk.png" alt="Image">
                                British Pound
                            </div>
                        </td>
                        <td>
                            245.10
                        </td>
                        <td>
                            <span class="text-red">-0.30%</span>
                        </td>
                        <td>
                            <img src="{{asset('/')}}front-end/img/chart-img/chart-3.png" alt="Image">
                        </td>
                        <td>
                            <button class="btn style1" type="button"><i class="ri-send-plane-line"></i>Send</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="country-flag">
                                <img src="{{asset('/')}}front-end/img/flag/newzland.png" alt="Image">
                                Newzland Dollar
                            </div>
                        </td>
                        <td>
                            0.7564
                        </td>
                        <td>
                            <span class="text-red">-0.063%</span>
                        </td>
                        <td>
                            <img src="{{asset('/')}}front-end/img/chart-img/chart-4.png" alt="Image">
                        </td>
                        <td>
                            <button class="btn style1" type="button"><i class="ri-send-plane-line"></i>Send</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="country-flag">
                                <img src="{{asset('/')}}front-end/img/flag/canada.png" alt="Image">
                                Canadian Dollar
                            </div>
                        </td>
                        <td>
                            1.2741
                        </td>
                        <td>
                            <span class="text-red">-0.76%</span>
                        </td>
                        <td>
                            <img src="{{asset('/')}}front-end/img/chart-img/chart-5.png" alt="Image">
                        </td>
                        <td>
                            <button class="btn style1" type="button"><i class="ri-send-plane-line"></i>Send</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="country-flag">
                                <img src="{{asset('/')}}front-end/img/flag/france.png" alt="Image">
                                Swiss Franc
                            </div>
                        </td>
                        <td>
                            15.063
                        </td>
                        <td>
                            <span class="text-green">+0.26%</span>
                        </td>
                        <td>
                            <img src="{{asset('/')}}front-end/img/chart-img/chart-6.png" alt="Image">
                        </td>
                        <td>
                            <button class="btn style1" type="button"><i class="ri-send-plane-line"></i>Send</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <button type="button" class="add-currency"><span><i class="ri-add-circle-line"></i></span>Add
                        Currency
                    </button>
                </div>
                <div class="col-sm-6 text-sm-end">
                    <p class="update-status">Last Updated Jan 20, 2022</p>
                </div>
            </div>
        </div>
    </section>


    <section class="wh-wrap style1 ptb-100 bg-whisper">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-1 order-md-2 order-2" data-aos="fade-right" data-aos-duration="1000"
                     data-aos-delay="200">
                    <div class="wh-content">
                        <div class="content-title style1">
                            <span>CUEX CURRENCY TOOLS</span>
                            <h2>We Provide Currency Exchange Services World Wide</h2>
                            <p>Best Strategic planning dolor sit amet consectetur adipiscing elit. Scel erus isque
                                ametus odio velit auctor nam elit nulla eget sodales dui pulvinar dolor strategic
                                planning dolor sit sectetur morethe.</p>
                        </div>
                        <div class="feature-item-wrap">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="flaticon-tick"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Historical Currency Rates</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent
                                        sapien pellen tesque .</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="flaticon-tick"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Travel Expense Calculator</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent
                                        sapien pellen tesque.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="flaticon-tick"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Currency Email Updates</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent
                                        sapien pellen tesque.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-md-1 order-1" data-aos="fade-left" data-aos-duration="1000"
                     data-aos-delay="200">
                    <div class="row align-items-end">
                        <div class="col-6 wh-img-wrap">
                            <div class="wh-img">
                                <img src="{{asset('/')}}front-end/img/shape-7.png" alt="Image" class="wh-shape-one bounce">
                                <img src="{{asset('/')}}front-end/img/why-choose-us/wh-img-1.jpg" alt="Image">
                            </div>
                        </div>
                        <div class="col-6 wh-img-wrap">
                            <img src="{{asset('/')}}front-end/img/shape-8.png" alt="Image" class="wh-shape-two moveHorizontal">
                            <div class="wh-img">
                                <img src="{{asset('/')}}front-end/img/why-choose-us/wh-img-2.jpg" alt="Image">
                            </div>
                            <div class="wh-img">
                                <img src="{{asset('/')}}front-end/img/why-choose-us/wh-img-3.jpg" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="partner-wrap ptb-100">
        <div class="container">
            <div class="partner-slider owl-carousel">
                <div class="partner-item">
                    <img src="{{asset('/')}}front-end/img/partner/partner-1.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="{{asset('/')}}front-end/img/partner/partner-2.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="{{asset('/')}}front-end/img/partner/partner-3.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="{{asset('/')}}front-end/img/partner/partner-4.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="{{asset('/')}}front-end/img/partner/partner-5.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="{{asset('/')}}front-end/img/partner/partner-6.png" alt="Image">
                </div>
            </div>
        </div>
    </div>


    <div class="feature-wrap style1 pt-100 pb-75 bg-whisper">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-10 offset-lg-1">
                    <div class="section-title style1 text-center mb-40">
                        <span>PMAIN FEATURES</span>
                        <h2>We Care Very Much About Our Customer Satisfaction</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1000"
                     data-aos-delay="200">
                    <div class="feature-card style2">
                        <div class="feature-icon">
                            <i class="flaticon-shield"></i>
                        </div>
                        <h3>Secured Payment Service</h3>
                        <ul class="content-feature-list list-style">
                            <li><i class="flaticon-checked"></i>Adipiscing elild neque, diam nim etus porta viverra
                                pretium auctor nam sed.
                            </li>
                            <li><i class="flaticon-checked"></i>Lorem neque, diam nim etus porta viverra pretium auctor
                                ut nam sed.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1000"
                     data-aos-delay="300">
                    <div class="feature-card style2">
                        <div class="feature-icon">
                            <i class="flaticon-pie-chart"></i>
                        </div>
                        <h3>Low Cost &amp; Fast Exchange</h3>
                        <ul class="content-feature-list list-style">
                            <li><i class="flaticon-checked"></i>Adipiscing elild neque, diam nim etus porta viverra
                                pretium auctor nam sed.
                            </li>
                            <li><i class="flaticon-checked"></i>Lorem neque, diam nim etus porta viverra pretium auctor
                                ut nam sed.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1000"
                     data-aos-delay="400">
                    <div class="feature-card style2">
                        <div class="feature-icon">
                            <i class="flaticon-notification"></i>
                        </div>
                        <h3>Real Time Money Tracking</h3>
                        <ul class="content-feature-list list-style">
                            <li><i class="flaticon-checked"></i>Adipiscing elild neque, diam nim etus porta viverra
                                pretium auctor nam sed.
                            </li>
                            <li><i class="flaticon-checked"></i>Lorem neque, diam nim etus porta viverra pretium auctor
                                ut nam sed.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="currency-wrap pt-100 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="section-title style1 text-center mb-40">
                        <span>CURRENCY PROFILE</span>
                        <h2>Get These Local Account Details Just Like Pay A Local</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="currency-card">
                        <div class="currency-flag"><img src="{{asset('/')}}front-end/img/flag/usa.png" alt="Image"></div>
                        <div class="currency-info">
                            <h3>USD - US Dollar</h3>
                            <p>Adipiscing eliId nque diraam nim etrous porta vierra dolore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="currency-card">
                        <div class="currency-flag"><img src="{{asset('/')}}front-end/img/flag/eu.png" alt="Image"></div>
                        <div class="currency-info">
                            <h3>EUR - Euro</h3>
                            <p>Adipiscing eliId nque diraam nim etrous porta vierra dolore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="currency-card">
                        <div class="currency-flag"><img src="{{asset('/')}}front-end/img/flag/uk.png" alt="Image"></div>
                        <div class="currency-info">
                            <h3>GBP - British Pound</h3>
                            <p>Adipiscing eliId nque diraam nim etrous porta vierra dolore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="currency-card">
                        <div class="currency-flag"><img src="{{asset('/')}}front-end/img/flag/canada.png" alt="Image"></div>
                        <div class="currency-info">
                            <h3>CAD - Canadian Dollar</h3>
                            <p>Adipiscing eliId nque diraam nim etrous porta vierra dolore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="currency-card">
                        <div class="currency-flag"><img src="{{asset('/')}}front-end/img/flag/australia.png" alt="Image"></div>
                        <div class="currency-info">
                            <h3>AUD - Aus Dollar</h3>
                            <p>Adipiscing eliId nque diraam nim etrous porta vierra dolore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="currency-card">
                        <div class="currency-flag"><img src="{{asset('/')}}front-end/img/flag/japan.png" alt="Image"></div>
                        <div class="currency-info">
                            <h3>JPY - Japaneese Yen</h3>
                            <p>Adipiscing eliId nque diraam nim etrous porta vierra dolore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="currency-card">
                        <div class="currency-flag"><img src="{{asset('/')}}front-end/img/flag/india.png" alt="Image"></div>
                        <div class="currency-info">
                            <h3>INR - Indian Rupee</h3>
                            <p>Adipiscing eliId nque diraam nim etrous porta vierra dolore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="currency-card">
                        <div class="currency-flag"><img src="{{asset('/')}}front-end/img/flag/newzland.png" alt="Image"></div>
                        <div class="currency-info">
                            <h3>NZD - NZ Dollar</h3>
                            <p>Adipiscing eliId nque diraam nim etrous porta vierra dolore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="currency-card">
                        <div class="currency-flag"><img src="{{asset('/')}}front-end/img/flag/france.png" alt="Image"></div>
                        <div class="currency-info">
                            <h3>CHF - Swiss Franc</h3>
                            <p>Adipiscing eliId nque diraam nim etrous porta vierra dolore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="testimonial-wrap pb-100">
        <div class="container">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="section-title style1 text-center mb-40">
                    <span>OUR REVIEWS</span>
                    <h2>More Than 20,000+ Happy Customers Trust Our Services</h2>
                </div>
            </div>
            <div class="testimonial-slider-one owl-carousel">
                <div class="testimonial-card style3">
                    <div class="client-info-area">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="{{asset('/')}}front-end/img/testimonials/client-3.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h3>Jim Morison</h3>
                                <span>Director, BAT</span>
                            </div>
                        </div>
                        <div class="quote-icon">
                            <i class="flaticon-quotation-mark"></i>
                        </div>
                    </div>
                    <p class="client-quote">Lorem ipsum dolor sit amet adip elitions repellat tetur delni vel quam aliq
                        earum explibo dolor eme fugiat enim illumon.</p>
                </div>
                <div class="testimonial-card style3">
                    <div class="client-info-area">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="{{asset('/')}}front-end/img/testimonials/client-4.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h3>Alex Cruis</h3>
                                <span>CEO, IBAC</span>
                            </div>
                        </div>
                        <div class="quote-icon">
                            <i class="flaticon-quotation-mark"></i>
                        </div>
                    </div>
                    <p class="client-quote">Lorem ipsum dolor sit amet adip elitions repellat tetur delni vel quam aliq
                        earum explibo dolor eme fugiat enim illumon.</p>
                </div>
                <div class="testimonial-card style3">
                    <div class="client-info-area">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="{{asset('/')}}front-end/img/testimonials/client-5.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h3>Tom Haris</h3>
                                <span>Engineer, Olleo</span>
                            </div>
                        </div>
                        <div class="quote-icon">
                            <i class="flaticon-quotation-mark"></i>
                        </div>
                    </div>
                    <p class="client-quote">Lorem ipsum dolor sit amet adip elitions repellat tetur delni vel quam aliq
                        earum explibo dolor eme fugiat enim illumon.</p>
                </div>
                <div class="testimonial-card style3">
                    <div class="client-info-area">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="{{asset('/')}}front-end/img/testimonials/client-1.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h3>Harry Jackson</h3>
                                <span>Enterpreneur</span>
                            </div>
                        </div>
                        <div class="quote-icon">
                            <i class="flaticon-quotation-mark"></i>
                        </div>
                    </div>
                    <p class="client-quote">Lorem ipsum dolor sit amet adip elitions repellat tetur delni vel quam aliq
                        earum explibo dolor eme fugiat enim illumon.</p>
                </div>
                <div class="testimonial-card style3">
                    <div class="client-info-area">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="{{asset('/')}}front-end/img/testimonials/client-2.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h3>Chris Haris</h3>
                                <span>MD, ITec</span>
                            </div>
                        </div>
                        <div class="quote-icon">
                            <i class="flaticon-quotation-mark"></i>
                        </div>
                    </div>
                    <p class="client-quote">Lorem ipsum dolor sit amet adip elitions repellat tetur delni vel quam aliq
                        earum explibo dolor eme fugiat enim illumon.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-wrap pt-100 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="section-title style1 text-center mb-40">
                        <span>OUR BLOG</span>
                        <h2>Keep Up To Date With Global Content From Our Trusted Team</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1000"
                     data-aos-delay="200">
                    <div class="blog-card style1">
                        <div class="blog-img">
                            <img src="{{asset('/')}}front-end/img/blog/blog-1.jpg" alt="Image">
                            <a href="posts-by-category.html" class="blog-cat">Corporate</a>
                        </div>
                        <div class="blog-info">
                            <ul class="blog-metainfo  list-style">
                                <li><i class="ri-calendar-2-line"></i><a href="posts-by-date.html">May 22, 2022</a></li>
                                <li><i class="ri-chat-3-line"></i>No Comment</li>
                            </ul>
                            <h3><a href="blog-details-right-sidebar.html">How Exchange Rate Effect Your Business
                                    Growth</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1000"
                     data-aos-delay="300">
                    <div class="blog-card style1">
                        <div class="blog-img">
                            <img src="{{asset('/')}}front-end/img/blog/blog-2.jpg" alt="Image">
                            <a href="posts-by-category.html" class="blog-cat">Consumer</a>
                        </div>
                        <div class="blog-info">
                            <ul class="blog-metainfo  list-style">
                                <li><i class="ri-calendar-2-line"></i><a href="posts-by-date.html">May 13, 2022</a></li>
                                <li><i class="ri-chat-3-line"></i>No Comment</li>
                            </ul>
                            <h3><a href="blog-details-right-sidebar.html">How To Stop Currency From Being
                                    Overwhelmed</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1000"
                     data-aos-delay="400">
                    <div class="blog-card style1">
                        <div class="blog-img">
                            <img src="{{asset('/')}}front-end/img/blog/blog-3.jpg" alt="Image">
                            <a href="posts-by-category.html" class="blog-cat">Finance</a>
                        </div>
                        <div class="blog-info">
                            <ul class="blog-metainfo  list-style">
                                <li><i class="ri-calendar-2-line"></i><a href="posts-by-date.html">Apr 15, 2022</a></li>
                                <li><i class="ri-chat-3-line"></i>No Comment</li>
                            </ul>
                            <h3><a href="blog-details-right-sidebar.html">How To Transfer Money With International Debit
                                    Card</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('/')}}front-end/js/page/slider.js"></script>
@endsection
