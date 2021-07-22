<template>
    <div>
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
      >Specials
      </v-toolbar-title>
      <v-spacer></v-spacer>
          <v-btn
    
    >
    {{count}} / {{total}}
    </v-btn>

    </v-app-bar>
    <v-main>
      <v-container fluid>
      <v-row class="mt-16" dense>
        <v-col
        v-for="(product, index) in products" :key="index"
        cols="6"
        >
      <v-card
      
      >
        <v-img
          src="/images/IMG_6780-01.jpeg"
          height="100px"
        ></v-img>

        <v-card-title class="h6">
          {{ product.name }}
          <!-- <v-spacer></v-spacer>
          <small>{{ product.price }}</small> -->
          
        </v-card-title>

        <v-card-subtitle>
          {{ product.price }}
        </v-card-subtitle>

        <v-card-actions>
          <v-btn
            color="orange lighten-2"
            text
            :class="{disabled: !product.qty}" @click="(product.qty &gt; 1) ? product.qty -= 1 : $delete(product, 'qty')"
          >
            -
          </v-btn>

          <v-spacer></v-spacer>
          <v-btn
            color="orange lighten-2"
            text
          >
            {{ !product.qty ? 0 : product.qty }}
          </v-btn>

          <v-spacer></v-spacer>

          <v-btn
            color="orange lighten-2"
            text
            @click="addToCart(product)"
          >
            +
          </v-btn>
        </v-card-actions>

      </v-card>



        </v-col>

      </v-row>
      </v-container>

      <v-card
        class="mt-12"
        flat
      >
      <div class="account2 border-0">
        <v-icon
        x-large
        >mdi-delete-empty-outline</v-icon>
          <p class="display-6"></p>
          <a @click="goBack()" class="btn btn-link">Go back</a>
      </div>
      </v-card>


    </v-main>
  </div>
</template>

<script>
import { mapGetters, Store } from 'vuex'
import Cookies from 'js-cookie'

export default {
  layout: 'basic',
  data() {
      return {
    products: [{
      id: 1,
      name: "black",
      price: 99 },
    {
      id: 2,
      name: "dark-blue",
      price: 99 },
    {
      id: 3,
      name: "green",
      price: 99 },
    {
      id: 4,
      name: "grey",
      price: 99 },
    {
      id: 5,
      name: "light-blue",
      price: 99 },
    {
      id: 6,
      name: "pink",
      price: 99 },
    {
      id: 7,
      name: "purple",
      price: 99 },
    {
      id: 8,
      name: "red",
      price: 99 },
    {
      id: 9,
      name: "white",
      price: 99 }] 
      }
  },
  metaInfo () {
    return { title: this.$t('specials')}
  },
  computed: {
    cart() {
      return this.products.filter(i => i.qty);
    },
    count() {
      return this.cart.reduce((n, cart) => cart.qty + n, 0);
    },
    total() {
      return this.cart.reduce((n, cart) => cart.price * cart.qty + n, 0).toFixed(2);
    } 
  },
  
  methods: {
    goBack(){
        return this.$router.go(-1);
    },
    addToCart(product) {
      product.qty ? product.qty++ : this.$set(product, 'qty', +1);
    }
    
  },

}
</script>

<style>
    @media screen and (max-width: 760px) {
        #sidebar-right {width: 100% !important;}
    }
</style>
