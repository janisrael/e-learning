import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)
export const routes = [
  {
      path:'/login',
      // component:Login,
      name: 'Login',
      group: 'default',
      icon: '',
      type: '',
      key: ''
  }, 
  /**
    * Error Pages
    */
  // {path: '*', component: NotFoundComponent, 'name': 'error.404',},
  // {path: '/unauthorized', component: UnauthorizedComponent, 'name': 'error.403',},
  {
      path:'/',
      // component:Dashboard,
      name: 'Dashboard',
      group: 'default',
      icon: '',
      type: '',
      key: ''
  },
  {
      path:'/course-management/all-courses',
      // component: IndexCourseComponent,
      name: 'Courses',
      group: 'course-managemnent',
      icon: '<i class="fas fa-book parent-nav-icon"></i>',
      type: 'child',
      key: 'maintenance_schedule_view',
      meta: {
          permission: 'maintenance_schedule.view'
      }
  },
  {
      path:'/chapter-management/all-chapters',
      // component:ViewChapterComponent,
      name: 'Chapters',
      group: 'chapter-management',
      icon: '<i class="fas fa-layer-group"></i>',
      type: 'child',
      key: 'maintenance_schedule_view',
      meta: {
          permission: 'maintenance_schedule.view'
      }
  },
  {
      path:'/lesson-management/all-lessons',
      // component:ViewLessonComponent,
      name: 'Lessons',
      group: 'lesson-management',
      icon: '<i class="fas fa-hand-holding-usd"></i>',
      type: 'child',
      key: 'fe_phone_sales',
      meta: {
          permission: 'fe_phone_sales'
      }
  },
  {
      path:'/quiz-management/all-quizzes',
      // component:ViewQuizComponent,
      name: 'Quizzes',
      group: 'quizzes',
      icon: '<i class="fas fa-project-diagram"></i>',
      type: 'child',
      key: 'fe_phone_sales',
      meta: {
          permission: 'fe_phone_sales'
      }
  },

  {
      path:'/quiz-management/all-questions',
      // component:ViewQuestionComponent,
      name: 'All Questions',
      is_title: true,
      group: 'quizzes',
      icon: '<i class="fas fa-podcast"></i>',
      type: 'child',
      key: 'everwebinar_page_view',
      meta: {
          permission: 'everwebinar_page.view'
      }
  },
  {
      path:'/subscription-products/all-products',
      // component:ViewSubscriptionComponent,
      name: 'Subscriptions',
      is_title: true,
      group: 'subscription-products',
      icon: '<i class="far fa-address-card"></i>',
      type: 'child',
      key: 'customer_lookup_view',
      meta: {
          permission: 'customer_lookup.view'
      }
  },

  {
      path:'/authors/all-authors',
      // component:ViewAuthorComponent,
      name: 'All Authors',
      is_title: true,
      group: 'authors',
      icon: '<i class="far fa-address-card"></i>',
      type: 'child',
      key: 'customer_lookup_view',
      meta: {
          permission: 'customer_lookup.view'
      }
  },
  {
      path:'/user-management/user-list',
      // component:UserComponent,
      name: 'User Accounts',
      is_title: true,
      group: 'user-management',
      icon: '<i class="fas fa-user"></i>',
      type: 'child',
      key: 'user_account_view',
      meta: {
          permission: 'user_account.view'
      }
  },
];