let deleteOrder = (id) => {
    const API_URL = "http://localhost:3000/orders";
    axios.delete(API_URL + '/' + id).then((response) => {
      sessionStorage.clear();
      window.location = "index.html";
    });
}