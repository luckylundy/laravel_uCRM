<script setup>
import { Inertia } from '@inertiajs/inertia'

defineProps({
  id: String,
  blog: Object,
})

const deleteComfirm = id => {
  // console.log(id)
  Inertia.delete(`/inertia/${id}`, {
    onBefore: () => confirm('本当に削除しますか？')
  })
}

</script>

<template>
{{ id }}<br>
{{ blog.title }}<br>
<button @click="deleteComfirm(blog.id)">削除</button>
</template>