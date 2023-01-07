<template>
  <div>
      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-9">

              <h2>Employee Registation</h2>
              <form @submit.prevent="save">
              <div class="form-group">
                <label>Employee name</label>
                <input type="text" v-model="employee.name" class="form-control"  placeholder="Employee name">
              
              </div>
              <div class="form-group">
                <label>Employee Address</label>
                <input type="text" v-model="employee.address" class="form-control"  placeholder="Employee Address">
              
              </div>

              <div class="form-group">
                <label>Mobile</label>
                <input type="text" v-model="employee.mobile" class="form-control"  placeholder="Mobile">
              
              </div>

              <button type="submit" class="btn btn-primary">Save</button>
              </form>

            </div>
          </div>
        </div>
      </section>


      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-9">
                <h2>Employee View</h2>
                <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Address</th>
                <th scope="col">Mobile</th>
                <th scope="col">Option</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="employee in result" v-bind:key="employee.id">
                    
                    <td>{{ employee.id }}</td>
                    <td>{{ employee.name }}</td>
                    <td>{{ employee.address }}</td>
                    <td>{{ employee.mobile }}</td>
                    <td>
                      <button type="button" class="btn btn-warning" @click="edit(employee)">Edit</button>
                      <button type="button" class="btn btn-danger"  @click="remove(employee)">Delete</button>
                    </td>
                  </tr>
              
            </tbody>
            </table>
            </div>
          </div>
        </div>
      </section>
   
  </div>
</template>

<script>
  import Vue from 'vue';
  import axios from 'axios';

   Vue.use(axios)

export default {
  name: 'EmployeeView',
  data () {
    return {
      result: {},
      employee:{
                 id: '',
                 name: '',
                 address: '',
                 mobile: ''
      }
    }
  },

  created() { 
      this.EmployeeLoad();
  },

  mounted() {
        console.log("mounted() called.......");
       
    },

  methods: {
         EmployeeLoad()
         {
               let url = "http://127.0.0.1:8000/api/employees";
               axios.get(url)
                .then(
                    ({data})=>{
                      console.log(data);
                      this.result = data;
                    }
                );
         },
         
        
         save()
         {
          if(this.employee.id == '')
            {
              this.saveData();
            }
            else
            {
              this.updateData();
            }       

         },
         saveData()
         {
          let url = 'http://127.0.0.1:8000/api/employees/';
          axios.post(url, this.employee)
          .then(
            ({data})=>{
              alert("Are you sure to Add employee !");
              this.EmployeeLoad();
            }
          )

         },

         edit(employee)
         {
          this.employee = employee;
         
         },
         updateData()
         {
            let url = 'http://127.0.0.1:8000/api/employees/'+ this.employee.id;
            axios.put(url, this.employee)
            .then(
              ({data})=>{
                this.employee.name = '';
                this.employee.address = '',
                this.employee.mobile = ''
                this.id = ''
                alert("Are you sure to update employee !");
                this.EmployeeLoad();
              }
            );

         },

         remove(employee){

          //  let url = `http://127.0.0.1:8000/api/employees/${employee.id}`;

           var url = 'http://127.0.0.1:8000/api/employees/'+ employee.id;
            axios.delete(url);
            alert("Are you sure to delete employee !");
            this.EmployeeLoad();
          }
    }
}
</script>