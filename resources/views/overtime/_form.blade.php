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
        <span class="col-form-label text-bold">Overtime</span>
    </div>
    <br> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Staff <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <select name="staff_id" class="form-control select2 @error('staff_id') is-invalid @enderror">
                <option value=""></option>
                @foreach ($staff as $item)
                    <option value="{{ $item->id }}" {{ $item->id == old('staff_id', $overtime->staff_id ?? '') ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
            @error('staff_id')
                <span class="text-danger" role="alert">
                    {{ $errors->first('staff_id') }}
                </span>
            @enderror
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Jam Lembur<span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <div class="input-group">
                <input type="number" name="jumlah_overtime" class="form-control @error('jumlah_overtime') is-invalid @enderror" value="{{ old('jumlah_overtime', $overtime->jumlah_overtime ?? '') }}" min="0" autocomplete="off" placeholder="0">
                <div class="input-group-append">
                    <span class="input-group-text">Jam</span>
                </div>
            </div>
            @error('jumlah_overtime')
                <span class="text-danger" role="alert">
                   {{ $errors->first('jumlah_overtime') }}
                </span>
            @enderror
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Tgl. Lembur <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="date" name="tgl_overtime" class="form-control @error('tgl_overtime') is-invalid @enderror" value="{{ old('tgl_overtime', $overtime->tgl_overtime ?? '') }}" autocomplete="off">
            @error('tgl_overtime')
                <span class="text-danger" role="alert">
                    {{ $errors->first('tgl_overtime') }}
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