<template>
<div style="height: 100vh;">
                            <b-skeleton-wrapper :loading="loading" height="100vh">
      <template #loading>
<b-card-group>
    <b-card>
    <b-skeleton animation="fade"></b-skeleton>
    </b-card>
</b-card-group>
<b-card>
    <b-row>
</b-row>
</b-card>
      </template>
            <!-- STATISTIC CHART-->
            <section class="statistic-chart mb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <h3 class="title-4 m-b-35 text-italics"><u>How To Use</u></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <!-- CHART PERCENT-->
                            <div class="chart-percent-2" style="height: 350px !important;">
                                <img src="/images/icon/howtouse1a.png" class="img-fluid" alt="How to use">
                                <h5 class="font-italic text-center">Choose school & select food and drinks from your favourite restaurant</h5>
                            </div>
                            <!-- END CHART PERCENT-->
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <!-- CHART PERCENT-->
                            <div class="chart-percent-2" style="height: 350px !important;">
                                <img src="/images/icon/howtouse2d.png" class="img-fluid" alt="How to use">
                                <h5 class="font-italic text-center">Pay online...</h5>
                            </div>
                            <!-- END CHART PERCENT-->
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <!-- CHART PERCENT-->
                            <div class="chart-percent-2" style="height: 350px !important;">
                                <img src="/images/icon/howtouse3a.png" class="img-fluid" alt="How to use">
                                <h5 class="font-italic text-center">Order delivered to your room!</h5>
                            </div>
                            <!-- END CHART PERCENT-->
                        </div>
                    </div>
                </div>
            </section>
            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">

                    <div class="row">
                        <div class="card card-body bg-danger text-white h6">
                        <p>Please Note: Djinpod is strictly a cashless institution. Any form of cash transactions from workers of this service, is strictly forbidden. 
                        </p>
                        <p>
                            Therefore, The Government of this Organization will not be responsible for frivolities in customer's foods. We hope you adhere to our warnings.
                        </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->
            
            <!-- STATISTIC CHART-->
            <section class="statistic-chart bg-success mt-2">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <h3 class="title-5 m-b-35 text-uppercase text-white">Subscribe to our newletters</h3>
                        </div>
                    </div>
                    <div class="row">
                      <!-- <form action="" method="post"> -->
                        <div class="form-group col-12">
                          <input type="text" class="form-control" name="newsletters">
                        </div>
                        <div class="form-group col-12">
                          <input type="button" value="Subscribe" class="btn btn-dash float-right">
                        </div>
                      <!-- </form> -->
                    </div>
                </div>
            </section>
            <!-- END STATISTIC CHART-->
            
            <footers />


    </b-skeleton-wrapper>
  
</div>

</template>

<script>
import Footers from '../components/footer'
export default {
components: {
    Footers
},

    data() {
        return {
            loading: false,
            loadingTime: 0,
            maxLoadingTime: 3
        }
    },
    created() {
            this.$_loadingTimeInterval = null

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
        clearLoadingTimeInterval() {
            clearInterval(this.$_loadingTimeInterval)
            this.$_loadingTimeInterval = null
        },
        startLoading() {
            this.loading = true
            this.loadingTime = 0
        },
        
    },
    mounted() {
        this.startLoading()
    }
}
</script>
<style>

</style>