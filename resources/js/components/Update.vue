<template>
  <div class="modal" :class="openmodal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Update {{ list.name }}</p>
        <button class="delete" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Name" v-model="list.name">
          </div>
          <small v-if="errors.name" class="has-text-danger">{{ errors.name[0] }}</small>
        </div>
        <div class="field">
          <label class="label">Phone</label>
          <div class="control">
            <input class="input" :class="{'is-danger':errors.phone}" type="number" placeholder="Phone" v-model="list.phone">
          </div>
            <small v-if="errors.phone" class="has-text-danger">{{ errors.phone[0] }}</small>
        </div>
        <div class="field">
          <label class="label">Email</label>
          <div class="control">
            <input class="input" :class="{'is-danger':errors.email}" type="email" placeholder="Email" v-model="list.email">
          </div>
            <small v-if="errors.email" class="has-text-danger">{{ errors.email[0] }}</small>
        </div>
      </section>
      <footer class="modal-card-foot">
        <button class="button is-success" @click="update">Update</button>
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
        list:{

        },
        errors:{

        }
    };
  },
  methods: {
    tutup() {
      this.$emit("closeRequest");
    },
    update() {
      axios.patch(`/phonebook/${this.list.id}`,this.$data.list)
        .then((response)=>{
            alert('Data berhasil diupdate')
            this.tutup()
        })
        .catch((error)=>this.errors=error.response.data.errors);
    }
  }
};
</script>
