jQuery(document).ready(function () {

    // Validasi pada saat tombol submit di-klik
    $("#submitBtn").click(function () {

        // Cari elemen form yang divalidasi
        var form = $(".needs-validation")

        // Jika tidak valid
        if (form[0].checkValidity() === false) {
            event.preventDefault()
            event.stopPropagation()
        }

        // Tambahkan class css bernama 'was-validated' pada form
        form.addClass('was-validated');
    })

})