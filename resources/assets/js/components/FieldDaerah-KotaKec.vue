<template>
  <div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Kab./Kota</label>
      <div class="col-sm-10">
        <select name="kota_id" class="form-control" v-model="KotaId" @change="showKecamatan(KotaId)" :disabled="disable == 1" required>
          <option value="">Kota</option>
          <option v-for="datakota in this.datakota" :value="datakota.id">{{datakota.nama}}</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Kecamatan</label>
      <div class="col-sm-10">
        <select name="kecamatan_id" class="form-control" v-model="KecamatanId" :disabled="disable == 1" required>
          <option value="">Kecamatan</option>
          <option v-for="datakecamatan in this.datakecamatan" :value="datakecamatan.id">{{datakecamatan.nama}}</option>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['api', 'kota', 'kecamatan', 'disabled'],
  data: function(){
    return {
      datakota : '',
      datakecamatan : '',
      KotaId : this.kota,
      KecamatanId : this.kecamatan,
      disable : this.disabled,
    }
  },
  mounted: function(){
    axios({
      method: 'get',
      url: '/api/kota',
    }).then((response) => {
      this.datakota = response.data
      if (this.kota != null) {
        this.searchKey(this.datakota, this.kota)
      }
    })
  },
  methods: {
    searchKey(data, key = null){
      var returnData = []
      $.each(data, function(index, value){
        returnData.push(value.id)
      })
      if (returnData.lastIndexOf(parseInt(key)) != '-1') {
        this.showKecamatan(this.KotaId)
      }
    },
    showKecamatan(KotaId){
      axios({
        method: 'get',
        url: '/api/kecamatan/'+KotaId,
      }).then((response) => {
        this.datakecamatan = response.data
      })
    }
  },
}
</script>
