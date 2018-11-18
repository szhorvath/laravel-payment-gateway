<template>
  <transition name="page" mode="out-in" @after-leave="afterLeave">
    <slot> <router-view /> </slot>
  </transition>
</template>
<script>
export default {
    name: 'Child',
    methods: {
        afterLeave() {
            this.$root.$emit('triggerScroll')
        }
    }
}
</script>
