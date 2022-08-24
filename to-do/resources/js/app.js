import './bootstrap';
import { createApp } from 'vue';


const app = createApp({});

import ExampleComponent from './vue/ExampleComponent.vue';
app.component('example-component', ExampleComponent);


// fontawesome (icons)
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { fas } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'

library.add(fas, far, fab)


app
.component('font-awesome-icon', FontAwesomeIcon)
.mount('#app')
