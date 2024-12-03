<form action="" method="get" >
    @csrf

    <nav class="toolbox sticky-toolbox sticky-content fix-top">

        <div class="toolbox-left">
            <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle  btn-icon-left d-block d-lg-none">
                <i class="w-icon-category"></i><span>Фильтры</span>
            </a>
            <div class="toolbox-item toolbox-sort select-box text-dark">
                <label>Сортировать :</label>
                <select name="sorting" class="form-control"  onchange="this.form.submit()">
                    <option value="null" @selected(Request::get("sorting") =='null' )>По умолчанию</option>
                    <option value="pricey" @selected(Request::get("sorting")  =='pricey' )>Сначала дорогие</option>
                    <option value="cheaply" @selected(Request::get("sorting")  =='cheaply' )>Сначала дешевые</option>

                </select>
            </div>
        </div>
        <div class="toolbox-right">
            <div class="toolbox-item toolbox-sort select-box">

                <select name="count" class="form-control">
                    <option value="12" selected="selected"> 15</option>
                    <option value="24">30</option>
                    <option value="36">45</option>
                    <option value="36">60</option>
                </select>
            </div>

        </div>

    </nav>
</form>