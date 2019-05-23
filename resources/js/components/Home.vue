<template>
  <div>
    <nav class="panel column is-offset-2 is-8">
      <p class="panel-heading">
        <button class="button is-link is-outlined" @click="openAdd">Add New</button>
          <span class="is-pulled-right">
             <i class="fas fa-spinner fa-spin" v-if="loading"></i>
        </span>
      </p>
      <div class="panel-block">
        <p class="control has-icons-left">
          <input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
          <span class="icon is-small is-left">
            <i class="fas fa-search" aria-hidden="true"></i>
          </span>
        </p>
      </div>
      <a class="panel-block"  v-for="(item,index) in temp" :key="index" >
        <span class="column is-9">{{ item.name }}</span>
        <span class="panel-icon column i">
          <i class="fas fa-trash has-text-danger" @click="hapus(index,item.id)"></i>
        </span>
        <span class="panel-icon column i">
          <i class="fas fa-edit has-text-info"  @click="openUpdate(index)"></i>
        </span>
        <span class="panel-icon column i">
          <i class="fas fa-eye has-text-primary" @click="openShow(index)"></i>
        </span>
      </a>
    </nav>
    <add :openmodal="addActive" @closeRequest="close"></add>
    <show :openmodal="showActive" @closeRequest="close"></show>
    <Update :openmodal="updateActive" @closeRequest="close"></Update>
  </div>
</template>
<script>
import Add from "./Add";
import Show from "./Show";
import Update from "./Update";

import axios from "axios";

export default {
  components: { Add,Show,Update},
  data() {
    return {
      addActive: "",
      showActive:"",
      updateActive:"",
      list: {},
      errors: {},
      loading: false,
      searchQuery:'',
      temp:''
    };
  },
  watch:{
      searchQuery(){
        if(this.searchQuery.length >0){
           this.temp= this.list.filter((item)=>{
                // return item.name.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1;
                return Object.keys(item).some(key=>{
                    let string = String(item[key]);
                    // console.log(string)
                    return string.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1;
                })
            })
        //   console.log(result )


        }else{
            this.temp = this.list
        }
      }
  },
  mounted() {
    axios.get("/getData").then(response => {
      this.list = this.temp= response.data;
    });
  },
  methods: {
    openAdd() {
      this.addActive = "is-active";
      // console.log('tetstst')
    },
    openShow(key) {
      this.$children[1].list = this.temp[key]
      this.showActive = "is-active";
    },
     openUpdate(key) {
      this.$children[2].list = this.temp[key]
      this.updateActive = "is-active";
    },
    hapus(key,id){
        // console.log(key+'-'+id)
        this.loading = !this.loading
       if(confirm('Yakin Hapus ?')){
            axios.delete(`/phonebook/${id}`).then(response=>{
            alert('Data Dihapus');
            this.close
            this.list.splice(key,1)
             this.loading = !this.loading
        }).catch(error=>{
            console.log(error)
        })
       }
    },
    close() {
      this.addActive =this.updateActive= this.showActive = "";
    }
  }
};
</script>
