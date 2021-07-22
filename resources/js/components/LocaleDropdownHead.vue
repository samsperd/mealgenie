<template>
  <li class="has-sub">
    <a href="#" role="button">
    <i class="fas fa-tachometer-alt"></i>
      {{ locales[locale] }}
    </a>
    <ul class="header3-sub-list list-unstyled">
      <li>
        <a v-for="(value, key) in locales" :key="key" href="#"
          @click.prevent="setLocale(key)"
        >
          {{ value }}
        </a>
      </li>
    </ul>
  </li>
</template>

<script>
import { mapGetters } from 'vuex'
import { loadMessages } from '~/plugins/i18n'

export default {
  computed: mapGetters({
    locale: 'lang/locale',
    locales: 'lang/locales'
  }),

  methods: {
    setLocale (locale) {
      if (this.$i18n.locale !== locale) {
        loadMessages(locale)

        this.$store.dispatch('lang/setLocale', { locale })
      }
    }
  }
}
</script>
