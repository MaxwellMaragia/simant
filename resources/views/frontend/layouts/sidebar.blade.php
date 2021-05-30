<div class="col-lg-4 col-md-6 widget-area">

    <!-- Widget : Categories -->
    <aside class="widget widget_categories2">
        <h3 class="widget-title">Categories</h3>
        <div class="categories-box">
            <ul>

                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('category',$category->slug) }}" title="{{ $category->name }}">
                            <img src="{{ Storage::url($category->image) }}" alt="categories-img">
                            <span>{{ $category->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </aside><!-- Widget : Categories /- -->
    <!-- Widget : Instagram -->
    <div class="embedsocial-hashtag" data-ref="ed9ac0b6ceda0d4f08d37fab997a503c2874068c" ><a class="feed-powered-by-es" href="https://embedsocial.com/products/embedfeed/" target="_blank" title="Powered by EmbedSocial">Powered by EmbedSocial<span>→</span></a></div><script>(function(d, s, id){var js; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "https://embedsocial.com/cdn/ht.js"; d.getElementsByTagName("head")[0].appendChild(js);}(document, "script", "EmbedSocialHashtagScript"));</script>
    <!-- Widget : Follow Us -->
    <aside class="widget widget_social">
        <h3 class="widget-title">FOLLOW ME</h3>
        <ul>
            <li><a href="{{ $facebook->value }}" title="facebook" target="_blank"><i class="ion-social-facebook-outline"></i></a></li>
            <li><a href="{{ $twitter->value }}" title="twitter" target="_blank"><i class="ion-social-twitter-outline"></i></a></li>
            <li><a href="{{ $instagram->value }}" title="instagram" target="_blank"><i class="ion-social-instagram-outline"></i></a></li>
            <li><a href="{{ $linkedin->value }}" title="linkedin" target="_blank"><i class="ion-social-linkedin-outline"></i></a></li>
            <li><a href="mail:{{ $email->value }}" title="google" target="_blank"><i class="ion-social-google-outline"></i></a></li>
            <li><a href="Tel:{{ $mobile->value }}" title="mobile" ><i class="ion-social-android-outline"></i></a></li>
            <li><a href="https://wa.me/{{ $whatsapp->value }}" title="whatsapp"><i class="ion-social-whatsapp-outline"></i></a></li>
        </ul>
    </aside><!-- Widget : Follow Us /- -->

</div>
