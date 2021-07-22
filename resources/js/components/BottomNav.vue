<template>
<div class="bg-white row shadow fixed-bottom">
  <b-button-group class="col-12">
      <router-link active-class="active" :to="{ name: 'welcome' }" tag="button" class="btn btn-white btn-sm text-muted">
        <i class="zmdi zmdi-home zmdi-hc-lg"></i>
        <br>
        Home

      </router-link>
      <router-link active-class="active" :to="{ name: 'cart' }" tag="button" class="btn btn-white btn-sm text-muted">
        <i class="zmdi zmdi-shopping-cart zmdi-hc-lg"></i>
        <br>

        Cart

      </router-link>
      
      <router-link :to="{ name: 'welcome' }" tag="button" class="btn btn-white btn-sm text-muted">
        <i class="fa fa-gift fa-lg"></i>
        <br>
        Orders
      </router-link>

      <router-link active-class="active" :to="{ name: 'profile' }" tag="button" class="btn btn-white btn-sm text-muted">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
        <br>
        Profile

      </router-link>
  </b-button-group>
</div>
</template>

<script>
import LocaleDropdown from './LocaleDropdown'
import LocaleDropdownHead from './LocaleDropdownHead'
import Cookies from 'js-cookie'


export default {
  components: {
    LocaleDropdown,
    LocaleDropdownHead,
    // carts
  },

}
</script>

<style>
@media screen and (max-width: 760px) {
    #sidebar-right {width: 100% !important;}
}
</style>
