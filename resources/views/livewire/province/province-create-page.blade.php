<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Province/</span> Create</h4>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Create new Province</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <!-- Event Details -->
                <div class="row g-3">
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="title">Name</label>
                        <input type="text" id="title" class="form-control" wire:model="name" />
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="pt-4 text-end">
                        <a href="{{route('provinces.index')}}" type="button" class="btn btn-label-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

