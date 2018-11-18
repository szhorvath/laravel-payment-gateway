<template>
  <div class="slideout" :class="{ isOpen: isOpen }">
    <div class="slideout-opener" @click="toggle">{{ openerText }}</div>
    <ul class="slideout-menu">
      <li class="slideout-menu-item">
        <img class="emoji" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/19332/zap-emoji.svg" alt="Zap Emoji" />
      </li>
      <li v-for="item in menu" class="zap-slideout-menu-item">{{ item }}</li>
      <li v-for="item in smallMenu" class="zap-slideout-menu-item--small">{{ item }}</li>
    </ul>
  </div>
</template>
<script>
export default {
  data: () => ({
    openerText: 'Open',
    isOpen: false,
    menu: ['Home', 'Work', 'Contact'],
    smallMenu: ['Tips', 'Resources', 'Shenanigans']
  }),
  methods: {
    open() {
      this.openerText = 'Close'
      this.isOpen = true
    },
    close() {
      this.openerText = 'Open'
      this.isOpen = false
    },
    toggle() {
      if (this.isOpen) {
        this.close()
      } else {
        this.open()
      }
    }
  }
}
</script>
<style lang="scss">
/*
Our Zap Slideout styles...
 */
.zap-slideout {
  position: relative;
  width: 240px;
  height: 100vh;
  padding: 30px;
  background-color: #34495e;
  transform: translateX(-100%);
  transition: transform 0.6s ease(out-cubic);

  &.isOpen {
    transform: translateX(0);
  }
}

.zap-slideout-opener {
  position: absolute;
  top: 20px;
  left: 100%;
  margin-left: 20px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: #fff;
  cursor: pointer;

  &:hover {
    text-decoration: underline;
  }
}
</style>
