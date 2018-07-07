<template>
  <div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Poli</label>
      <div class="col-sm-10">
        <select name="poli_id" class="form-control" v-model="PoliId" @change="showDokter(PoliId)" :disabled="disable == 1" required>
          <option value="">Poli</option>
          <option v-for="datapoli in this.datapoli" :value="datapoli.id">{{datapoli.nama}}</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Dokter</label>
      <div class="col-sm-10">
        <select name="dokter_id" class="form-control" v-model="DokterId" :disabled="disable == 1" required>
          <option value="">Dokter</option>
          <option v-for="datadokter in this.datadokter" :value="datadokter.id">{{datadokter.nama}}</option>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['api', 'poli', 'dokter', 'disabled'],
  data: function(){
    return {
      datapoli : '',
      datadokter : '',
      PoliId : this.poli,
      DokterId : this.dokter,
      disable : this.disabled,
    }
  },
  mounted: function(){
    axios({
      method: 'get',
      url: '/api/spesialis',
    }).then((response) => {
      this.datapoli = response.data
      if (this.poli != null) {
        this.searchKey(this.datapoli, this.poli)
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
        this.showDokter(this.PoliId)
      }
    },
    showDokter(PoliId){
      axios({
        method: 'get',
        url: '/api/dokter/'+PoliId,
      }).then((response) => {
        this.datadokter = response.data
      })
    }
  },
}
</script>
