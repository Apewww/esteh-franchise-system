</div> </div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {

    // Sidebar toggle
    const toggleBtn = document.getElementById("toggleSidebar");
    const sidebar = document.getElementById("sidebar");
    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("hide");
        });
    }
    if (window.innerWidth < 768 && sidebar) {
        sidebar.classList.add("hide");
    }

    // Preview gambar
    const gambarInput = document.getElementById('gambar');
    if (gambarInput) {
        gambarInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                const previewImage = document.getElementById('previewImage');
                const plusIcon = document.getElementById('plusIcon');

                if (previewImage && plusIcon) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                    plusIcon.style.display = 'none';
                }
            };
            reader.readAsDataURL(file);
        });
    }

    // Dynamic select barang berdasarkan cabang
    const selectCabang = document.getElementById('id_cabang');
    const selectBarang = document.getElementById('id_barang');
    if (selectCabang && selectBarang) {
        selectCabang.addEventListener('change', function () {
            const cabangId = this.value;

            selectBarang.innerHTML = '<option value="">-- Pilih Barang --</option>';

            if (!cabangId) return;

            fetch('/barang/get-by-cabang/' + cabangId)
                .then(res => res.json())
                .then(data => {
                    data.forEach(barang => {
                        const opt = document.createElement('option');
                        opt.value = barang.id_barang;
                        opt.textContent = barang.nama_barang;
                        selectBarang.appendChild(opt);
                    });
                })
                .catch(err => {
                    console.error(err);
                    alert('Gagal memuat data barang');
                });
        });
    }

});
</script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>
</html>