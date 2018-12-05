<template>
  <div style="background:#eee;padding: 20px">
    <Card :bordered="true">
      <Form :model="formItem" :label-width="80">
        <FormItem label="题目">
          <Input v-model="formItem.title" placeholder="请输入问题" />
        </FormItem>
        <FormItem label="答案">
          <Input v-model="formItem.value" placeholder="请输入答案" />
        </FormItem>
        <FormItem>
            <Button type="primary" v-on:click="save">保存</Button>
        </FormItem>
    </Form>
    </Card>
  </div>
</template>

<script>
export default {
  name: "add_question",
  data() {
    return {
      formItem: {
        title: "",
        value:''
      },
    };
  },
  methods: {
    save() {
      fetch("/api/games/hhwqzzl/add_question", {
        method: "post",
        body: JSON.stringify({
          title: this.formItem.title,
          value: this.formItem.value
        }),
        headers: {
          "content-type": "application/json"
        }
      })
        .then(resp => {
          return resp.json();
        })
        .then(resp => {
          if (resp.code === 200) {
            this.formItem.title = "";
            this.formItem.value = "";
            this.$Notice.success({
              title: "添加成功"
            });
          } else {
            this.$Notice.error({
              title: resp.msg
            });
          }
        })
        .catch(Error => {
          this.$Notice.warning({
            title: "添加失败",
            desc: Error
          });
        });
    }
  }
};
</script>

<style scoped>
</style>
