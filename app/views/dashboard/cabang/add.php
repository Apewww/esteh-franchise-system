<div class="card card-custom p-4" style="max-width: 900px;">
    <form action="/dashboard/cabang/addProsses" method="POST" enctype="multipart/form-data">

        <div class="row g-4 align-items-start">

            <!-- UPLOAD GAMBAR -->
            <div class="col-md-3 text-center">
                <label for="gambar" class="d-block">

                    <div id="previewBox"
                         style="
                            width: 120px;
                            height: 120px;
                            background: #a8ff9e;
                            border-radius: 16px;
                            cursor: pointer;
                            overflow: hidden;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                         ">

                        <span id="plusIcon"
                              style="font-size:48px; color:white;">+</span>

                        <img id="previewImage"
                             style="display:none; width:100%; height:100%; object-fit:cover;">
                    </div>

                </label>

                <input type="file"
                       name="gambar"
                       id="gambar"
                       class="d-none"
                       accept="image/*"
                       required>
            </div>

            <!-- FORM INPUT -->
            <div class="col-md-9">

                <div class="mb-3">
                    <label class="fw-semibold text-primary">Gambar</label>
                    <p class="text-muted mb-0">
                        Masukan gambar produk. Rasio gambar harus 1:1
                    </p>
                </div>

                <div class="mb-4">
                    <label class="form-label">Nama</label>
                    <input type="text"
                           name="nama_produk"
                           class="form-control"
                           style="background:#a8ff9e; border-radius:20px;"
                           required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Harga</label>
                    <input type="number"
                           name="harga"
                           class="form-control"
                           style="background:#a8ff9e; border-radius:20px;"
                           required>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="/dashboard/cabang"
                       class="btn btn-warning px-4"
                       style="border-radius:20px;">
                        Back
                    </a>
                
                    <button type="submit"
                            class="btn btn-success px-4"
                            style="border-radius:20px;">
                        Tambah
                    </button>
                </div>


            </div>

        </div>

    </form>
</div>
