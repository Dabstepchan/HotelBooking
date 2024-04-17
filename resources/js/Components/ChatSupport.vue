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
  import useChat from '../composables/chat';
  
  export default {
    name: 'ChatSupport',
    setup() {
      const { messages, addMessage, getMessages } = useChat();
      const newMessage = ref('');
  
      const sendMessage = async () => {
        if (newMessage.value.trim() !== '') {
          await addMessage({ message: newMessage.value });
          newMessage.value = '';
        }
      };
  
      onMounted(getMessages);
  
      return { messages, newMessage, sendMessage };
    }
  };
  </script>
  
  <style scoped>
  .chat-support {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: white;
    border: 1px solid #ccc;
    padding: 10px;
    max-height: 300px;
    overflow-y: auto;
  }
  
  .chat-support form {
    margin-top: 10px;
  }
  
  .chat-support input[type="text"] {
    width: calc(100% - 70px);
    margin-right: 10px;
  }
  
  .chat-support button {
    width: 60px;
  }
  </style>
  