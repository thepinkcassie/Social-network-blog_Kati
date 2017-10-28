<template>
  <div class="">
    <div class="">
      <div class="col-md-6 col-md-offset-3 ">
        <input type="text" class="form-control" placeholder="Search" v-model="query" @keyup.enter="search()">
        <br>  
      </div>

<div class="container">
  <div class="col-md-10 col-md-offset-1">
    <br>         
  <table class="table table-striped text-center" v-if="results.length">
    <thead>
      <tr>
        
      </tr>
    </thead>

    <tbody v-for="user in results">
      <tr><!--users avatar-->
        <td><img src="https://placeimg.com/50/50/people" alt="" width="50px" class="searched-user"></td>
        <td>{{ user.username}}</td>
        <td>
          <a href="#">
            <button class="btn btn-md btn-success"> View</button>
          </a>
          </td>
      </tr>
    </tbody>
  </table>
  </div>
</div>

    </div>
  </div>
</template>

<script>
  var algoliasearch = require('algoliasearch')

  var client = algoliasearch('D3OO05UU0F', '5348ddf07a799d8483093195483be160')

  var index= client.initIndex('users')

  export default {
    mounted() {

    },
    data() {
      return {
        query:'',
        results:[]
      }
    },
    methods:{
      search(){
        index.search(this.query, (err, content) => {
          this.results = content.hits
        })
      }
    },
    
  }
</script>

<style>
  .searched-user{
    border-radius:50%
  }

</style>