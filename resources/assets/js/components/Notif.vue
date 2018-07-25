<template>
  <li v-if="this.show == 'button'" class="dropdown dropdown-list">
    <a href="#" data-toggle="dropdown" data-toggle-state="offsidebar-open" data-no-persist="true">
      <em class="icon-bell"></em>
      <div class="label label-danger">{{this.count}}</div>
    </a>
  </li>
  <aside v-else class="offsidebar hide">
    <nav>
      <div role="tabpanel">
        <div class="tab-content">
          <div class="tab-pane fade in active" id="app-chat" role="tabpanel">
            <h3 class="text-center text-thin">Pasien Rujukan</h3>
            <ul class="nav">
              <hr>
              <li v-for="(dataPasien, index) in data">
                <a class="media-box p mt0" @click="redirect(dataPasien.id)">
                  <span class="pull-right">
                    <h4>
                      {{dataPasien.nama}}
                    </h4>
                  </span>
                  <span class="pull-left">
                    <h4>{{index+1}}</h4>
                  </span>
                </a>
                <hr>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </aside>
</template>

<script>
export default {
  props: ['show'],
  data: function(){
    return {
      data : '',
      count : '',
    }
  },
  mounted(){
    this.getData()
    this.timer = setInterval(this.getData, 5000)
  },
  methods: {
    getData(){
      axios({
        method: 'get',
        url: '/api/rujukan',
      }).then((response) => {
        this.data = response.data.Data
        this.count = response.data.Count
      })
    },
    redirect(id){
      window.location = '/rujukan/redirect/'+id
    }
  }
}
</script>
