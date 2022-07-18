<div class="card-body pt-0 pl-1 pr-1 pb-0">
        
    @if (empty($staff))
        <div class="alert alert-warning text-justify">
            <strong>Warning !!</strong> Data staff belum ada, anda tidak dapat melakukan absensi. Silahkan input data staff terlebih dulu 
            <a class="float-right" href="{{ route('salary.index') }}" data-toggle="tooltip" title="Silahkan klik untuk menginput data pekerja" style="text-decoration-color: blue;">
                <span class="text-primary">Input Sekarang ?</span>  
            </a>
        </div>
    @endif
    
    <div class="container-fluid row p-2" style="font-size: 14px;">
        <div class="col-md-9 p-0">
            <table class="table no-border header-table mb-0 mt-0" style="">
                <tr style="line-height: 1px;">
                    <td width="100">Karyawan Status</td>
                    <td width="10">:</td>
                    <td class="text-left">
                        <span class="badge {{ $request->status == 'Staff' ? 'badge-info' : 'badge-secondary' }}">{{ $request->status ?? '' }}</span>
                    </td>
                </tr>
                <tr style="line-height: 1px;">
                    <td width="100">Periode</td>
                    <td width="10">:</td>
                    <td class="text-left">{{ $request->periode }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="table-responsive pl-2 pr-2">
        <table class='table table-striped table-bordered'>
            {{-- <tbody> --}}
                <tr>
                    <td>
                        <label class="text-bold">{{ $request->status }}</label><br>
                        <select name="staff_id" class="form-control select2" required>
                            <option value=""></option>
                            @foreach ($positions as $position)
                                @foreach ($position->staff as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            @endforeach
                        </select>
                        @error('staff_id')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('staff_id') }}</strong>
                            </span>
                        @enderror
                    </td>
                    <td colspan="2">
                        <label class="font-weight-bold">Tanggal Gaji</label><br>
                        <input type="text" name="tgl_salary" class="form-control datepicker @error('tgl_salary') is-invalid @enderror" placeholder="01/31/2020" autocomplete="off" onkeypress="return false">
                        @error('tgl_salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tgl_salary') }}</strong>
                            </span>
                        @enderror
                    </td>
                </tr>

                <tbody id="KaryawanHarian" style="display: none">
                <tr class="bg-white">
                    <td>Total Kehadiran <div class="text-right"></td>
                        <td class="text-right">
                            <input type="hidden" name="total_kehadiran" class="form-control" readonly>
                            <span id="total_kehadiran" class="badge badge-success">0</span> Hari
                        </td>
                    <td class="text-right"><span id="salary_preview">Rp. 0</span></td>
                </tr>
                </tbody>

                <tr class="bg-white">
                    <td>Salary {{ $request->status == 'Staff' ? 'Bulanan' : 'Harian' }}</td>
                    <td colspan="2" class="text-right">
                        <input type="hidden" name="salary" class="form-control" id="total_salary_hidden" value="0" readonly>
                        {{ $request->status == 'Staff' ? '' : 'Total : ' }} <span id="total_salary">Rp. 0</span>
                    </td>
                </tr>

                <tbody id="KaryawanBulanan">
                <tr>
                    <td>Pot BPJS</td>
                    <td style="min-width: 180px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" name="pot_bpjs" class="form-control @error('pot_bpjs') is-invalid @enderror" id="pot_bpjs" value="0" placeholder="0" onkeypress="return hanyaAngka(this)" maxlength="8" autocomplete="off">
                        </div>
                        @error('pot_bpjs')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('pot_bpjs') }}</strong>
                            </span>
                        @enderror
                    </td>
                    <td class="text-right">
                        <span id="pot_bpjs_preview">Rp. 0</span>
                    </td>
                </tr>
                <tr>
                    <td>Transportasi</td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" name="transportasi" class="form-control @error('transportasi') is-invalid @enderror" id="transportasi" value="0" placeholder="0" onkeypress="return hanyaAngka(this)" maxlength="8" autocomplete="off">
                        </div>
                        @error('transportasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('transportasi') }}</strong>
                            </span>
                        @enderror
                    </td>
                    <td class="text-right">
                        <span id="transportasi_preview">Rp. 0</span>
                    </td>
                </tr>
                </tbody>
                <tr>
                    <td>Apakah Karyawan ini lembur?</td>
                    <td colspan="2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="lembur" id="lembur" value="true" class="toggle-form-lembur" {{ old('lembur') ? 'checked' : '' }} >
                            <label class="form-check-label" for="lembur">
                                Ya
                            </label>
                        </div>
                    </td>
                </tr>
               
                <tbody id="form-lembur" style="display: none">
                    <tr class="bg-white">
                        <td>Lembur</td>
                        <td colspan="2">
                            <div class="input-group">
                                <input type="text" name="jam_lembur" id="jam_lembur" value="0" class="form-control @error('jam_lembur') is-invalid @enderror" placeholder="masukan jumlah lembur.." autocomplete="off" maxlength="2" min="0" onkeypress="return hanyaAngka(this)" disabled>
                                <div class="input-group-append">
                                    <span class="input-group-text">Jam</span>
                                </div>
                            </div>
                            @error('jam_lembur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </td>
                    </tr>
                    <tr style="background-color: rgba(0,0,0,.05)">
                        <td>Gaji Lembur / Jam</td>
                        <td style="min-width: 180px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" name="gaji_lembur" id="gaji_lembur" value="0" class="form-control @error('gaji_lembur') is-invalid @enderror" placeholder="0" autocomplete="off" maxlength="8" disabled>
                            </div>
                            @error('gaji_lembur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('gaji_lembur') }}</strong>
                                </span>
                            @enderror
                        </td>
                        <td class="text-right">
                            <span id="gaji_lembur_preview">Rp. 0</span>
                        </td>
                    </tr>
                </tbody>
                    <tr class="font-weight-bold bg-white" style="font-size: 18px;">
                        <td>Total Gaji</td>
                        <td colspan="2" class="text-right">
                            <input type="hidden" name="total" id="grand_total_salary_hidden">
                            <span id="grand_total_salary">Rp. 0</span>
                        </td>
                    </tr>
        </table>
    </div>
      
    </div>
    <div class="card-footer">
        <div class="float-left">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="dibayar" name="status_gaji" value="Lunas" class="toggle-form-dibayar" checked>
                <label class="form-check-label" for="dibayar">
                    Tandai telah di gaji
                </label>
            </div>
        </div>
        <div class="text-right">
            <div class="form-group mb-0">
                <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
                <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check mr-1"></i> Simpan</button> 
            </div>
        </div>
    </div>