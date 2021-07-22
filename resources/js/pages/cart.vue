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
      >Cart
      </v-toolbar-title>
      <v-spacer></v-spacer>
          <v-btn
    icon
    >
    </v-btn>

    </v-app-bar>

  <v-card
    class="mt-12 bg-light"
     v-if="cart.length != 0"
  >
    <v-list-item three-line>
      <v-list-item-content>
        <div class="overline mb-1 text-success">
          Order from
        </div>
        
        <v-list-item-title v-text="restaurant.name" class="h6 mb-1">
        </v-list-item-title>
        <v-list-item-subtitle v-text="restaurant.nickname">
          
        </v-list-item-subtitle>
      </v-list-item-content>

        <v-list-item-avatar tile size="70px" class="rounded">
          <v-img
          :src="'/storage/'+ restaurant.page_image"
          >

          </v-img>
        </v-list-item-avatar>
    </v-list-item>
    <v-card-actions class="py-0">
        <small class="text-muted">
            Food Pack Delivery: &#8358;<strong class="text-dark">{{ restaurant.small_pack - 50 }}</strong>
        </small>
        <!-- <v-spacer></v-spacer>
        <small class="text-muted">
            Big Pack: &#8358;<strong class="text-dark">{{ restaurant.big_pack }}</strong>
        </small>                                 -->

      <v-spacer></v-spacer>
        <v-btn
          class="red--text"
          color="white"
          depressed
        >
          {{restaurant.timer}} mins
        <v-icon
          dark
        >
          mdi-timer-outline
        </v-icon>

        </v-btn>
    </v-card-actions>
  </v-card>
    <div class="container-fluid mt-16" v-if="cart.length == 0">

  <div class="account2 border-0" style="color: #f1f1f1;">
    <v-icon></v-icon>
      <i class="zmdi zmdi-shopping-cart zmdi-hc-5x"></i>
      <p class="display-6">Cart is Empty</p>
  </div>
    </div>
  <div class="container-fluid mt-1 mb-16 pb-16" v-else>
    <b-card no-body  class="mb-3 shadow-sm" v-for="(item, indice) in cart" :key="indice">
      <v-simple-table dense>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left p-1">
            <h6 class="mb-0"><span class="btn btn-sm rounded bg-dash">x{{item.quantity}}</span> {{item.name}}</h6>
            <h6 class="btn px-0 my-0 btn-sm text-muted">Pack: <span class="text-dark font-weight-bold">{{item.quantity}} {{item.pack.name}}</span></h6>
          </th>
          <th class="text-center">
            
            <v-btn x-small class="text-dash" @click="decrement(indice)" color="white"><v-icon small>mdi-minus</v-icon></v-btn>
            <v-btn x-small class="text-dash" @click="increment(indice)" color="white"><v-icon small>mdi-plus</v-icon></v-btn>
          </th>
          <th class="text-right">
            <h6 class="text-muted">&#8358;{{item.price}}</h6>
            
          </th>
        </tr>
      </thead>
      <tbody class="border-top">
        <tr
          v-for="(addon, addy) in item.addons"
          :key="addy"
        >
          <td><span class="btn btn-sm border-dash rounded-circle text-dash">x{{addon.quantity || 1}}</span> {{ addon.name }}</td>
          <td>&#8358;{{ addon.price }}</td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
    </b-card>
  </div>

  <div  v-if="cart.length != 0">
    <v-row
      justify="center"
    >
      <v-dialog
        v-model="dialog"
        transition="dialog-bottom-transition"
        scrollable
        max-width="100%"
        content-class="h-100 m-0"
      >
        <v-card class="rounded-t-xl">
          <v-toolbar
            flat
            light
            color="white"
          >
            <v-btn
              icon
              light
              @click="dialog = false"
            >
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title >Please enter your location</v-toolbar-title>
            <v-spacer></v-spacer>
          </v-toolbar>

          <div class="bg-white" style="height: 100vh !important;">
            <form class="mt-1">
          <v-text-field
            v-model="locationed"
            filled
            rounded
            :rules="rules"
            label="Example: Annex 1 Room 1"
            required
          ></v-text-field>
                  <fieldset class="question form-check">
                    <label for="jamb_question" class="form-check-label"></label>
            <v-checkbox
              color="green"
              value="1"
              indeterminate
              @change="valueChanged($event)"
              hide-details
            >
      <template v-slot:label>
        <div>
          To Someone else <b-skeleton-icon icon="heart-fill" :icon-props="{ fontScale: 1, variant: 'danger' }"></b-skeleton-icon> ?
        </div>
      </template>            
            
            </v-checkbox>
                </fieldset>
              
                <fieldset class="answer">
          <v-text-field
            v-model="recievername"
            filled
            rounded
            label="Enter Receiver's Name"
            required
          ></v-text-field>
          <v-text-field
            v-model="recievernumber"
            filled
            rounded
            label="Enter Receiver's Phone Number"
            required
          ></v-text-field>
                  </fieldset>

            </form>
            <div>
              <div class="container">
            <v-checkbox
              color="green"
              value="1"
              label="Coupon ?"
              indeterminate
              @change="couponChanged($event)"
              hide-details
            ></v-checkbox>
              </div>
              
                <fieldset class="coupon">
                  <small class="text-danger" v-if="aftercouponed != ''">{{infoforcoupon}} N{{summed}} = N{{aftercouponed}}</small>
                  <small class="text-danger" v-else>{{infoforcoupon}}</small>
                 
              <div class="form-group">
                  <div class="input-group">
                      <input v-model="coupon" :disabled="checking" type="text" id="coupons" name="coupons" placeholder="Coupons" class="form-control">
                      <div @click="submitCoupon()" class="input-group-addon btn btn-dash">
                        Check
                      </div>
                  </div>
              </div>
                </fieldset>
            </div>
          </div>
        <v-card-actions class="justify-content-end">
          <v-btn
          large
          @click="checkFinish()"
          color="orange darken-4" 
          style="color: white !important;" 
          elevation="3"
          v-if="aftercouponed != ''"
          >
            Pay &#8358;{{aftercouponed}}
          </v-btn>
          <v-btn
          large
          @click="checkFinish()"
          color="orange darken-4" 
          style="color: white !important;" 
          elevation="3"
          v-else
          >
            Pay &#8358;{{summed}}
          </v-btn>
        </v-card-actions>

        </v-card>
      </v-dialog>
    </v-row>
  </div>


  <v-bottom-navigation v-if="cart.length != 0" fixed height="80px">
    <v-container class="d-flex pa-5">
          <v-btn
          @click="dialog = true"
          block 
          color="green" 
          style="color: white !important;" 
          elevation="3"
          >
            PROCEED
          </v-btn>
    </v-container>
  </v-bottom-navigation>
    </div>
