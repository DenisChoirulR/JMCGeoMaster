<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Province Report</h4>
            <a href="#" wire:click="export" class="btn btn-primary">Export</a>
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
                        <th>Total Residents</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($provinces as $province)
                        <tr>
                            <td class="py-3">
                                <span class="fw-semibold">{{ $province->name }}</span>
                            </td>
                            <td>
                                {{ $province->residents->count() }}
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
</div>
