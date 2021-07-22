<template v-if="this.user.role_id == '3'">
<div>
          <div class="card card-body bg-danger text-justify py-2" v-if="toggle == 1">
            <h6 class="text-white">Sorry, we are currently closed at the moment.</h6>
            <p>Note: Our services starts by 9:00a.m daily</p>
        </div>

<div class="bg-white row shadow fixed-bottom">
  <b-button-group class="col-12">
      <router-link active-class="active" :to="{ name: 'worker' }" tag="button" class="btn col btn-white btn-sm text-muted">
        <i class="zmdi zmdi-home zmdi-hc-lg"></i>
        <br>
        Home

      </router-link>
      <router-link active-class="active" :to="{ name: 'worker_requests' }" tag="button" class="btn col btn-white btn-sm text-muted">
        <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-lg"></i>
        <br>
        Requests
      </router-link>
      
      <router-link active-class="active" :to="{ name: 'worker_restaurants' }" tag="button" class="btn col btn-white btn-sm text-muted">
        <i class="zmdi zmdi-store zmdi-hc-lg"></i>
        <br>
        Restaurants
      </router-link>

      <router-link active-class="active" :to="{ name: 'worker_history' }" tag="button" class="btn col btn-white btn-sm text-muted">
        <i class="zmdi zmdi-badge-check zmdi-hc-lg"></i>
        <br>
        History

      </router-link>
  </b-button-group>
</div>
</div>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'
import LocaleDropdownHead from './LocaleDropdownHead'
import Cookies from 'js-cookie'


export default {
  middleware: 'auth',
  components: {
    LocaleDropdown,
    LocaleDropdownHead,
    // carts
  },
  data() {
    return{
      toggle: 1,
    }
  },

  computed: mapGetters({
    user: 'auth/user',
  }),
  created() {
    this.toggler();
  },
  methods: {
    toggler() {
    axios.post('/api/togglevalue').then((response)=>{
       this.toggle = response.data.toggle.toggle;
    }).catch(err => {
       alert('Please Try Again');
    });
      
    }
  }

}
</script>

<style>
@media screen and (max-width: 760px) {
    #sidebar-right {width: 100% !important;}
}
</style>
