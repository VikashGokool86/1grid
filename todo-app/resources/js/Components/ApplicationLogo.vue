<template>
    <!-- App logo -->
    <img :src="image" alt="Description" />
</template>

<script>
import image from '@/assets/img/1gridLogo.svg';

export default {
    data() {
        return {
            image,
        };
    },
};
</script>
