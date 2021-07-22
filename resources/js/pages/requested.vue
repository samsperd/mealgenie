<template>
<div>
                            <b-skeleton-wrapper :loading="loading" height="100vh">
      <template #loading>
<b-card-group>
    <b-card>
    <b-skeleton-img animation="fade"></b-skeleton-img>
    </b-card>
    <b-card>
    <b-skeleton-img></b-skeleton-img>
    </b-card>
</b-card-group>
<b-card>
    <b-row>
</b-row>
</b-card>
      </template>
    <div v-if="user.role_id == '3'">
    <v-btn
    icon
    @click="goBack"
    >
      <v-icon>
          mdi-chevron-left
      </v-icon>
    </v-btn>
        
            <!--Requests-->
            <div class="container-fluid pb-15" v-if="requests != ''">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-bordered">
                                <thead >
                                    <tr>
                                        <th>Receipt</th>
                                        <th>Cafetaria</th>
                                        <th>Status</th>
                                        <th>date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(request, ind) in requests" :key="ind">
                                        <td><b-button variant="light" size="lg" v-b-modal.modal-reciept @click="getReciept(request)">Reciept</b-button> <br> <button class="btn btn-sm btn-pill btn-success">{{request.user_name}}</button> </td>
                                        <td>{{request.cafetaria}} <br><button class="btn btn-sm btn-pill btn-dash">&#8358;{{request.sub_total}}</button> </td>
                                        <td><button class="btn btn-secondary btn-sm" @click="accept(request.id)" v-if="request.status == 'REQUESTED'">ACCEPT</button><button class="btn btn-primary btn-sm" @click="complete(request.id)" v-if="request.status == 'ACCEPTED'">COMPLETED</button></td>
                                        <td>{{moment(request.created_at).fromNow()}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Requests-->
            <b-modal id="modal-reciept" scrollable :title="'Order Reciept from '+theRequest.cafetaria" ok-only ok-title="close" ok-variant="dark">
                <div class="container">
                    <h4 class="row">Orders:</h4>
                    <hr>
                    <div class="text-muted" v-for="(requested, indexeddb) in theRequest.items" :key="indexeddb">
                        <h6>{{requested.name}} <b class="float-right h5">&#8358;{{requested.subtotal}} <sup>{{requested.quantity}}</sup></b> </h6>
                        <h6> <button class="btn btn-sm text-white bg-danger">{{requested.pack.name}}</button> x {{requested.quantity}} <div class="float-right text-muted">&#8358;{{requested.price}}</div> </h6>
                        <div class="container" v-if="requested.addons.length != '0'">
                            <h6 v-for="(addition, int) in requested.addons" :key="int">{{addition.quantity || 1}} x {{addition.name}} {{addition.price}}</h6>
                        </div>
                        <hr>
                    </div>
                    <hr>
                    <h5 class="text-right">Subtotal: <dt class="pull-right text-dash"> &#8358;{{ theRequest.sub_total }}</dt></h5>
                    <h5 class="text-right">Total: <dt class="pull-right text-dash"> &#8358;{{ theRequest.total_amount }}</dt></h5>
                    <div class="container-fluid">
                        <h6>From: <dt>{{theRequest.user_name}}</dt></h6>
                        <h6>Phone Number: <dt>{{theRequest.phone_number}}</dt> </h6>
                    <div class="text-right" v-if="theRequest.babename">
                        <h6 class="text-secondary">Reciever's name: <i class="zmdi zmdi-heart text-danger"></i> <dt class="text-dark">{{theRequest.babename}}</dt></h6>
                        <h6 class="text-secondary">Phone Number: <dt class="text-dark">{{theRequest.babenumber}}</dt> </h6>
                    </div>
                        
                        <h6 class="text-right">Location: <dt>{{theRequest.location}}</dt></h6>
                    </div>
                    <div v-if="theRequest.status == 'ACCEPTED'">
                        <small class="float-right text-success"><i class="fa fa-handshake-o"></i> {{moment(theRequest.updated_at).fromNow()}}</small>
                    </div>

                </div>
            </b-modal>


    </div>

    </b-skeleton-wrapper>
  
</div>

</template>

<script>
import { mapGetters, Store } from 'vuex'
var moment = require('moment');

export default {
  middleware: 'auth',
  layout: 'worker',
    data() {
        return {
            school: JSON.parse(this.$store.getters["school/school"]),
            restaurants: '',
            requests: '',
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
            this.findRestaurant();
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
            findRestaurant() {
                // var id
            axios.post('/api/workerhome/'+ this.school.slug)
                .then((response)=>{
                    this.requests = response.data.resquest;
                }).catch(err => {
                    alert('Error: Please Reload this page');
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
            accept(id) {
            axios.post('/api/orderaccepted', {id: id})
                .then((response)=>{
                    this.findRestaurant();
                }).catch(err => {
                    alert('Please reload this page')
                });

            },
            complete(id) {
            axios.post('/api/ordercompleted', {id: id})
                .then((response)=>{
                    this.findRestaurant();
                }).catch(err => {
                    alert('Please reload this page')
                });

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