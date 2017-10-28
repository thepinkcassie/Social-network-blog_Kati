<template>
  <div class="col-md-6">
    <div class="media" style="margin-bottom:10px;">
      <textarea rows="3" class="form-control" placeholder="What's happening?" v-model="content"></textarea>
      <div style="margin-bottom:30px;">
      <button class="pull-right btn btn-md btn-warning"  :disabled="not_working" @click="create_post()">
        Post
      </button>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    mounted() {

    },
    data() {
      return {
        content:'',
        not_working:true
      }
    },
    methods: {
      create_post() {
        this.$http.post('/create/post', { content: this.content })
        .then((resp) => {
          this.content=''
          console.log(resp)
        })
      }
    },
    watch: {
      content() {
        if(this.content.length > 0)
           this.not_working = false
        else
            this.not_working = true
      }
    },
    http: { 
      root: '/root', 
      headers: { 
        'X-CSRF-Token': $('meta[name=csrf-token]').attr('content') 
      } 
    },
  }
</script>