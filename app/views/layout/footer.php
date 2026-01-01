</div> </div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.getElementById("toggleSidebar");
        const sidebar = document.getElementById("sidebar");

        // Logika Toggle Sidebar
        if (toggleBtn && sidebar) {
            toggleBtn.addEventListener("click", () => {
                sidebar.classList.toggle("hide");
            });
        }

        // Opsional: Otomatis menutup sidebar jika layar kecil (Mobile)
        if (window.innerWidth < 768) {
            sidebar.classList.add("hide");
        }
    });
</script>

</body>
</html>