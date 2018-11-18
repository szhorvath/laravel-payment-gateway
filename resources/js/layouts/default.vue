<template>
  <b-container>
    <top-nav-bar />
    <child />
  </b-container>
</template>
<script>
import TopNavBar from '~/components/TopNavBar'
export default {
  name: 'MainLayout',
  components: { TopNavBar }
}
</script>
