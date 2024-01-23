let idsp = sessionStorage.getItem('id_sp');
let deleteSP = () => {
    const API_URL = "http://localhost:3000/products";
    axios.delete(API_URL + '/' + idsp).then((response) => {
      sessionStorage.clear();
      window.location = "index.html";
    });
}