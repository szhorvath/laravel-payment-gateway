import axios from 'axios'
import store from '~/store'
import router from '~/router'

// Request interceptor
axios.interceptors.request.use(request => {
  const csrfToken = document.head.querySelector('meta[name="csrf-token"]')

  if (csrfToken) {
    request.headers.common['X-CSRF-TOKEN'] = csrfToken.content
  } else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
  }

  request.headers.common['X-Requested-With'] = 'XMLHttpRequest'

  const locale = store.getters['lang/locale']
  if (locale) {
    request.headers.common['Accept-Language'] = locale
  }

  // request.headers['X-Socket-Id'] = Echo.socketId()

  return request
})

// Response interceptor
axios.interceptors.response.use(
  response => response,
  error => {
    const { status } = error.response

    return Promise.reject(error)
  }
)
