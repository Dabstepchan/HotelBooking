import { defineStore } from 'pinia';
import axios from 'axios';

export const useChatStore = defineStore({
  id: 'chat',
  state: () => ({
    messages: [],
    errors: [],
  }),
  actions: {
    async getMessages() {
      try {
        const response = await axios.get('/api/messages', {
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
          },
        });
        this.messages = response.data.messages;
      } catch (error) {
        console.error('Error fetching messages:', error);
      }
    },
    async addMessage(form) {
      try {
        const response = await axios.post('/api/send', form, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          },
        });
        this.messages.push(response.data.message);
      } catch (error) {
        console.error('Error adding message:', error);
        if (error.response && error.response.status === 422) {
          this.errors = error.response.data.errors;
        }
      }
    },
  },
});
