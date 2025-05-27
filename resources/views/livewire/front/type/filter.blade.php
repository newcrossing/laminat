<div class="sticky-sidebar">
    <div wire:loading>
        Loading data...
    </div>
    <div class="title-link-wrapper">
        <h2 class="title title-link">{{$type->name}} ({{$type->products_public_count}}) </h2>
    </div>
    <div class="filter-actions">
        <label>Фильтр:</label>
        <a  wire:click="clearAll" class="btn btn-dark btn-link font-size-sm font-weight-normal text-normal">Сбросить все</a>
    </div>

    <div class="alert alert-success  alert-block alert-inline show-code-action pr-2">
        <h4 class="alert-title">
            <i class=" w-icon-reviews"></i>Вы выбрали</h4>
        <ul class="font-weight-bold">
            <li>{{$type->name}}     </li>
            @if(!empty($selectFirm))
                <li                 >
                    <div>{{$selectFirm->name}} <i class="w-icon-times-solid" wire:click="removeFilter('firm')"  style="cursor: pointer"></i></div>
                </li>
            @endif
            @if(!empty($selectCollection))
                <li>{{$selectCollection->name}} <i class="w-icon-times-solid" wire:click="removeFilter('collection')"  style="cursor: pointer"></i></li>
            @endif
            @if($selectAttributes)
                @foreach($selectAttributes as $selectAttribute)
                    <li>{{$selectAttribute->name}}</li>
                    @foreach($selectAttribute->attributeOptions as $attributeOption)
                        <div class="font-weight-normal font-size-sm ml-0"><i class="w-icon-plus"></i> {{$attributeOption->value}}  <i class="w-icon-times-solid" wire:click="removeAttr" style="cursor: pointer"></i></div>
                    @endforeach
                @endforeach
            @endif
        </ul>
    </div>


    <!-- Start of Collapsible widget -->
    <div class="widget widget-collapsible">
        <h3 class="widget-title" style="border-bottom: 2px solid #336699;"><span>Производители</span></h3>
        <ul class="widget-body filter-items search-ul">
            @foreach($firms as $firm)
                <li class="d-flex justify-content-between align-items-center">
                    <a href="{{route('type.index',[ $type->slug,$firm->slug])}}" class="font-weight-bold pb-1">{{$firm->name}}</a>
                    <span>({{$firm->products_count}})</span>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- End of Collapsible Widget -->

    <!-- Start of Collapsible Widget -->
    <div class="widget widget-collapsible">
        <h3 class="widget-title mb-2" style="border-bottom: 2px solid #336699;"><span>Цена</span></h3>

        <div class="widget-body">
            <div wire:ignore>
                <input type="text" class="js-range-slider" name="my_range" value=""
                       data-type="double"
                       data-min="{{$priceMin}}"
                       data-max="{{$priceMax}}"
                       data-step="100"
                       data-from="{{$prices['from'] ?:$prices['min']}}"
                       data-to="{{$prices['to'] ?:$prices['max']}}"
                       data-grid="true"
                />
            </div>
{{--            <div class="price-range">--}}
{{--                <input type="text" id="price_input_from"  class="text-center " value="">--}}
{{--                <span class="delimiter">-</span>--}}
{{--                <input type="text" id="price_input_to"  class="text-center" value="">--}}
{{--                <input type="submit" class="btn btn-primary " value="Искать" style="color: white;width: 100%;">--}}
{{--            </div>--}}
        </div>
    </div>
    <!-- End of Collapsible Widget -->
    @foreach($attributes as $attribute)
        <!-- Start of Collapsible Widget -->
        <div wire:key="{{$attribute->id}}" class="widget widget-collapsible">
            <h3 class="widget-title text-normal" style="border-bottom: 2px solid #336699;"><span>{{$attribute->name}} </span></h3>
            <ul class="widget-body filter-items item-check mt-1">
                @foreach($attribute->attributeOptions as $attributeOption)
                    <li wire:key="{{$attributeOption->id}}" class="mb-1 d-flex justify-content-between align-items-center pl-3 ">
                        <div class="custom-radio">
                            <input type="checkbox"
                                   wire:model.boolean="selectAttributesId.{{$attribute->id}}.{{$attributeOption->id}}"
                                   wire:click="changeAttributes"
                                   value="{{$attributeOption->id}}"
                                   id="label{{$attributeOption->id}}"
                                   class="custom-control-input"
                            >
                            <label for="label{{$attributeOption->id}}" class="custom-control-label color-dark" style="display: block; cursor: pointer">
                                {{$attributeOption->value}}
                            </label>
                        </div>
                        <span class="text-default">({{$attributeOption->products_count}})</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- End of Collapsible Widget -->
    @endforeach


</div>

