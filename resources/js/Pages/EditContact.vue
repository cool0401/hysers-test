<template>
  <div class="max-w-md mx-auto mt-8">
    <h1 class="text-xl font-bold mb-4">Edit Contact</h1>

    <form @submit.prevent="updateContact">
      <div class="mb-4">
        <label class="block mb-1">Name</label>
        <input v-model="form.name" class="w-full border px-3 py-2" type="text" />
      </div>

      <div class="mb-4">
        <label class="block mb-1">Email</label>
        <input v-model="form.email" class="w-full border px-3 py-2" type="email" />
      </div>

      <div class="mb-4">
        <label class="block mb-1">Phone</label>
        <input v-model="form.phone" class="w-full border px-3 py-2" type="text" />
      </div>

      <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      >
        Save
      </button>
    </form>
  </div>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3'
import { route } from 'ziggy-js'
import { usePage } from '@inertiajs/inertia-vue3'

const { props } = usePage()
const contact = props.value.contact

const form = useForm({
  name: contact.name,
  email: contact.email,
  phone: contact.phone
})

function updateContact() {
  console.log(route('contacts.destroy', id));
  Inertia.put(`/contacts/${contact.id}`, form);
}
</script>
