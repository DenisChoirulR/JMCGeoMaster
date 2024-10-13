<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Resident/</span> Create</h4>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Create New Resident</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="row g-3">
                    <!-- Province Dropdown -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="province">Province</label>
                        <select id="province" class="form-control" wire:model.live="province_id">
                            <option value="">Select Province</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                        @error('province_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- City Dropdown -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="city">City</label>
                        <select id="city" class="form-control" wire:model="city_id" {{ !$cities ? 'disabled' : '' }}>
                            <option value="">Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- NIK Input -->
                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="nik">NIK</label>
                        <input type="text" id="nik" class="form-control" wire:model="nik" />
                        @error('nik')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Name Input -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" class="form-control" wire:model="name" />
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row mt-3">
                    <div class="pt-4 text-end">
                        <a href="{{ route('residents.index') }}" type="button" class="btn btn-label-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
