<div class="card-body">
    <div class="card card-solid">
        <div class="card-body pb-0 pt-3">
            <blockquote>
            <b>Keterangan!!</b><br>
            <small><cite title="Source Title">Inputan Yang Ditanda Bintang Merah (<span class="text-danger">*</span>) Harus Di Isi !!</cite></small>
            </blockquote>
        </div>
    </div>
    <div class="card-header with-border pl-0 pb-1">
        <span class="col-form-label text-bold">POSITION</span>
    </div>
    <br> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Nama <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $position->name ?? '') }}" placeholder="Name.." autocomplete="off">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @enderror
        </div> 
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Salary</label>
        <div class="col-8 col-md-4 col-lg-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary', $position->salary ?? '') }}" placeholder="100.000" autocomplete="off" oninput="format(this)">
            </div>
            @error('salary')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('salary') }}</strong>
                </span>
            @enderror
        </div> 
    </div> 

    <div class="form-group row">
        <label class="col-12 col-md-4 col-xs-4 col-form-label">Status</label> 
        <div class="col-12 col-md-5 col-lg-5">
            <select name="status" class="form-control select2 @error('status') is-invalid @enderror">
                <option value="">Pilih</option>
                <option value="Staff" {{ 'Staff' == old('status', $position->status ?? '') ? 'selected' : '' }}>Staff</option>
                <option value="Daily Worker" {{ 'Daily Worker' == old('status', $position->status ?? '') ? 'selected' : '' }}>Daily Worker</option>
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @enderror
        </div> 
    </div>     
</div>
<div class="card-footer">
    <div class="offset-md-4">
        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary mr-1"><i class="fas fa-check-double mr-1"></i> Simpan</button> 
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
        </div>
    </div>
</div>