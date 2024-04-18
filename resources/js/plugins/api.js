import axios from 'axios';

// Функция для получения списка отелей из API
export async function fetchHotels() {
  try {
    const response = await axios.get('/api/hotels'); // делаем GET запрос к API для получения списка отелей
    return response.data; // возвращаем данные от API
  } catch (error) {
    throw error; // обрабатываем ошибку, если запрос не удался
  }
}
