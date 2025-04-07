<div class="input-group">
    <select class="form-select select2" wire:model="search_menu" id="search_menu">
        <option value="cms.index" {{ Route::is('cms.index') ? 'selected' : null }}>
            {{ trans('index.home') }}
        </option>
    </select>

    <button class="btn btn-light border-0 rounded-0" type="submit" wire:click="submit">
        <span class="fas fa-location-arrow fa-fw"></span>
    </button>
</div>

@push('script')
    <script>
        $("#search_menu").on("change", function() {
            @this.set("search_menu", $(this).val())
        })
    </script>
@endpush
