<template>
<div>
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
            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="card card-body h2 bg-light">
                            Coming soon...
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->
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