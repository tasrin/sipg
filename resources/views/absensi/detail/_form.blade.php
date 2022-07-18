<div class="card-body">
        
    @if ($staff ?? '')
        <div class="alert alert-warning text-justify">
            <strong>Warning !!</strong> Data staff belum ada, anda tidak dapat melakukan absensi. Silahkan input data staff terlebih dulu 
            <a class="float-right" href="{{ route('staff.create') }}" data-toggle="tooltip" title="Silahkan klik untuk menginput data pekerja" style="text-decoration-color: blue;">
                <span class="text-primary">Input Sekarang ?</span>  
            </a>
        </div>
    @else
        <div class="card card-solid">
            <div class="card-body pb-0 pt-3">
                <blockquote>
                    <b>Keterangan!!</b><br>
                    <small><cite title="Source Title">Inputan Yang Ditanda Bintang Merah (<span class="text-danger">*</span>) Harus Di Isi !!</cite></small>
                </blockquote>
            </div>
        </div>
    @endif
    
    <div class="row">
        <div class="col-md-12">
            <div class="card-header with-border pl-0 pb-1">
                <span class="col-form-label text-bold">Daftar Absen</span>
            </div>
            <br>
            <div class="table-responsive">
                <table class='table table-striped' id="AbsensiID">
                    <thead>
                        <tr class="bg-light">
                            <td class="text-center">#</td>
                            <td>Staff</td>
                            <td>Status</td>
                            <td>Tgl. Masuk</td>
                            <td>Ket. Schedule</td>
                            <td class="text-center" style="min-width: 150px;">Attendance</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedule as $item)
                            <tr>
                                <input type="hidden" name="schedule_id[]" class="form-control " value="{{ $item->id }}" readonly required>
                                <input type="hidden" name="staff_name[]" class="form-control" value="{{ $item->staff->name }}" readonly required>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    {{ $item->staff->name }}
                                </td>
                                <td>
                                    <span class="badge {{ $item->staff->position->status == 'Staff' ? 'badge-info' : 'badge-secondary' }}">{{ $item->staff->position->status }}</span>
                                </td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_masuk)) }}</td>
                                <td>{{ $item->ket_schedule }}</td>
                                <td>
                                    <div class="float-right">
                                        <select name="attendance[]" class="form-control select2{{ $errors->has('attendance') ? ' is-invalid' : '' }}" required>
                                            @foreach ($attendance as $item)
                                                <option value="{{ $item->id }}" >{{ strtoupper($item->name) }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('attendance'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('attendance') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <div class="card-footer">
        <div class="text-right">
            <div class="form-group mb-0">
                <button type="reset" class="btn btn-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
                <button type="submit" class="btn btn-primary" name="btn_absen" {{ $info ?? '' }}><i class="fas fa-check-double mr-1"></i> Simpan</button> 
            </div>
        </div>
    </div>