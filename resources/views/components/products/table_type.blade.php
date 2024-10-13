@php
    /* @var $product \App\Models\Product */
@endphp
@foreach($types as $type)
    <div class="ec-vendor-dashboard-card space-bottom-30">
        <div class="ec-vendor-card-header">
            <h5>{{$type->name}} ({{count($type->productsPublic)}})</h5>
            <div class="ec-header-btn">
                <a class="btn btn-lg btn-primary" href="#">Посмотреть все </a>
            </div>
        </div>
        <div class="ec-vendor-card-body">
            <div class="ec-vendor-card-table">
                <table class="table ec-table">
                    <tbody>
                    @foreach($type->productsPublic as $product)
                        <tr>
                            <td>
                                @if($img = $product->foto)
                                    <img class="prod-img" src="{{ Croppa::url($img->getUrlForCroppa(),300,300,['quadrant']) }}">
                                @endif
                            </td>
                            <td><span class="font-weight-normal"> <a href="{{route('prod.show',$product->slug)}}">{{$product->getFullName()}} </a></span></td>
                            <td><span class="font-weight-bolder">{{ Number::format($product->price_metr,locale: 'ru')}} руб. м <sup>2</sup></span></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endforeach