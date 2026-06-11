<div class="card shadow-sm mb-4">
    <div class="card-header pb-0 bg-transparent">
        <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">location Management</h6>
        <h5 class="font-weight-bolder">Add New location</h5>
    </div>
    
    <div class="card-body">
        <form action="{{ route('location.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger text-white border-0 py-2" role="alert">
                    <ul class="mb-0 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-control-label">Location Name</label>
                        <input name="location_name" type="text" class="form-control" placeholder="Contoh: Location" value="{{ old('nama_peminjam') }}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-control-label">Max Motorcyle</label>
                        <input name="max_motorcyle" type="text" class="form-control" placeholder="max motor" value="{{ old('jenis') }}">
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-control-label">Max Car</label>
                        <input name="max_car" type="text" class="form-control" placeholder="Nama max_car" value="{{ old('penulis') }}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-control-label">Max Truck/Bus/Other</label>
                        <input name="max_other" type="text" class="form-control" placeholder="Nama max_other" value="{{ old('penerbit') }}">
                    </div>
                </div>
            </div>

            

            <div class="row mt-4">
                <div class="col-12 text-end">
                    <button type="reset" class="btn btn-secondary me-2">Reset</button>
                    <button type="submit" class="btn btn-primary px-5">Submit Data</button>
                </div>
            </div>
        </form>
    </div>
</div>