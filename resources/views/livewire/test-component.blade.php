<form wire:submit="save">
    <label for="title">Title:</label>

    <input type="text" id="name" wire:model="name">
    <span>77
        @error('name') <span class="error">{{ $message }}енег енг</span> @enderror
    </span>


    <button
            type="submit"

    >
        Delete post
    </button>
</form>