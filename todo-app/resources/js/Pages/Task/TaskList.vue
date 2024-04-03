
<script setup>

</script>
<template>
    <p>{{ task }}</p>
</template>

<script>
export default {
    props: {
      task: {
        type:   Array,
      }
    },
}
</script>
