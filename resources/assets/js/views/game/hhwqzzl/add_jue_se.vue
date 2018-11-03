<template>
  <div style="background:#eee;padding: 20px">
    <Card :bordered="false">
      <Form />
    </Card>
  </div>
</template>

<script>
  import Form from './components/Form'
    export default {
        name: "add_jue_se",
        components:{Form},
    }
</script>

<style scoped>

</style>
