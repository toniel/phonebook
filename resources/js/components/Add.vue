<template>
  <div class="modal" :class="openmodal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Add New</p>
        <button class="delete" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Name" v-model="name">
          </div>
          <small v-if="errors.name" class="has-text-danger">{{ errors.name[0] }}</small>
        </div>
        <div class="field">
          <label class="label">Phone</label>
          <div class="control">
            <input class="input" :class="{'is-danger':errors.phone}" type="number" placeholder="Phone" v-model="phone">
          </div>
            <small v-if="errors.phone" class="has-text-danger">{{ errors.phone[0] }}</small>
        </div>
        <div class="field">
          <label class="label">Email</label>
          <div class="control">
            <input class="input" :class="{'is-danger':errors.email}" type="email" placeholder="Email" v-model="email">
          </div>
            <small v-if="errors.email" class="has-text-danger">{{ errors.email[0] }}</small>
        </div>
      </section>
      <footer class="modal-card-foot">
        <button class="button is-success" @click="save">Save</button>
        <button class="button" @click="tutup">Cancel</button>
      </footer>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
export default {
  props: ["openmodal"],
  data() {
    return {
        name: "",
        phone: "",
        email: "",
        errors:{

        }
    };
  },
  methods: {
    tutup() {
      this.$emit("closeRequest");
    },
    save() {
      axios.post("/phonebook",this.$data)
        .then((response)=>{
            console.log(response)
            this.$parent.list.push(response.data)
            alert('Phone book berhasil disimpan')
            this.tutup()
            this.$parent.list.sort(function(a,b){
                if(a.name>b.name){
                    return 1;
                }else if(a.name<b.name){
                    return -1;
                }
            })
            this.name=""
            this.phone=""
            this.email=""
        })
        .catch((error)=>this.errors=error.response.data.errors);
    }
  }
};
</script>
