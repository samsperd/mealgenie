<template>
<div>
    <v-app-bar
      color="white"
      :elevation="0"
      fixed
    >
    <v-btn
    icon
    @click="goBack"
    >
      <v-icon>
          mdi-arrow-left
      </v-icon>
    </v-btn>
    <v-spacer></v-spacer>
      <v-toolbar-title
      >Payment Options
      </v-toolbar-title>
      <v-spacer></v-spacer>
          <v-btn
    icon
    >
    </v-btn>

    </v-app-bar>
    <v-container class="mt-16 pt-4">
            <paystack
              class="btn btn-lg btn-block border text-dark"
              :amount="cartItems.allttamount * 100"
              :email="$store.getters['auth/user'].email"
              :paystackkey="PUBLIC_KEY"
              :callback="processPayment"
              :reference="genRef()"
              :close="close"
              :embed="false"
            >
    <v-avatar size="30px">
      <v-img 
      src="https://website-v3-assets.s3.amazonaws.com/assets/img/hero/Paystack-mark-white-twitter.png"></v-img>
    </v-avatar>
            Pay with paystack</paystack>
    <flutterwave-pay-button
        :tx_ref="generateReference()"
        :amount="cartItems.allttamount"
        currency='NGN'
        payment_options="card,ussd"
        redirect_url=""
        class="btn btn-block btn-lg border"
        style=""
        :meta="{counsumer_id: 'green' ,consumer_mac: 'genie' }"
        :customer="{ name: user.name,
        email: user.email, 
        phone_number: user.phone_number }"
        :customizations="{  title: 'Djinpod' ,
        description: 'Customization Description'  ,
        logo : 'https://www.djinpod.com/images/icon.png' }"
        :callback="makePaymentCallback"
        :onclose="closedPaymentModal"
    >
    <v-avatar size="30px">
      <v-img 
      src="data:image/png;base64,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"></v-img>
    </v-avatar>
    Pay with flutterwave </flutterwave-pay-button>            
    </v-container>
  
</div>
</template>

<script>
import paystack from 'vue-paystack';
import uniqid from "uniqid";

export default {
  middleware: 'auth',
  layout: 'basic',
  components: {
    paystack
  },
  
  data() {
    return {
      cartItems: JSON.parse(sessionStorage.getItem('stored_order')) || null,
      form: '',
      PUBLIC_KEY: "pk_live_8315275b6a7e48127251cb2fa65e7afacc3f06b0",
      theId: '',
      user: this.$store.getters['auth/user'],
    }
  },
  beforeCreate() {
    var toggle = '';
      axios.post('/api/togglevalue')
      .then((response)=>{
        toggle = response.data.toggle.toggle;
        console.log(response);
        if (toggle == 1) {
          this.$router.push({ name: 'home' });
        }
      }).catch(err => {
        alert('Please Try Again');
        location.reload();
      });


  },
  created() {
    this.cartItems = JSON.parse(sessionStorage.getItem('stored_order'))
    if (this.cartItems == null) {
      this.$router.go(-1)
    } else {
      axios.post('/api/submitcart', {dd:this.cartItems, ds: this.$store.getters['auth/user'].name, dc: this.$store.getters['auth/user'].id, db: this.$store.getters['auth/user'].phone_number}
      ).then((response)=>{
        this.theId = response.data.sch;
      }).catch(err => {
        alert('Please Try Again');
      });
    }
  },
  updated() {
    this.genRef();
    this.generateReference();
  },
  methods: {
    processPayment() {
          this.$store.state.cart.cart = [];
          this.$store.state.cart.restaurant = undefined;
          axios.post('/api/payed', {id: this.theId}
            ).then((response)=>{
              sessionStorage.clear();
              this.$bvToast.toast(` Order made. You will get your order soon.`, {
                  autoHideDelay: 1000,
                  title: '',
                  headerClass:'bg-white',
                  toaster: 'b-toaster-top-full',
                  variant: 'success',
                  solid: true,
                  bodyClass: 'text-dark'
              })
              
            this.$router.push({ name: 'home' })

            }).catch(err => {
              alert('Please Try Again er');
            });

    },
    close() {
      // console.log('payment modal is closed');
     
    },
    genRef() {
      return uniqid("pstk-");
    },
    goBack(){
        return this.$router.go(-1);
    },
    makePaymentCallback(response) {
      this.processPayment();
    },
    closedPaymentModal() {
      // console.log('payment modal is closed');
    },
    generateReference(){
      let date = new Date()
      return date.getTime().toString();
    }
  },
  computed: {
   reference() {
      let text = "";
      let possible =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      for (let i = 0; i < 10; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));
      return text;
    }
  },
  mounted() {

  }
}
</script>
