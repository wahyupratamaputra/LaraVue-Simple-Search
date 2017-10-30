<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://unpkg.com/vue"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.3.4"></script>

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/css/app.css">

        <!-- Styles -->
        
    </head>
    <body>
        <div id="app">
        <center><h1>Live Search</h1></center>
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="search" @change="SearchByName">
                    </div>
                </div>
              </div>
              <div class="row">
                <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="data in datas">
                        <td>@{{data.id}}</td>
                        <td>@{{data.name}}</td>
                        <td>@{{data.email}}</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
        </div>
       
    </body>

    <script type="text/javascript">
        var app = new Vue({
          el: '#app',
          data(){
        return{
              datas:[],
              search:''
            }

        },

            created: function() {

              
              this.$http.get('/alluser')
              .then(function(response){
                this.datas = response.data;
                console.log(this.datas);
              });
            },

            methods: {
                SearchByName: function(){
                    if (this.search != '') {
                       this.$http.get('/getUserName/'+this.search)
                      .then(function(response){
                        this.datas = response.data;
                        console.log(this.datas);
                        });
                      }//endif
                    else{
                         this.$http.get('/alluser')
                          .then(function(response){
                            this.datas = response.data;
                            console.log(this.datas);
                          });
                    }
                }
            },

            watch:{
                search: function(){
                    this.SearchByName();
                }
            }
        })
    </script>


</html>
