<template>
<div>
    <div class="row justify-content-center p-3">
        <button class="btn btn-pill btn-primary col-12 m-1" type="button">
            <fa :icon="['fab', 'google']" />
            {{ $t('Continue with Google') }}
        </button>
      
        <!-- <button class="btn btn-pill btn-primary col-12 m-1" type="button" @click="login">
            <fa :icon="['fab', 'google']" />
            {{ $t('Continue with Google') }}
        </button> -->
    </div>
    <div class="hr">
        <span class="hr-text px-3 small">or continue with email</span>
    </div>
</div>
</template>

<script>
export default {
  name: 'LoginWithGoogle',

  computed: {
    githubAuth: () => window.config.googleAuth,
    url: () => `/api/oauth/google`
  },

  mounted () {
    window.addEventListener('message', this.onMessage, false)
  },

  beforeDestroy () {
    window.removeEventListener('message', this.onMessage)
  },

  methods: {
    async login () {
      const newWindow = openWindow('', this.$t('login'))

      const url = await this.$store.dispatch('auth/fetchOauthUrl', {
        provider: 'google'
      })

      newWindow.location.href = url
    },

    /**
     * @param {MessageEvent} e
     */
    onMessage (e) {
      if (e.origin !== window.origin || !e.data.token) {
        return
      }

      this.$store.dispatch('auth/saveToken', {
        token: e.data.token
      })

      this.$router.push({ name: 'welcome' })
    }
  }
}

/**
 * @param  {Object} options
 * @return {Window}
 */
function openWindow (url, title, options = {}) {
  if (typeof url === 'object') {
    options = url
    url = ''
  }

  options = { url, title, width: 600, height: 720, ...options }

  const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screen.left
  const dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screen.top
  const width = window.innerWidth || document.documentElement.clientWidth || window.screen.width
  const height = window.innerHeight || document.documentElement.clientHeight || window.screen.height

  options.left = ((width / 2) - (options.width / 2)) + dualScreenLeft
  options.top = ((height / 2) - (options.height / 2)) + dualScreenTop

  const optionsStr = Object.keys(options).reduce((acc, key) => {
    acc.push(`${key}=${options[key]}`)
    return acc
  }, []).join(',')

  const newWindow = window.open(url, title, optionsStr)

  if (window.focus) {
    newWindow.focus()
  }

  return newWindow
}
</script>
