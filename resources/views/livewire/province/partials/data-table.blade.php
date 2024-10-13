

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Province</h4>
        <a href="{{ route('provinces.create') }}" class="btn btn-primary">Create</a>
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
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search" wire:model.live="search">
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
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($provinces as $province)
                    <tr>
                        <td class="py-3">
                            <span class="fw-semibold">{{ $province->name }}</span>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('provinces.edit', $province->id) }}">
                                        <i class="ti ti-pencil me-1"></i>Edit
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);" wire:click="delete('{{ $province->id }}')" wire:confirm="Are you sure want to delete this data?">
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
            {{ $provinces->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>
