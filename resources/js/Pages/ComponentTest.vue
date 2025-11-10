<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Label from '@/Components/InputLabel.vue';
import Input from '@/Components/TextInput.vue';

const emitTest = e => console.log(e)

</script>

<template>
<GuestLayout>
  <Label value="件名">タイトル</Label>
  <Input 
  modelValue="本文"
  @update:model-value="emitTest"
  ></Input>
</GuestLayout>
</template>