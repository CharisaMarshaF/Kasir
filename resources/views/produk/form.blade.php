 {{-- <!-- BEGIN: Modal Toggle -->
 
 <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="tambah-form" action="" method="post">
            @csrf
            @method('post')
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">@yield('title')tambah</h2>
                    <div class="dropdown sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
                            <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                        </a>
                    </div>
                </div> <!-- END: Modal Header -->

                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                    <div class="col-span-12 sm:col-span-8">
                        <label for="nama_kategori" class="form-label">Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required autofocus>
                    </div>
                </div> <!-- END: Modal Body -->

                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Batal</button>
                    <button class="btn btn-primary w-20">Simpan</button>
                </div> <!-- END: Modal Footer -->
            </div>
        </form>
    </div>
</div> <!-- END: Modal Content -->


<!-- Modal Edit Kategori -->
<div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form untuk Edit -->
        <form id="edit-form" action=" " method="post">
            @csrf
            @method('post') <!-- Menggunakan metode PUT untuk update -->
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Edit Kategori</h2>
                    <div class="dropdown sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
                            <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                        </a>
                    </div>
                </div> <!-- END: Modal Header -->

                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-8">
                        <label for="nama_kategori" class="form-label">Kategori</label>
                        <!-- Menampilkan nama kategori yang sudah ada -->
                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required autofocus>
                    </div>
                </div> <!-- END: Modal Body -->

                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Batal</button>
                    <button type="submit" class="btn btn-primary w-20">Simpan</button>
                </div> <!-- END: Modal Footer -->
            </div>
        </form>
    </div>
</div> <!-- END: Modal Content --> --}}


 <!-- BEGIN: Edit Modal Toggle -->

 {{-- <div id="editform" class="modal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
    <!-- Form untuk edit kategori -->
    <form action="" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Edit Kategori</h2>
            </div>

            <!-- Modal Body -->
            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                <div class="col-span-12 sm:col-span-8">
                    <label for="nama_kategori" class="form-label">Kategori</label>
                    <input id="nama_kategori" type="text" name="nama_kategori" class="form-control" placeholder="Kategori">
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Batal</button>
                <button type="submit" class="btn btn-primary w-20">Simpan</button>
            </div>
        </div>
    </form>
</div>
</div> --}}




 {{-- <div id="delete-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <!-- Form untuk menghapus kategori -->
                    <form id="delete-form" action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-24">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  --}}

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
                                                     class=""></i>Nama</span>
                                         </div>
                                         <input class="form-control" placeholder="nama_produk" type="text" name="nama_produk" id="nama_produk"  required autofocus>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div for="id_kategori" class="input-group-prepend">
                                            
                                        </div>
                                        <select name="id_kategori" id="id_kategori" class="form-control" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($kategori as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i
                                                    class=""></i>Merk</span>
                                        </div>
                                        <input class="form-control" placeholder="merk" type="text" name="merk" id="merk" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i
                                                    class=""></i>Harga Beli</span>
                                        </div>
                                        <input class="form-control" placeholder="harga_beli" type="number" name="harga_beli" id="harga_beli"  required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i
                                                    class=""></i>Harga Jual</span>
                                        </div>
                                        <input class="form-control" placeholder="harga_jual" type="number" name="harga_jual" id="harga_jual"  required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i
                                                    class=""></i>Diskon</span>
                                        </div>
                                        <input class="form-control" placeholder="diskon" type="number" name="diskon" id="diskon"  value="0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i
                                                    class=""></i>Stok</span>
                                        </div>
                                        <input class="form-control" placeholder="stok" type="number" name="stok" id="stok"  required value="0">
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
