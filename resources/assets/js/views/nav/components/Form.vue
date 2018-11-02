<template>
    <Form :model="formItem" :label-width="80">
        <FormItem label="标题">
            <Input v-model="formItem.title" placeholder="请输入标题" />
        </FormItem>
        <FormItem label="地址">
            <Input v-model="formItem.url" placeholder="请输入网址" />
        </FormItem>
        <FormItem label="备注">
            <Input v-model="formItem.note" placeholder="请输入备注" />
        </FormItem>
        <FormItem label="权限">
            <RadioGroup v-model="formItem.auth">
                <Radio label="public">公开</Radio>
                <Radio label="private">私有</Radio>
            </RadioGroup>
        </FormItem>
        <FormItem label="追踪更新">
            <i-switch v-model="formItem.follow" size="large">
                <span slot="close">Off</span>
                <span slot="open">On</span>
            </i-switch>
        </FormItem>
        <FormItem label="基准时间" v-show="formItem.follow">
            <Row>
                <Col span="11">
                    <DatePicker type="date" placeholder="Select date" v-model="formItem.date"></DatePicker>
                </Col>
                <Col span="2" style="text-align: center">-</Col>
                <Col span="11">
                    <TimePicker type="time" placeholder="Select time" v-model="formItem.time"></TimePicker>
                </Col>
            </Row>
        </FormItem>
        <FormItem label="更新周期" v-show="formItem.follow">
            <Input v-model="formItem.follow_period" placeholder="请输入备注" />
        </FormItem>
        <FormItem>
            <Button type="primary" v-on:click="save">保存</Button>
        </FormItem>
    </Form>
</template>
<script>
import {dev} from 'api/nav';
    export default {
        data () {
            return {
                formItem: {
                    title: '',
                    url: '',
                    note: '',
                    auth: 'public',
                    follow:true,
                    follow_period:0,
                    date:'7',
                    time:''
                },
            }
        },computed:{
            follow_time(){
                return this.formItem.date.toLocaleDateString() + ' ' + this.formItem.time;
            }
        },
        methods:{
            save(){
                fetch('/api/nav',{
                    method:'post',
                    body:JSON.stringify({
                        title:this.formItem.title,
                        url:this.formItem.url,
                        note:this.formItem.note,
                        auth:this.formItem.auth,
                        follow:this.formItem.follow,
                        follow_time:this.formItem.follow_time,
                        follow_period:this.formItem.follow_period
                    }),
                    headers: {
                        'content-type': 'application/json'
                    },
                }).then(resp=>{
                    console.log(resp);
                }).catch(Error=>{
                    console.log(Error);
                });
            }
        }
    }
</script>
