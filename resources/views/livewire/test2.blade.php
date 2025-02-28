<div class="col-sm-3 col-12 dashboard-users-danger">
    <div class="card text-center">
        <div class="card-content">
            <div class="card-body py-1">
                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                    <i class="bx bx-pulse font-medium-5"></i>
                </div>
                @if ($public)
                    <a class="btn btn-primary" wire:click="toggleLike">
                        Опубликовано
                    </a>
                @else
                    <a class="btn btn-danger" wire:click="toggleLike" wire:confirm="Are you sure you want to delete this post?">
                        нет
                    </a>
                @endif

            </div>
        </div>
    </div>
</div>
