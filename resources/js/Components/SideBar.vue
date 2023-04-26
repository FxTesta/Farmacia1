<script>
import { SidebarMenu } from 'vue-sidebar-menu'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
import '@fortawesome/fontawesome-free/css/all.css'
export default {
  components: {
    SidebarMenu
  },
  data() {
    return {
      menu: [
        {
          header: 'FarmaSoft',
          hiddenOnCollapse: true
        },
        {
          href: '/dashboard',
          title: 'Dashboard',
          icon: 'fa fa-dashboard'
        },
        {
          href: '/cliente',
          title: 'Clientes',
          icon: 'fa fa-user',
          /*child: [
            {
              href: '/charts/sublink',
              title: 'Sub Link',
              icon: 'fa fa-user',
            }
          ]*/
        }
      ],
      collapsed: {
        type: Boolean,
        default: false
      },
      theme: {
    type: String,
    default: ''
  },
    }
  }
}
</script>
<template>
  <sidebar-menu :menu="menu" :collapsed="true"/>
</template>