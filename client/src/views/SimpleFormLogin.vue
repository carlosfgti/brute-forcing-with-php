<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
    name: 'Login',
    setup() {
        
    }
})
</script>

<template>
    <div>
        <form action="#" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
</template>