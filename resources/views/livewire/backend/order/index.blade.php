<div>
    <section id="table-Marketing">
        <div class="card">
            <div class="table-responsive">
                <!-- table start -->
                <table id="table-marketing-campaigns" class="table mb-0">
                    <thead>
                    <tr>
                        <th>Номер заказа</th>
                        <th>Товары</th>
                        <th>Сумма заказа</th>
                        <th>Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr wire:key="{{$order->id}}">
                            <td class="">
                                <a class="" href="{{route('backend.order.edit',$order->id)}}">
                                    {{ $order->order_number }}
                                </a>
                                <div class="font-small-3">{{$order->created_at->diffForHumans()}}</div>
                            </td>
                            <td class="">
                                @foreach($order->products as $product)
                                    @php
                                        /** @var \App\Models\Product  $product */
                                    @endphp
                                    <div class="small text-muted">{{$product->getFullName()}} x {{$product->pivot->count}}</div>
                                @endforeach
                            </td>
                            <td class="text-bold-600 ">
                                {{ Number::format($order->price_total)}} руб.
                            </td>
                            <td class="">
                                <span class="badge {{$order->status->color()}}">{{$order->status->name()}}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if($allCount-$count > 0)
                    <div class="ml-3 mr-3">
                        <button type="button" wire:click="loadMore" class="btn mb-1 btn-outline-primary btn-lg btn-block">Загрузить еще ({{$allCount-$count}})</button>
                    </div>
                @endif
                <!-- table ends -->
            </div>
        </div>
    </section>
</div>
