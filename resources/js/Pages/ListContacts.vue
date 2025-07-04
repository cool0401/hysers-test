<script setup>
import { computed, ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3';
import { route } from 'ziggy-js';
import { Link } from '@inertiajs/inertia-vue3';

const { props } = usePage();
const contacts = computed(() => props.value.contacts);
const flash = computed(() => props.value.flash);

const showMessage = ref(false);
const messageText = ref('');

watch(flash, (newFlash) => {
  if (newFlash?.message) {
    messageText.value = newFlash.message;
    showMessage.value = true;
    setTimeout(() => (showMessage.value = false), 3000); // Hide after 3s
  }
});

function deleteContact(id) {
  if (confirm('Are you sure you want to delete this contact?')) {
    Inertia.delete(route('contacts.ui.destroy', id));
  }
}
</script>

<template>
  <div v-if="showMessage" class="notification is-success">
    {{ messageText }}
  </div>

  <table>
    <tbody>
      <tr v-for="contact in contacts.data" :key="contact.id">
        <td>{{ contact.name }}</td>
        <td>{{ contact.email }}</td>
        <td>{{ contact.phone }}</td>
        <td>
          <Link :href="route('contacts.edit', contact.id)" class="mr-2 text-blue-600">Edit</Link>
          <button @click="deleteContact(contact.id)" class="text-red-600">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>
</template>
