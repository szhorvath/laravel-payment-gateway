<template>
  <div class="social-icons">
    <fa-layers class="fa-lg">
      <fa class="base" icon="circle" /> <fa class="top" :icon="['fab', 'facebook-f']" transform="shrink-6" />
    </fa-layers>
    <fa-layers class="fa-lg">
      <fa class="base" icon="circle" /> <fa class="top" :icon="['fab', 'twitter']" transform="shrink-6" />
    </fa-layers>
    <fa-layers class="fa-lg">
      <fa class="base" icon="circle" /> <fa class="top" :icon="['fab', 'linkedin-in']" transform="shrink-6" />
    </fa-layers>
  </div>
</template>
<script>
export default {
  name: 'Socials'
}
</script>
<style lang="scss" scoped>
@import '~@/_variables.scss';
.social-icons {
  margin-top: 0.8rem;
  .top {
    color: #ffffff;
  }
  .base {
    color: $danger;
  }
}
</style>
