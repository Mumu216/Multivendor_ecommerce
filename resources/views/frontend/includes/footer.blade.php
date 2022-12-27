<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-menu">
                        <ul>
                            <li>
                                <a href="https://www.dreamstorebd.com/about-us">আমাদের সম্পর্কে</a>
                            </li>
                            <li>
                                <a href="https://www.dreamstorebd.com/delivery-policy">ডেলিভারি পলিসি</a>
                            </li>
                            <li>
                                <a href="https://www.dreamstorebd.com/return-policy">রিটার্ন পলিসি</a>
                            </li>
                        </ul>
                    </div>

                    <div class="social_links">
                        <ul>
                            <li>
                                <a class="facebook" target="_blank" href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="twitter" target="_blank" href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="instagram" target="_blank" href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a class="youtube" target="_blank" href="https://www.youtube.com"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="copyright_text">
                        @foreach(App\Models\Settings::all() as $settings)
                        <p>{!! $settings->copyright !!}</p>
                        @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
</footer>
