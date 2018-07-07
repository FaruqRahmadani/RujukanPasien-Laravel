import swal from 'sweetalert';

Vue.component('field-kotakecamatan', require('./components/FieldDaerah-KotaKec.vue'));
Vue.component('field-polidokter', require('./components/Field-PoliDokter.vue'));

const app = new Vue({
    el: '#app'
});

window.notif = function (tipe, judul, pesan){
  swal({
    title: judul,
    text: pesan,
    icon: tipe,
    button: "OK",
  });
}

window.logout = function(){
  swal({
    title   : "Logout",
    text    : "Yakin Ingin Keluar?",
    icon    : "warning",
    buttons : [
      "Batal",
      "Logout",
    ],
  })
  .then((logout) => {
    if (logout) {
      swal({
        title  : "Logout",
        text   : "Anda Telah Logout",
        icon   : "success",
        timer  : 2500,
      });
      window.location = "/logout";
    } else {
      swal({
        title  : "Batal Logout",
        text   : "Anda Batal Logout",
        icon   : "info",
        timer  : 2500,
      })
    }
  });
}

window.hapus = function(link, bisa=0){
  if (!bisa) {
  swal({
    title   : "Hapus",
    text    : "Yakin Ingin Hapus Data?",
    icon    : "warning",
    buttons : [
      "Batal",
      "Hapus",
    ],
  })
  .then((hapus) => {
    if (hapus) {
      swal({
        title  : "Berhasil",
        text   : "Data Akan dihapus",
        icon   : "success",
        timer  : 2500,
      });
      window.location = link;
    } else {
      swal({
        title  : "Batal",
        text   : "Data Batal dihapus",
        icon   : "info",
        timer  : 2500,
      })
    }
  });
  }else{
    swal({
      title   : "Hapus",
      text    : bisa,
      icon    : "warning",
      buttons : "OK",
    })
  }
}
