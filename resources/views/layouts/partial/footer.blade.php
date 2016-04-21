<footer>
    <div class="footer-right">
        <a href="http://weibo.com/{{ $setting->weibo }}" target="blank">
            <i class="fa fa-footer fa-weibo"></i>
        </a>
        <a href="http://facebook.com/{{ $setting->facebook }}" target="blank">
            <i class="fa fa-footer fa-facebook"></i>
        </a>
        <a href="http://twitter.com/{{ $setting->twitter }}" target="blank">
            <i class="fa fa-footer fa-twitter"></i>
        </a>
    </div>
    <div class="footer-left">
        <p class="footer-links">{{ $setting->company }}</p>
        <p>Company Name © 2016</p>
    </div>
</footer>