<template>
  <div>
            <section class="au-breadcrumb2 d-block">
                <div class="container">

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
      >History
      </v-toolbar-title>
      <v-spacer></v-spacer>
          <v-btn
    icon
    >
    </v-btn>

    </v-app-bar>


                    <div class="row" style="height: 100vh !important;">
                        <div class="col-md-12">
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
                                                <span class="status--process">Processed</span>
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
                    </div>




    </b-skeleton-wrapper>
    
                </div>
            </section>
  </div>
</template>

<script>
var moment = require('moment');
    export default {
        middleware: 'auth',
        layout: 'default',

        data: () => ({
            title: window.config.appName
        }),
        data() {
            return {
                histories: '',
                loading: false,
                loadingTime: 0,
                maxLoadingTime: 3,
                moment: moment
            }
        },
        created() {
                this.$_loadingTimeInterval = null
                this.findOrders();

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
                axios.post('/api/historypack')
                    .then((response)=>{
                        this.histories = response.data.historyt;
                        console.log(response);
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