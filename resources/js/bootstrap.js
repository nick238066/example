window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
    // authEndpoint: '/api/broadcasting/auth',
    // auth:{
    //     headers:{
    //         // 'authorization': 'Bearer ' + api_token 
    //         // 'Authorization': 'Bearer ' + "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9icm9hZGNhc3QtdGVzdC5sYXJhdmVsLmNvbVwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY3NzIyMzU0NSwiZXhwIjoxNjc3MjI3MTQ1LCJuYmYiOjE2NzcyMjM1NDUsImp0aSI6IkRhZXpmRmNsSExRN252U04iLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.eIqPhAPctpLitL2Vn_hHQddRrVKjUOVFxAKbZmPmz0I"
    //         'Authorization': 'Bearer ' + token
    //     }
    // }
});

console.log(token + "123");