</template>

<script>
import { mapGetters, Store } from 'vuex'
import Cookies from 'js-cookie'

export default {
  layout: 'basic',
  data() {
      return {
          loading: false,
          loadingTime: 0,
          maxLoadingTime: 3,
          dialog: false,
          locationed: '',
          summed: 0,
          checking: false,
          beforecouponed: '',
          recievername: '',
          recievernumber: '',
          rules: [
            value => !!value || 'Required.',
            value => (value || '').length <= 20 || 'Max 20 characters',
          ],
          coupon: '',
          msgcoupon: '',
          infoforcoupon: '',
          aftercouponed: '',
      }
  },
  computed: mapGetters({
    cart: 'cart/cart',
    restaurant: 'cart/restaurant'
  }),
  metaInfo () {
    return { title: this.$t('cart')}
  },
  updated(){
    if (this.cart != null) {
        this.summed = this.cart.reduce((acc, item) => acc + Number(item.price), 0);
    }
  },
  methods: {
    submitCoupon() {
        if (this.coupon != '') {
          // fetch('/api/couponcheck')
          // .then(response => response.json())
          this.checking = true;
            var self = this 
            $.ajax({
                url: '/api/couponcheck',
                method: 'POST',
                data: {
                    "code": this.coupon
                },
                success: function (data) {
                    self.msgcoupon = data.coupon;
                    var successcoupon = data.coupon;
                    if (successcoupon != 1) {
                      if (self.summed > successcoupon.max) {
                        var percent = successcoupon.discount/100;
                        var percentaged = percent * self.summed;
                        self.aftercouponed = self.summed - percentaged;
                        self.infoforcoupon = successcoupon.preamble;
                      } else {
                        self.infoforcoupon = 'Minimum price for this coupon is N' + successcoupon.max;
                      }
                    } else {
                        self.infoforcoupon = 'Sorry, this coupon is expired or doesn\'t exist';
                    }
                },
                error: function (error) {
                    alert('please try again')
                }
            });
        }
    },
    increment(enter) {
        var increase = this.$store.state.cart.cart[enter];
        increase.quantity++;
        increase.price = increase.quantity * increase.tabbed;
    },
    decrement(enter) {
        var decrease = this.$store.state.cart.cart[enter];
        if (decrease.quantity > 1) {
          decrease.quantity--;
        decrease.price = decrease.tabbed * decrease.quantity;
        } else {
          this.$store.state.cart.cart.splice(enter, 1);
        }
    },
    checkFinish() {
        var subtt = this.cart.reduce((acc, item) => acc + Number(item.subtotal), 0);
        if (this.locationed == '') {
          alert("Please tell us how to find you")
        } else {
            if (this.recievername == '' && this.recievernumber != '') {
              alert("Please complete the reciever's information");
              abort();
            } else if(this.recievername != '' && this.recievernumber == ''){
              alert("Please complete the reciever's information");
              abort();
            }
        var submitter = [];
        var submitme = null;
        if (this.msgcoupon == 1) {
          this.coupon = '';
        }
        if (this.msgcoupon == '') {
          this.coupon = ''
        }
        if (this.aftercouponed != '') {
          this.beforecouponed = this.summed;
        } else {
          this.aftercouponed = this.summed;
        }
        submitter.push({whichcaf : this.restaurant.name, couponcode : this.msgcoupon.code, beforecouponed : this.beforecouponed, cafid: this.restaurant.id, foods_ordered : this.$store.getters['cart/cart'], allfamount : subtt, allttamount : this.aftercouponed, babename : this.recievername, babenumber : this.recievernumber, locatedat : this.locationed});
        submitme = {whichcaf : this.restaurant.name, couponcode : this.coupon, beforecouponed : this.beforecouponed, cafid: this.restaurant.id, foods_ordered : this.$store.getters['cart/cart'], allfamount : subtt, allttamount : this.aftercouponed, babename : this.recievername, babenumber : this.recievernumber, locatedat : this.locationed};
        sessionStorage.setItem('stored_order', JSON.stringify(submitme))
        this.$router.push({ name: 'checkout' });
      }
    },
    valueChanged(event) {
        if(event == '1') {   
          $(".answer").show();
        }
        else{
          $(".answer").hide();
        }

    },
    couponChanged(event) {
        if(event == '1') {   
          $(".coupon").show();
        }
        else{
          $(".coupon").hide();
        }

    },
    goBack(){
        return this.$router.go(-1);
    }            
  },

    mounted() {

    }
}
</script>

<style>
    @media screen and (max-width: 760px) {
        #sidebar-right {width: 100% !important;}
    }
    .answer {
        display: none;
    }
    .coupon {
      display: none;
    }
    .v-dialog__content {
      bottom: 0;
      top: auto;
      height: 70%;
    }
    .v-dialog:not(.v-dialog--fullscreen) {
      max-height: 100%;
    }
    input:checked{
      background-color: green;
    }
</style>
