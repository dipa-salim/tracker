<div>

  <div class="content-header">
    <div class="content-fluid">
      <div class="row mb-2">
        <div class="clo-sm-6">
          <h1 class="m-0 text-dark">Aktivitas Kurir</h1>
        </div>
      </div>
    </div>
  </div>

  @foreach ($shipment as $key => $data)
    <div class="card">
      <div class="card-body">
        <div class="col-lg-12">
          <div class="d-flex justify-content-end mb-2">
            <button class="btn btn-primary" data-toggle="modal" data-target="#formModal">
              <i class="fa fa-plus-circle mr-2"></i>Tambah
            </button>
          </div>
        </div>
        <div class="col-lg-12 table-responsive">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Pemesan</th>
                <th>Detail</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $data->updated_at }}</td>
                {{-- <td>{{ $data->user()->first()->name }}</td> --}}
                <td>{{ $data->client_name }}</td>
                <td>
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail-{{ $key }}">
                    <i class="fa fa-search mr-2"></i>
                  </button>
                </td>
                <td>
                  @if ($data->status == 'dalamPerjalanan')
                    <button class="btn btn-success btn-sm">Selesai</button>
                  @else
                    {{-- <a href="{{ route('Skripsi.cancelKaprodi', ['id' => $data->id_skripsi]) }}" class="btn btn-danger btn-sm" >Batal</a> --}}
                    <a class="btn btn-danger btn-sm">Batal</a>
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    {{-- Modal Detail --}}
    <div class="modal fade bd-example-modal-md" id="detail-{{ $key }}" tabindex="-1" role="dialog"
      aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Detail Pengiriman</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table-stripped">
              <tr>
                <th>SPB</th>
                <td><span>{{ $data->spb_number }}</span></td>
              </tr>
              <tr>
                <th>Nama Kurir</th>
                <td><span>{{ $data->user()->first()->name }}</span></td>
              </tr>
              <tr>
                <th>Penerima</th>
                <td><span>{{ $data->client_name }}</span></td>
              </tr>
              <tr>
                <th>RS/Instansi</th>
                <td><span>{{ $data->client_place }}</span></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  {{-- Modal Form --}}
  <div class="modal fade bd-example-modal-md" id="formModal" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Aktivitas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="store">
            <div class="form-group">
              {{-- <input type="hidden" name="id_dosen" value="{{ $data->id_dosen }}">  --}}
              <label for="exampleInputFile1">Nomor SPB</label>
              <div class="input-group">
                <div class="custom-file">
                  <input wire:model.defer="spb_number" value="{{ old('spb_number') }}" type="text"
                    class="form-control" rows='2' placeholder="Input Nomor SPB" old>
                  @error('spb_number')
                    <span class="text-danger" style="font-size: 11px">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputFile1">Penerima</label>
              <div class="input-group">
                <div class="custom-file">
                  <input wire:model.defer="client_name" value="{{ old('client_name') }}" type="text"
                    class="form-control" rows='2' placeholder="Input Nama Pemesan" old>
                  @error('client_name')
                    <span class="text-danger" style="font-size: 11px">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputFile1">RS/Instansi</label>
              <div class="input-group">
                <div class="custom-file">
                  <input wire:model.defer="client_place" value="{{ old('client_place') }}" type="text"
                    class="form-control" rows='2' placeholder="Input Nama RS/Instansi" old>
                  @error('client_place')
                    <span class="text-danger" style="font-size: 11px">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer justify-content-end">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i>
            &nbsp; Kembali</button>
          <button wire:click="save" type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
            Kirim</button>
        </div>
      </div>
    </div>
  </div>
  </form>
</div>
