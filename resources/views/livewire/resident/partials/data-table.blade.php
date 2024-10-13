

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Resident</h4>
        <a href="{{ route('residents.create') }}" class="btn btn-primary">Create</a>
    </div>

    <div class="card-body">
        <!-- Search Input -->
        <div class="row mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="col-md-3">
                    <select class="form-select" wire:model="perPage" wire:change="changePerPage">
                        <option value="5">5 Per Page</option>
                        <option value="10">10 Per Page</option>
                        <option value="20">20 Per Page</option>
                        <option value="50">50 Per Page</option>
                    </select>
                </div>

                <div class="col-md-6 d-flex">
                    <div class="me-2" style="flex: 1;">
                        <select class="form-select" wire:model.live="province_id">
                            <option value="">All Provinces</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="me-2" style="flex: 1;">
                        <select class="form-select" wire:model.live="city_id" {{ !$cities ? 'disabled' : '' }}>
                            <option value="">All Cities</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 2;">
                        <input type="text" class="form-control" placeholder="Search" wire:model.live="search">
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th wire:click="sorting('name')" style="cursor: pointer;">
                        Name
                        @if($sortBy === 'name')
                            <i class="ti ti-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sorting('nik')" style="cursor: pointer;">
                        NIK
                        @if($sortBy === 'nik')
                            <i class="ti ti-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th>
                        City
                    </th>
                    <th>
                        Province
                    </th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($residents as $resident)
                    <tr>
                        <td class="py-3">
                            <span class="fw-semibold">{{ $resident->name }}</span>
                        </td>
                        <td>
                            {{$resident->nik}}
                        </td>
                        <td>
                            {{$resident->city->name ?? '-'}}
                        </td>
                        <td>
                            {{$resident->city->province->name ?? '-'}}
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('residents.edit', $resident->id) }}">
                                        <i class="ti ti-pencil me-1"></i>Edit
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);" wire:click="delete('{{ $resident->id }}')" wire:confirm="Are you sure want to delete this data?">
                                        <i class="ti ti-trash me-1"></i>Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $residents->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>
