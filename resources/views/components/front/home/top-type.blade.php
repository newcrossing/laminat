<div class="row appear-animate">
    <!-- End of Col -->
    <div class="col-12 mb-6">
        <div class="tab tab-nav-underline tab-nav-center">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
                @foreach($types as $type)
                    <li class="nav-item">
                        <a class="nav-link text-normal  @if ($loop->first) active @endif" href="#tab-{{$type->slug}}">{{$type->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-content">
            @foreach($types as $type)
            <div class="tab-pane @if ($loop->first) active @endif" id="tab-{{$type->slug}}">
                <div class="row">
                    <x-front.products.card :products="$type->products()->limit(12)->get()" col="2"/>
                </div>
            </div>
            <!-- End of Tab Pane -->
            @endforeach
        </div>
    </div>
    <!-- End of Col -->
</div>