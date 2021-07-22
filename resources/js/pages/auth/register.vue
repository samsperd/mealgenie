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
                  <card v-if="mustVerifyEmail" :title="$t('register')">
                    <div class="alert alert-success" role="alert">
                      {{ $t('verify_email_address') }}
                    </div>
                  </card>
                  <card v-else :title="$t('register')">
                    <h6 class="text-center small">Have an account?
                        <router-link :to="{ name: 'login' }">
                            {{ $t('login') }}
                        </router-link>                                    
                    </h6>
                    <!-- Google Login Button -->
                    <login-with-google />
                    
                    <form @submit.prevent="register" @keydown="form.onKeydown($event)">
                      <!-- Name -->
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
                        <div class="col-md-7">
                          <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
                          <has-error :form="form" field="name" />
                        </div>
                      </div>

                      <!-- Name -->
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Phone Number</label>
                        <div class="col-md-7">
                          <input v-model="form.phone_number" :class="{ 'is-invalid': form.errors.has('phone_number') }" class="form-control" type="tel" name="phone_number">
                          <has-error :form="form" field="phone_number" />
                        </div>
                      </div>

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

                      <!-- Password Confirmation -->
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">{{ $t('confirm_password') }}</label>
                        <div class="col-md-7">
                          <input v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control" type="password" name="password_confirmation">
                          <has-error :form="form" field="password_confirmation" />
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-7 offset-md-3 d-flex">
                          <!-- Submit Button -->
                          <v-button class="btn-success text-white" :loading="form.busy">
                            {{ $t('register') }}
                          </v-button>

                          <!-- GitHub Register Button -->
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
export default {
  middleware: 'guest',
  layout: 'basic',

  components: {
    LoginWithGithub,
    LoginWithGoogle
  },

  metaInfo () {
    return { title: this.$t('register') }
  },

  data: () => ({
    form: new Form({
      name: '',
      phone_number: '',
      email: '',
      password: '',
      password_confirmation: ''
    }),
    mustVerifyEmail: false
  }),

  methods: {
    async register () {
      // Register the user.
      const { data } = await this.form.post('/api/register')

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true
      } else {
        // Log in the user.
        const { data: { token } } = await this.form.post('/api/login')

        // Save the token.
        this.$store.dispatch('auth/saveToken', { token })

        // Update the user.
        await this.$store.dispatch('auth/updateUser', { user: data })

        // Redirect home.
        this.$router.push({ name: 'welcome' })
      }
    }
  }
}
</script>
