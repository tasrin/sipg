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
        <span class="col-form-label text-bold">CUTI STAFF</span>
    </div>
    <br> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Staff <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            @if (Auth::user()->hasRole('admin'))
                <select name="staff_id" class="form-control select2 @error('staff_id') is-invalid @enderror">
                    <option value=""></option>
                    @foreach ($staff as $item)
                        <option value="{{ $item->id }}" {{ $item->id == old('staff_id', $cuti->staff_id ?? '') ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="staff_id" class="form-control select2 @error('staff_id') is-invalid @enderror">
                    @foreach ($staff->where('id', Auth::user()->staff->id) as $item)
                        <option value="{{ $item->id }}" {{ $item->id == old('staff_id', $cuti->staff_id ?? '') ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            @endif
           
            @error('staff_id')
                <span class="text-danger" role="alert">
                    {{ $errors->first('staff_id') }}
                </span>
            @enderror
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Tgl. Cuti <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            @if (isset($cuti))
                <input type="text" class="form-control pull-right datepicker" name="estimasi" value="{{ date('m/d/Y', strtotime($cuti->tgl_mulai)) . ' - ' . date('m/d/Y', strtotime($cuti->tgl_selesai)) }}" required autocomplete="off" onkeypress="return false">
            @else
                <input type="text" class="form-control pull-right datepicker" name="estimasi" value="{{ old('estimasi') }}" required autocomplete="off" onkeypress="return false">
            @endif
            @error('estimasi')
                <span class="text-danger">{{ $errors->first('estimasi') }}</span>
            @enderror
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Keterangan <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Alasan cuti..">{{ old('keterangan', $cuti->keterangan ?? '') }}</textarea>
            @error('keterangan')
                <span class="text-danger">{{ $errors->first('keterangan') }}</span>
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