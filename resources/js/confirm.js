// konfirmasi delete [M003]
$(".show_confirm_delete").click(function (event) {
    let form = $(this).closest("form");
    let name = $(this).data("name");

    event.preventDefault();

    swal({
        text: "Apakah anda yakin ingin menghapus data?",
        buttons: ["Tidak", "Ya"],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
    });
});

// konfirmasi simpan [M001]
$(".show_confirm_save").click(function (event) {
    let form = $(this).closest("form");
    let name = $(this).data("name");

    event.preventDefault();

    swal({
        text: "Apakah anda yakin ingin menyimpan data?",
        buttons: ["Tidak", "Ya"],
        dangerMode: false,
    }).then((willEdit) => {
        if (willEdit) {
            form.submit();
        }
    });
});
