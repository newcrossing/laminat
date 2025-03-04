
    <nav class="toolbox sticky-toolbox sticky-content fix-top">
        <div class="toolbox-left">
            <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle  btn-icon-left d-block d-lg-none">
                <i class="w-icon-category"></i><span>Фильтры</span>
            </a>
            <div class="toolbox-item toolbox-sort select-box text-dark">
                <label>Сортировать :</label>
                <select name="sorting" class="form-control" wire:model.change="sorting" >
                    <option value="null" @selected(Request::get("sorting") =='null' )>По умолчанию</option>
                    <option value="price-max" @selected(Request::get("sorting")  =='pricey' )>Сначала дорогие</option>
                    <option value="price-min" @selected(Request::get("sorting")  =='cheaply' )>Сначала дешевые</option>
                </select>
            </div>
        </div>
        <div class="toolbox-right">
            <div class="toolbox-item toolbox-sort select-box">

                <select name="count" class="form-control" wire:model.change="count">
                    <option value="24" selected="selected"> 24</option>
                    <option value="48">48</option>
                    <option value="72">72</option>
                </select>
            </div>
        </div>
    </nav>

