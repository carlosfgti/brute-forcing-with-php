<script lang="ts">
import { defineComponent, ref } from "vue";
import router from '../routes'

export default defineComponent({
    name: 'Login',
    setup() {
        const username = ref("")
        const password = ref("")
        const loading = ref(false)
        const message = ref("")

        const auth = () => {
            loading.value = true
            message.value = ''
            
            setTimeout(() => {
                loading.value = false
                if (username.value === 'admin' && password.value === '123456') {
                    router.push({name: 'dash'})

                    return
                }

                message.value = 'fail access'
            }, 1000);
        }

        return {
            username,
            password,
            loading,
            message,
            auth
        }
    }
})
</script>

<template>
    <div>
        <form action="#" method="post" @submit.prevent="auth">
            <input type="text" name="username" placeholder="Username" v-model="username">
            <input type="password" name="password" placeholder="Password" v-model="password">
            <button
                :class="[
                    'btn',
                    'primary',
                    loading ? 'disabled' : ''
                ]"
                type="submit">
                <span v-if="loading">Sending...</span>
                <span v-else>Login</span>
            </button>
        </form>

        <div v-if="message" id="message-auth">
            {{ message }}
        </div>
    </div>
</template>