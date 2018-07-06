require('./bootstrap');

require('./Angle/vendor/modernizr/modernizr.custom');
require('./Angle/vendor/matchMedia/matchMedia');
// require('./Angle/vendor/jquery/dist/jquery');
require('./Angle/vendor/bootstrap/dist/js/bootstrap');
require('./Angle/vendor/jQuery-Storage-API/jquery.storageapi');
require('./Angle/vendor/jquery.easing/js/jquery.easing');
require('./Angle/vendor/animo.js/animo');
require('./Angle/vendor/slimScroll/jquery.slimscroll.min');
require('./Angle/vendor/screenfull/dist/screenfull');
require('./Angle/vendor/datatables/media/js/jquery.dataTables.min');
require('./Angle/vendor/datatables-colvis/js/dataTables.colVis');
require('./Angle/vendor/datatables/media/js/dataTables.bootstrap');
// require('./Angle/vendor/datatables-buttons/js/dataTables.buttons');
// require('./Angle/vendor/datatables-buttons/js/buttons.bootstrap');
// require('./Angle/vendor/datatables-buttons/js/buttons.colVis');
// require('./Angle/vendor/datatables-buttons/js/buttons.flash');
// require('./Angle/vendor/datatables-buttons/js/buttons.html5');
// require('./Angle/vendor/datatables-buttons/js/buttons.print');
require('./Angle/vendor/datatables-responsive/js/dataTables.responsive');
require('./Angle/vendor/datatables-responsive/js/responsive.bootstrap');
// require('./Angle/vendor/jquery-localize-i18n/dist/jquery.localize');
require('./Angle/app');
require('./custom');

// window.Vue = require('vue');
//
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

var dtInstance2 = $('#datatable2').dataTable({
        'paging':   true,  // Table pagination
        'ordering': true,  // Column ordering
        'info':     true,  // Bottom left status text
        'responsive': true, // https://datatables.net/extensions/responsive/examples/
        // Text translation options
        // Note the required keywords between underscores (e.g _MENU_)
        oLanguage: {
            sSearch:      'Search all columns:',
            sLengthMenu:  '_MENU_ records per page',
            info:         'Showing page _PAGE_ of _PAGES_',
            zeroRecords:  'Nothing found - sorry',
            infoEmpty:    'No records available',
            infoFiltered: '(filtered from _MAX_ total records)'
        }
    });
