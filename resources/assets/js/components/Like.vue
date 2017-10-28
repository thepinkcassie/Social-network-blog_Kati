<template>
  <div class="row" style="padding:15px;">
    <hr>
    <p v-for="like in post.like">
      <i class="fa fa-gold fa-thumbs-up" aria-hidden="true"></i>
    </p>

    <button class=" btn btn-warning" v-if="!auth_user_likes_post" @click="like()">
        <i class="fa fa-thumbs-up" aria-hidden="true" alt="Like"></i>
    </button>

    <button class=" btn btn-danger" v-else @click="unlike()">
        <i class="fa fa-thumbs-down" aria-hidden="true" alt="Unlike"></i>
    </button>
  </div>
</template>

<script>
  export default {
    mounted() {
      //
    },
    props: ['id'],
    computed: {
      likers() {
        var likers = []
        this.post.like.forEach( (like) =>{
          likers.push(like.user.id)
        })
        return likers
      },
      auth_user_likes_post() {
        var check_index = this.likers.indexOf(
          this.$store.state.auth_user.id
        )
        if(check_index === -1){
          return false
        } else{
          return true
        }
      },
      post(){
        return this.$store.state.posts.find( (post) => {
          return post.id === this.id
        })
      }
    },
    methods:{
      like(){
        this.$http.get('/like/' + this.id)
            .then( (resp) => {
              this.$store.commit('update_post_likes', {
                id: this.id,
                like: resp.body
              })
            })
      },
      unlike(){
        this.$http.get('/unlike/' + this.id)
            .then( (response) => {
              this.$store.commit('unlike_post', {
                post_id: this.id,
                like_id: response.body
              })
            })
      }
    }
  }
</script>


<style>
    .fa-gold{
      color: #bf9b30;
    }
</style>