<template>
  <div class="modal" :class="openmodal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{ list.name }}</p>
        <button class="delete" @click="tutup" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
           <p>{{ list.name }}</p>
          </div>
        </div>
        <div class="field">
          <label class="label">Phone</label>
          <div class="control">
          <p>{{ list.phone }}</p>
          </div>
        </div>
        <div class="field">
          <label class="label">Email</label>
          <div class="control">
          <p>{{ list.email }}</p>
          </div>
        </div>
      </section>
      <footer class="modal-card-foot">
        <button class="button is-success">Save changes</button>
        <button class="button" @click="tutup">Cancel</button>
      </footer>
    </div>
  </div>
</template>
<script>
export default {
    props:["openmodal"],
    data() {
        return {
            list:''
        }
    },
    methods: {
        tutup(){
           this.$emit("closeRequest");
        }
    },
}
</script>
