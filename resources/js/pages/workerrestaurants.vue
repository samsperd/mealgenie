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
        
            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row" v-if="restaurants != null">
                        <div class="col-md-6 col-lg-3 mb-2" v-for="(restaurant, index) in restaurants" :key="index">
                        <router-link :to="{ name: 'worker_menu', params: {slug: restaurant.slug} }" tag="div" class="statistic__item border border-warning mb-0 pb-0">
                                <span class="desc font-weight-bold text-dark">{{restaurant.name}}</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-cutlery"></i>
                                </div>
                        </router-link>
                        <button class="btn btn-block btn-danger" @click="toggleRestaurant(restaurant.id)" v-if="restaurant.status == 'OPEN'">Disable</button>
                        <button class="btn btn-block btn-success" @click="toggleRestaurant(restaurant.id)" v-else-if="restaurant.status == 'CLOSE'">Enable</button>
                        </div>
                    </div>
                </div>
            </section>
    </div>

    </b-skeleton-wrapper>
  
</div>

</template>

<script>
import { mapGetters, Store } from 'vuex'
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
            maxLoadingTime: 3
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
            axios.post('/api/workerhome/'+ this.school.slug)
                .then((response)=>{
                    this.restaurants = response.data.cafetarias;
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
        toggleRestaurant(id) {
            axios.post('/api/togglerestaurant', {id: id})
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