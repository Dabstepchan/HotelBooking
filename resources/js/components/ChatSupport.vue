<template>
  <div class="chat-support">
    <div v-for="message in messages" :key="message.id">
      <span>{{ message.user.name }}:</span>
      <span>{{ message.message }}</span>
    </div>
    <form @submit.prevent="sendMessage">
      <input type="text" v-model="newMessage" placeholder="Type your message...">
      <button type="submit">Send</button>
    </form>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { useChatStore } from '../stores/chatStore';

export default {
  name: 'ChatSupport',
  setup() {
    const chatStore = useChatStore();
    const newMessage = ref('');

    const sendMessage = async () => {
      if (newMessage.value.trim() !== '') {
        await chatStore.addMessage({ message: newMessage.value });
        newMessage.value = '';
      }
    };

    onMounted(chatStore.getMessages);

    return { messages: chatStore.messages, newMessage, sendMessage };
  },
};
</script>
