<footer class="footer footer-light @if(!empty(config('admin.footerType'))){{config('admin.footerClass')}}@endif">
  <p class="clearfix mb-0">


    @if(config('admin.isScrollTop') === true)
    <button class="btn btn-primary btn-icon scroll-top" type="button">
      <i class="bx bx-up-arrow-alt"></i>
    </button>
    @endif
  </p>
</footer>
