<template>
 
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
            <button class="btn btn-md btn-warning"> View profile</button>
          </a>
          </td>
      </tr>
    </tbody>
  </table>
  </div>
</div>

</template>