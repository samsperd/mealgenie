<template>
<div>

            <!-- STATISTIC-->
            <section class="statistic statistic2 pt-0">
              
                <div class="container-fluid">
                    <div class="row">
        <v-container
        class="px-0"
        >
        <template v-if="user">
          <v-card
            light
            flat
            color="white"
            class="p-0 m-0"
          >
            <div class="d-flex flex-no-wrap">
              <div class="col-auto">
              <v-avatar
                size="40px"
              >
                <b-skeleton-icon
                    icon="person-circle"
                    :icon-props="{ fontScale: 2.5, variant: 'light' }"
                ></b-skeleton-icon>
              </v-avatar>
              </div>
              
              <div class="col p-1">
                <v-card-title
                  class="p-1 h5"
                  
                >{{ user.name }}</v-card-title>

                <v-card-subtitle class="p-1 body-1">{{ user.phone_number }}</v-card-subtitle>
              </div>

            </div>
          </v-card>
          <!-- <v-card flat>
          <v-btn
          small
            rounded
            block
            depressed
            color="green lighten-1"
            dark
            @click.prevent="logout"
          >
            <v-icon
            >
            mdi-power-standby
            </v-icon>
            {{ $t('logout') }}
          </v-btn>
          </v-card> -->
        </template>
        <template v-else>
                <div class="container">
                    <div class="row mb-2">
                        <router-link :to="{name: 'login'}" tag="button" class="btn btn-lg btn-block btn-light btn-pill">
                            Sign in
                        </router-link>
                    </div>
                </div>
        </template>
          <v-card flat class="bg-dash">
            <v-card-title>FREE COUPON(S)</v-card-title>
<div v-if="coupons != null">
            <v-card-text v-for="(coupon, index) in coupons" :key="index">
              <v-row
                align="center"
                class="mx-0"
                 
              >
                <div class="grey--text ml-4">
                  {{ coupon.preamble }}
                </div>
              </v-row>

              <div class="my-4 text-right text-danger font-weight-bolder h6">
                {{ coupon.code }}
              </div>

              <div>{{ coupon.description }}</div>
            </v-card-text>
</div>
          </v-card>
          <v-card flat class="bg-light">

            <v-list-item-group
              color="primary"
            >
            <template v-if="user">
              <router-link :to="{name: 'history'}" tag="v-list-item">
                <v-list-item-icon>
                  <i class="zmdi zmdi-storage"></i>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>History</v-list-item-title>
                </v-list-item-content>
              </router-link>
              <router-link :to="{ name: 'settings.profile' }" tag="v-list-item">
                <v-list-item-icon>
                  <i class="zmdi zmdi-settings"></i>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>{{ $t('settings') }}</v-list-item-title>
                </v-list-item-content>
              </router-link>
              <hr>
            </template>
              <router-link :to="{name: 'support'}" tag="v-list-item">
                <v-list-item-icon>
                  <i class="zmdi zmdi-lamp"></i>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>Support</v-list-item-title>
                </v-list-item-content>
              </router-link>
              <router-link :to="{name: 'blog'}" tag="v-list-item">
                <v-list-item-icon>
                  <i class="zmdi zmdi-file-text"></i>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>Blog</v-list-item-title>
                </v-list-item-content>
              </router-link>


            </v-list-item-group>

          </v-card>
        </v-container>
        <v-container v-if="user">
          <v-btn
            rounded
            block
            depressed
            outlined
            color="yellow lighten-1"
            dark
            @click.prevent="logout"
          >
            <v-icon
            >
            mdi-power-standby
            </v-icon>
            {{ $t('logout') }}
          </v-btn>

        </v-container>
                    </div>
                  </div>
              
            </section>

  
</div>

</template>

<script>
import { mapGetters, Store } from 'vuex'
import LoginWithGoogle from '~/components/LoginWithGoogle'
import Cookies from 'js-cookie'
import axios from 'axios'

export default {
  layout: 'default',
  metaInfo () {
    return { title: 'Profile' }
  },
components: {
    LoginWithGoogle
},

    data() {
        return {
            loading: false,
            loadingTime: 0,
            maxLoadingTime: 3,
            coupons: null,
        }
    },

  computed: mapGetters({
    user: 'auth/user',
    school: 'school/school'
  }),
    created() {
            this.$_loadingTimeInterval = null
            this.coupond();

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
        async logout () {
          // Log out the user.
          await this.$store.dispatch('auth/logout')

          // Redirect to login.
          this.$router.push({ name: 'login' })
        },
        clearLoadingTimeInterval() {
            clearInterval(this.$_loadingTimeInterval)
            this.$_loadingTimeInterval = null
        },
        startLoading() {
            this.loading = true
            this.loadingTime = 0
        },
        coupond() {
                axios.post('/api/coupons')
                    .then((response)=>{
                        this.coupons = response.data.coupons;
                    }).catch(err => {
                        console('Please Reload this page')
                    });
          
        }
        
    },
    mounted() {
        this.startLoading()
    }
}
</script>
<style>

</style>