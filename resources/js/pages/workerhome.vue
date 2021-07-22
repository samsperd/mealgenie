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
        
        <div class="card card-body">
            <div class="h4 text-center">
                Activate Djinpod
            </div>
            <div class="col-12">
                <button v-if="toggle == '0'" @click="toggled" class="btn btn-block btn-danger">
                    Disable
                </button>
                <button v-if="toggle == '1'" @click="toggled" class="btn btn-block btn-success">
                    Enable
                </button>
            </div>
        </div>
            <!-- STATISTIC-->
            <section class="statistic statistic2 pb-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                        <router-link :to="{ name: 'worker_requests' }" tag="div" class="statistic__item statistic__item--blue">
                                <h2 class="number text-danger font-weight-bold">{{resquest}}</h2>
                                <span class="desc font-weight-bold">Requests</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>                        
                        </router-link>
                        </div>


                        <div class="col-md-6 col-lg-3">
                        <router-link :to="{ name: 'worker_history' }" tag="div" class="statistic__item statistic__item--green">
                                <span class="h4"><i class="zmdi zmdi-info"></i></span>
                                <br>
                                <span class="desc font-weight-bold">History</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                        </router-link>
                        </div>
                        <div class="col-md-6 col-lg-3">
                        <router-link :to="{ name: 'worker_restaurants' }" tag="div" class="statistic__item statistic__item--orange">
                                <h2 class="number">{{restaurants}}</h2>
                                <span class="desc font-weight-bold">Restaurants</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                        </router-link>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->
    </div>

    </b-skeleton-wrapper>
  
</div>

</template>

<script>
import { mapGetters } from 'vuex'
import Cookies from 'js-cookie'
export default {
  middleware: 'auth',
  layout: 'worker',
    data() {
        return {
            school: JSON.parse(this.$store.getters["school/school"]),
            restaurants: '',
            resquest: '',
            loading: false,
            loadingTime: 0,
            maxLoadingTime: 3,
            toggle: ''
        }
    },
    computed: mapGetters({
        user: 'auth/user',
    }),
    created() {
        if (this.$store.getters["school/school"] == null)
        {
            this.$_loadingTimeInterval = null
            this.$router.push({ name: 'welcome' })
        } else {
            if (this.user.role_id == '3') {
                this.findRestaurant();
                this.$_loadingTimeInterval = null
            } else {
                return this.$router.go(-1);
            }
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
            axios.post('/api/workerhome/'+ this.school.slug)
                .then((response)=>{
                    this.restaurants = response.data.cafetarias.length;
                    this.resquest = response.data.resquest.length;
                    this.toggle = response.data.toggle.toggle;
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
        toggled(){
            axios.post('/api/toggle')
                .then((response)=>{
                    location.reload();
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