<link href="css/sb-admin-2.min.css" rel="stylesheet">
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Location table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Vehicle Type</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    First Hour Charges</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Next Hourly Charges</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Max Cost Per Day</th>


                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($vehicle_types as $vehicle)
                                <tr>

                                    <td class="align-middle">
                                        <p class="text-sm font-weight-bold mb-0">{{ $vehicle->id }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-sm mb-0">{{ $vehicle->jenis }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-sm mb-0">{{ $vehicle->perjam_pertama }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-sm mb-0">{{ $vehicle->perjam_berikutnya }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <span class="text-xs font-weight-bold">{{ $vehicle->max_perhari }}</span>
                                    </td>

                                    <td class="align-middle text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" type="button"
                                                id="dropdownMenuButton{{ $vehicle->id }}" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="dropdownMenuButton{{ $vehicle->id }}">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('vehicle.edit', $vehicle->id) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form id="delete-form-{{ $vehicle->id }}"
                                                        action="{{ route('vehicle.destroy', $vehicle->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="dropdown-item text-danger btn-delete"
                                                            data-id="{{ $vehicle->id }}">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <div class="alert alert-light mb-0">Data vehicle belum ada.</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a class="btn btn-white btn-sm w-10 mb-0" href="{{ route('vehicle.create') }}">Add Location</a>

    </div>
</div>
