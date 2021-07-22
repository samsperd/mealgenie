<template>
  <div>
            <section class="au-breadcrumb2 d-block pt-0 px-0">
                <div class="container-fluid">

    <b-skeleton-wrapper :loading="loading">
      <template #loading>
          <div style="height: 100vh !important;">
<b-skeleton-table
  :rows="4"
  :columns="3"
  :table-props="{ bordered: true, striped: true }"
></b-skeleton-table>
          </div>
      </template>
            <!-- WELCOME-->
                    <div v-if="user.role_id == '3'">
    <v-btn
    icon
    @click="goBack"
    >
      <v-icon>
          mdi-chevron-left
      </v-icon>
    </v-btn>
                        
                        <div class="col-md-12 pb-16 px-0">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">History</h3>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>Receipt</th>
                                            <th>Cafetaria</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="histories != ''">
                                        <tr class="tr-shadow" v-for="(history, index) in histories" :key="index">
                                            <td>
                                                <button v-b-modal.modal-reciept @click="getReciept(history)" class="status--process">Processed</button>
                                            </td>                                            
                                            <td>{{ history.cafetaria }}</td>
                                            <td>{{moment(history.updated_at).format('L')}}</td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </tbody>
                                    <tbody v-else>
                                        No completed orders currently
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE -->
                        </div>
            <b-modal id="modal-reciept" scrollable :title="'Order Reciept from '+theRequest.cafetaria" ok-only ok-title="close" ok-variant="dark">
                <div class="container">
                    <h4 class="row">Orders:</h4>
                    <hr>
                    <div class="text-muted" v-for="(requested, indexeddb) in theRequest.items" :key="indexeddb">
                        <h6>{{requested.name}} <b class="float-right">&#8358;{{requested.subtotal}} <sup>{{requested.quantity}}</sup></b> </h6>
                        <h6> <button class="btn btn-sm text-white bg-danger">{{requested.pack.name}}</button> x {{requested.quantity}} <div class="float-right text-muted">&#8358;{{requested.price}}</div> </h6>
                        <div class="container" v-if="requested.addons.length != '0'">
                            <h6 v-for="(addition, int) in requested.addons" :key="int">{{addition.quantity || 1}} x {{addition.name}} {{addition.price}}</h6>
                        </div>
                        <hr>
                    </div>
                    <h5 class="text-right">Subtotal: <dt class="pull-right text-dash"> &#8358;{{ theRequest.sub_total }}</dt></h5>
                    <h5 class="text-right">Total: <dt class="pull-right text-dash"> &#8358;{{ theRequest.total_amount }}</dt></h5>
                    <div class="container-fluid">
                        <h6>From: <dt>{{theRequest.user_name}}</dt></h6>
                        <h6>Location: <dt>{{theRequest.location}}</dt></h6>
                    </div>
                    <div v-if="theRequest.status == 'ACCEPTED'">
                        <small class="float-right text-success"><i class="fa fa-handshake-o"></i> {{moment(theRequest.updated_at).fromNow()}}</small>
                    </div>
                    <div v-if="theRequest.status == 'ACCEPTED'">
                        <small class="float-right text-success"><i class="fa fa-handshake-o"></i> {{moment(theRequest.updated_at).fromNow()}}</small>
                    </div>

                </div>
            </b-modal>
                    </div>


    </b-skeleton-wrapper>
    
                </div>
            </section>
  </div>
</template>

<script>
import { mapGetters, Store } from 'vuex'
var moment = require('moment');
    export default {
        middleware: 'auth',
        layout: 'worker',

        data: () => ({
            title: window.config.appName
        }),
        data() {
            return {
                histories: '',
                loading: false,
                loadingTime: 0,
                maxLoadingTime: 3,
                moment: moment,
                theRequest: ''
            }
        },
    computed: mapGetters({
        user: 'auth/user'
    }),
        created() {
            if (this.$store.getters["school/school"] == null)
            {
                this.$_loadingTimeInterval = null
                this.$router.push({ name: 'welcome' })
            } else {
                this.findOrders();
                this.$_loadingTimeInterval = null
            }

        },
        watch: {
            loading(newVal, oldValue) {
                if (newVal !== oldValue) {
                this.clearLoadingTimeInterval()

                if (newVal) {
                    this.$_loadingTimeInterval = setInterval(() => {
                    this.loadingTime++
                    }, 1000)
                }
                }
            },
            loadingTime(newVal, oldValue) {
                if (newVal !== oldValue) {
                if (newVal === this.maxLoadingTime) {
                    this.loading = false
                }
                }
            }
        },
        methods: {
            findOrders() {
                axios.post('/api/workerhistory')
                    .then((response)=>{
                        this.histories = response.data.historyt;
                    }).catch(err => {
                        console.log('error');
                    });
            },
            clearLoadingTimeInterval() {
                clearInterval(this.$_loadingTimeInterval)
                this.$_loadingTimeInterval = null
            },
            startLoading() {
                this.loading = true
                this.loadingTime = 0
            },
            getReciept(reciept) {
                if (typeof reciept.items == 'string') {
                    reciept.items = JSON.parse(reciept.items);
                }
                this.theRequest = reciept;
            },
            goBack(){
                return this.$router.go(-1);
            },
        },
        mounted() {
            this.startLoading()
        }
    }
</script>
<style>

</style>