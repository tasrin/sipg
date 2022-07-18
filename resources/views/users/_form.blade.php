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
        <span class="col-form-label text-bold">BIODATA</span>
    </div>
    <br> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Nama Lengkap <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="fullname" class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" value="{{ old('fullname', $karyawan->fullname ?? '') }}" placeholder="Nama Lengkap.." autocomplete="off" required>
            @if ($errors->has('fullname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fullname') }}</strong>
                </span>
            @endif
        </div> 
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Tempat, Tgl Lahir</label> 
        <div class="col-8 col-md-3 col-lg-3">
            <input type="text" name="birthplace" class="form-control{{ $errors->has('birthplace') ? ' is-invalid' : '' }}" value="{{ old('birthplace', $karyawan->birthplace ?? '') }}" placeholder="Tempat lahir.." autocomplete="off">
            @if ($errors->has('birthplace'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('birthplace') }}</strong>
                </span>
            @endif
        </div> 
        <div class="col-4 col-md-2 col-lg-2">
            @if (isset($karyawan))
                <input type="text" value="{{ old('birthdate', date('m/d/Y', strtotime($karyawan->birthdate))) }}" name="birthdate" class="form-control datepicker{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" placeholder="Tanggal Lahir" autocomplete="off" onkeypress="return false">
            @else
                <input type="text" value="{{ old('birthdate', '') }}" name="birthdate" class="form-control datepicker{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" placeholder="Tanggal Lahir" autocomplete="off" onkeypress="return false">
            @endif
            @if ($errors->has('birthdate'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('birthdate') }}</strong>
                </span>
            @endif
        </div> 
    </div> 

    <div class="form-group row">
        <label class="col-12 col-md-4 col-xs-4 col-form-label">Email</label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email', $karyawan->email ?? '') }}" placeholder="Email..">
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div> 
    </div> 

    <div class="form-group row">
        <label class="col-12 col-md-4 col-xs-4 col-form-label">Jenis Kelamin</label> 
        <div class="col-12 col-md-5 col-lg-5">
            <label><input type="radio" name="gender" value="Laki-laki" {{ 'Laki-laki' == old('gender', $karyawan->gender ?? '') ? 'checked' : '' }}> Laki-Laki</label>
            <label><input type="radio" name="gender" class="ml-3" value="Perempuan" {{ 'Perempuan' == old('gender', $karyawan->gender ?? '') ? 'checked' : '' }}> Perempuan</label>
            @if ($errors->has('gender'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
            @endif
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-12 col-md-4 col-xs-4 col-form-label">Agama {{$karyawan->religion ?? '' }}</label> 
        <div class="col-12 col-md-5 col-lg-5">
            <select name="religion" class="form-control select2">
                <option value="">Pilih</option>
                <option value="Islam" {{ 'Islam' == old('religion', $karyawan->religion ?? '') ? 'selected' : '' }}>Islam</option>
                <option value="Kristen" {{ 'Kristen' == old('religion', $karyawan->religion ?? '') ? 'selected' : '' }}>Kristen</option>
                <option value="Hindu" {{ 'Hindu' == old('religion', $karyawan->religion ?? '') ? 'selected' : '' }}>Hindu</option>
                <option value="Budha" {{ 'Budha' == old('religion', $karyawan->religion ?? '') ? 'selected' : '' }}>Budha</option>
                <option value="Konghuju" {{ 'Konghuju' == old('religion', $karyawan->religion ?? '') ? 'selected' : '' }}>Konghuju</option>
                <option value="Other" {{ 'Other' == old('religion', $karyawan->religion ?? '') ? 'selected' : '' }}>Lainnya</option>
            </select>
            @if ($errors->has('religion'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('religion') }}</strong>
                </span>
            @endif
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-12 col-md-4 col-xs-4 col-form-label">No. Telp</label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone', $karyawan->phone ?? '') }}" placeholder="No. Telp..">
            @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div> 
    </div>
    
    <div class="form-group row">
        <label class="col-12 col-md-4 col-xs-4 col-form-label">Alamat</label> 
        <div class="col-12 col-md-5 col-lg-5">
            <textarea name="address" class="form-control" cols="30" rows="3" placeholder="Alamat lengkap..">{{ $karyawan->address ?? '' }}</textarea>
        </div>
    </div> 

    <div class="form-group row">
        <label class="col-12 col-md-4 col-xs-4 col-form-label">File CV</label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="file" name="filecv" class="form-control{{ $errors->has('filecv') ? ' is-invalid' : '' }}" value="{{ old('filecv') }}" accept=".pdf">
            <span class="text-muted">Upload file CV wajib dengan format/ext. PDF</span>
            @if ($errors->has('filecv'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('filecv') }}</strong>
            </span>
            @endif
            @if (isset($karyawan) && $karyawan->cv)
                <br><span>* CV yang sudah di-upload: <b><i><a href="{{ $karyawan->getLinkCV() }}" target="_blank">lihat disini...</a></i></b></span>
            @endif
        </div> 
    </div>

    <div class="form-group row">
        <label class="col-12 col-md-4 col-xs-4 col-form-label">Jabatan <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <select name="jabatan_id" class="form-control select2" required>
                @foreach ($jabatan as $jabatan)
                    {{-- @if ($loop->first && !isset($karyawan)) --}}
                        <option value="">Pilih :</option>
                    {{-- @endif --}}
                    <option value="{{ $jabatan->id }}" {{ old('jabatan_id', $karyawan->jabatan_id ?? '') == $jabatan->id ? 'selected' : '' }}>{{ $jabatan->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('jabatan_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('jabatan_id') }}</strong>
                </span>
            @endif
        </div> 
    </div>

    @empty($karyawan)

    <div class="card-header with-border pl-0 pb-1">
        <span class="col-form-label text-bold">USER AKSES</span>
    </div>
    <br> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label">Username <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username', $users->username ?? '') }}"  placeholder="Username.." autocomplete="off" required>
            @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div> 
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label">Password <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password', $users->password ?? '') }}"  placeholder="Password.." autocomplete="off" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div> 
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4">Level User <span class="text-danger">*</span></label>
        <div class="col-12 col-md-6">
            <div class="form-check-inline">
                @foreach ($roles as $item)
                    <label class="form-check-label pr-2">
                        <input type="radio" class="form-check-input " name="role_id" value="{{ $item->id }}" {{ $item->id == old('role_id', $role->role_id ?? '') ? 'checked' : '' }} required>
                        {{ ucwords($item->name) }}
                    </label>
                @endforeach
            </div>
        </div>
    </div>

    @endempty
        
</div>
<div class="card-footer">
    <div class="offset-md-4">
        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary mr-1"><i class="fas fa-check-double mr-1"></i> Simpan</button> 
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
        </div>
    </div>
</div>