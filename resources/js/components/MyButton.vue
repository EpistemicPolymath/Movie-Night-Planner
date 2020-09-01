<template>
    <div>
        <button type="submit" class="my-button">My Button</button>
    </div>
</template>

<script>
    export default {
        // An Event - for AJAX calls etc
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    .my-button {
        background-color: #333;
    }
</style>
