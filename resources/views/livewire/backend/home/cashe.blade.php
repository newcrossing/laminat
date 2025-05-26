<div>
    @if($clear===null)
        <button type="button" class="btn btn-outline-primary mr-1 mb-1" wire:click="clearAll" wire:confirm="Снять с публикации?">
            <i class="bx bx-memory-card"></i><span class="align-middle ml-25">Очистить кеш</span>
        </button>

    @endif
    @if($clear===true)
        <button type="button" class="btn btn-success glow mr-1 mb-1"><i class="bx bx-check"></i>
            <span class="align-middle ml-25">Кеш очищен</span>
        </button>
    @endif
    @if($clear===false)
        <button type="button" class="btn btn-danger glow mr-1 mb-1"><i class="bx bx-x"></i>
            <span class="align-middle ml-25">Ошибка очистки</span>
        </button>
    @endif
</div>