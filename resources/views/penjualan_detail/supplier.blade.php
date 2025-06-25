
 <div class="col-md-4">
     <div class="modal fade" id="modal-supplier" tabindex="-1" role="dialog" aria-labelledby="modal-supplier"
         aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
             <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered table-supplier">
                            <thead>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th><i class="fa fa-cog"></i></th>
                            </thead>
                            <tbody>
                                @foreach ($supplier as $key => $item)
                                    <tr>
                                        <td width="5%">{{ $key+1 }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->telepon }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>
                                            <a href="{{ route('pembelian.create', $item->id_supplier) }}" class="btn btn-primary btn-xs btn-flat">
                                                <i class="fa fa-check-circle"></i>
                                                Pilih
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
             </div>
         </div>
     </div>
 </div>
 </div>

<!-- Tombol untuk membuka modal -->

<!-- Modal konfirmasi hapus -->
<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered" role="document">
        <div class="modal-content bg-gradient-danger">
            
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Konfirmasi Penghapusan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Anda yakin ingin menghapus kategori ini?</h4>
                    <p>Data yang telah dihapus tidak dapat dipulihkan.</p>
                </div>
            </div>
            
            <div class="modal-footer">
                <form id="delete-form" action="" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-white" >Ya, Hapus</button>
                </form>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tutup</button>
            </div>
            
        </div>
    </div>
</div>
