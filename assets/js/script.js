let tahunNow = document.getElementById("tahunNow")
tahunNow.innerText = new Date().getFullYear()

// console.log(tahunNow)
function handleLogout()
{
    swal({
        icon : "warning",
        title : "Notifikasi !",
        text : "Yakin Ingin Keluar?",
        buttons : true,
        dangerMode : true
    })
    .then(res => {
        if(res)
        {
            document.location.href="?log=logout"
            swal({
                icon : "success",
                title : "Notifikasi !",
                text : "Logout Berhasil",
                button : "Oke"
            })
        }else {
            swal({
                icon : "error",
                title : "Notifikasi !",
                text : "Logout Gagal",
                button : "Oke"
            })
        }
    })
}

