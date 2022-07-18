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
        <span class="col-form-label text-bold">Schedule Staff</span>
    </div>
    <br> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Staff <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <select name="staff_id" class="form-control select2 @error('staff_id') is-invalid @enderror">
                <option value=""></option>
                @foreach ($staff as $item)
                    <option value="{{ $item->id }}" {{ $item->id == old('staff_id', $schedule->staff_id ?? '') ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
            @error('staff_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('staff_id') }}</strong>
                </span>
            @enderror
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Tgl. Masuk <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="date" name="tgl_masuk" class="form-control @error('tgl_masuk') is-invalid @enderror" value="{{ old('tgl_masuk', $schedule->tgl_masuk ?? '') }}" autocomplete="off">
            @error('tgl_masuk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tgl_masuk') }}</strong>
                </span>
            @enderror
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Ket. Jawdal<span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <select name="ket_schedule" class="form-control select2 @error('ket_schedule') is-invalid @enderror">
                <option value=""></option>
                @foreach ($ket_schedule as $item)
                    <option value="{{ $item }}" {{ $item == old('ket_schedule', $schedule->ket_schedule ?? '') ? 'selected' : '' }}>{{ $item }}</option>
                @endforeach
            </select>
            @error('ket_schedule')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ket_schedule') }}</strong>
                </span>
            @enderror
        </div> 
    </div>

    {{-- <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Status<span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <select name="status" class="form-control select2 @error('status') is-invalid @enderror">
                <option value=""></option>
                @foreach ($status as $item)
                    <option value="{{ $item }}" {{ $item == old('status', $schedule->status ?? '') ? 'selected' : '' }}>{{ $item }}</option>
                @endforeach
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @enderror
        </div> 
    </div> --}}

</div>
<div class="card-footer">
    <div class="offset-md-4">
        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary mr-1"><i class="fas fa-check-double mr-1"></i> Simpan</button> 
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
        </div>
    </div>
</div>