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
        <span class="col-form-label text-bold">STATUS</span>
    </div>
    <br> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Pilih Status Position Staff <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <select name="status" class="form-control select2 @error('status') is-invalid @enderror">
                <option value=""></option>
                <option value="Staff" {{ "Staff" == old('status', $salary['status'] ?? '') ? 'selected' : '' }}>Staff</option>
                <option value="Daily Worker" {{ "Daily Worker" == old('status', $salary->status ?? '') ? 'selected' : '' }}>Daily Worker</option>
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @enderror
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Periode <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="periode" class="form-control datepicker @error('periode') is-invalid @enderror" value="{{ old('periode', $salary->periode ?? '') }}" placeholder="bulan-tahun.." autocomplete="off" onkeypress="return false">
            @error('periode')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('periode') }}</strong>
                </span>
            @enderror
        </div> 
    </div>
</div>
<div class="card-footer">
    <div class="float-right">
        <div class="form-group mb-0">
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right mr-1"></i> Next</button> 
        </div>
    </div>
</div>