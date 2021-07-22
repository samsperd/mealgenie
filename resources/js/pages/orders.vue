<template>
    <div>
    <v-app-bar
      color="white"
      elevation="3"
      fixed
    >
    <v-btn
    icon
    @click="goBack"
    >
      <v-icon>
          mdi-chevron-left
      </v-icon>
    </v-btn>
    <v-spacer></v-spacer>
      <v-toolbar-title
      >Orders
      </v-toolbar-title>
      <v-spacer></v-spacer>
          <v-btn
    icon
    >
    </v-btn>

    </v-app-bar>
  <v-card
    class="mt-16 bg-light"
     v-if="authenticated"
  >
            <!--Requests-->
            <div class="section__content section__content--p30 px-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <h6 class="btn btn-lg btn-light font-weight-bold ">Requests</h6>
  <v-simple-table v-if="requests != ''">
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">
            Receipt
          </th>
          <th class="text-left">
            Status
          </th>
          <th class="text-left">
            Cafetaria
          </th>
          <th class="text-left">
            Time
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
         v-for="(request, ind) in requests" :key="ind"
        >
          <td><b-button variant="outline-success" v-b-modal.modal-reciept @click="getReciept(request)">Reciept</b-button></td>
          <td>
            <div v-if="request.status == 'ACCEPTED'">
                <small class="float-right text-success"><i class="fa fa-handshake-o"></i> Processing</small>
            </div>
            <div v-else-if="request.status == 'REQUESTED'">
                <small class="float-right text-success"><i class="fa fa-check"></i> Requested</small>
            </div>
          </td>
          <td>{{request.cafetaria}}</td>
          <td>{{moment(request.created_at).fromNow()}}</td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>


                                <!-- <table class="table table-borderless">
                                    <thead >
                                        <tr>
                                            <th>Receipt</th>
                                            <th>Cafetaria</th>
                                            <th>date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(request, ind) in requests" :key="ind">
                                            <td><b-button variant="outline-success" v-b-modal.modal-reciept @click="getReciept(request)">Reciept</b-button></td>
                                            <td>{{request.cafetaria}}</td>
                                            <td>{{moment(request.created_at).fromNow()}}</td>
                                        </tr>
                                    </tbody>
                                </table> -->
                        </div>
                    </div>
                </div>
            </div>

            <!--End Requests-->
            <b-modal id="modal-reciept" scrollable :title="'Order Reciept from '+theRequest.cafetaria" ok-only ok-title="close" ok-variant="dark">
                <div class="container">
                    <h4 class="row">Orders:</h4>
                    <div class="text-muted" v-for="(requested, indexeddb) in theRequest.items" :key="indexeddb">
                        <hr>
                        <h6>{{requested.name}} <sup class="text-danger">{{requested.pack.name}}</sup> <div class="float-right">&#8358;{{requested.tabbed}}<sup>{{requested.quantity}}</sup></div> </h6>
                        <h6> <button class="btn btn-sm bg-danger">{{requested.pack.name}}</button> x {{requested.quantity}} <b class="float-right">&#8358;{{requested.price}}</b> </h6>
                        <div class="container" v-if="requested.addons.length != '0'">
                            <h6 v-for="(addition, int) in requested.addons" :key="int">{{addition.quantity || 1}} x {{addition.name}} {{addition.price}}</h6>
                        </div>
                    </div>
                    <hr>
                    <h5 class="text-right">Total: <dt class="pull-right text-dash"> &#8358;{{ theRequest.total_amount }}</dt></h5>
                    <div v-if="theRequest.status == 'ACCEPTED'">
                        <small class="float-right text-success"><i class="fa fa-handshake-o"></i> {{moment(theRequest.updated_at).fromNow()}}</small>
                    </div>
                </div>
            </b-modal>



  </v-card>
  <!-- <v-card
    class="mt-12"
  v-else
  >
  <div class="account2 border-0">
    <v-icon
    x-large
    >mdi-delete-empty-outline</v-icon>
      <p class="display-6"></p>
  </div>
  </v-card> -->
    </div>
</template>

<script>
import { mapGetters, Store } from 'vuex'
import Cookies from 'js-cookie'
var moment = require('moment');

export default {
  middleware: 'auth',
  layout: 'default',
  data() {
      return {
          loading: false,
          requests: '',
          dialog: false,
          locationed: '',
          theRequest: '',
          moment: moment,
      }
  },
  metaInfo () {
    return { title: this.$t('orders')}
  },
  created(){
      if (this.authenticated) {
        this.findRequests();
      }
  },

  computed: mapGetters({
    authenticated: 'auth/check',
  }),
  methods: {
    findRequests() {
        // var id
        axios.post('/api/requests/')
            .then((response)=>{
                this.requests = response.data.resquest;
            }).catch(err => {
                alert('Please Reload')
            });
    },
    goBack(){
        return this.$router.go(-1);
    },
    getReciept(reciept) {
        if (typeof reciept.items == 'string') {
            reciept.items = JSON.parse(reciept.items);
        }
        this.theRequest = reciept;
    }
  },

    mounted() {

    }
}
</script>

<style>
    @media screen and (max-width: 760px) {
        #sidebar-right {width: 100% !important;}
    }
    .answer {
        display: none;
    }
    .v-dialog__content {
      bottom: 0;
      top: auto;
      height: 70%;
    }
    .v-dialog:not(.v-dialog--fullscreen) {
      max-height: 100%;
    }
    input:checked{
      background-color: green;
    }
</style>
