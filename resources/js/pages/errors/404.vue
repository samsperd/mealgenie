<template>
  <card class="text-center" style="height: 100vh;">
  <i class="zmdi zmdi-info zmdi-hc-4x text-danger"></i>
    <h3 class="mb-4">
      {{ $t('page_not_found') }}
    </h3>
    <div class="links">
      <router-link :to="{ name: 'welcome' }">
        {{ $t('go_home') }}
      </router-link>
    </div>
  </card>
</template>

<script>
export default {
  name: 'NotFound'
}
</script>
