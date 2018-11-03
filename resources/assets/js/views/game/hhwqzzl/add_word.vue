<template>
  <div style="background:#eee;padding: 20px">
    <Card :bordered="true">
      <Form :model="formItem" :label-width="80">
        <FormItem label="标题">
            <Input v-model="formItem.title" placeholder="请输入标题" />
        </FormItem>
        <FormItem label="关联人物">
        <Row>
          <Col span="8">
              <Select v-model="formItem.people.a" filterable>
                  <Option v-for="item in peopleList" :value="item.id" :key="item.id">{{ item.name }}</Option>
              </Select>
          </Col>
          <Col span="8">
              <Select v-model="formItem.people.b" filterable multiple>
                  <Option v-for="item in peopleList" :value="item.id" :key="item.id">{{ item.name }}</Option>
              </Select>
          </Col>
          <Col span="8">
              <Select v-model="formItem.people.c" filterable multiple>
                  <Option v-for="item in peopleList" :value="item.id" :key="item.id">{{ item.name }}</Option>
              </Select>
          </Col>
        </Row>
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
  name: "add_word",
  data() {
    return {
      formItem: {
        title: "",
        people:{
          a:'',b:'',c:''
        }
      },
      peopleList: {}
    };
  },
  methods: {
    save() {
      fetch("/api/games/hhwqzzl/add_word", {
        method: "post",
        body: JSON.stringify({
          title: this.formItem.title
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
  },
  mounted: function() {
    fetch("/api/games/hhwqzzl/people_list")
      .then(resp => {
        return resp.json();
      })
      .then((resp) =>{
        if (resp) {
          this.peopleList = resp;
        } else {
          this.$Notice.error({
            title: resp.msg
          });
        }
      })
      .catch(Error => {
        this.$Notice.warning({
          title: "网络链接错误",
          desc: Error
        });
      });
  }
};
</script>

<style scoped>
</style>
