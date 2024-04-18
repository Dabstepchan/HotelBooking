import { ref } from 'vue';
import axios from 'axios';

export default function useChat() {
    const messages = ref([]);
    const errors = ref([]);

    const getMessages = async () => {
        try {
            const response = await axios.get('/api/messages', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            });
            messages.value = response.data.messages;
        } catch (error) {
            console.error('Error fetching messages:', error);
        }
    };

    const addMessage = async (form) => {
        errors.value = [];

        try {
            const response = await axios.post('/api/send', form, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            });
            messages.value.push(response.data.message);
        } catch (error) {
            console.error('Error adding message:', error);
            if (error.response && error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    };

    return {
        messages,
        errors,
        getMessages,
        addMessage
    };
}
