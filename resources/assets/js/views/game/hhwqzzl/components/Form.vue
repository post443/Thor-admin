<template>
    <Form :model="formItem" :label-width="80">
        <FormItem label="姓名">
            <Input v-model="formItem.name" placeholder="请输入标题" />
        </FormItem>
        <FormItem>
            <Button type="primary" v-on:click="save">保存</Button>
        </FormItem>
    </Form>
</template>
<script>
    export default {
        data () {
            return {
                formItem: {
                    name: ''
                }
            }
        },
        methods:{
            save(){
                fetch('/api/games/hhwqzzl/add_jue_se',{
                    method:'post',
                    body:JSON.stringify({
                        name:this.formItem.name,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    },
                }).then(resp=>{
                    return resp.json();
                }).then(resp=>{
                    if(resp.code === 200){
                        this.formItem.name = '';
                        this.$Notice.success({
                            title: '添加成功'
                        });
                    }else{
                        this.$Notice.error ({
                            title: resp.msg
                        });
                    }
                }).catch(Error=>{
                    this.$Notice.warning ({
                        title: '添加失败',
                        desc:Error
                    });
                });
            }
        }
    }
</script>
