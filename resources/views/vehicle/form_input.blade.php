<div class="card shadow-sm mb-4">
    <div class="card-header pb-0 bg-transparent">
        <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">vehicle Management</h6>
        <h5 class="font-weight-bolder">Add New vehicle</h5>
    </div>
    
    <div class="card-body">
        <form action="{{ route('vehicle.store') }}" method="POST" id="vehicleForm" novalidate>
            @csrf
            <div class="form-group mb-3">
              <label class="text-sm font-weight-bolder">Vehicle Type</label>
              <select name="jenis" id="jenis" class="form-control" required>
                  <option value="motorcycle" {{ old('jenis') == 'motorcycle' ? 'selected' : '' }}>Motorcycle</option>
                  <option value="car" {{ old('jenis') == 'car' ? 'selected' : '' }}>Car</option>
                  <option value="other" {{ old('jenis') == 'other' ? 'selected' : '' }}>Truck/Bus/Other</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label class="text-sm font-weight-bolder">First Hour Price</label>
              <input type="number" name="perjam_pertama" id="perjam_pertama" class="form-control" value="{{ old('perjam_pertama') }}" required placeholder="Contoh: 2000" min="0">
            </div>
            <div class="form-group mb-3">
              <label class="text-sm font-weight-bolder">Next Hour Price</label>
              <input type="number" name="perjam_berikutnya" id="perjam_berikutnya" class="form-control" value="{{ old('perjam_berikutnya') }}" required placeholder="Contoh: 1000" min="0">
            </div>
            <div class="form-group mb-4">
              <label class="text-sm font-weight-bolder">Max Per Day Price</label>
              <input type="number" name="max_perhari" id="max_perhari" class="form-control" value="{{ old('max_perhari') }}" required placeholder="Contoh: 10000" min="0">
            </div>
            <div class="d-flex justify-content-between mt-4">
              <a href="{{ route('vehicle.index') }}" id="cancelBtn" class="btn btn-dark w-50 me-2">CANCEL</a>
              <button type="submit" class="btn bg-gradient-primary w-50 ms-2">SAVE VEHICLE TYPE</button>
            </div>
        

            

        </form>
    </div>
</div>