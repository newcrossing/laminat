<div class="table-responsive">
    <table class="table invoice-data-table dt-responsive nowrap" style="width:100%">
        <thead>
        <tr>
            <th width="10%">
                <span class="align-middle">ID #</span>
            </th>
            <th>Название</th>
            <th>Расположение</th>
            <th>URL</th>
            <th>Публикация</th>
        </tr>
        </thead>
        <tbody>

        @forelse ($banners as $banner)
            <tr>
                <td>
                    {{ $banner->id }}
                </td>
                <td>
                    <a class="readable-mark-icon" href="{{route('backend.banner.edit',$banner)}}">{{ Str::limit($banner->name, 40)  }}</a>
                </td>
                <td>
                    {{ $banner->block }}
                </td>
                <td>
                    {{ $banner->url }}
                </td>
                <td>
                    @if($banner->public)
                        <div wire:click="tooglePublic({{$banner->id}})" wire:confirm="Снять с публикации?"
                             class="badge badge-success badge-icon mr-0 mb-1 cursor-pointer"
                             data-toggle="tooltip" data-placement="top" title="Опубликован на сайте"
                             data-original-title="Опубликован на сайте">
                            <i class="bx bxs-show"></i>
                        </div>
                    @else
                        <div class="badge badge-danger badge-icon mr-0 mb-1 cursor-pointer"
                             data-toggle="tooltip" data-placement="top" title="Снят с публикации"
                             data-original-title="Снят с публикации"
                             wire:click="tooglePublic({{$banner->id}})" wire:confirm="Опубликовать?">
                            <i class="bx bxs-hide"></i>
                        </div>
                    @endif
                </td>
            </tr>
        @empty
            <div class="alert border-warning alert-dismissible mb-2" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bx bx-error-circle"></i>
                    <span>Пока нет ни одной записи</span>
                </div>
            </div>
        @endforelse
        </tbody>
    </table>
</div>
