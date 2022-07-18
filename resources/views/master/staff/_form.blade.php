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
        <span class="col-form-label text-bold">STAFF</span>
    </div>
    <br> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Nama <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $staff->name ?? '') }}" placeholder="Nama lengkap.." autocomplete="off">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @enderror
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Tgl. lahir <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="date" name="birth" class="form-control @error('birth') is-invalid @enderror" value="{{ old('birth', $staff->birth ?? '') }}" autocomplete="off">
            @error('birth')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('birth') }}</strong>
                </span>
            @enderror
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Tgl. Mulai Kerja <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="date" name="startdate" class="form-control @error('startdate') is-invalid @enderror" value="{{ old('startdate', $staff->startdate ?? '') }}" autocomplete="off">
            @error('startdate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('startdate') }}</strong>
                </span>
            @enderror
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">No. Telp <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $staff->phone ?? '') }}" placeholder="0823..." onkeypress="return hanyaAngka(this)">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @enderror
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Position <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <select name="position_id" class="form-control select2 @error('position_id') is-invalid @enderror">
                <option value=""></option>
                @foreach ($position as $item)
                    <option value="{{ $item->id }}" {{ $item->id == old('position_id', $staff->position_id ?? '') ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
            @error('position_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('position_id') }}</strong>
                </span>
            @enderror
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Departement <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <select name="departement_id" class="form-control select2 @error('departement_id') is-invalid @enderror">
                <option value=""></option>
                @foreach ($departement as $item)
                    <option value="{{ $item->id }}" {{ $item->id == old('departement_id', $staff->departement_id ?? '') ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
            @error('departement_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('departement_id') }}</strong>
                </span>
            @enderror
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Alamat <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <textarea name="addres" class="form-control @error('addres') is-invalid @enderror" placeholder="Masukan alamat..">{{ old('addres', $staff->addres ?? '') }}</textarea>
            @error('addres')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('addres') }}</strong>
                </span>
            @enderror
        </div> 
    </div>
    @if (!isset($staff->users_id))
    <div class="form-group row">
        <div class="col-12 col-md-5 col-lg-5 offset-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="makeUserAccount" value="true" {{ old('makeUserAccount') ? 'checked' : '' }} class="toggle-form-user"> Buat akun user untuk karyawan ini.
                </label>
            </div>
        </div>
    </div>
    @endif
    <div id="form-user" style="display: none">
        <hr>
        <div class="form-group row">
            <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Username <span class="text-red">*</span></label>
            <div class="col-12 col-md-5 col-lg-5">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') ?? '' }}" placeholder="Masukan username.." disabled>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Password <span class="text-red">*</span></label>
            <div class="col-12 col-md-5 col-lg-5">
                <p class="form-control-static">Password akan di generate otomatis menggunakan username.</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Level User <span class="text-red">*</span></label>
            <div class="col-12 col-md-5 col-lg-5">
                @foreach ($roles as $role)
                    <label class="radio-inline">
                        <input type="radio" name="role_id" value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'checked' : '' }} disabled>
                        {{ ucwords($role->display_name) }}
                    </label>
                @endforeach
            </div>
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