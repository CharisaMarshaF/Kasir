

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
                             <form action="" method="post">
                                @csrf
                                @method('post')
                                 
                                <div class="form-group">
                                     <div class="input-group input-group-merge input-group-alternative">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i
                                                     class=""></i></span>
                                         </div>
                                         <input class="form-control" placeholder="nama" type="text" name="nama" id="nama"  required autofocus>
                                     </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i
                                                    class=""></i></span>
                                        </div>
                                        <input class="form-control" placeholder="telepon" type="text" name="telepon" id="telepon"  required >
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
