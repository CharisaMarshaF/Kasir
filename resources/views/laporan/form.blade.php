
 <div class="col-md-4">
     <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"
         aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
             <div class="modal-content">
                 <div class="modal-body p-0">
                     <div class="card bg-secondary border-0 mb-0">
                         
                         <div class="card-body px-lg-5 py-lg-5">
                             <div class="text-center text-muted mb-4">
                                 <small>@yield('title')</small>
                             </div>
                             <form action="{{ route('laporan.index')}}" method="get">
                            
                                <div class="form-group">
                                        <label for="example-date-input" class="form-control-label">Tanggal awal</label>
                                        <input class="form-control" type="date" id="tanggal_awal" name="tanggal_awal" required autofocus value="{{ request('tanggal_awal') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-date-input" class="form-control-label">Tanggal Akhir</label>
                                        <input class="form-control" type="date" id="tanggal_akhir" name="tanggal_akhir" required value="{{ request('tanggal_akhir') ?? date('Y-m-d') }}">
                                </div>
                                </div>
                                


                                
                                
                                 
                                 <div class="text-center">
                                     <button class="btn btn-primary my-4">Simpan</button>
                                     <button class="btn btn-primary my-4" data-dismiss="modal" >Batal</button>


                                 </div>
                             </form>
                         </div>
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
