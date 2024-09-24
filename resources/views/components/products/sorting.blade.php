<!-- Shop Top Start -->
<form action="" method="get" id="form-sorting" >
    @csrf
    <div class="ec-pro-list-top d-flex">
        <div class="col-md-3 ec-grid-list">
            <div class="ec-gl-btn">
                <button class="btn btn-grid active">
                    <img src="assets/images/icons/grid.svg" class="svg_img gl_svg" alt=""/>
                </button>
                <button class="btn btn-list">
                    <img src="assets/images/icons/list.svg" class="svg_img gl_svg" alt=""/>
                </button>
            </div>
        </div>
        <div class="col-md-9 ec-sort-select">

            <span class="sort-by">Наличие</span>
            <div class="ec-select-inner" >
                <select name="have" onchange="$('#form-sorting').submit();">
                    <option value="null" @selected(Request::get("have") =='null' )>Все</option>
                    <option value="1" @selected(Request::get("have")  =='pricey' )>В наличии</option>
                </select>
            </div>
            <span class="sort-by ml-3 pr-0">Сортировать</span>
            <div class="ec-select-inner">
                <select name="sorting" onchange="$('#form-sorting').submit();">
                    <option value="null" @selected(Request::get("sorting") =='null' )>По умолчанию</option>
                    <option value="pricey" @selected(Request::get("sorting")  =='pricey' )>Сначала дорогие</option>
                    <option value="cheaply" @selected(Request::get("sorting")  =='cheaply' )>Сначала дешевые</option>
                </select>
            </div>

        </div>
    </div>
</form>
<!-- Shop Top End -->