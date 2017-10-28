<template>
  
    
      <div class="col-md-6">
        <div class="widget widget-update" v-for="post in posts">

               <img :src="post.user.avatar" alt="avatar" width="40px" height="40px" class="avatar-feed">
               <br>
                  {{ post.user.name }}
                  <span style="font-size:12px;">@{{ post.user.username }}</span>
                  <span style="font-size:13px;">- {{ post.created_at}}</span>    
                
               <p>{{ post.content }}</p>

               <like :id="post.id"></like>
  
        </div>
      </div>
    
 
  
</template>

<script>
    
    import Like from './Like.vue'

    export default {
      mounted() {
        this.get_feed()
      },
      components: {
        Like
      },
      methods: {
        get_feed() {
          this.$http.get('/feed')
              .then( (response) => {
                response.body.forEach( (post) => {
                  this.$store.commit('add_post', post)
                })
              })
        }
      },
      computed: {
        posts() {
          return this.$store.getters.all_posts
        }
      }
    }
        
</script>



<style>
    .avatar-feed{
      border-radius: 50%;
    }

</style>