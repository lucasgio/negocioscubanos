<template>
<div>
    <vue-page-transition name="fade-in-right">
    <router-view></router-view>
    </vue-page-transition>
</div>
</template>

<script>
Vue.use(VuePageTransition)

import { VuePageTransition } from 'vue-page-transition';
import store from '../store/';
    export default {
        store,
    }
</script>
