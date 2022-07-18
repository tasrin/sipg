<div class="card-body">
    <div class="card card-solid">
        <div class="card-body pb-0 pt-3">
            <blockquote>
            <b>Keterangan!!</b><br>
            <small><cite title="Source Title">Inputan Yang Ditanda Bintang Merah (<span class="text-danger">*</span>) Harus Di Isi !!</cite></small>
            </blockquote>
        </div>
    </div>
    
        <div class="form-group row">
            <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">KODE ABSENSI <span class="text-danger">*</span></label> 
            <div class="col-12 col-md-5 col-lg-5">
                <input type="text" class="form-control {{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ $code ?? '' }}" readonly required />
                @if ($errors->has('code'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('code') }}</strong>
                    </span>
                @endif
            </div> 
        </div> 

        <div class="form-group row">
            <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Periode <span class="text-danger">*</span></label> 
            <div class="col-12 col-md-5 col-lg-5">
                <select name="periode" class="form-control select2 @error('periode') is-invalid @enderror" id="" required>
                    <option value=""></option>
                    @for ($index=0; $index<=12; $index++)
                        <option value="{{ $month[$index] }}" {{ $month[$index] == old('periode', $month[date('n')] ?? '') ? 'selected' : '' }}>{{$month[$index] .', '. date('Y') }}</option>
                    @endfor
                </select>
                @error('periode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('periode') }}</strong>
                    </span>
                @enderror
            </div> 
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-xs-4 col-form-label">TANGGAL ABSEN <span class="text-danger">*</span></label> 
            <div class="col-12 col-md-5 col-lg-5">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control pull-right datepicker{{ $errors->has('tanggal') ? ' is-invalid' : '' }}" name="tanggal" placeholder="31/04/2019" autocomplete="off" required onkeypress="return false" />
                </div>
                @if ($errors->has('tanggal'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tanggal') }}</strong>
                    </span>
                @endif
            </div> 
        </div>

    </div>
    <div class="card-footer">
        <div class="float-right">
            <div class="form-group mb-0">
                <button type="reset" class="btn btn-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
                <button type="submit" class="btn btn-primary" name="btnIn"><i class="fas fa-arrow-right mr-1"></i> Next</button> 
            </div>
        </div>
    </div>