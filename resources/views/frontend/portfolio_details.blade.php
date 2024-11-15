@extends("frontend.master")

@php
    $allMultiImages = App\Models\MultiImage::all();
@endphp

@section('main-content')

    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">{{ $portfolio->portfolio_title }}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $portfolio->portfolio_title }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__wrap__icon">
                <ul>
                    @foreach ($allMultiImages as $item)
                        <li><img src="{{ asset($item->multi_image) }}" alt=""></li>
                    @endforeach
                </ul>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- portfolio-details-area -->
        <section class="services__details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="services__details__thumb">
                            <img src="{{ asset($portfolio->portfolio_img) }}" alt="{{ $portfolio->portfolio_title }}">
                        </div>
                        <div class="services__details__content">
                            <h2 class="title">{{ $portfolio->portfolio_title }}</h2>
                            <p>{{ $portfolio->portfolio_title }}</p>
                            <ul class="services__details__list">
                                <li>Achieving effectiveness,</li>
                                <li>Perceiving and utilizing opportunities,</li>
                                <li>Mobilising resources,</li>
                                <li>Securing an advantageous position,</li>
                                <li>Meeting challenges and threats,</li>
                                <li>Directing efforts and behaviour and</li>
                                <li>Gaining command over the situation.</li>
                            </ul>
                            <p>{{ $portfolio->portfolio_description }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="services__sidebar">
                            <div class="widget">
                                <h5 class="title">Get in Touch</h5>
                                <form action="#" class="sidebar__contact">
                                    <input type="text" placeholder="Enter name*">
                                    <input type="email" placeholder="Enter your mail*">
                                    <textarea name="message" id="message" placeholder="Massage*"></textarea>
                                    <button type="submit" class="btn">send massage</button>
                                </form>
                            </div>
                            <div class="widget">
                                <h5 class="title">Project Information</h5>
                                <ul class="sidebar__contact__info">
                                    <li><span>Date :</span> January, 2021</li>
                                    <li><span>Location :</span> East Meadow NY 11554</li>
                                    <li><span>Client :</span> American</li>
                                    <li class="cagegory"><span>Category :</span>
                                        <a href="portfolio.html">Photo,</a>
                                        <a href="portfolio.html">UI/UX</a>
                                    </li>
                                    <li><span>Project Link :</span> <a href="portfolio-details.html">https://www.yournews.com/</a></li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="title">Contact Information</h5>
                                <ul class="sidebar__contact__info">
                                    <li><span>Address :</span> 8638 Amarica Stranfod, <br> Mailbon Star</li>
                                    <li><span>Mail :</span> yourmail@gmail.com</li>
                                    <li><span>Phone :</span> +7464 0187 3535 645</li>
                                    <li><span>Fax id :</span> +9 659459 49594</li>
                                </ul>
                                <ul class="sidebar__contact__social">
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio-details-area-end -->

    </main>
    <!-- main-area-end -->

@endsection
