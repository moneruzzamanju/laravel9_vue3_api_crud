import Vue from 'vue'
import Router from 'vue-router'
import EmployeeView from '@/components/EmployeeView'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'EmployeeView',
      component: EmployeeView
    },


  ]
})
