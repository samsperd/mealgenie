<template>
<div class="bg-white">
        <span style="left: 0 !important;">
          <router-link :to="{ name:  'welcome' }" class="logo" tag="img" src="/images/icon/potential-logo11.png">
          </router-link>
          
        </span>
        <section class="p-t-40 p-b-55">
            <div class="container">
              <div class="row">
                <div class="col-lg-8 m-auto">
                  <card :title="$t('login')">
                    <h6 class="text-center small">Don't have an account?
                        <router-link :to="{ name: 'register' }">
                            {{ $t('register') }}
                        </router-link>                                    
                    </h6>
                    <!-- Google Login Button -->
                    <login-with-google />

                    <form @submit.prevent="login" @keydown="form.onKeydown($event)">
                      <!-- Email -->
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
                        <div class="col-md-7">
                          <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
                          <has-error :form="form" field="email" />
                        </div>
                      </div>

                      <!-- Password -->
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label>
                        <div class="col-md-7">
                          <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password">
                          <has-error :form="form" field="password" />
                        </div>
                      </div>

                      <!-- Remember Me -->
                      <div class="form-group row">
                        <div class="col-md-3" />
                        <div class="col-md-7 d-flex">
                          <checkbox v-model="remember" name="remember">
                            {{ $t('remember_me') }}
                          </checkbox>

                          <router-link :to="{ name: 'password.request' }" class="small ml-auto my-auto">
                            {{ $t('forgot_password') }}
                          </router-link>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-7 offset-md-3 d-flex">
                          <!-- Submit Button -->
                          <v-button :loading="form.busy" class="btn-success text-white">
                            {{ $t('login') }}
                          </v-button>

                          <!-- GitHub Login Button -->
                          <login-with-github />
                        </div>
                      </div>
                    </form>
                  </card>
                </div>
              </div>
            </div>
        </section>
        <!-- END WELCOME-->

</div>
</template>

<script>
import Form from 'vform'
import LoginWithGithub from '~/components/LoginWithGithub'
import LoginWithGoogle from '~/components/LoginWithGoogle'
import Cookies from 'js-cookie'


export default {
  middleware: 'guest',
  layout: 'basic',

  components: {
    LoginWithGithub,
    LoginWithGoogle
  },

  metaInfo () {
    return { title: this.$t('login') }
  },

  data: () => ({
    form: new Form({
      email: '',
      password: ''
    }),
    remember: false
  }),

  methods: {
    async login () {
      // Submit the form.
      try {
      const { data } = await this.form.post('/api/login')

      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.token,
        remember: this.remember
      })

      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')
      // Redirect home.
      this.redirect()

      } catch (e) {
        console.log(e);
      }


    },

    redirect () {
      const intendedUrl = Cookies.get('intended_url')

      if (intendedUrl) {
        Cookies.remove('intended_url')
        this.$router.push({ path: intendedUrl })
      } else {
        this.$router.push({ name: 'welcome' })
      }
    }    
  }
}
</script>
